<?php

use Illuminate\Database\Seeder;

class SeedModeloAgenda extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modelo_agendamentos')->insert([
            'tipo' => 'profissional',
            'form' => '[]',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('modelo_agendamentos')->insert([
            'tipo' => 'coworking',
            'form' => '[]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
