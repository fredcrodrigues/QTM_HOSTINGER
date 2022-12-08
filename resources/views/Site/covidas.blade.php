@extends('layouts.app')
@section('head_title', 'covidas')

@section('conteudo')
<section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url(' {{ asset('site/images/fundo-sobre.png') }}">
            <!-- <div class="opacity-medium bg-extra-dark-gray"></div> -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large" style="height: 150px;">
                        <div class="display-table-cell vertical-align-middle text-center">
                            <!-- start page title -->
                            <h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom">QTM Healthtech!</h1>
                            <!-- end page title -->
                            <!-- start sub title -->
                            <span class="text-white opacity6 alt-font">Ciência | Saúde e Bem-Estar | Educação</span>
                            <!-- end sub title -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- end page title section -->
        <!-- end page title section -->
        <!-- start feature box section -->
        <section class="wow fadeIn md-padding-two-lr" style="margin-top: -80px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 margin-six-bottom text-center last-paragraph-no-margin">
                        <p class="text-justify display-inline-block xs-width-100">
                            @php echo $covidas->conteudo @endphp
                        </p>
                    </div>
                </div>
                <div class="row equalize">
                    @foreach ($objetivos as $objetivo)
                    <!-- start feature box item -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin-six-bottom md-margin-six-bottom xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin">
                            <div class="feature-box-5 position-relative">
                                <i class="fa fa-circle text-medium-gray icon-medium"></i>
                                <div class="feature-content">
                                    <div class="text-extra-dark-gray margin-10px-bottom alt-font font-weight-600">{{ $objetivo->titulo }}</div>
                                    
                                    <p> {{ $objetivo->conteudo }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- end feature box item -->
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 margin-six-bottom text-center last-paragraph-no-margin">
                        <p class="text-justify display-inline-block xs-width-100">
                            Esperamos que com essa iniciativa possamos construir juntos uma sociedade mais humanitária e consciente para curarmos o que nos distancia de nós mesmos. 
                            <br>
                            Seja um Embaixador QTM e faça parte desse time!
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end feature box section -->

@endsection