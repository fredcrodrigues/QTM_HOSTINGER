<section id="Servico" class="wow fadeIn parallax" data-stellar-background-ratio="0.4" style="background-image:url('http://placehold.it/1920x1200');">
    <div class="opacity-full"></div>
    <div class="container position-relative">
        <div class="row equalize sm-equalize-auto">
            <!-- start feature box item -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 display-table md-margin-15px-top sm-no-margin-top sm-margin-ten-bottom xs-padding-five-lr xs-margin-ten-bottom wow fadeIn last-paragraph-no-margin">
                <div class="display-table-cell vertical-align-middle padding-fourteen-right sm-no-padding-right sm-text-center">
                    <h5 class="alt-font text-dark-gray">{{$sobre_secundario->titulo}}</h5>
                    <p class="width-85 md-width-100 xs-width-100 sm-margin-lr-auto text-medium-gray">@php echo $sobre_secundario->conteudo @endphp</p>
                    <a href="/servicos" class="margin-35px-top btn btn-small btn-dark-gray sm-margin-30px-top">Saiba mais</a>
                </div>
            </div>
            <!-- end feature box item -->
            <!-- start feature box item -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center display-table xs-margin-ten-bottom wow fadeIn" data-wow-delay="0.2s">
                <div class="display-table-cell vertical-align-middle">
                    <a class="popup-youtube" href="{{ $sobre_secundario->getFirstMediaUrl('sobre-secundario-video') }}">
                            <!--{{ $sobre_secundario->getFirstMediaUrl('sobre-secundario-01') }}-->   
                    <img src="{{asset('site/images/imagem-video.png') }}" alt="" class="width-100">
                        <div class="icon-play">
                            <div class="absolute-middle-center width-80">
                                <img src="{{ asset('site/images/icon-play.png') }}" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- end feature box item -->
            <!-- start feature box item -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center display-table wow fadeIn" data-wow-delay="0.4s">
                <div class="display-table-cell vertical-align-middle">
                    <!--$sobre_secundario->getFirstMediaUrl('sobre-secundario-02')-->
                    <img src="{{asset('site/images/imagem-video-2.png') }}" alt="" class="width-100">
                </div>
            </div>
            <!-- end feature box item -->
        </div>
    </div>
</section>