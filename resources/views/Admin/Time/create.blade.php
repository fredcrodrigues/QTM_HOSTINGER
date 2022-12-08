@extends('Admin.layouts.partials_admin.app')

@section('title', 'Time QTM')

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
                    <h1>Adicionar Membro do Time QTM</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('area-restrita/time-qtm') }}">Time QTM</a></li>
                        <li class="breadcrumb-item active">Adicionar Membro do Time QTM</li>
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
                            <a href="{{ URL::to('area-restrita/time-qtm/') }}" class="btn btn-block btn-outline-info "><i
                                    class="fa fa-list-alt"></i> Listar Time QTM</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('Admin.layouts.partials_admin.alert')
                        (<span style="color: red;">*</span>) Campos Obrigatórios
                        <br><br>
                        <form method="POST" action="{{ URL::to('area-restrita/time-qtm') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Nome Completo<span style="color: red;">*</span></label>
                                    <input type="text" name='nome' value="{{ old('nome') }}"
                                        class="form-control @error('nome') is-invalid @enderror"
                                        placeholder="Nome">
                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Cargo<span style="color: red;">*</span></label>
                                    <input type="text" name='cargo' value="{{ old('cargo') }}"
                                        class="form-control @error('cargo') is-invalid @enderror"
                                        placeholder="Cargo que ocupa na QTM">
                                    @error('cargo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Foto<span style="color: red;">*</span></label>
                                    <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control @error('imagem_time') is-invalid @enderror"
                                    name='imagem_time'>
                                    <br>
                                    <img id="output" width="300"/>
                                    @error('imagem_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Descrição <span style="color: red;">*</span></label>
                                    <textarea class="ckeditor form-control @error('conteudo') is-invalid @enderror"
                                        name='conteudo' id='conteudo' >{{ old('conteudo')}}</textarea>
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
<script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor5/config.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('js/admin/base.js') }}"></script>
<script src="{{ asset('js/admin/time.js') }}"></script>
<script>
    watchdog.create( document.querySelector( '.ckeditor' ), {
                extraPlugins: [MyCustomUploadAdapterPlugin],
    }).catch( handleError );
</script>
@endsection