@extends('Admin.layouts.partials_admin.app')

@section('title', 'Profissional')

@section('links_adicionais')
@endsection
@section('conteudo')

<!-- DataTables -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="form-group col-sm-6">
                    <h1>Realizar Lieberação - {{$modelo->nome}}</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="form-group col-12">
                <div class="card">
                    <div class="card-body">
                        @include('Admin.layouts.partials_admin.alert')
                        <br><br>
                        <form method="POST" action="/area-restrita/liberacao/{{$modelo->id}}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-4">
                                <input type="hidden" name="id" id="id" value="{{ $modelo->id }}" >
                                    <input type="text" name="latitude" id="latitude" placeholder="latitude"
                                        class="form-control @error('latitude') is-invalid @enderror" value="{{$modelo->endereco->latitude}}">
                                @error('latitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" name="longitude" id="longitude" placeholder="longitude"
                                        class="form-control @error('longitude') is-invalid @enderror" value="{{$modelo->endereco->longitude}}">
                                @error('longitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <button id="btn-localizacao" type="button" class="btn btn-success"><i class="fas fa-map-marker-alt"></i> Gerar Localização</button>
                                </div>
                        </div>
                        </div> <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right">Realizar Liberação</button>
                        </div>
                        </form>
                    </div> <!-- /.card-body -->
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
<script src="{{ asset('js/admin/liberacao.js') }}"></script>
@endsection