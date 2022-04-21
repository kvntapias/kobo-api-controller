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
}
