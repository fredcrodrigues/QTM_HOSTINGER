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
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Foto do Local</label>
                                <div>
                                    <img id="output" width="300"
                                        src="{{$coworking->getFirstMediaUrl('cliente-imagem')}}" />
                                </div>
                            </div>
                        <div class="form-group col-md-8">
                                <label>Nome do Local</label>
                                <input readonly type="text" name="nome" id="nome" value="{{$coworking->nome }}"
                                    class="form-control ">
                            </div>
                            <div class="form-group col-md-4">
                                <label>CNPJ</label>
                                <input readonly type="text" name="cpf_cnpj" id="cpf_cnpj" value="{{ $coworking->cpf_cnpj }}"
                                    class="form-control ">
                            </div>
                            <div class="form-group col-md-6">
                                <label>E-Mail</label>
                                <input readonly type="email" name="email" id="email" placeholder="example@email.com"
                                    class="form-control " value="{{ $coworking->email }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Telefone</label>
                                <input readonly type="text" name="telefone" id="telefone" placeholder="(xx) xxxx-xxxx"
                                    class="form-control " value="{{ $coworking->telefone }}">
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label>CEP</label>
                                <input readonly type="text" name="cep" id="cep" placeholder="(xx) xxxx-xxxx"
                                    class="form-control " value="{{ $endereco->cep }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Estado</label>

                                <select readonly name="estado" id="estado" class="form-control ">
                                    <option value="{{$endereco->fk_estado}}">{{$endereco->estado->nome}}</option>
                                </select readonly>

                            </div>
                            <div class="form-group col-md-5">
                                <label>Cidade</label>

                                <select readonly name="cidade" id="cidade" class="form-control ">
                                    <option value="{{$endereco->fk_cidade}}">{{$endereco->cidade->nome}}</option>
                                </select readonly>

                            </div>
                            <div class="form-group col-md-9">
                                <label>Logradouro</label>
                                <input readonly type="text" name="logradouro" id="logradouro" placeholder="Rua/Avenida"
                                    class="form-control " value="{{ $endereco->logradouro }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Número</label>
                                <input readonly type="text" name="numero" id="numero" placeholder="digite o nº do local"
                                    class="form-control " value="{{ $endereco->numero }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Bairro</label>
                                <input readonly type="text" name="bairro" id="bairro" placeholder="digite o bairro do local"
                                    class="form-control " value="{{ $endereco->bairro }}">
                            </div>
                            <div class="form-group col-md-8">
                                <label>Complemento</label>
                                <input readonly type="text" name="complemento" id="complemento"
                                    placeholder="complemento do endereço caso tenha" class="form-control "
                                    value="{{ $endereco->complemento }}">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Comprovante de Residência do Local</label>
                                    <div>
                                        <a href="{{$coworking->getFirstMediaUrl('comprovante-residencia')}}"
                                        class="btn btn-success"
                                        title="Visualizar" data-toggle="tooltip" target="_blank">
                                        <i class="fas fa-eye"> Visualizar/Baixar</i>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Licença de Funcionamento</label>
                                <div>
                                    <a href="{{$coworking->getFirstMediaUrl('licenca-funcionamento')}}"
                                        class="btn btn-success"
                                        title="Visualizar" data-toggle="tooltip" target="_blank">
                                        <i class="fas fa-eye"> Visualizar/Baixar</i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div> <!-- /.card-body -->
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
@endsection