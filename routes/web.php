<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('api_form/listar_submissions', 'ApiFormController@listar_submissions');
Route::resource('api_form', 'ApiFormController');

Route::get('api_form/{form_id}/mostrarSubmission/{submission_id}', 'ApiFormController@mostrarSubmission')
->name('api_form.mostrar_submission');

Route::get('api_form/{form_id}/generar_pdf/{submission_id}/{format?}', 'ApiFormController@generar_pdf');

Route::get('imagen_map', 'ApiFormController@imagen_map');

Route::get('masivo_generar_pdfs/{form_id}/{action?}', 'ApiFormController@masivo_generar_pdfs');