@extends('layouts.app')
@section('head_title', 'Busca por profissionais')
@section('links_adicionais') 
<style>
        #mapa {
        height: 500px;
        width: 100%;
        }
</style>

 @endsection
@section('conteudo')
<section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url(' {{ asset('site/images/fundo-sobre.png') }}">
            <!-- <div class="opacity-medium bg-extra-dark-gray"></div> -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
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
        <section class="wow fadeIn" id="start-your-project">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">escolha uma dos filtros e pesquise o profissional que você procura.</span>
                        </div>
                    </div>
                </div>
                <form id="profissionais">
                   @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="select-style big-select">
                                <select name="filtro" id="filtro" class="select2 bg-transparent no-margin-bottom @error('filtro') is-invalid @enderror">
                                    <option>Selecione o tipo de filtro</option>
                                    <option value="nome">Por Nome do/da Profissional</option>
                                    <option value="especialidade">Por Especialidade</option>
                                    <option value="cidade">Por Cidade</option>
                                </select>
                                @error('filtro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 nome" {{ (old("filtro") == "nome" ? "style=display:block":"style=display:none") }}>
                            <input type="text" name="nome" id="nome" placeholder="Nome do/da Profissional" class="big-input @error('nome') is-invalid @enderror" value="{{ old('nome') }}">
                            @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6 especialidade" {{ (old("filtro") == "especialidade" ? "style=display:block":"style=display:none") }}>
                            <input type="text" name="especialidade" id="especialidade" placeholder="Especialidade do/da Profissional" class="big-input @error('especialidade') is-invalid @enderror" value="{{ old('especialidade') }}">
                                @error('especialidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="col-md-2 cidade" {{ (old("filtro") == "cidade" ? "style=display:block":"style=display:none") }}>
                            <div class="select-style big-select">
                                <select name="estado" id="estado" class="select2 bg-transparent no-margin-bottom @error('estado') is-invalid @enderror">
                                     <option value="">Estado</option>
                                     @foreach($estado as $estados)
                                          <option value="{{$estados->sigla}}" {{ ($estados->id == old('estado') ? "selected":"") }} >{{$estados->sigla}}</option>
                                     @endforeach
                                </select>
                                @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>   
                        </div>
                        <div class="col-md-4 cidade" {{ (old("filtro") == "cidade" ? "style=display:block":"style=display:none") }}>
                            <div class="select-style big-select" >
                                <select name="cidade" id="cidade" class="select2 bg-transparent no-margin-bottom  @error('cidade') is-invalid @enderror">
                                 <option value="">Cidade</option>
                                </select>
                                @error('cidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>   
                        </div>
                       
                        <div class="col-md-2 text-center botao">
                            <button id="filter" type="button" class="btn btn-large btn-transparent-deep-pink btn-rounded margin-10px-top no-margin-right">pesquisar</button>
                        </div>


                    </div>
                </form>

                <div id="mapa"></div>

            </div>
        </section>
    
@endsection
@section('scripts_adicionais')
<script src="{{ asset('js/site/base.js') }}"></script>
<script src="{{ asset('js/site/filtro_profissional.js') }}"></script>
@endsection  
  