@extends('Admin.layouts.partials_admin.app')

@section('title', 'Sobre Nós Secundario')

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
                    <h1>Editar Sobre Nós Secundario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Sobre Nós</li>
                        <li class="breadcrumb-item active">Editar Sobre Nós Secundario</li>
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
                        <form method="POST" action="/area-restrita/sobre-nos-secundario/{{$sobre_nos->id}}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Título<span style="color: red;">*</span></label>
                                    <input type="text" name='titulo' value='{{$sobre_nos->titulo}}'
                                        class="form-control @error('titulo') is-invalid @enderror" placeholder="Título">
                                    @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Imagem Secundário 01<span style="color: red;">*</span></label>
                                    <input type="file" accept="image/*" onchange="loadFile01(event)"
                                        class="form-control @error('imagem_sobre_secundario_01') is-invalid @enderror"
                                        name='imagem_sobre_secundario_01'>
                                    <br>
                                    <img id="output_01" width="300"
                                        src="{{$sobre_nos->getFirstMediaUrl('sobre-secundario-01')}}" />
                                    @error('imagem_sobre_secundario_01')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Imagem Secundário 02<span style="color: red;">*</span></label>
                                    <input type="file" accept="image/*" onchange="loadFile02(event)"
                                        class="form-control @error('imagem_sobre_secundario_02') is-invalid @enderror"
                                        name='imagem_sobre_secundario_02'>
                                    <br>
                                    <img id="output_02" width="300"
                                        src="{{$sobre_nos->getFirstMediaUrl('sobre-secundario-02')}}" />
                                    @error('imagem_sobre_secundario_02')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Vídeo<span style="color: red;">*</span></label>
                                    <input type="file" onchange="loadFile03(event)"
                                        class="form-control @error('video_sobre_secundario') is-invalid @enderror"
                                        name='video_sobre_secundario'>
                                    <br>
                                    <img id="output_03" width="300"
                                        src="{{$sobre_nos->getFirstMediaUrl('sobre-secundario-video')}}" />
                                    @error('video_sobre_secundario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label>Conteúdo <span style="color: red;">*</span></label>
                                    <textarea class="ckeditor form-control @error('conteudo') is-invalid @enderror"
                                        name='conteudo' id='conteudo' >{{$sobre_nos->conteudo}}</textarea>
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
<!-- /.content -->
@endsection
@section('scripts_adicionais')
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor5/config.js') }}"></script>
<script src="{{ asset('js/admin/base.js') }}"></script>
<script src="{{ asset('js/admin/sobre_secundario.js') }}"></script>
<script>
    watchdog.create( document.querySelector( '.ckeditor' ), {
                extraPlugins: [MyCustomUploadAdapterPlugin],
    }).catch( handleError );
</script>
@endsection