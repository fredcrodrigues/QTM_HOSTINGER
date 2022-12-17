@extends('layouts.app')
@section('head_title', 'Agendamento')

@section('conteudo')

        <section class="wow fadeIn" id="start-your-project">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">
                                Informe o e-mail e o CPF cadastrado para prosseguir com o agendamento
                            </span>
                        </div>
                    </div>
                </div>
                
                <x-alert :alerta="Session::get('retorno')"> </x-alert> 
                <x-erro :erros=$errors> </x-erro> 

                <form method="POST" action="{{ URL::to('agendamento/') }}">
                   @csrf
                    <div class="row">
                        <div class="col-md-6">
                             <label>CPF<span style="color: red;">*</span></label>
                            <input type="text" name="cpf_cnpj" id="cpf_cnpj" placeholder="xxx.xxx.xxx-xx" class="big-input @error('cpf_cnpj') is-invalid @enderror" value="{{ old('cpf_cnpj') }}" >
                        </div>
                        <div class="col-md-6">
                            <label>E-Mail<span style="color: red;">*</span></label>
                            <input type="text" name="email" id="email" placeholder="example@email.com"  class="big-input @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        </div>
                        <div class="col-md-6" {{ ($user == "" ? "hidden":"") }}>
                            <label>Nome do Local/Profissional:</label>
                            <div class="select-style big-select">
                                <select name="profissional_local" class="select2 bg-transparent no-margin-bottom">
                                <option value="{{$slug ?? ''}}">{{$user ?? ''}}</option>
                                </select>
                            </div>   
                        </div>
                        <div class="col-md-12">
                             Não possui conta?  <a href="/cliente"><b>Cadastre-se</b></a> 
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-transparent-dark-gray btn-large margin-20px-top">prosseguir</button>
                        </div>
                    </div>
                   
                </form>
            </div>
        </section>
    

@endsection
@section('scripts_adicionais')
<script src="{{ asset('js/site/base.js') }}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/site/login.js') }}"></script>
@endsection                     