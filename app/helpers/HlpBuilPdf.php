<?php 

namespace App\Helpers;
use App\Http\Controllers\ApiFormController;

use \DantSu\OpenStreetMapStaticAPI\OpenStreetMap;
use \DantSu\OpenStreetMapStaticAPI\LatLng;
use \DantSu\OpenStreetMapStaticAPI\Markers;

class HlpBuilPdf{

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

    public function imprimir_texto_implode($label = null, $mayus = false, $search = " ", $separated = ",", $WithLabel = false){
        $respuesta = $this->imprimir_texto($label);
        if ($respuesta) {
            $respuesta = str_replace($search, $separated, $respuesta);
            $respuesta = $mayus ? strtoupper($respuesta) : $respuesta;
            if ($WithLabel) {
                $respuesta = $this->set_label_options(explode(',', $respuesta));
            }
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
        if ($item) {
            if (isset($item->label[0])) {
                return $item->label[0];
            }
        }
        return "";
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
        
        $formatted = preg_replace('/ /u', '_', $file_name);
        $formatted = preg_replace('/[^-\w\.]/u', '', $formatted);

        $files = $this->getAttachMents(); // Objetos de tipo archivo 
        $attach = null;
        foreach ($files as $file) {
            $link = explode('/',$file->filename);
            $trim_fname = end($link);
            if ($trim_fname == $formatted) {
                return $file;
            }
        }
        return;
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
                $trimmed_key = basename($value);
                
                $label_preg = $this->getSurveyLabel($trimmed_key);
                $surveyItemPreg = $this->getSurveyItem($trimmed_key);
                
                $respuesta = $this->imprimir_texto($value);

                if (is_array($respuesta)) {
                    for ($i = 0; $i < count($respuesta); $i++) { 
                        if (is_array($respuesta[$i]) || is_object($respuesta[$i])) {                        
                            foreach ($respuesta[$i] as $key => $subResp) {
                                
                                $trimmed_subkey = basename($key);
                                $surveySubItem = $this->getSurveyItem($trimmed_subkey);
                                $surveySubItemLabel = $this->getSurveyLabel($trimmed_subkey);
                                
                                if ($surveySubItem) {                            
                                    switch ($surveySubItem->type) {
                                        case 'image':
                                            $subResp = $this->showImgServer(false, $subResp, 300,300);
                                        break;

                                        case 'select_one':
                                            $subResp = $this->getChoiseLabel($subResp);
                                        break;

                                        case 'integer':
                                            $subResp = $subResp;
                                        break;

                                        case 'select_multiple':
                                            $subResp = $this->format_respuesta($surveySubItem , $subResp);
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
                        }
                    }
                }else{
                    if ($surveyItemPreg) {
                        switch ($surveyItemPreg->type) {
                            case 'image':
                                $respuesta = $this->showImgServer(false, $respuesta, 300,300);
                            break;
    
                            case 'integer':
                                $respuesta = $respuesta;
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
                $arr_resp = [$respuesta];
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
        if($geo_pos){
            $path_img = public_path("marker.png");
            try {
                $img = (new OpenStreetMap(new LatLng($geo_pos['lat'], $geo_pos['lng']), 10, 600, 400))
                ->addMarkers((new Markers($path_img))
                        ->setAnchor(Markers::ANCHOR_CENTER, Markers::ANCHOR_BOTTOM)
                        ->addMarker(new LatLng($geo_pos['lat'], $geo_pos['lng']))
                )
                ->getImage()
                ->getBase64SourcePNG();
                return $img;
            } catch (\Exception $e) {
                \Log::error($e->getMessage());
                return "";
            }
        }else{
            return "";
        }
        
    }

    public function getGeo(){
        $geo = $this->form_submission->_geolocation;
        $info = false;
        if (!is_null($geo) && isset($geo[0])) {
            $info = [
                'lat' => isset($geo[0]) ? $geo[0] : "",
                'lng' => isset($geo[1]) ? $geo[1] : ""
            ];
        }        
        return $info;
    }

    public function imprimir_grupo_respuestas_complex($group_name){
        $submission = (array)$this->form_submission;

        $respuestas_grupo = [];

        foreach (array_keys($submission) as $idx => $value) {
            if (str_contains($value, $group_name)) {
                
                $respuesta = $this->imprimir_texto($value);
                $trimmed_key = basename($value);
                $label_preg = $this->getSurveyLabel($trimmed_key);
                $surveyItemPreg = $this->getSurveyItem($trimmed_key);

                if (is_array($respuesta)) {
                    // Recorrer cada Fila 
                    $formatted_subItems = [];

                    /* foreach ($respuesta as $subResp) {
                        //dd($subResp);
                        // Iterar elementos de respuesta contenidos en cada SubItem
                        foreach ($subResp as $subRespKey => $subRespValue) {
                            $subres_base_name = basename($subRespKey);
                            $label_preg = $this->getSurveyLabel($subres_base_name);
                            $surveyItemPreg = $this->getSurveyItem($subres_base_name);
                            $type =  $surveyItemPreg->type ?? null; 
                            
                            
                        }

                    } */
                    return "Multiple child items";
                }else{
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

    public function getGrupoBasedRespuesta($label_pregunta){
        $respuesta = $this->imprimir_texto($label_pregunta);
        $item_label = $this->getSurveyItemByRelevant($respuesta);
        return $item_label ? $item_label->name : null;
    }
}