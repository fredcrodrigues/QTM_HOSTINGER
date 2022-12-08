@extends('Admin.layouts.partials_admin.app')

@section('title', 'Notícia')
@section('links_adicionais')
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('conteudo')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Alterar Notícia</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Notícia</li>
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
                        <div class="col-md-3 float-right">
                            <a href="{{ URL::to('area-restrita/noticias') }}" class="btn btn-block btn-outline-info "><i
                                    class="fa fa-list-alt"></i> Listar Notícias</a>
                        </div>

                    </div>
                    <div class="card-body">
                        @include('Admin.layouts.partials_admin.alert')
                        <form method="POST" id="form" action="/area-restrita/noticias/{{$modelo->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                (<span style="color: red;">*</span>) Campos Obrigatórios
                                <br><br>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Título<span style="color: red;">*</span></label>
                                        <input type="text" name='titulo' value="{{$modelo->titulo}}"
                                            class="form-control @error('titulo') is-invalid @enderror"
                                            placeholder="título da notícia">
                                        @error('titulo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <label>Data<span style="color: red;">*</span></label>
                                        <input type="date" id='data' name='data' value="{{$modelo->data}}"
                                            class="form-control @error('data') is-invalid @enderror"
                                            placeholder="título da notícia">
                                        @error('data')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="hidden" id='noticia' value='{{$modelo->id}}'>
                                        <label>Imagem de Destaque<span style="color: red;">*</span></label>
                                        <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control @error('imagem_noticia') is-invalid @enderror"
                                    name='imagem_noticia'>
                                    <br>
                                    <img id="output" width="300" src="{{$modelo->getFirstMediaUrl('noticia')}}"/>
                                        <!-- <div class="needsclick  dropzone @error('imagem_noticia') is-invalid @enderror"
                                            id="imagem_noticia"></div> -->
                                        @error('imagem_noticia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Conteúdo da Notícia<span style="color: red;">*</span></label>
                                        <textarea class="textarea form-control @error('conteudo') is-invalid @enderror"
                                            name='conteudo' id='conteudo' placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$modelo->conteudo}}</textarea>
                                        @error('conteudo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                    &nbsp Aguarde...">Salvar</button>
                    </div>
                    <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
</div>
</section>
</div>


@endsection
@section('scripts_adicionais')
<script src="{{asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/admin/base.js') }}"></script>
<script src="{{ asset('js/admin/noticia.js') }}"></script>
@endsection