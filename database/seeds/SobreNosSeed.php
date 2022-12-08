<?php

use Illuminate\Database\Seeder;

class SobreNosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sobre_nos')->insert([
            'titulo' => 'teste',
            'slug' => 'teste',
            'descricao' => '<p>Teste</p>',
            'descricao_resumida' => '<p>Teste</p>',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
