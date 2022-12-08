<?php

use Illuminate\Database\Seeder;

class CovidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('covidas')->insert([
            'id' => 1,
            'slug' => 'covidas',
            'conteudo' => '
            A emergência da instalação de uma pandemia fez surgir a necessidade de projetos que buscassem combater o agente da mesma, o COVID-19 (SARS-CoV-2)
            <br>
            A QTM Healthtech, assim como toda sociedade, tinha planos para o ano de 2020, no entanto, a emergência da instalação de uma pandemia fez surgir a necessidade de projetos que buscassem combater o agente da mesma, a COVID-19 (SARS-CoV-2). Assim, a QTM Healthtech passou por diversas mudanças, tendo em vista solucionar o problema que assolava a humanidade. Destaca-se a implementação da pesquisa científica, chamada Projeto QTM Healthtech: Transmutando CoVIDAS.

            Esse projeto é resultado dos esforços do Vice - presidente financeiro e economista Zeeshan Shaikh, da CEO e Founder Juliana Nogueira, Cientista Social, Mestra em Cultura e Sociedade, Hipnoterapeuta e Terapeuta holística, junto a Márcia Galvão, Farmacêutica e pesquisadora nas áreas de Nutrição Terapêutica e Fitoterápicos.
            
            Walkyr Marinho, Engenheiro de Produção e com experiência em Gestão Empresarial. Robson Daniel é bacharel em Direito, Terapeuta de Práticas Integrativas Complementares e pesquisador nas áreas de Cultura e Sociedade. Dentro da área das PICs, possui experiência e formação em diversas terapias como Hipnoterapia, Cromoterapia e Access Bars. Atualmente, desenvolve pesquisa sobre qualidade de vida associada à saúde mental do indivíduo; Vinicius Sirino que é advogado e desenvolve pesquisas sobre startups e Direito, ativista ambiental, possui conhecimento em mídias digitais e redes sociais, atualmente atua como criador de conteúdo online, social media e também é responsável pela assessoria jurídica do projeto QTM Healthtech Transmutando CoVIDAS.
            
            Segundo a pesquisadora, Mestra em Cultura e Sociedade, Juliana Nogueira, acredita-se que estamos vivenciando uma grande mudança de Era, que já havia sido prevista por várias civilizações, religiões e algumas correntes cientificas. Este momento pressupõe uma transformação em vários setores e instituições sociais, sobretudo, na educação, saúde, tecnologia, meio ambiente, consciência, comunicação e aceitação sociocultural. Em todos os sentidos vemos um grande avanço da física, mecânica e computação quântica, responsáveis pela promoção de uma grande quebra de paradigmas e atualização científica de conceitos enraizados. Cabe ressaltar, a eficácia de técnicas consideradas alternativas para a saúde, estas, já eram utilizadas desde o início da humanidade, influenciando diversas culturas ao redor do mundo, principalmente as civilizações asiáticas, hindus e africanas.
            
            
            
            Referente ao contexto da pandemia, deve-se ressaltar que a utilização destes recursos foram considerados impressindíveis para o combate da Peste Negra, que se iniciou em meados de 1347, e foi considerada uma das pandemias mais mortais da história da humanidade. Dentre as técnicas aponta-se a fitoterapia, através do uso de ervas aromáticas alocadas nas máscaras de bico de pássaros que se popularizam na época, assim como em queima de fogueiras pela cidade e janelas das casas.
            
            
            
            Em 1748 foi registrado na Pharmacopee Francaise um fitoterápico que auxiliou no combate à pandemia, a receita considerada original só foi publicada no livro L’aromatherapie em 1964 pelo francês Jean Valnet, Doutor em Aromaterapia. Estas ferramentas foram importantes no tratamento da doença visto que a vacina só foi lançada há mais de cinco séculos depois, devido a precariedade dos avanços científicos da época.
            Segundo o Ministério da Saúde, evidências científicas têm mostrados os benefícios do tratamento integrado de forma complementar a medicina convencional. Atualmente o Sistema Único de Saúde (SUS) inclui em suas práticas alternativas e complementares 29 procedimentos, dentre os quais destaca-se a Hipnose, cunhada de forma científica em 1842 por James Braid, a Medicina Ayurveda, desenvolvido na Índia a cerca de sete mil anos, Medicina Tradicional Japonesa, cuja as práticas também são milenares e as técnicas são consideradas eficazes pela academia científica em todo o mundo.
            Assim como, a Aromaterapia, Cromoterapia, Naturoterapia e outras, que estão ganhando cada vez mais visibilidade e aceitação. Com relação ao combate a pandemia, foi aprovada dia 21 de maio de 2020 uma recomendação do Conselho Naciona de Saúde (CNS) para uso das práticas integrativas e complementares no tratamento da Covid-19, o que torna cada vez mais imprescindível a busca por evidências cientificas na área.
            
            Com exceção dos fitoterápicos que ainda estão em fase de desenvolvimento, a técnica Quantum não possuí contra-indicações e efeitos colaterais, além de considerar outros aspectos da pandemia de forma holística, tais como as consequências e sequelas do vírus, pois este não afeta somente as pessoas infectadas, mas todas as outras, visto o enorme impacto do isolamento social no estilo de vida e no organismo dos indivíduos.
            
            
            
            A iniciativa pioneira, visa englobar a fabricação da fórmula CoVIDAS, um medicamento que reúne o uso de plantas para fins medicinais, Medicina Ayurveda, Indígena e até Reiki. Em estudos tem apresentado a melhora dos sintomas de pacientes infectado por Covid-19, inclusive em outras doenças associadas, como até mesmo a ansiedade e depressão, assim como vem apresentando resultados positivos em relação a imunização.
            
            Um projeto tão amplo e criterioso, não se faz a duas mãos, deve contar com a ajuda de diversos setores da sociedade para o seu desenvolvimento e aperfeiçoamento, incluindo questões burocráticas, financeiras, científicas, como a parceria com a Neurociência e outras áreas de conhecimento, publicização da pesquisa, questões sociais, como a inclusão de mais mulheres na academia científica, dentre outras contribuições, que só podem ser feitas com a união da Sociedade Civil e Estado, não apenas no Brasil, mas no mundo, visto que a saúde integral de forma assertiva e acessível é um interesse comum a todos.
            
            A Campanha Transmutando CoVIDAS busca a ajuda de todos para se efetivar e alcançar o maior número de pessoas a partir de seus objetivos.
            
            SÃO ELES:         
          ',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
