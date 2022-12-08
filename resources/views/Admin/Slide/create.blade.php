@extends('Admin.layouts.partials_admin.app')

@section('title', 'Slide em Texto')

@section('links_adicionais')
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('conteudo')

<!-- DataTables -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Adicionar Slide</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('area-restrita/slide') }}">Slide</a></li>
                        <li class="breadcrumb-item active">Adicionar Slide</li>
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
                            <a href="{{ URL::to('area-restrita/slide/') }}"
                                class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar
                                Slides</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('Admin.layouts.partials_admin.alert')
                        (<span style="color: red;">*</span>) Campos Obrigatórios
                        <br><br>
                        <form method="POST" action="{{ URL::to('area-restrita/slide') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Título<span style="color: red;">*</span></label>
                                    <input type="text" name='titulo' value="{{ old('titulo') }}"
                                        class="form-control @error('titulo') is-invalid @enderror"
                                        placeholder="Título">
                                    @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Título do Botão<span style="color: red;">*</span></label>
                                    <input type="text" name='botao' value="{{ old('botao') }}"
                                        class="form-control @error('botao') is-invalid @enderror"
                                        placeholder="Título do Botão">
                                    @error('botao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Link do Botão<span style="color: red;">*</span></label>
                                    <input type="text" name='link' value="{{ old('link') }}"
                                        class="form-control @error('link') is-invalid @enderror"
                                        placeholder="Link do botão">
                                    @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                  <div class="form-group col-12">
                                    <label>Conteudo do Slide<span style="color: red;">*</span></label>
                                    <textarea class="textarea form-control @error('conteudo') is-invalid @enderror"
                                        name='conteudo' id='conteudo' placeholder="Digite o conteúdo do slide aqui"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('conteudo') }}</textarea>
                                    @error('conteudo')
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
<script src="{{asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/admin/base.js') }}"></script>
<script src="{{ asset('js/admin/slide.js') }}"></script>
@endsection