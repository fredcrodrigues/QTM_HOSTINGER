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
                <div class="col-sm-6">
                    <h1>Visualizar Cliente</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('Admin.layouts.partials_admin.alert')
                        <br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Foto<span style="color: red;">*</span></label>
                                <div>
                                    <img id="output" width="300" src="{{$cliente->getFirstMediaUrl('cliente-imagem')}}" />
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Nome Completo</label>
                                <input type="text" name='nome' value='{{$cliente->nome}}' class="form-control "
                                    readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>CPF</label>
                                <input type="text" name='cpf_cnpj' value='{{$cliente->cpf_cnpj}}' class="form-control "
                                    readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Telefone p/ Contato</label>
                                <input type="text" name='telefone' value='{{$cliente->telefone}}' class="form-control "
                                    readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>E-Mail</label>
                                <input type="text" name='email' value='{{$cliente->email}}' class="form-control "
                                    readonly>
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