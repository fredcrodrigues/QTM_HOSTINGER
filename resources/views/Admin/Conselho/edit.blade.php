@extends('Admin.layouts.partials_admin.app')

@section('title', 'Conselho')

 @section('conteudo')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Conselho</h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Conselho</li>
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
                  <div class="float-right">
                          <a href="{{ URL::to('area-restrita/conselho') }}" class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar Conselhos</a>
                      </div>
                  </div>
                 <!-- /.card-header -->
               <div class="card-body">
                 @include('Admin.layouts.partials_admin.alert')
                  (<span style="color: red;">*</span>) Campos Obrigatórios
                  <br><br>
                <form method="POST" action="/area-restrita/conselho/{{$modelo->id}}" id="conselho">
                      @csrf
                      @method('PUT')
                          <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>Título<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="titulo" class="form-control @error('titulo') is-invalid @enderror" 
                                    value="{{ $modelo->titulo }}">
                                    @error('titulo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <strong>Status <span style="color: red;">*</span></strong>
                                    <select type="text" autocomplete="off" name="status" class="form-control select2 @error('status') is-invalid @enderror">
                                        <option value='1' {{ ($modelo->status == "1" ? "selected":"") }}>ativo</option>
                                        <option value='0' {{ ($modelo->status == "0" ? "selected":"") }}>inativo</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              <div class="form-group col-md-3">
                                <br>
                                <button type="submit" form="conselho" class="btn btn-info float-left" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                          &nbsp Aguarde...">Salvar</button>
                              </div>
                          </div>    
                  </form>
            </div>
          </div>
      <!-- /.row -->
    </section>
</div>
    <!-- /.content -->
@endsection


