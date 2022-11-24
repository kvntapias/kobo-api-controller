<?php

namespace App\Http\Controllers;

use App\ApiForm;
use Illuminate\Http\Request;
use App\Helpers\Hlp_Text;
use App\Helpers\HlpBuilPdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ApiFormController extends Controller
{

    public function index(){
        $forms = ApiForm::orderBy('nombre')->get();
        return view('api_form.index', compact('forms'));
    }

    public function show($id){
        $form = ApiForm::findOrFail($id);
        return view('api_form.show', compact('form'));
    }

    public function listar_submissions(Request $request){
        $msg = ""; $status = 200; $errors = null; $info = null;

        // Buscar Form
        $api_form = ApiForm::find($request->form_id);

        // Obtener Respuestas del Form
        $subs = $this->getFormJsonSubmissions($api_form);

        return response()->json([
            "status" => $status,
            "errors" => $errors,
            "info" => $info,
            "form" => $subs['form'],
            "subs" => $subs['kobo_info']
        ]);
    }

    public function getFormJsonSubmissions($form){
        $url = 'https://kobo.humanitarianresponse.info/assets/'.$form->kobo_key.'/submissions/?format=json';        
        $client = new \GuzzleHttp\Client();
        $auth_token = config('app.user_auth_token');
        $headers = [
            'headers' => [
                'Authorization' => 'token '.$auth_token,
            ],
        ];
        $response = $client->request('GET', $url, $headers);
        $data =[
                'kobo_info' => json_decode($response->getBody()->getContents()),
                'form' => $form
        ];
        return $data;
    }

    public function getFormJsonStructure($form){
        /**
         * API URL EXAMPLE 
         * https://kobo.humanitarianresponse.info/api/v2/assets/[form_id]/?format=json
         */
        $url = 'https://kobo.humanitarianresponse.info/api/v2/assets/'.$form->kobo_key.'/?format=json';
        $client = new \GuzzleHttp\Client();
        $auth_token = config('app.user_auth_token');
        $headers = [
            'headers' => [
                'Authorization' => 'token '.$auth_token,
            ],
        ];
        $response = $client->request('GET', $url, $headers);
        return json_decode($response->getBody()->getContents());
    }

    public function getFormAttachment($form, $submission, $attach_id){
        $url = 'https://kobo.humanitarianresponse.info/api/v2/assets/'.$form->kobo_key."/data/".$submission->_id."/attachments/".$attach_id;
        $client = new \GuzzleHttp\Client();
        $auth_token = config('app.user_auth_token');
        $headers = [
            'headers' => [
                'Authorization' => 'token '.$auth_token,
            ],
            'stream' => true,
            'http_errors' => false
        ];
        try {
            $response = $client->request('GET', $url, $headers);
        }catch(\Exception $e) {
            return false;
        }
        return $response->getBody()->getContents();
    }

    public function getFormJsonSubmission($form, $submission_id){
        /**
         * API URL EXAMPLE 
         * https://kobo.humanitarianresponse.info/api/v2/assets/[form_id]/data/[submission_id]/?format=json
         */
        $url = 'https://kobo.humanitarianresponse.info/api/v2/assets/'.$form->kobo_key.'/data/'.$submission_id.'/?format=json';
        $client = new \GuzzleHttp\Client();
        $auth_token = config('app.user_auth_token');
        $headers = [
            'headers' => [
                'Authorization' => 'token '.$auth_token,
            ],
        ];
        $response = $client->request('GET', $url, $headers);
        return json_decode($response->getBody()->getContents());
    }

    public function mostrarSubmission($form_id, $submission_id){
        $form = ApiForm::find($form_id);
        $res = $this->getFormJsonSubmission($form, $submission_id);
        return $res;
    }

    public function generar_pdf($form_id, $submission_id, $format = null, $save_on_folder = false, $form_structure = false, $submission_data = false){        
        $form = ApiForm::find($form_id);
        $template = $form->template;
        
        if (!\View::exists("build_pdf.templates.".$form->template)) {
            echo "no se encontró plantilla : ".$form->template;
            die();
        }

        if (!$template) {
            abort(404);
        }

        $submission = $submission_data ? $submission_data : $this->getFormJsonSubmission($form, $submission_id);
        $form_structure = $form_structure ? $form_structure : $this->getFormJsonStructure($form);  
        $survey = (array)$form_structure->content->survey;
        $form_choises = $form_structure->content->choices;
        $title_page = $form->nombre;

        $build_pdf = new HlpBuilPdf($survey, $submission, $form_choises, $form );

        if ($format == "pdf") {
            $file_name = "PDF_".$submission_id.".pdf";
            $template = \View::make('build_pdf.templates.'.$template, compact('submission', 'form_structure', 'build_pdf', 'title_page'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf->loadHTML($template)->setPaper('A4', 'landscape');

            if ($save_on_folder) {
                return $pdf;
            }else{
                return $pdf->stream($file_name, ['Attachment' => false]);
            }
        }else{
            return view('build_pdf.templates.eeac_2022.index', compact('submission', 'form_structure', 'build_pdf', 'title_page'));
        }
    }

    /**
     * Test Generar Masivamente
     */
    public function masivo_generar_pdfs($form_id, $action = ""){
        ini_set('max_execution_time', 0);
        $form = ApiForm::find($form_id);
        $form_structure = $this->getFormJsonStructure($form);
        $submissions = $this->getFormJsonSubmissions($form);

        // Filtrar respuesta de Api si hay registros en bd para generar.
        $from_dtb_to_generate = $form->to_generates;
        if ($from_dtb_to_generate->count()) {
            $ids_needle = $from_dtb_to_generate->pluck('_id')->toArray();
           
            $filtered = array_filter($submissions['kobo_info'], function ($subm) use($ids_needle) {
                return in_array($subm->_id, $ids_needle) ? $subm : null;
            });
            $submissions['kobo_info'] = $filtered;
        }

        if (!$action) {
            echo "No se especificó accion";
            die();
        }
        if (count($submissions['kobo_info']) && count($from_dtb_to_generate)) {
            $submis_data = $submissions['kobo_info'];
            $folder = "public/".$form->nombre."/".date('Ymd');

            if ($action == "stop") {
                echo "Stopped";
                die();
            }
            foreach ($submis_data as $submission) {

                $rowdtb = $from_dtb_to_generate->where('_id', $submission->_id)->first();

                if ($action == "stop") {
                    echo "Deteniendo script";
                    break;
                }else{
                    $fname = $this->custom_filename($form, $submission);
                    try {
                        $pdf = $this->generar_pdf($form_id, $submission->_id, "pdf", true, $form_structure, $submission);
                        if (file_exists($folder."/".$fname)) {
                            unlink($folder."/".$fname);
                        }
                        if (Storage::put($folder."/".$fname, $pdf->output())) {
                            $rowdtb->generacion_message = "Ok";
                            $rowdtb->es_generado = true;
                        }
                    } catch (\Exception $e) {
                        Log::error($form->nombre."|Falló al generar|".$submission->_id."|".$e->getMessage() );
                        $rowdtb->generacion_message = $e->getMessage();
                        $rowdtb->es_generado = false;
                    }
                    $rowdtb->update();
                }
            }
        }else{
            echo "Sin registros para generar";
            die();
        }
    } 

    public function custom_filename($form, $submission){
        $fname = $submission->_id;
        switch ($form->template) {
            case 'eeac_2022.index':
                $concat = mb_strtoupper($submission->departamento."_".$submission->municipio);
                $fname .= "_".$concat;
            break;

            case 'familiar_2022.index':
                $concat = mb_strtoupper($submission->{'group_wu4ss89/departamento'}."_".$submission->{'group_wu4ss89/municipio'});
                $fname .= "_".$concat;
            break;

            default:
                $fname = $submission->_id."_".date('Ymd');
            break;
        }
        return $fname.".pdf";
    }
}
