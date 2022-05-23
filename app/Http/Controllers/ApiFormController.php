<?php

namespace App\Http\Controllers;

use App\ApiForm;
use Illuminate\Http\Request;
use App\Helpers\hlp_Text;
use App\Helpers\hlp_BuilPdf;
use Illuminate\Support\Facades\Storage;

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
            'stream' => true
        ];
        $response = $client->request('GET', $url, $headers);
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

    public function generar_pdf($form_id, $submission_id, $format = null, $save_on_folder = false){
        $form = ApiForm::find($form_id);
        $template = $form->template;
        
        if (!$template) {
            abort(404);
        }

        $submission = $this->getFormJsonSubmission($form, $submission_id);
        $form_structure = $this->getFormJsonStructure($form);
        
        $survey = (array)$form_structure->content->survey;
        $form_choises = $form_structure->content->choices;

        $build_pdf = new hlp_BuilPdf($survey, $submission, $form_choises, $form );

        if ($format == "pdf") {
            $file_name = "PDF_".$submission_id.".pdf";
            $template = \View::make('build_pdf.templates.'.$template, compact('submission', 'form_structure', 'build_pdf'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf->loadHTML($template)->setPaper('A4', 'landscape');

            if ($save_on_folder) {
                return $pdf;
            }else{
                return $pdf->stream($file_name, ['Attachment' => false]);
            }
        }else{
            return view('build_pdf.templates.eeac_2022.index', compact('submission', 'form_structure', 'build_pdf'));
        }
    }

    /**
     * Test Generar Masivamente
     */
    public function masivo_generar_pdfs($form_id, $action = ""){
        ini_set('max_execution_time', 0);
        $form = ApiForm::find($form_id);
        $submissions = $this->getFormJsonSubmissions($form);
        if (!$action) {
            echo "No se especificó accion";
            die();
        }
        if (count($submissions['kobo_info'])) {
            $submis_data = $submissions['kobo_info'];
            $folder = "public/".$form->nombre;

            if ($action == "stop") {
                echo "Stopped";
                die();
            }
            foreach ($submis_data as $submission) {
                if ($action == "stop") {
                    echo "Deteniendo script";
                    break;
                }else{
                    $fname = $this->custom_filename($form, $submission);
                    $pdf = $this->generar_pdf($form_id, $submission->_id, "pdf", true);

                    if (file_exists($folder."/".$fname)) {
                        unlink($folder."/".$fname);
                    }
                    Storage::put($folder."/".$fname, $pdf->output());
                }
            }
        }
    } 

    public function custom_filename($form, $submission){
        $fname = $submission->_id;
        switch ($form->template) {
            case 'eeac_2022.index':
                $concat = strtoupper($submission->departamento."_".$submission->municipio);
                $fname .= "_".$concat;
            break;

            default:
                $fname = $submission->_id."_".date('Ymdhis');
            break;
        }
        return $fname.".pdf";
    }
}
