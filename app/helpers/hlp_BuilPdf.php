<?php 

namespace App\Helpers;
use App\Http\Controllers\ApiFormController;

class hlp_BuilPdf{

    public $form_structure;
    public $form_submission;
    public $form_choises;
    public $api_form;

    public function __construct($form_structure, $form_submission, $form_choises, $api_form)
    {
        $this->form_structure = $form_structure;
        $this->form_submission = $form_submission;
        $this->form_choises = $form_choises;
        $this->api_form = $api_form;
    }

    public function imprimir_texto($label = null, $withChoiseLabel = false){
        $respuesta = $this->form_submission->{$label} ?? "";
        if ($respuesta) {
            if ($withChoiseLabel) {
                return $this->getChoiseLabel($respuesta);
            }else{
                return $respuesta ?? "";
            }
        }else{
            return false;
        }
    }

    public function imprimir_texto_implode($label = null, $mayus = false, $search = " ", $separated = ","){
        $respuesta = $this->imprimir_texto($label);
        if ($respuesta) {
            $respuesta = str_replace($search, $separated, $respuesta);
            $respuesta = $mayus ? strtoupper($respuesta) : $respuesta;
        }
        return $respuesta;
    }

    public function getChoise($name){
        $array = $this->form_choises;
        $choise = array_filter($array, function($items) use($name) {
            return $items->name == $name;
        });
        return reset($choise);
    }

    public function getChoiseLabel($name){
        $choise = $this->getChoise($name);
        return $choise ? $choise->label[0] : null;
    }

    public function getSurveyItem($name){
        $array = $this->form_structure;
        $choise = array_filter($array, function($items) use($name) {
            if (isset($items->name)) {
                return $items->name == $name ? $items : null;
            }
            if (isset($items->{'$autoname'})) {
                return $items->{'$autoname'} == $name ? $items : null;
            }
        });
        return reset($choise);
    }

    public function getSurveyLabel($name){
        $item = $this->getSurveyItem($name);
        return $item ? $item->label[0] : "";
    }

    /**
     * Obtener archivos de imagen
     */
    public function getAttachMents(){
        return $this->form_submission->_attachments ?? [];
    }

    // Buscar objeto de documento en "arrachments" del submission
    /**
     * $filename  : Nombre del fichero dentro del label como respuesta
     * Se busca comparando atributo filename dentro del attachment
     */
    public function findAttachment($file_name){
        $formatted = str_replace(" ", "_", $file_name); // Respuesta se Remplazan  los espacios por "_" 
        $files = $this->getAttachMents(); // Objetos de tipo archivo 
        $attach = null;
        foreach ($files as $file) {
            $link = explode('/',$file->filename);
            $trim_fname = end($link);
            if ($trim_fname == $formatted) {
                $attach = $file;
            }
        }
        return $attach;
    }

    public function showImgServer($label = false, $alter_respuesta = false, $heigth=100, $width=100){
        $respuesta = $this->imprimir_texto($label) ? $this->imprimir_texto($label) : $alter_respuesta;
        // Buscar nombre de archivo en attachments
        $apf_controller = new ApiFormController();
        if ($respuesta) {
            $buscar_ficero = $this->findAttachment($respuesta);
            if ($buscar_ficero) {
                $body = $apf_controller->getFormAttachment($this->api_form, $this->form_submission, $buscar_ficero->id);
                $base64 = base64_encode($body);
                $mime = "image/jpeg";
                $img = ('data:' . $mime . ';base64,' . $base64);
                return "<img class='attach_image' src=$img alt='image' heigth=".$heigth." width=".$width." >";
            }
        }
    }

    /**
     * Mostrar grupos de respuesta relacionados con prefijo del grupo ("grouo_nnn1/LABEL_PREGUNTA")
     * Se compara si la concatenacion contiene el nombre del grupo y se añade al arreglo.
     */
    public function imprimir_grupo_respuestas($group_name, $hasFiles = false){
        $submission = (array)$this->form_submission;
        $respuestas_grupo = [];

        foreach (array_keys($submission) as $idx => $value) {
            if (str_contains($value, $group_name)) {
                $trimmed_key = str_replace($group_name."/", "", $value);
                
                $label_preg = $this->getSurveyLabel($trimmed_key);
                $surveyItemPreg = $this->getSurveyItem($trimmed_key);
                
                $respuesta = $this->imprimir_texto($value);

                if (is_array($respuesta)) {
                                 
                }else{
                    $respuestas_grupo[] = [
                        'pregunta' => $label_preg,
                        'respuesta' => $this->format_respuesta($surveyItemPreg, $respuesta) ?? $respuesta,
                        'key' => $value,
                        'formatted' => $this->format_respuesta($surveyItemPreg, $respuesta)
                    ];
                }
            }
        }
        return $respuestas_grupo;        
    }

    public function format_respuesta($surveyItem, $respuesta){
        $response = "";
        switch ($surveyItem->type) {
            case 'select_multiple':
                $arr_resp = explode(" ", $respuesta);
                $response = $this->set_label_options($arr_resp);
            break;
            case 'select_one':
                $arr_resp = explode(" ", $respuesta);
                $response = $this->set_label_options($arr_resp);
            break;
            default :
                $response = $respuesta;
            break;
        }
        return $response;
    }

    public function set_label_options($arr_respuestas){
        $arr_resp = [];
        foreach ($arr_respuestas as $resp) {
            array_push($arr_resp, $this->getChoiseLabel($resp));
        }
        return implode(', ', $arr_resp);
    }
}