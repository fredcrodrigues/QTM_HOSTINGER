@extends('Admin.layouts.partials_admin.app')

@section('title', 'Footer')
@section('links_adicionais') 
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  @endsection
 @section('conteudo')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Footer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Footer</li>
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
              <form  method="POST" id="form" action="/area-restrita/footer/1">
                @csrf
                @method('PUT')
                <div class="card-body">
                      (<span style="color: red;">*</span>) Campos Obrigatórios
                      <br><br>
                        <div class="row">
                            <div class="form-group col-12">
                                <strong>Conteúdo <span style="color: red;">*</span></strong>
                                <textarea class="textarea form-control @error('conteudo') is-invalid @enderror" name='conteudo' id='conteudo' placeholder="Place some text here"
                                    style="width: 100%; height: 700px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$modelo->conteudo}}</textarea>
                                    @error('conteudo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                              </div>
                          </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                    &nbsp Aguarde...">Salvar</button>
                </div>
                <!-- /.card-footer -->
              </form>
              
            </div>
            <!-- /.card -->

          </div>
        </div>
    </section>
</div>


@endsection
@section('scripts_adicionais')
<script src="{{asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/admin/base.js') }}"></script>
<script src="{{ asset('js/admin/footer.js') }}"></script>
@endsection




