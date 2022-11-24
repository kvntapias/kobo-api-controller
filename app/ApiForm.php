<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiForm extends Model
{
    protected $table = 'api_form';

    public function to_generates(){
        return $this->hasMany('App\ToGenerate', 'api_form_id')->where('es_generado', false);
    }
}