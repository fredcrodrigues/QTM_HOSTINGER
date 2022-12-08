<?php

use Illuminate\Database\Seeder;

class ProdutoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'titulo' => 'Álcool em Gel',
            'slug' => 'alcool-em-gel',
            'conteudo' => 'descrição do produto',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produtos')->insert([
            'titulo' => 'Óleos Essenciais',
            'slug' => 'oleos-essenciais',
            'conteudo' => 'descrição do produto',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
