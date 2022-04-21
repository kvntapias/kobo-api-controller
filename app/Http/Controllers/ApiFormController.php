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
}
