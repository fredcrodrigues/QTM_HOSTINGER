<?php

use Illuminate\Database\Seeder;

class SeedSobreSecundario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sobre_secundarios')->insert([
            'titulo' => 'Conheça mais sobre a QTM Healthtech',
            'conteudo' => '<p class="width-85 md-width-100 xs-width-100 sm-margin-lr-auto text-medium-gray">Nossa missão é levar a experiência de Saúde e bem-estar para a palma da mão. Saúde, Bem-Estar com Ciência e Tecnologia.</p>',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
