<?php

namespace App\Http\Controllers;

use App\ApiForm;
use Illuminate\Http\Request;

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
            "subs" => $subs
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
        return json_decode($response->getBody()->getContents());
    }
}
