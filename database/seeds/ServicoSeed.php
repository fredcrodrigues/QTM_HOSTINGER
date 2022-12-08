<?php

use Illuminate\Database\Seeder;

class ServicoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicos')->insert([
            'titulo' => 'Nossos Serviços',
            'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSfGz2vizMVopWyNd7bMDaaFehorfuKLD0NOg6jCGe-demgSDw/viewform',
            'slug' => 'servicos-qtm',
            'descricao' => '
                            <p>
                                A QTM Healthtech conecta você com o terapeuta mais próximo a partir da sua localização, por meio do nosso serviço de georreferenciamento ou conheça nosso marketplace e tenha acesso a qualidade de vida. 
                            </p>

                            <p>
                                Os terapeutas que você encontra na QTM Healthtech aplicam as 29 PICs (Práticas Integrativas Complementares). As Práticas Integrativas e Complementares são tratamentos que utilizam recursos terapêuticos baseados em conhecimentos tradicionais, voltados para prevenir diversas doenças como depressão e hipertensão. Em alguns casos, também podem ser usadas como tratamentos paliativos em algumas doenças crônicas.
                            </p>
                            <h5>Segundo o Ministério da Saúde as 29 PICs são:</h5>

                            <p>
                                <b>Apiterapia</b>
                                Prática terapêutica utilizada desde a antiguidade, conforme mencionado por Hipócrates, em alguns textos, e em textos chineses e egípcios que consiste em usar produtos derivados de abelhas – como apitoxinas, mel, pólen, geleia real, própolis – para promoção da saúde e fins terapêuticos. 

                                <br><br>

                                <b>Aromaterapia</b>
                                Prática terapêutica secular que utiliza as propriedades dos óleos essenciais, concentrados voláteis extraídos de vegetais, para recuperar o equilíbrio e a harmonia do organismo visando à promoção da saúde física e mental, ao bem-estar e à higiene. Com amplo uso individual e/ou coletivo, pode ser associada a outras práticas – como terapia de florais, cromoterapia, entre outras – e considerada uma possibilidade de intervenção que potencializa os resultados do tratamento adotado. Prática multiprofissional, tem sido adotada por diversos profissionais de saúde como enfermeiros, psicólogos, fisioterapeutas, médicos, veterinários, terapeutas holísticos, naturistas, dentre outros, e empregada nos diferentes setores da área para auxiliar de modo complementar a estabelecer o reequilíbrio físico e/ou emocional do indivíduo. 

                                <br><br>

                                <b>Arteterapia</b>
                                Uma atividade milenar, a arteterapia é prática expressiva artística, visual, que atua como elemento terapêutico na análise do consciente e do inconsciente e busca interligar os universos interno e externo do indivíduo, por meio da sua simbologia, favorecendo a saúde física e mental. Arte livre conectada a um processo terapêutico, transformando-se numa técnica especial, não meramente artística, que pode ser explorada com fim em si mesma (foco no processo criativo, no fazer) ou na análise/investigação de sua simbologia (arte como recurso terapêutico). Utiliza instrumentos como pintura, colagem, modelagem, poesia, dança, fotografia, tecelagem, expressão corporal, teatro, sons, músicas ou criação de personagens, usando a arte como uma forma de comunicação entre profissional e paciente, em processo terapêutico individual ou de grupo, numa produção artística a favor da saúde.

                                <br><br>

                                <b>Ayurveda</b>
                                De origem indiana, é considerado uma das mais antigas abordagens de cuidado do mundo e significa Ciência ou Conhecimento da Vida. Nascida da observação, experiência e o uso de recursos naturais para desenvolver um sistema único de cuidado, este conhecimento estruturado agrega em si mesmo princípios relativos à saúde do corpo físico, de forma a não desvinculá-los e considerando os campos energético, mental e espiritual. A OMS descreve sucintamente o Ayurveda, reconhecendo sua utilização para prevenir e curar doenças, e reconhece que esta não é apenas um sistema terapêutico, mas também uma maneira de viver. No Ayurveda, o corpo humano é composto por cinco elementos – éter, ar, fogo, água e terra –, os quais compõem o organismo, os estados energéticos e emocionais e, em desequilíbrio, podem induzir o surgimento de doenças. A investigação diagnóstica a partir de suas teorias fundamentais, como a avaliação dos doshas, leva em consideração tecidos corporais afetados, humores, local em que a doença está localizada, resistência e vitalidade, rotina diária, hábitos alimentares, gravidade das condições clínicas, condição de digestão, detalhes pessoais, sociais, situação econômica e ambiental da pessoa. Os tratamentos ayurvédicos consideram a singularidade de cada pessoa, e utilizam técnicas de relaxamento, massagens, plantas medicinais, minerais, posturas corporais (ásanas), pranayamas (técnicas respiratórias), mudras (posições e exercícios) e cuidados dietéticos. Para o ayurveda, indivíduo saudável é aquele que tem os doshas (humores) em equilíbrio, os dhatus (tecidos) com nutrição adequada, os malas (excreções) eliminados adequadamente, e apresenta uma alegria e satisfação na mente e espírito.

                                <br><br>

                                <b>Biodança</b>
                                Prática expressiva corporal que promove vivências integradoras por meio da música, do canto, da dança e de atividades em grupo, visando restabelecer o equilíbrio afetivo e a renovação orgânica, necessários ao desenvolvimento humano. Utiliza exercícios e músicas organizados que trabalha a coordenação e o equilíbrio físico e emocional por meio dos movimentos da dança, a fim de induzir experiências de integração, aumentar a resistência ao estresse, promover a renovação orgânica e melhorar a comunicação e o relacionamento interpessoal.

                                <br><br>    

                                <b>Bioenergética</b>
                                Visão diagnóstica que, aliada a uma compreensão etiológica do sofrimento/adoecimento, adota a psicoterapia corporal e os exercícios terapêuticos em grupos, por exemplo, os movimentos sincronizados com a respiração. A bioenergética, também conhecido como análise bioenergética, trabalha o conteúdo emocional por meio da verbalização, da educação corporal e da respiração, utilizando exercícios direcionados a liberar as tensões do corpo e facilitar a expressão dos sentimentos.

                                <br><br>

                                <b>Constelação familiar</b>
                                Método psicoterapêutico de abordagem sistêmica, energética e fenomenológica, que busca reconhecer a origem dos problemas e/ou alterações trazidas pelo usuário, bem como o que está encoberto nas relações familiares para, por meio do conhecimento das forças que atuam no inconsciente familiar e das leis do relacionamento humano, encontrar a ordem, o pertencimento e o equilíbrio, criando condições para que a pessoa reoriente o seu movimento em direção à cura e ao crescimento. A constelação familiar foi desenvolvida nos anos 80 pelo psicoterapeuta alemão Bert Hellinger, que defende a existência de um inconsciente familiar – além do inconsciente individual e do inconsciente coletivo – atuando em cada membro de uma família. Denomina “ordens do amor” às leis básicas do relacionamento humano – a do pertencimento ou vínculo, a da ordem de chegada ou hierarquia, e a do equilíbrio – que atuam ao mesmo tempo, onde houver pessoas convivendo. Segundo Hellinger, as ações realizadas em consonância com essas leis favorecem que a vida flua de modo equilibrado e harmônico; quando transgredidas, ocasionam perda da saúde, da vitalidade, da realização, dos bons relacionamentos, com decorrente fracasso nos objetivos de vida. A constelação familiar é uma terapia breve que pode ser feita em grupo, durante workshops, ou em atendimentos individuais, abordando um tema a cada encontro.

                                <br><br>

                                <b>Cromoterapia</b>
                                Prática terapêutica que utiliza as cores do espectro solar – vermelho, laranja, amarelo, verde, azul, anil e violeta – para restaurar o equilíbrio físico e energético do corpo. Na cromoterapia, as cores são classificadas em quentes (luminosas, com vibrações que causam sensações mais físicas e estimulantes – vermelho, laranja e amarelo) e frias (mais escuras, com vibrações mais sutis e calmantes – verde, azul, anil e violeta). A cor violeta é a de vibração mais alta no espectro de luz, com sua frequência atingindo as camadas mais sutis e elevadas do ser (campo astral).

                                <br><br>

                                <b>Dança circular</b>
                                Prática expressiva corporal, ancestral e profunda, geralmente realizada em grupos, que utiliza a dança de roda – tradicional e contemporânea –, o canto e o ritmo para favorecer a aprendizagem e a interconexão harmoniosa e promover a integração humana, o auxílio mútuo e a igualdade visando o bem-estar físico, mental, emocional e social. As pessoas dançam juntas, em círculos, acompanhando com cantos e movimentos de mãos e braços, aos poucos internalizando os movimentos, liberando mente e coração, corpo e espírito. Inspirada em culturas tradicionais de várias partes do mundo, foram coletadas e sistematizadas inicialmente pelo bailarino polonês/alemão Bernard Wosien (1976), ressignificadas com o acréscimo de novas coreografias e ritmos, melodia e movimentos delicados e profundos, estimula os integrantes da roda a respeitar, aceitar e honrar as diversidades.

                                <br><br>

                                <b>Geoterapia</b>
                                Terapêutica natural que consiste na utilização de argila, barro e lamas medicinais, assim como pedras e cristais (frutos da terra), com objetivo de amenizar e cuidar de desequilíbrios físicos e emocionais por meio dos diferentes tipos de energia e propriedades químicas desses elementos. A geoterapia, por meio de pedras e cristais como ferramentas de equilíbrio dos centros energéticos e meridianos do corpo, facilita o contato com o Eu Interior e trabalha terapeuticamente as zonas reflexológicas, amenizando e cuidando de desequilíbrios físicos e emocionais. A energia dos raios solares ativa os cristais e os elementos, desencadeando um processo dinâmico e vitalizador capaz de beneficiar o corpo humano.

                                <br><br>

                                <b>Hipnoterapia</b>
                                Conjunto de técnicas que, por meio de intenso relaxamento, concentração e/ou foco, induz a pessoa a alcançar um estado de consciência aumentado que permita alterar uma ampla gama de condições ou comportamentos indesejados, como medos, fobias, insônia, depressão, angústia, estresse, dores crônicas. Pode favorecer o autoconhecimento e, em combinação com outras formas de terapia, auxilia na condução de uma série de problemas.

                                <br><br>

                                <b>Homeopatia</b>
                                Homeopatia é uma abordagem terapêutica de caráter holístico e vitalista que vê a pessoa como um todo, não em partes, e cujo método terapêutico envolve três princípios fundamentais: a Lei dos Semelhantes; a experimentação no homem sadio; e o uso da ultra diluição de medicamentos. Envolve tratamentos com base em sintomas específicos de cada indivíduo e utiliza substâncias altamente diluídas que buscam desencadear o sistema de cura natural do corpo. Os medicamentos homeopáticos da farmacopeia homeopática brasileira estão incluídos na Relação Nacional de Medicamentos Essenciais (Rename).

                                <br><br>

                                <b>Imposição de mãos</b>
                                Prática terapêutica secular que implica um esforço meditativo para a transferência de energia vital (Qi, prana) por meio das mãos com intuito de reestabelecer o equilíbrio do campo energético humano, auxiliando no processo saúde-doença.

                                <br><br>

                                <b>Medicina antroposófica/antroposofia aplicada à saúde</b>
                                Abordagem terapêutica integral com base na antroposofia que integra as teorias e práticas da medicina moderna com conceitos específicos antroposóficos, os quais avaliam o ser humano a partir da trimembração, quadrimembração e biografia, oferecendo cuidados e recursos terapêuticos específicos. Atua de maneira integrativa e utiliza diversos recursos terapêuticos para a recuperação ou manutenção da saúde, conciliando medicamentos e terapias convencionais com outros específicos de sua abordagem, como aplicações externas, banhos terapêuticos, terapias físicas, arteterapia, aconselhamento biográfico, quirofonética. Fundamenta-se em um entendimento espiritual-científico do ser humano que considera bem-estar e doença como eventos ligados ao corpo, mente e espírito do indivíduo, realizando abordagem holística ("salutogenesis") com foco em fatores que sustentam a saúde por meio de reforço da fisiologia do paciente e da individualidade, ao invés de apenas tratar os fatores que causam a doença.

                                <br><br>

                                <b>Medicina Tradicional Chinesa – acupuntura</b>
                                A medicina tradicional chinesa (MTC) é uma abordagem terapêutica milenar, que tem a teoria do yin-yang e a teoria dos cinco elementos como bases fundamentais para avaliar o estado energético e orgânico do indivíduo, na inter-relação harmônica entre as partes, visando tratar quaisquer desequilíbrios em sua integralidade. A MTC utiliza como procedimentos diagnósticos, na anamnese integrativa, palpação do pulso, inspeção da língua e da face, entre outros; e, como procedimentos terapêuticos, acupuntura, ventosaterapia, moxabustão, plantas medicinais, práticas corporais e mentais, dietoterapia chinesa. Para a MTC, a Organização Mundial da Saúde (OMS) estabelece, aos estados-membros, orientações para formação por meio do Benchmarks for Training in Traditional Chinese Medicine.

                                <br><br>

                                <b>Acupuntura</b>
                                A acupuntura é uma tecnologia de intervenção em saúde que faz parte dos recursos terapêuticos da medicina tradicional chinesa (MTC) e estimula pontos espalhados por todo o corpo, ao longo dos meridianos, por meio da inserção de finas agulhas filiformes metálicas, visando à promoção, manutenção e recuperação da saúde, bem como a prevenção de agravos e doenças. Criada há mais de dois milênios, é um dos tratamentos mais antigos do mundo e pode ser de uso isolado ou integrado com outros recursos terapêuticos da MTC ou com outras formas de cuidado.

                                <br><br>

                                <b>Auriculoterapia</b>
                                A auriculoterapia é uma técnica terapêutica que promove a regulação psíquico-orgânica do indivíduo por meio de estímulos nos pontos energéticos localizados na orelha – onde todo o organismo encontra-se representado como um microssistema – por meio de agulhas, esferas de aço, ouro, prata, plástico, ou sementes de mostarda, previamente preparadas para esse fim. A auriculoterapia chinesa faz parte de um conjunto de técnicas terapêuticas que tem origem nas escolas chinesa e francesa, sendo a brasileira constituída a partir da fusão dessas duas. Acredita-se que tenha sido desenvolvida juntamente com a acupuntura sistêmica (corpo) que é, atualmente, uma das terapias orientais mais populares em diversos países e tem sido amplamente utilizada na assistência à saúde.

                                <br><br>

                                <b>Meditação</b>
                                Prática mental individual milenar, descrita por diferentes culturas tradicionais, que consiste em treinar a focalização da atenção de modo não analítico ou discriminativo, a diminuição do pensamento repetitivo e a reorientação cognitiva, promovendo alterações favoráveis no humor e melhora no desempenho cognitivo, além de proporcionar maior integração entre mente, corpo e mundo exterior. A meditação amplia a capacidade de observação, atenção, concentração e a regulação do corpo-mente-emoções; desenvolve habilidades para lidar com os pensamentos e observar os conteúdos que emergem à consciência; facilita o processo de autoconhecimento, autocuidado e autotransformação; e aprimora as interrelações – pessoal, social, ambiental – incorporando a promoção da saúde à sua eficiência.

                                <br><br>

                                <b>Musicoterapia</b>
                                Prática expressiva integrativa conduzida em grupo ou de forma individualizada, que utiliza a música e/ou seus elementos – som, ritmo, melodia e harmonia – num processo facilitador e promotor da comunicação, da relação, da aprendizagem, da mobilização, da expressão, da organização, entre outros objetivos terapêuticos relevantes, no sentido de atender necessidades físicas, emocionais, mentais, espirituais, sociais e cognitivas do indivíduo ou do grupo.

                                <br><br>

                                <b>Naturopatia</b>
                                Prática terapêutica que adota visão ampliada e multidimensional do processo vida-saúde-doença e utiliza um conjunto de métodos e recursos naturais no cuidado e na atenção à saúde.

                                <br><br>

                                <b>Osteopatia</b>
                                Prática terapêutica que adota uma abordagem integral no cuidado em saúde e utiliza várias técnicas manuais para auxiliar no tratamento de doenças, entre elas a da manipulação do sistema musculoesquelético (ossos, músculos e articulações), do stretching, dos tratamentos para a disfunção da articulação temporo-mandibular (ATM), e da mobilidade para vísceras.

                                <br><br>

                                <b>Ozonioterapia</b>
                                Prática integrativa e complementar de baixo custo, segurança comprovada e reconhecida, que utiliza a aplicação de uma mistura dos gases oxigênio e ozônio, por diversas vias de administração, com finalidade terapêutica, e promove melhoria de diversas doenças. O ozônio medicinal, nos seus diversos mecanismos de ação, representa um estimulo que contribui para a melhora de diversas doenças, uma vez que pode ajudar a recuperar de forma natural a capacidade funcional do organismo humano e animal. Alguns setores de saúde adotam regularmente esta prática em seus protocolos de atendimento, como a odontologia, a neurologia e a oncologia, dentre outras.

                                <br><br>

                                <b>Plantas medicinais – fitoterapia</b>
                                As plantas medicinais contemplam espécies vegetais, cultivadas ou não, administradas por qualquer via ou forma, que exercem ação terapêutica e devem ser utilizadas de forma racional, pela possibilidade de apresentar interações, efeitos adversos, contraindicações. A fitoterapia é um tratamento terapêutico caracterizado pelo uso de plantas medicinais em suas diferentes formas farmacêuticas, sem a utilização de substâncias ativas isoladas, ainda que de origem vegetal. A fitoterapia é uma terapia integrativa que vem crescendo notadamente neste começo do século XXI, voltada para a promoção, proteção e recuperação da saúde, tendo sido institucionalizada no SUS por meio da Política Nacional de Práticas Integrativas e Complementares no SUS (PNPIC) e da Política Nacional de Plantas Medicinais e Fitoterápicos (PNPMF).

                                <br><br>

                                <b>Quiropraxia</b>
                                Prática terapêutica que atua no diagnóstico, tratamento e prevenção das disfunções mecânicas do sistema neuromusculoesquelético e seus efeitos na função normal do sistema nervoso e na saúde geral. Enfatiza o tratamento manual, como a terapia de tecidos moles e a manipulação articular ou "ajustamento", que conduz ajustes na coluna vertebral e outras partes do corpo, visando a correção de problemas posturais, o alívio da dor e favorecendo a capacidade natural do organismo de auto cura.

                                <br><br>

                                <b>Reflexoterapia</b>
                                Prática terapêutica que utiliza estímulos em áreas reflexas – os microssistemas e pontos reflexos do corpo existentes nos pés, mãos e orelhas – para auxiliar na eliminação de toxinas, na sedação da dor e no relaxamento. Parte do princípio que o corpo se encontra atravessado por meridianos que o dividem em diferentes regiões, as quais têm o seu reflexo, principalmente nos pés ou nas mãos, e permitem, quando massageados, a reativação da homeostase e do equilíbrio nas regiões com algum tipo de bloqueio. Também recebe as denominações de reflexologia ou terapia reflexa por trabalhar com os microssistemas, áreas específicas do corpo (pés, mãos, orelhas) que se conectam energeticamente e representam o organismo em sua totalidade.

                                <br><br>

                                <b>Reiki</b>
                                Prática terapêutica que utiliza a imposição das mãos para canalização da energia vital visando promover o equilíbrio energético, necessário ao bem-estar físico e mental. Busca fortalecer os locais onde se encontram bloqueios – “nós energéticos” – eliminando as toxinas, equilibrando o pleno funcionamento celular, e restabelecedo o fluxo de energia vital – Qi. A prática do Reiki responde perfeitamente aos novos paradigmas de atenção em saúde, que incluem dimensões da consciência, do corpo e das emoções.

                                <br><br>

                                <b>Shantala</b>
                                Prática terapêutica que consiste na manipulação (massagem) para bebês e crianças pelos pais, composta por uma série de movimentos que favorecem o vínculo entre estes e proporcionam uma série de benefícios decorrentes do alongamento dos membros e da ativação da circulação. Além disso, promove a saúde integral; harmoniza e equilibra os sistemas imunológico, respiratório, digestivo, circulatório e linfático; estimula as articulações e a musculatura; auxilia significativamente o desenvolvimento motor; facilita movimentos como rolar, sentar, engatinhar e andar; reforça vínculos afetivos, cooperação, confiança, criatividade, segurança, equilíbrio físico e emocional.

                                <br><br>

                                <b>Terapia Comunitária Integrativa</b>
                                Prática terapêutica coletiva que atua em espaço aberto e envolve os membros da comunidade numa atividade de construção de redes sociais solidárias para promoção da vida e mobilização dos recursos e competências dos indivíduos, famílias e comunidades. Nela, o saber produzido pela experiência de vida de cada um e o conhecimento tradicional são elementos fundamentais na construção de laços sociais, apoio emocional, troca de experiências e diminuição do isolamento social. Atua como instrumento de promoção da saúde e autonomia do cidadão.

                                <br><br>

                                <b>Terapia de florais</b>
                                Prática terapêutica que utiliza essências derivadas de flores para atuar nos estados mentais e emocionais. A terapia de florais de Bach, criada pelo inglês Dr. Edward Bach (1886-1936), é o sistema precursor desta prática. Exemplos de outros sistemas de florais: australianos, californianos, de Minas, de Saint Germain, do cerrado, Joel Aleixo, Mystica, do Alaska, do Hawai.

                                <br><br>

                                <b>Termalismo social/crenoterapia</b>
                                Prática terapêutica que consiste no uso da água com propriedades físicas, térmicas, radioativas e outras – e eventualmente submetida a ações hidromecânicas – como agente em tratamentos de saúde. A eficiência do termalismo no tratamento de saúde está associada à composição química da água (que pode ser classificada como sulfurada, radioativa, bicarbonatada, ferruginosa etc.), à forma de aplicação (banho, sauna etc.) e à sua temperatura. O recurso à água como agente terapêutico remonta aos povos que habitavam nas cavernas, que o adotavam depois de observarem o que faziam os animais feridos.
                                

                                <br><br>

                                <b>Yoga</b>
                                Prática corporal e mental de origem oriental utilizada como técnica para controlar corpo e mente, associada à meditação. Apresenta técnicas específicas, como hatha-yoga, mantra-yoga, laya-yoga, que se referem a tradições especializadas, e trabalha os aspectos físico, mental, emocional, energético e espiritual do praticante com vistas à unificação do ser humano em si e por si mesmo. Entre os principais benefícios obtidos por meio da prática do yoga estão a redução do estresse, a regulação do sistema nervoso e respiratório, o equilíbrio do sono, o aumento da vitalidade psicofísica, o equilíbrio da produção hormonal, o fortalecimento do sistema imunológico, o aumento da capacidade de concentração e de criatividade e a promoção da reeducação mental com consequente melhoria dos quadros de humor, o que reverbera na qualidade de vida dos praticantes.
                            </p>
                        ',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
