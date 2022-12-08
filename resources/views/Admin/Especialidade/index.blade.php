@extends('Admin.layouts.partials_admin.app')
 
 @section('title', 'Especialidade')
 @section('contentheader_title', 'Especialidade')
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
          <div class="col-sm-8">
            <h1>Especialidade</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/area-restrita/home">Home</a></li>
              <li class="breadcrumb-item active">Especialidade</li>
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
                <form method="POST" action="/area-restrita/especialidade" id="especialidade">
                      @csrf
                          <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>Título<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="titulo" class="form-control @error('titulo') is-invalid @enderror" 
                                    value="{{ old('titulo') }}">
                                    @error('titulo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <strong>Status <span style="color: red;">*</span></strong>
                                    <select type="text" autocomplete="off" name="status" class="form-control select2 @error('status') is-invalid @enderror">
                                        <option value='1' {{ (old('status') == "1" ? "selected":"") }}>ativo</option>
                                        <option value='0' {{ (old('status') == "0" ? "selected":"") }}>inativo</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              <div class="form-group col-md-3">
                                <br>
                                <button type="submit" form="especialidade" class="btn btn-info float-left" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                          &nbsp Aguarde...">Adicionar</button>
                              </div>
                          </div>    
                  </form>
            </div>
          
            <!-- /.card-body -->
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                    <table id="table_especialidade" class="table table-bordered table-hover" width="100%">
                        <thead>
                          <tr>
                            <th>Título</th>
                            <th>Status</th>
                            <th>Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                    </table>
                  </div> 
                </div> 
              </div>   
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
   <script src="{{ asset('js/admin/listar_especialidade.js') }}"></script>
@endsection

