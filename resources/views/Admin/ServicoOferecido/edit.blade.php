@extends('Admin.layouts.partials_admin.app')

@section('title', 'Serviços')

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
                    <h1>Editar Serviço</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('area-restrita/servicos') }}">Servico</a></li>
                        <li class="breadcrumb-item active">Editar Serviço</li>
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
                            <a href="{{ URL::to('area-restrita/servico-oferecido/') }}"
                                class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar
                                Serviços</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('Admin.layouts.partials_admin.alert')
                        (<span style="color: red;">*</span>) Campos Obrigatórios
                        <br><br>
                        <form method="POST" action="/area-restrita/servico-oferecido/{{$servico->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Título<span style="color: red;">*</span></label>
                                    <input type="text" name='titulo' value='{{$servico->titulo}}'
                                        class="form-control @error('titulo') is-invalid @enderror"
                                        placeholder="Título">
                                    @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Imagem de Destaque<span style="color: red;">*</span></label>
                                    <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control @error('imagem_servico') is-invalid @enderror"
                                    name='imagem_servico'>
                                    <br>
                                    <img id="output" width="300" src="{{$servico->getFirstMediaUrl('servico-oferecido-imagem')}}"/>
                                    @error('imagem_servico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Descrição <span style="color: red;">*</span></label>
                                    <textarea class="ckeditor form-control @error('conteudo') is-invalid @enderror"
                                        name='conteudo' id='conteudo' >{{$servico->conteudo}}</textarea>
                                    @error('conteudo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                            </div>
                    </div>
                    <div class="card-footer">
                        <button id="btn-salvar" type="submit" class="btn btn-info float-right">Salvar</button>

                    </div> <!-- /.card-body -->
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
<script src="{{ asset('js/admin/servico.js') }}"></script>
<script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor5/config.js') }}"></script>
<script>
    watchdog.create( document.querySelector( '.ckeditor' ), {
                extraPlugins: [MyCustomUploadAdapterPlugin],
    }).catch( handleError );
</script>
@endsection