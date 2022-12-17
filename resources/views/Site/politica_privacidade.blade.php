@extends('layouts.app')
@section('head_title', 'Politíca Privacidade')
@section('conteudo')

        <section class="wow fadeIn" id="start-your-project">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Politíca de Privacidade</span>
                        </div>
                    </div>
                </div>
                @php echo $configuracao->politica_privacidade @endphp
                
               
            </div>
        </section>
    

@endsection
                    