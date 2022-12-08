@extends('Admin.layouts.partials_admin.app')
@section('title', 'Objetivos')
@section('contentheader_title', 'Objetivos')
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
                    <h1>Alterar Objetivo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('area-restrita/covidas-adm') }}">Objetivo</a></li>
                        <li class="breadcrumb-item active">Alterar Objetivo</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-2 float-right">
                            <a href="{{ URL::to('area-restrita/covidas-adm/') }}" class="btn btn-block btn-outline-info "><i
                                    class="fa fa-list-alt"></i> Listar Objetivos</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('Admin.layouts.partials_admin.alert')
                        (<span style="color: red;">*</span>) Campos Obrigatórios
                        <br><br>
                        <form method="POST" action="/area-restrita/covidas-adm/{{$objetivo->id}}/update-objetivo"enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Título<span style="color: red;">*</span></label>
                                    <input type="text" id = "titulo" name='titulo' value='{{$objetivo->titulo}}'
                                        class="form-control @error('titulo') is-invalid @enderror"
                                        placeholder="titulo ">
                                    @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Conteúdo do Objetivo<span style="color: red;">*</span></label>
                                    <textarea class="form-control @error('conteudo_objetivo') is-invalid @enderror"
                                        name='conteudo_objetivo' id='conteudo_objetivo' placeholder="Digite o texto aqui"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$objetivo->conteudo}}</textarea>
                                    @error('conteudo_objetivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                    </div> <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right">Salvar</button>
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
<script src="{{ asset('js/admin/objetivo.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
@endsection