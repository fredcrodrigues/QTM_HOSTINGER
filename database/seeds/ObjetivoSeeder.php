<?php

use Illuminate\Database\Seeder;

class ObjetivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objetivos')->insert([
          'titulo' => '01',
          'slug' => 'objetivo',
          'conteudo' => '
            Realizar uma pesquisa científica a respeito da implementação da medicina humanizada e integrativa para o tratamento da Covid-19.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('objetivos')->insert([
          'titulo' => '02',
          'slug' => 'objetivo-02',
          'conteudo' => 'Desenvolver uma análise sociológica sobre a pandemia acerca de suas possíveis sequelas e consequências em contexto mundial.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('objetivos')->insert([
          'titulo' => '03',
          'slug' => 'objetivo-03',
          'conteudo' => 'Aplicar a técnica Quantum e Desenvolver fórmulas fitoterápicas.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('objetivos')->insert([
          'titulo' => '04',
          'slug' => 'objetivo-04',
          'conteudo' => 'Lançar a fórmula farmacêutica CoVIDAS',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('objetivos')->insert([
          'titulo' => '05',
          'slug' => 'objetivo-05',
          'conteudo' => 'Trazer informação para a Comunidade Científica e Sociedade Civil sobre os avanços tecnológicos na imunização, prevenção e tratamento da Covid-19.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('objetivos')->insert([
          'titulo' => '06',
          'slug' => 'objetivo-06',
          'conteudo' => 'Promover conhecimento sobre técnicas de cultivo por meio de aplicativos e outras tecnologias.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('objetivos')->insert([
          'titulo' => '07',
          'slug' => 'objetivo-07',
          'conteudo' => 'Incentivar e conscientizar sobre o uso de medicamentos e o desenvolvimento de fitoterápicos através do conceito de Laboratório de Cozinha.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('objetivos')->insert([
          'titulo' => '08',
          'slug' => 'objetivo-08',
          'conteudo' => 'Proteger o planeta através de práticas ambientais.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('objetivos')->insert([
          'titulo' => '09',
          'slug' => 'objetivo-09',
          'conteudo' => '
          Promover o empoderamento feminino, estimulando a presença da mulher na Comunidade Científica e em outras áreas.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('objetivos')->insert([
          'titulo' => '10',
          'slug' => 'objetivo-10',
          'conteudo' => 'Gravar vídeo e publicar revistas sobre os resultados da campanha CoVIDAS.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('objetivos')->insert([
          'titulo' => '11',
          'slug' => 'objetivo-11',
          'conteudo' => 'Publicar o artigo científico Projeto Quantum - Transmutando CoVIDAS.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('objetivos')->insert([
          'titulo' => '12',
          'slug' => 'objetivo-12',
          'conteudo' => 'Formar Quantum terapeutas, a partir do conceito Clínica Escola para combate a Covid-19.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('objetivos')->insert([
          'titulo' => '13',
          'slug' => 'objetivo-13',
          'conteudo' => 'Criar parcerias com o Estado, Comunidade Acadêmico Científica e Sociedade Civil para a efetivação dos objetivos da CoVIDAS.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
