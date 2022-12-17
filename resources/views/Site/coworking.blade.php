@extends('layouts.app')
@section('head_title', 'Coworking')

@section('conteudo')
      
        <section class="wow fadeIn" id="start-your-project">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Cadastre o Coworking</span>
                        </div>
                    </div>
                </div>

                <x-alert :alerta="Session::get('retorno')"> </x-alert> 
                <x-erro :erros=$errors> </x-erro> 

                <form id="project-contact-form" method="POST" action="{{ URL::to('/coworking') }}" enctype="multipart/form-data">
                   @csrf
                    <div class="row">
                         <div class="col-md-6">
                            <label>Foto do Local</label>
                            <input type="file" accept="image/*" onchange="loadFile(event)" class="big-input" name='imagem_cliente'>
                            <img id="output" width="300"/>
                        </div>                   
                        <div class="col-md-8">
                             <label>Nome do Local<span style="color: red;">*</span></label>
                            <input type="text" name="nome" id="nome" placeholder="Nome do Local" class="big-input @error('nome') is-invalid @enderror" value="{{ old('nome') }}">
                        </div>
                        <div class="col-md-4">
                             <label>CNPJ<span style="color: red;">*</span></label>
                            <input type="text" name="cpf_cnpj" id="cpf_cnpj" onkeydown="$(this).mask('00.000.000/0000-00');"   placeholder="xx.xxx.xxx/xxxx-xx" class="big-input @error('cpf_cnpj') is-invalid @enderror" value="{{ old('cpf_cnpj') }}">
                        </div>
                        <div class="col-md-6">
                             <label>E-Mail<span style="color: red;">*</span></label>
                             <input type="email" name="email" id="email" placeholder="example@email.com" class="big-input @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        </div>
                        <div class="col-md-6">
                            <label>Telefone<span style="color: red;">*</span></label>
                            <input type="text" name="telefone" id="telefone" placeholder="(xx) xxxx-xxxx"  class="big-input @error('telefone') is-invalid @enderror" value="{{ old('telefone') }}">
                        </div>
                        <div class="col-md-3">
                            <label>CEP<span style="color: red;">*</span></label>
                            <input type="text" name="cep" id="cep" placeholder="(xx) xxxx-xxxx"  class="big-input @error('cep') is-invalid @enderror" value="{{ old('cep') }}">
                        </div>
                        <div class="col-md-4">
                             <label>Estado<span style="color: red;">*</span></label>
                            <div class="select-style big-select">
                                <select name="estado" id="estado" class="select2 bg-transparent no-margin-bottom @error('estado') is-invalid @enderror">
                                     <option value="">Selecione</option>
                                     @foreach($estado as $estados)
                                          <option value="{{$estados->sigla}}" {{ ($estados->id == old('estado') ? "selected":"") }}>{{$estados->nome}}</option>
                                     @endforeach
                                </select>
                            </div>   
                        </div>
                        <div class="col-md-5">
                             <label>Cidade<span style="color: red;">*</span></label>
                            <div class="select-style big-select">
                                <select name="cidade" id="cidade" class="select2 bg-transparent no-margin-bottom @error('cidade') is-invalid @enderror">
                                 <option value="">Selecione</option>
                                </select>
                            </div>   
                        </div>
                        <div class="col-md-9">
                            <label>Logradouro<span style="color: red;">*</span></label>
                            <input type="text" name="logradouro" id="logradouro" placeholder="Rua/Avenida"  class="big-input @error('logradouro') is-invalid @enderror" value="{{ old('logradouro') }}">
                        </div>
                        <div class="col-md-3">
                            <label>Número<span style="color: red;">*</span></label>
                            <input type="text" name="numero" id="numero" placeholder="digite o nº do local"  class="big-input @error('numero') is-invalid @enderror" value="{{ old('numero') }}">
                        </div>
                        <div class="col-md-4">
                            <label>Bairro<span style="color: red;">*</span></label>
                            <input type="text" name="bairro" id="bairro" placeholder="digite o bairro do local"  class="big-input @error('bairro') is-invalid @enderror" value="{{ old('bairro') }}">
                        </div>
                        <div class="col-md-8">
                            <label>Complemento</label>
                            <input type="text" name="complemento" id="complemento" placeholder="complemento do endereço caso tenha"  class="big-input @error('complemento') is-invalid @enderror" value="{{ old('complemento') }}">
                        </div>
                        <div class="col-md-6">
                            <label>Comprovante de Residência do Local</label>
                            <input type="file" class="big-input" name='comprovante_residencia'>
                        </div>
                        <div class="col-md-6">
                            <label>Licença de Funcionamento</label>
                            <input type="file" class="big-input" name='licenca_funcionamento'>
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
                            <button id="save" type="submit" class="btn btn-transparent-dark-gray btn-large margin-20px-top">finalizar cadastro</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    
@endsection
@section('scripts_adicionais')
<script src="{{ asset('js/site/base.js') }}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/site/coworking.js') }}"></script>
@endsection   
