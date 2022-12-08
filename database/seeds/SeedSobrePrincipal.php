<?php

use Illuminate\Database\Seeder;

class SeedSobrePrincipal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sobre_principals')->insert([
            'titulo' => 'QTM Healthtech.',
            'conteudo' => '
            <p class="text-extra-large alt-font font-weight-400">
                Com o cenário pandêmico atual todas as atenções se voltaram para a área da saúde, fazendo com que o mercado cresça de forma exponencial. E a tendência é que as pessoas cuidem mais de sua saúde física e mental nos próximos anos.
            </p>

            <p>
                Nossa missão é levar a experiência de Saúde e bem-estar para a palma da mão
            </p>
        ',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
