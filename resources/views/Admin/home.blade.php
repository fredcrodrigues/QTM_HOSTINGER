@extends('Admin.layouts.partials_admin.app')

@section('title', 'Home')
@section('links_adicionais') 
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  @endsection
  
@section('conteudo')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Seja bem vindo(a)!!</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/area-restrita/">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Solicitação de <b>AGENDAMENTOS</b>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table_agendamento" class="table table-bordered table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th>Data Solicitação</th>
                                    <th>Nome do Solicitante</th>
                                    <th>Tipo</th>
                                    <th>Profissional/Local</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Solicitação de liberação <b>COWORKINGS</b>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table_coworkings" class="table table-bordered table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th>Nome do Espaço</th>
                                    <th>Telefone</th>
                                    <th>E-Mail</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                        <div class="card-title">
                                Solicitação de liberação <b>PROFISSIONAIS</b>
                            </div>
                        </div>
                        <div class="card-body">
                                <table id="table_profissionais" class="table table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Especialidade</th>
                                        <th>Telefone</th>
                                        <th>E-Mail</th>
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
    </section>
    <!-- /.content -->
    @endsection
    @section('scripts_adicionais')
    <!-- Ekko Lightbox -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
   <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('js/admin/base.js') }}"></script>
   <script src="{{ asset('js/admin/home.js') }}"></script>
   <script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    @endsection