@extends('Admin.layouts.partials_admin.app')
 
 @section('title', 'Depoimentos')

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
            <h1>Gerenciar Depoimentos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Depoimentos</li>
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
                
                <div class="col-md-3 float-right">
                    <a href="{{ URL::to('area-restrita/depoimentos/create') }}" class="btn btn-block btn-outline-info"><i class="fa fa-plus"></i> Adicionar Depoimento</a>
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
   <script src="{{ asset('js/admin/listar_depoimentos.js') }}"></script>
@endsection

