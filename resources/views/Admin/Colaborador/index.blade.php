@extends('Admin.layouts.partials_admin.app')

@section('title', 'Colaboradores')

@section('links_adicionais')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('conteudo')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gerenciar Colaboradores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Colaboradores</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a href="{{ URL::to('area-restrita/colaborador/inativo') }}"
                                class="btn btn-block btn-outline-danger"><i class="fa fa-lock"></i> Colaboradores
                                INATIVOS</a>
                        </div>
                        <div class="col-md-3 float-right">
                            <a href="{{ URL::to('area-restrita/colaborador/create') }}"
                                class="btn btn-block btn-outline-info"><i class="fa fa-plus"></i> Adicionar
                                Colaborador</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    @if (Session::has('message'))
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.row -->
    </section>
</div>
<!-- /.content -->

@endsection
@section('scripts_adicionais')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/admin/base.js') }}"></script>
<script src="{{ asset('js/admin/listar_colaboradores.js') }}"></script>
@endsection