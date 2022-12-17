@extends('layouts.app')
@section('head_title', 'O que você busca?')

@section('conteudo')
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
  