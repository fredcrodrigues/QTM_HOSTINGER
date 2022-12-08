<section class="bg-light-gray wow fadeIn">
    <div class="container position-relative">
        <div class="row sm-col-2-nth">
                @foreach($servico_oferecido as $servicos)
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center feature-box-11 sm-margin-eight-bottom xs-margin-30px-bottom wow fadeInRight last-paragraph-no-margin">
                        <div class="display-inline-block padding-30px-all width-130px height-130px line-height-65 border-radius-100 bg-white text-center progress-line">
                            <!--{{$servicos->getFirstMediaUrl('servico-oferecido-imagem')}}-->
                            <img src="{{asset('site/images/circle.png')}}" alt="">
                        </div>
                        <div class="alt-font margin-30px-top margin-5px-bottom text-extra-dark-gray font-weight-600 xs-margin-15px-top">{{$servicos->titulo}}</div>
                        <p class="width-75 md-width-100 sm-width-90 center-col">@php echo $servicos->conteudo @endphp</p>
                    </div>
                @endforeach
            <!-- end feature box item -->
        </div> 
    </div>
</section>