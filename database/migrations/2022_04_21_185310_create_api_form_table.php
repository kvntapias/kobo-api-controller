<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_form', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->string('nombre', 255);
            $table->string('descripcion', 500)->nullable();
            $table->string('kobo_key', 255)->nullable();
            $table->string('kobo_id', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_form');
    }
}
