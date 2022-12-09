@extends('layouts.app')

@section('head_title', 'sobre nós')

@section('conteudo')


<section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url(' {{ asset('site/images/fundo-sobre.png') }}">
            <!-- <div class="opacity-medium bg-extra-dark-gray"></div> -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large" style="height: 150px;">
                        <div class="display-table-cell vertical-align-middle text-center">
                            <!-- start page title -->
                            <h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom">Bem-vindo à QTM Healthtech!</h1>
                            <!-- end page title -->
                            <!-- start sub title -->
                            <span class="text-white opacity6 alt-font">Ciência | Saúde e Bem-Estar | Tecnologia</span>
                            <!-- end sub title -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        <!-- end page title section -->
        <section class="wow animate__fadeIn">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-12">
                        <h5 class="alt-font text-extra-dark-gray">{{$sobre_conteudo->titulo}}</h5>
                        <p class="text-medium line-height-28 sm-line-height-26">
                             @php echo $sobre_conteudo->conteudo @endphp
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class=" wow fadeIn parallax xs-background-image-center padding-nineteen-bottom xs-padding-50px-bottom" data-stellar-background-ratio="0.5" style="background-image:url('http://placehold.it/1920x1100');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 center-col text-center last-paragraph-no-margin">
                        <h5 class="alt-font font-weight-700 text-extra-dark-gray margin-15px-bottom text-uppercase">Nosso time</h5>
                    </div>  
                </div>   
            </div>
        </section>

        <section class="wow fadeIn overlap-section no-padding-top z-index-5">
            <div class="container-fluid padding-thirteen-lr md-padding-six-lr">
                <div class="row">

                @foreach($time as $times)
                    <!-- start team item -->
                    
                    <div class="col-md-4 col-sm-6 col-xs-12 team-block text-left team-style-1 wow fadeInUp" data-wow-delay="0.6s">
                        <br><br>
                        <figure>
                            <div class="team-image xs-width-100">
                                <span class="display-none">{{$images = $times->slug}}</span>
                                <img src="{{asset('site/images/'.trim($images.'.jpg',''))}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="6" class="rev-slidebg" data-no-retina>

                                <img src="{{$times->getFirstMediaUrl('time-imagem')}}" alt="">
                                <div class="overlay-content text-center">
                                    <div class="display-table height-100 width-100">
                                        <div class="vertical-align-middle display-table-cell icon-social-small">
                                            <a href="http://www.facebook.com" class="text-white text-white-hover" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                            <a href="http://www.instagram.com" class="text-white text-white-hover" target="_blank"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-overlay bg-deep-pink opacity8"></div>
                            </div>
                            <figcaption>
                                <div class="team-member-position margin-20px-top text-center" style="height: 380px;">
                                    <div class="text-small font-weight-500 text-extra-dark-gray text-uppercase">{{$times->nome}}</div>
                                    <div class="text-extra-small text-uppercase text-medium-gray">{{$times->cargo}}</div>
                                    <br>
                                    @php echo $times->conteudo @endphp
                                </div>   
                            </figcaption>
                        </figure>
                    </div>
                    <!-- end team item -->
                    @endforeach
                </div> 
            </div>
        </section>
        <!-- end team section -->
    

@endsection