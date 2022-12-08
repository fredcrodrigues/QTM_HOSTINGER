@extends('Admin.layouts.partials_admin.app')

@section('title', 'Colaborador')

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
                    <h1>Criar colaborador</h1>
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
                        <form method="POST" action="{{ URL::to('area-restrita/colaborador') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label>Nome Completo <span style="color: red;">*</span></label>
                                    <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
                                        class="form-control @error('nome') is-invalid @enderror">
                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                
                                <div class="form-group col-md-5">
                                    <label>E-Mail <span style="color: red;">*</span></label>
                                    <input type="email" name="email" id="email" placeholder="example@email.com"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Senha <span style="color: red;">*</span></label>
                                    <input type="password" autocomplete="off" id="senha" name="senha"
                                        class="form-control @error('senha') is-invalid @enderror"
                                        value="{{ old('senha') }}">
                                    @error('senha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <br><br>


                            </div>
                    </div> <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right">Salvar</button>
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
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>

@endsection