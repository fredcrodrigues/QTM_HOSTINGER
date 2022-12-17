@extends('layouts.app')
@section('head_title', 'Busca por coworkings')
@section('links_adicionais') 
<style>
        #mapa {
        height: 500px;
        width: 100%;
        }
</style>



 @endsection
@section('conteudo')
        <!-- end page title section -->
        <section class="wow fadeIn" id="start-your-project">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">escolha uma dos filtros e pesquise o coworking que você procura.</span>
                        </div>
                    </div>
                </div>
                <form id="coworkings" method="POST" action="{{ URL::to('/busca-coworkings') }}">
                   @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="select-style big-select">
                                <select name="filtro" id="filtro" class="select2 bg-transparent no-margin-bottom @error('filtro') is-invalid @enderror">
                                    <option>Selecione o tipo de filtro</option>
                                    <option value="nome">Por Nome do Local</option>
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
                            <input type="text" name="nome" id="nome" placeholder="Nome do Coworking" class="big-input @error('nome') is-invalid @enderror" value="{{ old('nome') }}">
                            @error('nome')
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
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="{{ asset('js/site/base.js') }}"></script>
<script src="{{ asset('js/site/filtro_coworking.js') }}"></script>
@endsection  
  