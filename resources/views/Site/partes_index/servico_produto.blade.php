<section class="wow fadeIn no-padding" id="Cadastro" >
    <div class="swiper-auto-height-container position-relative width-100">
        <div class="swiper-wrapper overflow-hidden">
            <!-- start slider item -->

            @foreach($slide as $slides)
                <div class="swiper-slide padding-100px-all cover-background position-relative xs-padding-20px-all" style="background-image:url('{{ asset('site/images/fundo-depoimento.png')}}');">
                    <div class="position-relative width-40 md-width-60 sm-width-85 xs-width-100 display-inline-block slide-banner last-paragraph-no-margin">
                        <div class="padding-80px-all bg-black-opacity sm-padding-40px-all xs-padding-30px-all xs-text-center xs-width-100">
                            <h5 class="alt-font text-white width-90 sm-width-100">{{$slides->titulo}}</h5>
                            <p class="width-90 sm-width-100">
                                @php echo $slides->conteudo @endphp
                            </p>
                            <a id="modalCadastro" data-toggle="modal" data-target="#ModalEscolha" class="margin-35px-top sm-margin-15px-top  btn btn-small display-4 p-2 btn-white">{{$slides->botao}}</a>
                        </div> 
                    </div>
                </div>
            @endforeach
            <!-- end slider item -->

          
        </div>
        <div class="navigation-area">
            <div class="swiper-button-next swiper-next-style4 bg-primary text-white"><i class="fas fa-arrow-up" aria-hidden="true"></i></div>
            <div class="swiper-button-prev swiper-prev-style4"><i class="fas fa-arrow-down" aria-hidden="true"></i></div>
        </div>
    </div>
</section>

@section('scripts_adicionais')
    <script src="{{ asset('js/site/modal.js') }}"></script>
@endsection      