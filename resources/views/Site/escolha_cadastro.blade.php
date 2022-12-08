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
                            <span class="text-white opacity6 alt-font">Ciência | Saúde e Bem-Estar | Educação</span>
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
                    <div class="col-md-4 text-center">
                        <h5 class="font-weight-700 text-uppercase alt-font text-extra-dark-gray center-col width-100 margin-5px-bottom xs-width-100">Cliente</h5>
                        <span class="text-medium alt-font display-block">cadastre-se como cliente e realize agendamentos para profissionais ou coworking</span>
                        <a href="/cliente" class="btn btn-large btn-transparent-deep-pink btn-rounded margin-35px-top no-margin-right" style="margin-bottom: 35px;">Cliente</a>
                    </div>
                   
                    <div class="col-md-4 text-center">
                        <h5 class="font-weight-700 text-uppercase alt-font text-extra-dark-gray center-col width-100 margin-5px-bottom xs-width-100">Coworkings</h5>
                        <span class="text-medium alt-font display-block">você possui um espaço coworking, cadastre-se conosco e tenha o seu espaço em nossa base de dados</span>
                        <a href="/coworking" class="btn btn-large btn-transparent-deep-pink btn-rounded margin-35px-top no-margin-right" style="margin-bottom: 35px;">Coworkings</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5 class="font-weight-700 text-uppercase alt-font text-extra-dark-gray center-col width-100 margin-5px-bottom xs-width-100">Profissional</h5>
                        <span class="text-medium alt-font display-block">você é um profissional em saúde, cadastre-se conosco e tenha o seu serviços em nossa base de dados</span>
                        <a href="/profissional" class="btn btn-large btn-transparent-deep-pink btn-rounded margin-35px-top no-margin-right" style="margin-bottom: 35px;">Profissional</a>
                    </div>
                </div>
            </div>
        </section>

        
@endsection
