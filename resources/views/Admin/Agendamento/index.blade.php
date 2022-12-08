@extends('Admin.layouts.partials_admin.app')
 
 @section('title', 'Agendamentos')

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
            <h1>Agendamentos Encaminhados/Atendidos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Agendamento</li>
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
             @include('Admin.layouts.partials_admin.alert')
            <div class="card-body">
              <table id="table" class="table table-bordered table-hover" width="100%">
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
   <script src="{{ asset('js/admin/listar_agendamento.js') }}"></script>
@endsection

