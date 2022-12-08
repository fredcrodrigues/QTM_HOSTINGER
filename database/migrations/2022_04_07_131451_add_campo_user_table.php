<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('users', function(Blueprint $table) {
            $table->foreignId('fk_conselho')->unsigned()->nullable();
            $table->foreign('fk_conselho')->references('id')->on('conselhos');
            $table->foreignId('fk_especialidade')->unsigned()->nullable();
            $table->foreign('fk_especialidade')->references('id')->on('especialidades');
            $table->string('tipo')->nullable();
            $table->string('cpf_cnpj')->unique()->nullable();
            $table->string('rg')->nullable();
            $table->string('numero_conselho')->nullable();
            $table->string('status')->nullable();
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
