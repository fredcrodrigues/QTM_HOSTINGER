@extends('Admin.layouts.partials_admin.app')

@section('title', 'Modelo Agendamento')

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
                    <h1>Alterar Modelo Agendamento do Coworking</h1>
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
                        <form method="POST" action="/area-restrita/coworking-adm/agendamento">
                        @csrf
                        <div id="fb-editor"></div>
                        </div> <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" id="save" class="btn btn-info float-right">Salvar</button>
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
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('plugins/formbuilder/form-builder.min.js') }}"></script>
  <script src="{{ asset('plugins/sweetalert2/sweet.js') }}"></script>
<script src="{{ asset('js/admin/base.js') }}"></script>
<script src="{{ asset('js/admin/modelo_coworking.js') }}"></script>
@endsection