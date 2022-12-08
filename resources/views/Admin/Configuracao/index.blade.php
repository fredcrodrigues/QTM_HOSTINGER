@extends('Admin.layouts.partials_admin.app')

@section('title', 'Configuração')

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
                    <h1>Editar Configuração</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Configuração</li>
                        <li class="breadcrumb-item active">Editar Configuração</li>
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
                        <form method="POST" action="/area-restrita/configuracao/{{$configuracao->id}}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label>Instagram<span style="color: red;">*</span></label>
                                    <input type="text" name='instagram' value='{{$configuracao->instagram}}'
                                        class="form-control @error('instagram') is-invalid @enderror"
                                        placeholder="Instagram">
                                    @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Facebook<span style="color: red;">*</span></label>
                                    <input type="text" name='facebook' value='{{$configuracao->facebook}}'
                                        class="form-control @error('facebook') is-invalid @enderror"
                                        placeholder="Facebook">
                                    @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>TikTok<span style="color: red;">*</span></label>
                                    <input type="text" name='tiktok' value='{{$configuracao->tiktok}}'
                                        class="form-control @error('tiktok') is-invalid @enderror"
                                        placeholder="tiktok">
                                    @error('tiktok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>Logomarca<span style="color: red;">*</span></label>
                                    <input type="file" accept="image/*" onchange="loadFile(event)"
                                        class="form-control @error('imagem_logomarca') is-invalid @enderror"
                                        name='imagem_logomarca'>
                                    <br>
                                    <img id="output" width="300"
                                        src="{{$configuracao->getFirstMediaUrl('logomarca-imagem')}}" />
                                    @error('imagem_logomarca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Politíca de Privacidade <span style="color: red;">*</span></label>
                                        <textarea class="ckeditor_politica form-control @error('politica_privacidade') is-invalid @enderror"
                                        name='politica_privacidade' placeholder="Digite o texto aqui">{{$configuracao->politica_privacidade}}</textarea>
                                    @error('politica_privacidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Uso Responsável<span style="color: red;">*</span></label>
                                    <textarea class="ckeditor_uso_responsavel form-control @error('uso_responsavel') is-invalid @enderror"
                                        name='uso_responsavel' placeholder="Digite o texto aqui">{{$configuracao->uso_responsavel}}</textarea>
                                    @error('uso_responsavel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Termos<span style="color: red;">*</span></label>
                                    <textarea class="ckeditor_termos form-control @error('termos') is-invalid @enderror"
                                        name='termos' placeholder="Digite o texto aqui">{{$configuracao->termos}}</textarea>
                                    @error('termos')
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
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor5/config.js') }}"></script>
<script src="{{ asset('js/admin/base.js') }}"></script>
<script src="{{ asset('js/admin/configuracao.js') }}"></script>
<script>
    watchdog.create( document.querySelector( '.ckeditor_politica' ), {
                extraPlugins: [MyCustomUploadAdapterPlugin],
    }).catch( handleError );

    watchdog.create( document.querySelector( '.ckeditor_uso_responsavel' ), {
        extraPlugins: [MyCustomUploadAdapterPlugin],
    }).catch( handleError );

    watchdog.create( document.querySelector( '.ckeditor_termos' ), {
        extraPlugins: [MyCustomUploadAdapterPlugin],
    }).catch( handleError );
</script>
@endsection

