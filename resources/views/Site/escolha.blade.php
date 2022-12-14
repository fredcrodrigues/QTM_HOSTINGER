@extends('layouts.app')
@section('head_title', 'O que você busca?')

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
                            <span class="text-white opacity6 alt-font">Ciência | Saúde e Bem-Estar | Conciência e Tecnologia</span>
                            <!-- end sub title -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- end page title section -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <h5 class="font-weight-700 text-uppercase alt-font text-extra-dark-gray center-col width-100 margin-5px-bottom xs-width-100">Quero agendar para profissionais!</h5>
                        <span class="text-medium alt-font display-block">acesse e descubra profissionais próximos de você.</span>
                        <a href="/busca-profissionais" class="btn btn-large btn-transparent-deep-pink btn-rounded margin-35px-top margin-35px-bottom no-margin-right">Profissionais</a>
                    </div>
                    <div class="col-md-6 text-center">
                        <h5 class="font-weight-700 text-uppercase alt-font text-extra-dark-gray center-col width-100 margin-5px-bottom xs-width-100">Quero agendar um espaço em coworkings!</h5>
                        <span class="text-medium alt-font display-block">acesse e descubra coworkings próximos de você.</span>
                        <a href="/busca-coworkings" class="btn btn-large btn-transparent-deep-pink btn-rounded margin-35px-top margin-35px-bottom no-margin-right">Coworkings</a>
                    </div>
                </div>
            </div>
        </section>
    
@endsection
  