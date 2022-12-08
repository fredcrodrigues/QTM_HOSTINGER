<?php

use Illuminate\Database\Seeder;

class ConfiguracaoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuracaos')->insert([
            'instagram' => 'https://www.instagram.com/qtmHealthtech',
            'facebook' => 'https://www.facebook.com/quantumtt.startup',
            'youtube' => 'false',
            'whatsapp' => '(99) 99999-9999',
            'email' => 'contato@qtmhealthtech.com.br',
            'link_app_store' => 'false',
            'link_google_play' => 'false',
            'politica_privacidade' => 'false',
            'linkedin' => 'false',
            'tiktok' => 'https://www.tiktok.com/@qtm.Healthtech',
            'uso_responsavel' => 'false',
            'termos' => 'false',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
