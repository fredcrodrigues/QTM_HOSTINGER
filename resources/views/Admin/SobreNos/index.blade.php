@extends('Admin.layouts.partials_admin.app')

@section('title', 'Sobre Nós')

@section('links_adicionais')
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('conteudo')

<!-- DataTables -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Sobre Nós</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Sobre Nós</li>
                        <li class="breadcrumb-item active">Editar Sobre Nós</li>
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

                    <div class="card-body">
                        @include('Admin.layouts.partials_admin.alert')
                        (<span style="color: red;">*</span>) Campos Obrigatórios
                        <br><br>
                        <form method="POST" action="/area-restrita/sobre-nos/{{$sobre_nos->id}}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label>Título<span style="color: red;">*</span></label>
                                    <input type="text" name='titulo' value='{{$sobre_nos->titulo}}'
                                        class="form-control @error('titulo') is-invalid @enderror" placeholder="Título">
                                    @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Imagem<span style="color: red;">*</span></label>
                                    <input type="file" accept="image/*" onchange="loadFile(event)"
                                        class="form-control @error('imagem_sobre') is-invalid @enderror"
                                        name='imagem_sobre'>
                                    <br>
                                    <img id="output" width="300"
                                        src="{{$sobre_nos->getFirstMediaUrl('sobre-imagem')}}" />
                                    @error('imagem_sobre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Descrição <span style="color: red;">*</span></label>
                                    <textarea class="textarea form-control @error('descricao') is-invalid @enderror"
                                        name='descricao' id='descricao' placeholder="Digite o texto aqui"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$sobre_nos->descricao}}</textarea>
                                    @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group col-12">
                                    <label>Descrição Resumida <span style="color: red;">*</span></label>
                                    <textarea
                                        class="textarea form-control @error('descricao_resumida') is-invalid @enderror"
                                        name='descricao_resumida' id='descricao_resumida'
                                        placeholder="Uma descrição menor para ficar de destaque no site"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$sobre_nos->descricao_resumida}}</textarea>
                                    @error('descricao_resumida')
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
<!-- /.content -->
@endsection
@section('scripts_adicionais')
<script src="{{asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/admin/base.js') }}"></script>
<script src="{{ asset('js/admin/sobre_nos.js') }}"></script>
@endsection