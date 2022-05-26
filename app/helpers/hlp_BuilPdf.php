<?php 

namespace App\Helpers;
use App\Http\Controllers\ApiFormController;

use \DantSu\OpenStreetMapStaticAPI\OpenStreetMap;
use \DantSu\OpenStreetMapStaticAPI\LatLng;
use \DantSu\OpenStreetMapStaticAPI\Line;
use \DantSu\OpenStreetMapStaticAPI\Markers;

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

    public function getSurveyItemByRelevant($value){
        $form_struc = $this->form_structure;
        $choise = array_filter($form_struc, function($items) use($value) {
            if (isset($items->relevant)) {
                $value_relev = $items->relevant;
                return str_contains($value_relev, $value) ? $items : null;
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
                //$trimmed_key = str_replace($group_name."/", "", $value);
                $trimmed_key = basename($value);
                
                $label_preg = $this->getSurveyLabel($trimmed_key);
                $surveyItemPreg = $this->getSurveyItem($trimmed_key);
                
                $respuesta = $this->imprimir_texto($value);

                if (is_array($respuesta)) {
                    for ($i = 0; $i < count($respuesta); $i++) { 
                        foreach ($respuesta[$i] as $key => $subResp) {
                            $trimmed_subkey = basename($key);
                            $surveySubItem = $this->getSurveyItem($trimmed_subkey);
                            $surveySubItemLabel = $this->getSurveyLabel($trimmed_subkey);
    
                            switch ($surveySubItem->type) {
                                case 'image':
                                    $subResp = $this->showImgServer(false, $subResp, 300,300);
                                break;

                                case 'select_one':
                                    $subResp = $this->getChoiseLabel($subResp);
                                break;

                                case 'text':
                                    $subResp = $subResp;
                                break;
                            }
    
                            $respuestas_grupo[] = [
                                'pregunta' => $surveySubItemLabel,
                                'respuesta' => $subResp,
                                'key' => $trimmed_subkey,
                                'formatted' => $key,
                                'type' => $surveySubItem->type ?? null
                            ];
                        }
                    }
                }else{

                    switch ($surveyItemPreg->type) {
                        case 'image':
                            $respuesta = $this->showImgServer(false, $respuesta, 300,300);
                        break;
                    }
                    $respuestas_grupo[] = [
                        'pregunta' => $label_preg,
                        'respuesta' => $this->format_respuesta($surveyItemPreg, $respuesta) ?? $respuesta,
                        'key' => $value,
                        'formatted' => $this->format_respuesta($surveyItemPreg, $respuesta),
                        'type' => $surveyItemPreg->type ?? null 
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


    /**
     * Imprimir subgrupo de respuestas en condicionado a respuesta anterior
     */
    public function imprimir_grupo_respuestas_by_condicion_parent($parent){
        $respuesta = $this->imprimir_texto($parent); 
        $respuestas_grupo = [];
        if ($respuesta) {
            $itemByRelev = $this->getSurveyItemByRelevant($respuesta);
            if ($itemByRelev) {
                
                $grupo = $itemByRelev->name;
                $respuestas_grupo = $this->imprimir_grupo_respuestas($grupo);
            }
        }        
        return $respuestas_grupo;
    }
     
    public function generar_imagen_geo(){
        $geo_pos = $this->getGeo();
        $path_img = public_path("marker.png");
        $img = (new OpenStreetMap(new LatLng($geo_pos['lat'], $geo_pos['lng']), 10, 600, 400))
            ->addMarkers((new Markers($path_img))
                    ->setAnchor(Markers::ANCHOR_CENTER, Markers::ANCHOR_BOTTOM)
                    ->addMarker(new LatLng($geo_pos['lat'], $geo_pos['lng']))
            )
            ->getImage()
            ->getBase64SourcePNG();
        return $img;
    }

    public function getGeo(){
        $geo = $this->form_submission->_geolocation;
        $info = [
            'lat' => isset($geo[0]) ? $geo[0] : "",
            'lng' => isset($geo[1]) ? $geo[1] : ""
        ];
        return $info;
    }
}