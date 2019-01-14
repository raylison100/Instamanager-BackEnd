<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AtaulizacaoAtributosInstaCota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('insta_contas', function(Blueprint $table) {
            $table->integer('curtidasQTD');
            $table->integer('seguidoresQTD');
            $table->integer('comentariosQTD');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
