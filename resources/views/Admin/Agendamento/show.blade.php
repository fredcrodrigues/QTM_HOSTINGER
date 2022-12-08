@extends('Admin.layouts.partials_admin.app')

@section('title', 'Agendamento')

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
                    <h1>Agendamento para: {{$agendamento->tipo}}</h1>
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
                        <form method="POST" action="/area-restrita/agendamento/solicitacao-atendida">
                            @csrf
                        <div class="row">
                                <input type="hidden" name="agendamento" id="agendamento" value="{{ $agendamento->id}}">
                            <div class="form-group col-md-4">
                                <label>Agendamento para: <span style="color: red;">*</span></label>
                                <select type="text" name="tipo" id="tipo"
                                    class="form-control @error('tipo') is-invalid @enderror" disabled>
                                    <option value="profissional" {{$agendamento->tipo=="profissional" ? "":"selected"}}>Profissional</option>
                                    <option value="coworking" {{$agendamento->tipo=="coworking" ? "":"selected"}}>Coworking</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Nome do Profissional/Local <span style="color: red;">*</span></label>
                                <input type="text" name="nome" id="nome" value='{{$agendamento->profissional_local->nome ?? "não definido"}}'
                                    class="form-control" disabled>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Nome do Cliente <span style="color: red;">*</span></label>
                                <input type="text" name="cliente" id="cliente" value="{{ $agendamento->cliente->nome }}"
                                    class="form-control" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Telefone p/ Contato<span style="color: red;">*</span></label>
                                <input type="text" name="telefone" id="telefone" value="{{ $agendamento->cliente->telefone }}"
                                    class="form-control" disabled>
                            </div>
                            <div class="form-group col-md-8">
                                <label>E-mail<span style="color: red;">*</span></label>
                                <input type="text" name="email" id="email" value="{{ $agendamento->cliente->email }}"
                                    class="form-control" disabled>
                            </div>
                            <br><br><br><br>
                             <div id='form-render' class="col-md-12"></div>
                        </div>
                        </div> <!-- /.card-body -->
                                <div class="card-footer">
                                    @if ($agendamento->status=="solicitacao")
                                        <button type="submit" class="btn btn-info float-right">Solicitação Atendida</button>
                                    @endif
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
  <script src="{{ asset('plugins/formbuilder/form-render.min.js') }}"></script>
  <script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/admin/base.js') }}"></script>
<script src="{{ asset('js/admin/agendamento.js') }}"></script>
@endsection