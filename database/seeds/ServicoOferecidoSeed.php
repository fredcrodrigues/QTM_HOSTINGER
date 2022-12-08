<?php

use Illuminate\Database\Seeder;

class ServicoOferecidoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servico_oferecidos')->insert([
            'titulo' => 'Coworkings',
            'slug' => 'coworkings',
            'conteudo' => 'Você sabia que o ambiente em que realizamos os nossos atendimentos influenciam no processo terapêutico e de bem-estar? Podemos te conectar com um coworking certificado mais próximo e que atenda às necessidades do seu processo.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('servico_oferecidos')->insert([
            'titulo' => 'Produtos',
            'slug' => 'produtos',
            'conteudo' => 'Os nossos produtos possuem um compromisso com a sua qualidade de vida, por isso foram pensados, pesquisados e desenvolvidos utilizando processos de produção consciente, assim você pode se cuidar enquanto colabora para um meio ambiente sustentável.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('servico_oferecidos')->insert([
            'titulo' => 'Terapeutas',
            'slug' => 'terapeutas',
            'conteudo' => 'Os nossos terapeutas possuem formações nas diversas áreas da saúde integrativa, sobretudo as 29 práticas reconhecidas e utilizadas no SUS. Além disso, as nossa modalidades de atendimento se adaptam às suas necessidades, podendo ser síncrono ou assíncrono e presencial ou virtual.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('servico_oferecidos')->insert([
            'titulo' => 'Serviços',
            'slug' => 'servicos',
            'conteudo' => 'Conecte-se com o terapeuta mais próximo de você a partir da sua localização, por meio do nosso serviço de georreferenciamento ou conheça nosso marketplace e tenha acesso a qualidade de vida.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
