@extends('Admin.layouts.partials_admin.app')

@section('title', 'Profissional')

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
                    <h1>Alterar Profissional</h1>
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
                        <form method="POST" action="/area-restrita/profissional-adm/{{$profissional->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Foto para o Perfil<span style="color: red;">*</span></label>
                                    <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control @error('imagem_cliente') is-invalid @enderror" name='imagem_cliente'>
                                    <br>
                                    <img id="output" width="300" src="{{$profissional->getFirstMediaUrl('cliente-imagem')}}" />
                                    @error('imagem_cliente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Certificado ou Diploma</label>
                                    <input type="file" class="form-control" name='arquivo_registro'>
                                    <br>
                                    <a href="{{$profissional->getFirstMediaUrl('registro')}}" class="btn btn-success" title="Visualizar" data-toggle="tooltip" target="_blank">
                                        <i class="fas fa-eye"> Visualizar/Baixar</i>
                                    </a>
                                    @error('arquivo_registro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Nome Completo <span style="color: red;">*</span></label>
                                    <input type="text" name="nome" id="nome" value="{{ $profissional->nome }}" class="form-control @error('nome') is-invalid @enderror">
                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>CPF <span style="color: red;">*</span></label>
                                    <input type="text" name="cpf_cnpj" id="cpf_cnpj" value="{{ $profissional->cpf_cnpj }}" class="form-control @error('cpf_cnpj') is-invalid @enderror">
                                    @error('cpf_cnpj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Especialidade <span style="color: red;">*</span></label>
                                    <input type="text" name="especialidade" id="especialidade" value="{{ $profissional->especialidade }}" class="form-control @error('especialidade') is-invalid @enderror">
                                    @error('especialidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label>CEP <span style="color: red;">*</span></label>
                                    <input type="text" name="cep" id="cep" placeholder="(xx) xxxx-xxxx" class="form-control @error('cep') is-invalid @enderror" value="{{ $profissional->endereco->cep }}">
                                    @error('cep')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Estado <span style="color: red;">*</span></label>
                                    <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror">
                                        @foreach ($estado as $estados)
                                        <option value="{{$estados->sigla}}" {{$estados->id == $profissional->endereco->fk_estado ? "selected":""}}>
                                            {{$estados->nome}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Cidade <span style="color: red;">*</span></label>
                                    <select name="cidade" id="cidade" class="form-control @error('cidade') is-invalid @enderror">
                                        @foreach ($cidade as $cidades)
                                        <option value="{{$cidades->id}}" {{$cidades->id == $profissional->endereco->fk_cidade ? "selected":""}}>
                                            {{$cidades->nome}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('cidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-9">
                                    <label>Logradouro <span style="color: red;">*</span></label>
                                    <input type="text" name="logradouro" id="logradouro" placeholder="Rua/Avenida" class="form-control @error('logradouro') is-invalid @enderror" value="{{ $profissional->endereco->logradouro }}">
                                    @error('logradouro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Número <span style="color: red;">*</span></label>
                                    <input type="text" name="numero" id="numero" placeholder="digite o nº do local" class="form-control @error('numero') is-invalid @enderror" value="{{ $profissional->endereco->numero }}">
                                    @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Bairro <span style="color: red;">*</span></label>
                                    <input type="text" name="bairro" id="bairro" placeholder="digite o bairro do local" class="form-control @error('bairro') is-invalid @enderror" value="{{ $profissional->endereco->bairro }}">
                                    @error('bairro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Complemento</label>
                                    <input type="text" name="complemento" id="complemento" placeholder="complemento do endereço caso tenha" class="form-control " value="{{ $profissional->endereco->complemento }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>E-Mail <span style="color: red;">*</span></label>
                                    <input type="email" name="email" id="email" placeholder="example@email.com" class="form-control @error('email') is-invalid @enderror" value="{{ $profissional->email }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Telefone <span style="color: red;">*</span></label>
                                    <input type="text" name="telefone" id="telefone" placeholder="(xx) xxxx-xxxx" class="form-control @error('telefone') is-invalid @enderror" value="{{ $profissional->telefone }}">
                                    @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Status <span style="color: red;">*</span></label>
                                    <select type="text" name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="ativo" {{$profissional->status=="ativo" ? "selected":""}}>ativo
                                        </option>
                                        <option value="inativo" {{$profissional->status=="inativo" ? "selected":""}}>
                                            inativo</option>
                                        <option value="pendente" {{$profissional->status=="pendente" ? "selected":""}}>
                                            pendente</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <br><br>

                                <div class="form-group col-md-3">
                                    <input type="hidden" name="id" id="id" value="{{ $profissional->id }}">
                                    <input type="text" name="latitude" id="latitude" placeholder="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{$profissional->endereco->latitude}}">
                                    @error('latitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" name="longitude" id="longitude" placeholder="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{$profissional->endereco->longitude}}">
                                    @error('longitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <button id="btn-localizacao" type="button" class="btn btn-success"><i class="fas fa-map-marker-alt"></i> Gerar Localização</button>
                                </div>
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
<script>
    $(document).ready(function($) {

        $("#telefone").inputmask("(99)99999-9999");
        $("#cpf_cnpj").inputmask("999.999.999-99");
        $("#cep").inputmask("99999-999");
    });
</script>
@endsection