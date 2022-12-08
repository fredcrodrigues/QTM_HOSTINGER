@extends('Admin.layouts.partials_admin.app')

@section('title', 'Profissional')

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
                    <h1>Visualizar Profissional</h1>
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
                                <label>Foto para o Perfil</label>
                                <div>
                                    <img id="output" width="300"
                                        src="{{$profissional->getFirstMediaUrl('cliente-imagem')}}" />
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Nome Completo</label>
                                <input type="text" name="nome" id="nome" value="{{ $profissional->nome }}"
                                    class="form-control " readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>CPF</label>
                                <input type="text" name="cpf_cnpj" id="cpf_cnpj" value="{{ $profissional->cpf_cnpj }}"
                                    class="form-control " readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Número do Conselho</label>
                                <input type="text" name="numero_conselho" value="{{ $profissional->numero_conselho }}"
                                    class="form-control " readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label>CEP</label>
                                <input type="text" name="cep" id="cep" placeholder="(xx) xxxx-xxxx"
                                    class="form-control " value="{{ $endereco->cep }}" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Estado</label>
                                <select name="estado" id="estado" class="form-control " readonly>
                                    <option value="{{$endereco->fk_estado}}">{{$endereco->estado->nome}}</option>
                                </select>

                            </div>
                            <div class="form-group col-md-4">
                                <label>Cidade</label>

                                <select name="cidade" id="cidade" class="form-control " readonly>
                                    <option value="{{$endereco->fk_cidade}}">{{$endereco->cidade->nome}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-9">
                                <label>Logradouro</label>
                                <input type="text" name="logradouro" id="logradouro" placeholder="Rua/Avenida"
                                    class="form-control " value="{{ $endereco->logradouro }}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Número</label>
                                <input type="text" name="numero" id="numero" placeholder="digite o nº do local"
                                    class="form-control " value="{{ $endereco->numero }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Bairro</label>
                                <input type="text" name="bairro" id="bairro" placeholder="digite o bairro do local"
                                    class="form-control " value="{{ $endereco->bairro }}" readonly>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Complemento</label>
                                <input type="text" name="complemento" id="complemento"
                                    placeholder="complemento do endereço caso tenha" class="form-control "
                                    value="{{ $endereco->complemento }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>E-Mail</label>
                                <input type="email" name="email" id="email" placeholder="example@email.com"
                                    class="form-control " value="{{ $profissional->email }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Telefone</label>
                                <input type="text" name="telefone" id="telefone" placeholder="(xx) xxxx-xxxx"
                                    class="form-control " value="{{ $profissional->telefone }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Certificado ou Diploma</label>
                                <div>
                                    <a href="{{$profissional->getFirstMediaUrl('registro')}}"
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