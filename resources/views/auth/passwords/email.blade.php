@extends('auth.app')
@section('htmlheader_title', 'Alterar Senha')
 @section('contentheader_title', 'Alterar Senha')
@section('conteudo')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/login') }}">Redefinir Senha</a>
    </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Digite o seu E-mail" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row float-right">
                            <div class="col-md-12 offset-md-0 ">
                                <button type="submit" class="btn btn-primary">Redefinir Senha
                                </button>
                            </div>
                        </div>    
                    </form>
            </div>
            <!-- /.login-card-body -->
        </div>
</div>
@endsection
