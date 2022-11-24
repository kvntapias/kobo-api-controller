<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEsGeneradoToToGenerateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('to_generate', function (Blueprint $table) {
            $table->string('generacion_message', 255)->nullable();
            $table->boolean('es_generado')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('to_generate', function (Blueprint $table) {
            $table->dropColumn('generacion_message');
            $table->dropColumn('es_generado');
        });
    }
}
