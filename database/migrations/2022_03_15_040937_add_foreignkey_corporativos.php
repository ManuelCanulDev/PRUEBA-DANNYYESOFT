<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeyCorporativos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tw_corporativos', function (Blueprint $table) {
            $table->foreignId('FK_Asignado_id')->nullable();
            $table->foreign('FK_Asignado_id')->references('id')->on('tw_contactos_corporativos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tw_corporativos', function (Blueprint $table) {
            $table->dropForeign('tw_corporativos_fk_asignado_id_foreign');
            $table->dropColumn('FK_Asignado_id');
        });
    }
}
