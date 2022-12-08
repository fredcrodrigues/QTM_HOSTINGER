@extends('Admin.layouts.partials_admin.app')

@section('title', 'Coworkings')

@section('links_adicionais')
@endsection
@section('conteudo')

<!-- DataTables -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="form-group col-sm-6">
                    <h1>Visualizar Coworking</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="form-group col-12">
                <div class="card">
                    <div class="card-body">
                        @include('Admin.layouts.partials_admin.alert')
                        <br><br>
                        <form method="POST" action="/area-restrita/coworking-adm/{{$coworking->id}}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Foto do Local <span style="color: red;">*</span></label>
                                    <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control @error('imagem_cliente') is-invalid @enderror" name='imagem_cliente'>
                                    <br>
                                    <img id="output" width="300" src="{{$coworking->getFirstMediaUrl('cliente-imagem')}}"/>
                                    @error('imagem_cliente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Comprovante de Residência do Local</label>
                                    <input type="file" class="form-control @error('comprovante_residencia') is-invalid @enderror" name='comprovante_residencia'>
                                    <br>
                                        <a href="{{$coworking->getFirstMediaUrl('comprovante-residencia')}}"
                                            class="btn btn-success"
                                            title="Visualizar" data-toggle="tooltip" target="_blank">
                                            <i class="fas fa-eye"> Visualizar/Baixar</i>
                                        </a>
                                    @error('comprovante_residencia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Licença de Funcionamento</label>
                                    <input type="file" class="form-control @error('licenca_funcionamento') is-invalid @enderror" name='licenca_funcionamento'>
                                    <br>
                                        <a href="{{$coworking->getFirstMediaUrl('licenca-funcionamento')}}"
                                            class="btn btn-success"
                                            title="Visualizar" data-toggle="tooltip" target="_blank">
                                            <i class="fas fa-eye"> Visualizar/Baixar</i>
                                        </a>
                                    @error('licenca_funcionamento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Nome do Local <span style="color: red;">*</span></label>
                                    <input type="text" name="nome" id="nome" value="{{$coworking->nome }}"
                                    class="form-control form-control @error('nome') is-invalid @enderror">
                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>CNPJ <span style="color: red;">*</span></label>
                                    <input type="text" name="cpf_cnpj" id="cpf_cnpj" value="{{ $coworking->cpf_cnpj }}"
                                    class="form-control form-control @error('cpf_cnpj') is-invalid @enderror">
                                    @error('cpf_cnpj')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>E-Mail <span style="color: red;">*</span></label>
                                    <input type="email" name="email" id="email" placeholder="example@email.com"
                                    class="form-control form-control @error('email') is-invalid @enderror" value="{{ $coworking->email }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telefone <span style="color: red;">*</span></label>
                                    <input type="text" name="telefone" id="telefone" placeholder="(xx) xxxx-xxxx"
                                    class="form-control form-control @error('telefone') is-invalid @enderror" value="{{ $coworking->telefone }}">
                                    @error('telefone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                                <div class="form-group col-md-3">
                                    <label>CEP <span style="color: red;">*</span></label>
                                    <input type="text" name="cep" id="cep" placeholder="(xx) xxxx-xxxx"
                                        class="form-control form-control @error('cep') is-invalid @enderror" value="{{ $coworking->endereco->cep }}">
                                    @error('cep')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Estado <span style="color: red;">*</span></label>
                                    <select name="estado" id="estado" class="form-control form-control @error('estado') is-invalid @enderror">
                                        <option value="{{$coworking->endereco->fk_estado}}">{{$coworking->endereco->estado->nome}}</option>
                                    </select> 
                                    @error('estado')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5">
                                    <label>Cidade <span style="color: red;">*</span></label>
                                    <select name="cidade" id="cidade" class="form-control form-control @error('cidade') is-invalid @enderror">
                                        <option value="{{$coworking->endereco->fk_cidade}}">{{$coworking->endereco->cidade->nome}}</option>
                                    </select> 
                                    @error('cidade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-9">
                                    <label>Logradouro <span style="color: red;">*</span></label>
                                    <input type="text" name="logradouro" id="logradouro" placeholder="Rua/Avenida"
                                    class="form-control form-control @error('logradouro') is-invalid @enderror" value="{{ $coworking->endereco->logradouro }}">
                                    @error('logradouro')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Número <span style="color: red;">*</span></label>
                                    <input type="text" name="numero" id="numero" placeholder="digite o nº do local"
                                        class="form-control form-control @error('numero') is-invalid @enderror" value="{{ $coworking->endereco->numero }}">
                                        @error('numero')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Bairro <span style="color: red;">*</span></label>
                                    <input type="text" name="bairro" id="bairro" placeholder="digite o bairro do local"
                                        class="form-control form-control @error('bairro') is-invalid @enderror" value="{{ $coworking->endereco->bairro }}">
                                        @error('bairro')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Complemento</label>
                                    <input type="text" name="complemento" id="complemento"
                                        placeholder="complemento do endereço caso tenha" class="form-control "
                                        value="{{ $coworking->endereco->complemento }}">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Status <span style="color: red;">*</span></label>
                                <select type="text" name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror" >
                                    <option value="ativo" {{$coworking->status=="ativo" ? "":"selected"}}>ativo</option>
                                    <option value="inativo" {{$coworking->status=="inativo" ? "":"selected"}}>inativo</option>
                                    <option value="pendente" {{$coworking->status=="pendente" ? "":"selected"}}>pendente</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <br><br>
                                <div class="form-group col-md-4">
                                    <input type="text" name="latitude" id="latitude" placeholder="latitude"
                                        class="form-control @error('latitude') is-invalid @enderror" value="{{ $coworking->endereco->latitude}}">
                                        @error('latitude')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" name="longitude" id="longitude" placeholder="longitude"
                                        class="form-control @error('longitude') is-invalid @enderror" value="{{ $coworking->endereco->longitude }}">
                                        @error('longitude')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <button id="btn-localizacao" type="button" class="btn btn-success"><i class="fas fa-map-marker-alt"></i> Gerar Localização</button>
                                </div>
                            </div>
                        </div> <!-- /.card-body -->
                            <div class="card-footer">
                                <button id="btn-salvar" type="submit" class="btn btn-info float-right">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content -->
@endsection
@section('scripts_adicionais')
<script src="{{ asset('js/admin/base.js') }}"></script>
<script src="{{ asset('js/admin/liberacao.js') }}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script>
    $(document).ready(function($) {
        
        $("#telefone").inputmask("(99)99999-9999");
        $("#cpf_cnpj").inputmask("99.999.999/9999-99");
        $("#cep").inputmask("99999-999");
    });
</script>
@endsection