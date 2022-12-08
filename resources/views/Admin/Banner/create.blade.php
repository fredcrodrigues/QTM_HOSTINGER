@extends('Admin.layouts.partials_admin.app')

@section('title', 'Banners')

@section('links_adicionais')
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
                    <h1>Adicionar Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('area-restrita/banner') }}">Banner</a></li>
                        <li class="breadcrumb-item active">Adicionar Banner</li>
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
                            <a href="{{ URL::to('area-restrita/banner/') }}" class="btn btn-block btn-outline-info "><i
                                    class="fa fa-list-alt"></i> Listar Banners</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('Admin.layouts.partials_admin.alert')
                        (<span style="color: red;">*</span>) Campos Obrigatórios
                        <br><br>
                        <form method="POST" action="{{ URL::to('area-restrita/banner') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Título<span style="color: red;">*</span></label>
                                    <input type="text" name='titulo' value="{{ old('titulo') }}"
                                        class="form-control @error('titulo') is-invalid @enderror"
                                        placeholder="título para o banner">
                                    @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Link<span style="color: red;">*</span></label>
                                    <input type="text" name='link' value="{{ old('link') }}"
                                        class="form-control @error('link') is-invalid @enderror"
                                        placeholder="Link do banner">
                                    @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Banner<span style="color: red;">*</span></label>
                                    <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control @error('imagem_banner') is-invalid @enderror"
                                    name='imagem_banner'>
                                    <br>
                                    <img id="output" width="300"/>
                                    @error('imagem_banner')
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
<script src="{{ asset('js/admin/banner.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
@endsection