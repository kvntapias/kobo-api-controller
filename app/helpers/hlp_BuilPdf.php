<?php 

namespace App\Helpers;

class hlp_BuilPdf{

    public $form_structure;
    public $form_submission;

    public function __construct($form_structure, $form_submission)
    {
        $this->form_structure = $form_structure;
        $this->form_submission = $form_submission;
    }

    public function imprimir_texto(){
        return "Texto de Prueba";
    }

}