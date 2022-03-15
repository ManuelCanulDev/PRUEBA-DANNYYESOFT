<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwEmpresasCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tw_empresas_corporativos', function (Blueprint $table) {
            $table->id();
            $table->string('S_RazonSocial',150);
            $table->string('S_RFC',13);
            $table->string('S_Pais',75)->nullable();
            $table->string('S_Estado',75)->nullable();
            $table->string('S_Municipio',75)->nullable();
            $table->string('S_ColoniaLocalidad',75)->nullable();
            $table->string('S_Domicilio',100)->nullable();
            $table->string('S_CodigoPostal',5)->nullable();
            $table->string('S_UsoCFDI',45)->nullable();
            $table->string('S_UrlRFC',255)->nullable();
            $table->string('S_UrlActaConstitutiva',255)->nullable();
            $table->tinyInteger('S_Activo');
            $table->string('S_Comentarios',255);
            $table->unsignedBigInteger('tw_corporativos_id');
            $table->foreign('tw_corporativos_id')->references('id')->on('tw_corporativos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tw_empresas_corporativos');
    }
}
