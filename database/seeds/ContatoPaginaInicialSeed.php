<?php

use Illuminate\Database\Seeder;

class ContatoPaginaInicialSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contato_pagina_inicials')->insert([
            'titulo' => 'Somos a QTM Healthtech',
            'conteudo' => 'É hora de revolucionar a experiência de saúde integral. Nossa solução é desenvolver um aplicativo de geolocalização e market place para que possa conectar uma rede de atendimento composta por pacientes, terapeutas e coworkings, que se retroalimenta de forma orgânica.',
            'email' => 'contato@qtmhealthtech.com.br',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
