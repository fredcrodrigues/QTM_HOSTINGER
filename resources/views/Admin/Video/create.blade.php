@extends('Admin.layouts.partials_admin.app')

@section('title', 'Vídeos')

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
                    <h1>Adicionar Vídeo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('area-restrita/videos') }}">Vídeo</a></li>
                        <li class="breadcrumb-item active">Adicionar Vídeo</li>
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
                            <a href="{{ URL::to('area-restrita/videos/') }}" class="btn btn-block btn-outline-info "><i
                                    class="fa fa-list-alt"></i> Listar
                                    Vídeos</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('Admin.layouts.partials_admin.alert')
                        (<span style="color: red;">*</span>) Campos Obrigatórios
                        <br><br>
                        <form method="POST" action="{{ URL::to('area-restrita/videos') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Título<span style="color: red;">*</span></label>
                                    <input type="text" name='titulo' value="{{ old('titulo') }}"
                                        class="form-control @error('titulo') is-invalid @enderror" placeholder="Título">
                                    @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Link para Vídeo no Youtube<span style="color: red;">*</span></label>
                                    <input type="text" name='video' value="{{ old('video') }}"
                                        class="form-control @error('video') is-invalid @enderror"
                                        placeholder="Link para Vídeo no Youtube">
                                    @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Imagem<span style="color: red;">*</span></label>
                                    <input type="file" accept="image/*" onchange="loadFile(event)"
                                        class="form-control @error('imagem_video') is-invalid @enderror"
                                        name='imagem_video'>
                                    <br>
                                    <img id="output" width="300" />
                                    @error('imagem_video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Descrição <span style="color: red;">*</span></label>
                                    <textarea class="textarea form-control @error('descricao') is-invalid @enderror"
                                        name='descricao' id='descricao' placeholder="Digite a descricao aqui"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('descricao') }}</textarea>
                                    @error('descricao')
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
<script src="{{ asset('js/admin/video.js') }}"></script>
@endsection