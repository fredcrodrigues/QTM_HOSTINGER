@extends('layouts.app')
@section('head_title', 'Termos')

@section('conteudo')
    <section class="wow fadeIn" id="start-your-project">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                    <div class="position-relative overflow-hidden width-100">
                        <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Termos e condições gerais de uso (e de compra e venda) do
                        Site e Aplicativo QTM Healthtech</span>
                    </div>
                </div>
            </div>
            @php echo $configuracao->termos @endphp
            
            
        </div>
    </section>


@endsection
@section('scripts_adicionais')
<script src="{{ asset('js/site/base.js') }}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/site/cliente.js') }}"></script>
@endsection                     