@extends('Admin.layouts.partials_admin.app')

@section('title', 'Clientes')

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
                    <h1>Alterar Cliente</h1>
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
                        <form method="POST" action="/area-restrita/cliente-adm/{{$cliente->id}}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Foto</label>
                                    <input type="file" accept="image/*" onchange="loadFile(event)"
                                        class="form-control @error('imagem_cliente') is-invalid @enderror"
                                        name='imagem_cliente'>
                                    <br>
                                    <img id="output" width="300"
                                        src="{{$cliente->getFirstMediaUrl('cliente-imagem')}}" />
                                    @error('imagem_cliente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Nome Completo<span style="color: red;">*</span></label>
                                    <input type="text" name="nome" id="nome" placeholder="Nome Completo"
                                        class="form-control @error('nome') is-invalid @enderror"
                                        value="{{ $cliente->nome }}">
                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>CPF<span style="color: red;">*</span></label>
                                    <input type="text" name="cpf_cnpj" id="cpf_cnpj" placeholder="xxx.xxx.xxx-xx"
                                        class="form-control @error('cpf_cnpj') is-invalid @enderror"
                                        value="{{ $cliente->cpf_cnpj }}">
                                    @error('cpf_cnpj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Telefone p/ Contato<span style="color: red;">*</span></label>
                                    <input type="text" name="telefone" id="telefone" placeholder="(xx) xxxx-xxxx"
                                        class="form-control @error('telefone') is-invalid @enderror"
                                        value="{{ $cliente->telefone }}">
                                    @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>E-Mail<span style="color: red;">*</span></label>
                                    <input type="text" name="email" id="email" placeholder="example@email.com"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $cliente->email }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Status <span style="color: red;">*</span></label>
                                    <select type="text" name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="ativo" {{$cliente->status=="ativo" ? "selected":""}}>ativo
                                        </option>
                                        <option value="inativo" {{$cliente->status=="inativo" ? "selected":""}}>inativo
                                        </option>
                                        <option value="pendente" {{$cliente->status=="pendente" ? "selected":""}}>
                                            pendente</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
        $("#cpf_cnpj").inputmask("999.999.999-99");
    });
</script>
@endsection