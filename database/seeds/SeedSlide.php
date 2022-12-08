<?php

use Illuminate\Database\Seeder;

class SeedSlide extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            'titulo' => 'Diferenciais',
            'slug' => 'diferenciais',
            'conteudo' => '
            Nosso principal diferencial é entrar em um oceano azul gerando acessibilidade e conectividade. Pesquisas e inovação científica, nosso valores baseados na agenda 2030 da ONU e o nosso modelo O2O com atendimentos e vendas de forma online, offline e homecare.
        ',
            'botao' => 'conheça nossos serviços',
            'link' => '#',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('slides')->insert([
            'titulo' => 'Experiência Completa',
            'slug' => 'experiencia-completa',
            'conteudo' => '
            Não fornecemos só um tratamento aos clientes, nós lhes proporcionamos uma experiência de saude integral completa.
        ',
            'botao' => 'conheça nossos serviços',
            'link' => '#',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
