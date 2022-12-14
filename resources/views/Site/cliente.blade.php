@extends('layouts.app')
@section('head_title', 'Cadastre-se')

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
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Cadastre-se e tenha a sua consulta agendada com os profissionais de nossa plataforma</span>
                        </div>
                    </div>
                </div>
                
                <x-alert :alerta="Session::get('retorno')"> </x-alert> 
                <x-erro :erros=$errors> </x-erro> 

                <form id="project-contact-form" method="POST" action="{{ URL::to('/cliente') }}" enctype="multipart/form-data">
                   @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Foto</label>
                            <input type="file" accept="image/*" onchange="loadFile(event)" class="big-input @error('imagem_cliente') is-invalid @enderror" name='imagem_cliente'>
                            <img id="output" width="300"/>
                        </div>
                        <div class="col-md-8">
                             <label>Nome Completo<span style="color: red;">*</span></label>
                            <input type="text" name="nome" id="nome" placeholder="Nome Completo" class="big-input @error('nome') is-invalid @enderror" value="{{ old('nome') }}">
                        </div>
                        <div class="col-md-4">
                             <label>CPF<span style="color: red;">*</span></label>
                            <input type="text" name="cpf_cnpj" id="cpf_cnpj" onkeydown="$(this).mask('000.000.000-00');"  placeholder="xxx.xxx.xxx-xx" class="big-input @error('cpf_cnpj') is-invalid @enderror" value="{{ old('cpf_cnpj') }}">
                        </div>
                        <div class="col-md-6">
                            <label>Telefone p/ Contato<span style="color: red;">*</span></label>
                            <input type="text" name="telefone" id="telefone" placeholder="(xx) xxxx-xxxx"  class="big-input @error('telefone') is-invalid @enderror" value="{{ old('telefone') }}">
                        </div>
                        <div class="col-md-6">
                            <label>E-Mail<span style="color: red;">*</span></label>
                            <input type="text" name="email" id="email" placeholder="example@email.com"  class="big-input @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        </div>
                        <div class="col-md-6">
                            <div class="content-terms">
                                <div class="content-check-policy">
                                    <input class="form-check-input" type="checkbox"  style="width:5%;" disabled checked/>
                                    <label> Eu aceito as 
                                        <a  data-toggle="modal" data-target="#ModalEscolha" data-title="Politica de Privacidade" data-whatever="{{$configuracao->politica_privacidade}}" style="cursor:pointer; color:#B84FF8;"><b>Politíca de Privacidade</b></a>
                                    </label>
                                </div>
                                <div class="content-check-terms">
                                    <input  class="form-check-input"  type="checkbox" style="width:5%;"  disabled checked>
                                    <label>Eu aceito os 
                                        <a data-toggle="modal" data-target="#ModalEscolha" data-title="Termos" data-whatever="{{$configuracao->termos}}" style="cursor:pointer; color:#B84FF8;"><b>Termos e condições gerais de uso</b> </a>
                                    </label>
                                </div>
                                <div class="content-check-responsible">
                                    <input type="checkbox"  type="checkbox" style="width:5%;"  disabled checked>
                                    <label> Eu aceito a 
                                        <a data-toggle="modal" data-target="#ModalEscolha" data-title="Uso Responsável" data-whatever="{{$configuracao->uso_responsavel}}" style="cursor:pointer; color:#B84FF8;"><b>Política Geral de Uso Responsável da QTM Healthtech</b></a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">

                            <button id="save" type="submit" class="btn btn-transparent-dark-gray btn-large margin-20px-top">cadastre-se</button>
                        </div>
                    </div>
                   
                </form>
            </div>
        </section>
    

@endsection
@section('scripts_adicionais')
<script src="{{ asset('js/site/base.js') }}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/site/cliente.js') }}"></script>
@endsection                     
