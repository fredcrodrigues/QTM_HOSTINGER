@extends('layouts.app')
@section('head_title', 'produtos')

@section('conteudo')
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-md-10 col-sm-12">
                    <h4 class="text-extra-dark-gray alt-font font-weight-600">{{$produto_conteudo->titulo}}</h4>
                    <p class="text-medium line-height-30 text-medium-gray">
                        @php echo $produto_conteudo->conteudo @endphp
                    </p>
                </div>
            </div>
        </div>
        
        <!-- start services style 03 section -->
        <section class="wow fadeIn">
            <div class="container">
                <div class="row">
                    <!-- start services item -->
                    @foreach($produto as $produtos)
                    <div class="col-md-4 sm-margin-30px-bottom">
                        <div class="margin-ten-bottom overflow-hidden image-hover-style-1 sm-margin-30px-bottom">
                            <a href="#"><img src="{{$produtos->getFirstMediaUrl('produto-imagem')}}" alt=""/></a>
                        </div>
                        <a href="#" class="alt-font margin-5px-bottom display-block text-extra-dark-gray font-weight-600 text-uppercase text-small">{{$produtos->titulo}}</a>
                        
                        <div class="border-top border-color-extra-light-gray padding-20px-top xs-padding-15px-top">
                            <a href="#" class="text-uppercase alt-font text-extra-dark-gray font-weight-600 text-extra-small">Conheça mais <i class="fas fa-long-arrow-alt-right margin-5px-left text-deep-pink text-medium position-relative top-2" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    @endforeach
                    <!-- end services item -->
                </div>
            </div>
        </section>

@endsection