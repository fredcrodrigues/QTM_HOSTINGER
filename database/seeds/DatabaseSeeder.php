<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EstadoSeed::class);
        $this->call(CidadeSeed::class);
        $this->call(RoleSeed::class);
        $this->call(RoleSeedPart2::class);
        $this->call(UserSeed::class);
        $this->call(ConfiguracaoSeed::class);
        $this->call(SeedSlide::class);
        $this->call(SeedSobreConteudo::class);
        $this->call(SeedSobrePrincipal::class);
        $this->call(SeedSobreSecundario::class);
        $this->call(SeedTime::class);
        $this->call(ServicoSeed::class);
        $this->call(ServicoOferecidoSeed::class);
        $this->call(ProdutoSeed::class);
        $this->call(ProdutoConteudoSeed::class);
        $this->call(ContatoPaginaInicialSeed::class);
        $this->call(SeedModeloAgenda::class);
        $this->call(CovidasSeeder::class);
        $this->call(ObjetivoSeeder::class);
    }
}
