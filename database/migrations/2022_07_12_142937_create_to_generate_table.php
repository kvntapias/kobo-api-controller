<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToGenerateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_generate', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->unsignedBigInteger('api_form_id');
            $table->string('_id', 255);
            $table->string('_uuid', 255)->nullable();
            $table->timestamps();
            $table->foreign('api_form_id')->references('id')->on('api_form');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to_generate');
    }
}
