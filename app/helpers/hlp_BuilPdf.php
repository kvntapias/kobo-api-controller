<?php 

namespace App\Helpers;

class hlp_BuilPdf{

    public $form_structure;
    public $form_submission;
    public $form_choises;

    public function __construct($form_structure, $form_submission, $form_choises)
    {
        $this->form_structure = $form_structure;
        $this->form_submission = $form_submission;
        $this->form_choises = $form_choises;
    }

    public function imprimir_texto($label = null){
        return $label ? $this->form_submission->{$label} : "";
    }

}