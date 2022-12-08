@extends('Admin.layouts.partials_admin.app')

@section('title', 'Covidas')

@section('links_adicionais')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection
@section('conteudo')

<!-- DataTables -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Covidas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Covidas</li>
                        <li class="breadcrumb-item active">Editar Covidas</li>
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
                        <form method="POST" action="/area-restrita/covidas-adm/{{$covidas->id}}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                
                                <div class="form-group col-md-6">
                                    <label>Imagem<span style="color: red;">*</span></label>
                                    <input type="file" accept="image/*" onchange="loadFile(event)"
                                        class="form-control @error('imagem_covidas') is-invalid @enderror"
                                        name='imagem_covidas'>
                                        @error('imagem_covidas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <br>
                                    
                                    <img id="output" width="300" src="{{$covidas->getFirstMediaUrl('covidas-imagem')}}" />
                                   
                                </div>
                                <div class="form-group col-12">
                                    <label>Conteúdo <span style="color: red;">*</span></label>
                                    <textarea class="ckeditor form-control @error('conteudo') is-invalid @enderror"
                                        name='conteudo' id='conteudo'>{{$covidas->conteudo}}</textarea>
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

                <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Título<span style="color: red;">*</span></label>
                                    <input type="text" id = "titulo" name='titulo' value="{{ old('titulo') }}"
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
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    @error('conteudo_objetivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group col-12">
                                    <button type="button" id= "btn-salvar-objetivo" class="btn btn-info float-right">+ Adicionar Objetivo</button>
                                </div>
                                <div class="form-group col-12">
                                    <table id="table" class="table table-bordered table-hover" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Título</th>
                                                <th>Conteúdo</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    </table>
                                </div>
                            </div>    
                        </div>
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
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweet.js') }}"></script>
<script src="{{ asset('js/admin/base.js') }}"></script>
<script src="{{ asset('js/admin/covidas.js') }}"></script>
<script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor5/config.js') }}"></script>
<script>
    watchdog.create( document.querySelector( '.ckeditor' ), {
                extraPlugins: [MyCustomUploadAdapterPlugin],
    }).catch( handleError );
</script>
@endsection