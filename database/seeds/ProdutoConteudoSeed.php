<?php

use Illuminate\Database\Seeder;

class ProdutoConteudoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produto_conteudos')->insert([
            'titulo' => 'Nossos Produtos',
            'conteudo' => '<p class="text-medium line-height-30 text-medium-gray">
                                Os nossos produtos possuem um compromisso com a sua qualidade de vida, por isso foram pensados, pesquisados e desenvolvidos utilizando processos de produção consciente, assim você pode se cuidar enquanto colabora para um meio ambiente sustentável. 
                            </p>',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
