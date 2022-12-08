<?php

use Illuminate\Database\Seeder;

class SeedTime extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('times')->insert([
            'nome' => 'Juliana dos Santos Nogueira',
            'slug' => 'juliana-nogueira',
            'cargo' => 'CEO e Proponente / Coordenadora do Projeto',
            'conteudo' => '<p style="text-align: justify;">
            Cientista Social, Mestra em Cultura e Sociedade (PGC
            ULT – UFMA); e Mestranda Profissional em Preservação do Patrimônio Cultural (IPHAN), Hipnoterapeuta, Terapeuta Integrativa, CEO e founder da QTM startup. A proponente Juliana Nogueira possui experiência em desenvolvimento de pesquisas e projetos, atuação ativa como terapeuta, de forma inovadora busca unir a ciência a práticas já reconhecidas, mas em estado de ascensão social.
        </p>
        <p style="text-align: left;">
            <b>E-mail</b>
            Juliana.dsn@hotmail.com <br>
            <b>Celular</b>
            (98) 983318460 <br>
            <b>Titulação</b>
            Mestra Interdisciplinar em Cultura e Sociedade
        </p>
        ',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('times')->insert([
            'nome' => 'Vinícios Souza Sirino',
            'slug' => 'vinicios sirino',
            'cargo' => 'Assessor Jurídico e Social Media',
            'conteudo' => '<p style="text-align: justify;">
            Consultor jurídico na área de inovação e tecnologia; desenvolve pesquisas sobre startups e Direito; Social media, possui conhecimento em mídias digitais, e-comercce e tráfego pago, além de desenvolver atividade jurídica nas áreas cíveis e trabalhistas; Na QTM atua como "fiel escudeiro" com assessoria jurídica para a startup e produção de conteúdo digital.
        </p>
        <p style="text-align: left;">
            <b>E-mail</b>
            sirinoadvogado@gmail.com <br>
            <b>Celular</b>
            (98) 981424661 <br>
            <b>Titulação</b>
            Advogado (OAB/MA 22829)
        </p>
        ',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('times')->insert([
            'nome' => 'Robson Daniel dos S. Nogueira',
            'slug' => 'robson-daniel-nogueira',
            'cargo' => 'Vice-coordenador e terapeuta de PICs',
            'conteudo' => '<p style="text-align: justify">
            Mestrando profissional em Economia e Política da Cultura e Indústrias Criativas; Terapeuta de Práticas Integrativas Complementares. Dentro da área das Práticas Integrativas Complementares - PICs, possui experiência e formação em diversas terapias como Hipnoterapia, Cromoterapia e Access Bars. Atualmente, desenvolve pesquisa sobre qualidade de vida associada à saúde mental do indivíduo e em paralelo a compreensão do polo econômico criativo do Maranhão sob uma perspectiva dos desafios e avanços;
        </p>
        <p style="text-align: left;">
            <b>E-mail</b>
            adanirobson@gmail.com <br>
            <b>Celular</b>
            (98) 98342-1233 <br>
            <b>Titulação</b>
            Bacharel em Direito
        </p>
        ',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('times')->insert([
            'nome' => 'Walkir de Jues Sá Marinho',
            'slug' => 'walkir-marinho',
            'cargo' => 'Gerente Administrativo',
            'conteudo' => '<p style="text-align: justify;">
            Pós-graduando em Gestão Empresarial, atua na condução de licitações na modalidade Pregão, elaborando e executando até a fase final da negociação, tendo ainda experiência na área de gestão empresarial, e análise de indicadores administrativos que buscam sempre os conhecimentos e exercícios de forma prática.
        </p>
        <p style="text-align: left;">
            <b>E-mail</b>
            walkyrjsmarinho@gmail.com <br>
            <b>Celular</b>
            (98) 988210705 <br>
            <b>Titulação</b>
            Engenheiro de Produção
        </p>
        ',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('times')->insert([
            'nome' => 'Zeeshan Ahmed Shaikh',
            'slug' => 'zeeshan-ahmed',
            'cargo' => 'Gestão Estratégica e Financeira',
            'conteudo' => '<p style="text-align: justify;">
            Possui experiência bastante diversificada na prestação de serviços como planejamento estratégico e financeiro, governança de investimentos e serviço de maximização de valor. Ele trabalhou na PwC, EY e atualmente trabalha na Abu Dhabi National Oil Company (ADNOC). Ele é especialista em Finanças, possui a qualificação e experiência relevantes. Na QTM Health Tech, ele estará trabalhando lado a lado com o CEO na gestão da Estratégia Financeira e de Crescimento para estabelecer e expandir a Quantum em diferentes regiões do mundo, começando pelo Brasil e Oriente Médio. Além disso, também contribui para a estrutura de governança, decisões comerciais e operacionais sendo um membro chave da QTM Healthtech.     
        </p>
        ',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
