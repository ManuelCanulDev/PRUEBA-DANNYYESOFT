<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tw_corporativos', function (Blueprint $table) {
            $table->id();
            $table->string('S_NombreCorto',45);
            $table->string('S_NombreCompleto',76);
            $table->string('S_LogoURL',255)->nullable();
            $table->string('S_DBName',45);
            $table->string('S_DBUsuario',45);
            $table->string('S_DBPassword',100);
            $table->string('S_SystemUrl',255);
            $table->tinyInteger('S_Activo');
            $table->timestamp('D_FechaIncorporacion');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('tw_usuarios_id');
            $table->foreign('tw_usuarios_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tw_corporativos');
    }
}
