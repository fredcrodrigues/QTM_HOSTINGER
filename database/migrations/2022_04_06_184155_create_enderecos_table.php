<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('logradouro');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cep');
            $table->foreignId('fk_user');
            $table->foreign('fk_user')->references('id')->on('users');
            $table->unsignedInteger('fk_estado');
            $table->foreign('fk_estado')->references('id')->on('estados');
            $table->unsignedInteger('fk_cidade');
            $table->foreign('fk_cidade')->references('id')->on('cidades');
            $table->string('complemento')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
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
        Schema::dropIfExists('enderecos');
    }
}
