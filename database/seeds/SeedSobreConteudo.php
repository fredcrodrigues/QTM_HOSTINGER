<?php

use Illuminate\Database\Seeder;

class SeedSobreConteudo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sobre_conteudos')->insert([
            'titulo' => 'Somos a QTM Healthtech!',
            'conteudo' => '
                        
                             Uma startup criada pela CEO Juliana Nogueira para o mundo. A QTM foi idealizada em 2019 e executada no início de 2020, quando iniciou uma parceria com Zeeshan Shaikh, residente de Abu Dhabi, Emirados Árabes Unidos - UAE. A QTM, através de um modelo de empresas inteligentes, visa formar os Quantum terapeutas, embasados em pesquisas e iniciação científica de forma multidisciplinar, adotando um conceito de clínica-escola, laboratório de cozinha e cultivo de quintal, para gerar acessibilidade e inclusão de todos.

                             <br><br>

                             Uma das principais criações da startup é a Técnica Quantum, uma ferramenta de saúde integral que reúne aspectos da medicina humanizada e alternativa.

                             <br><br>

                             <i>
                                <b>
                                    Com esse ciclo produtivo, temos como objetivo, gerar aumento da economia, diminuição das desigualdades sociais e uma maior qualidade de vida a todos.
                                </b> 
                             </i>

                             <br><br>

                             Também temos como objetivo a propagação do conhecimento científico, da inovação tecnológica e informacional. Além de sermos uma empresa filantrópica, e amiga da natureza.
                        
        ',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
