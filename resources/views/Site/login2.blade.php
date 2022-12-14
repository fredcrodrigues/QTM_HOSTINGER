@extends('layouts.app')
@section('head_title', 'Agendamento')

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
        <section class="wow fadeIn" id="start-your-project">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                    </div>
                </div>
                <x-alert :alerta="Session::get('retorno')"> </x-alert> 
                    <div class="row" align="center">
                        <h5>Olá, {{$user->nome}}</h5><br>
                        <h6>Você busca agendamento para: </h6>
                        <div class="col-md-12">
                                <a href="/agendamento/escolha/{{$user->slug}}/profissional" class="btn btn-large btn-transparent-deep-pink md-margin-15px-bottom sm-display-table sm-margin-lr-auto" style="margin-bottom: 45px;">Profissional</a>
                                <a href="/agendamento/escolha/{{$user->slug}}/coworking" class="btn btn-large btn-transparent-deep-pink md-margin-15px-bottom sm-display-table sm-margin-lr-auto" style="margin-bottom: 45px;">Coworking</a>
                        </div>
                    </div>
            </div>
        </section>
    

@endsection
@section('scripts_adicionais')
<script src="{{ asset('js/site/base.js') }}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/site/login.js') }}"></script>
@endsection                     