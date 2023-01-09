<section class="wow fadeIn">
    <div class="container text-center">
        <div class="swiper-slider-clients swiper-container black-move">
            <div class="swiper-wrapper">
                @foreach($parceiro as $parceiros)   
                <!--'{{$parceiros->getFirstMediaUrl('parceiro-imagem')}}')-->
                <div class="swiper-slide text-center" style="background-image: url('{{asset('site/images/parceiro-'.$parceiros->slug .'.jpg')}}'); background-repeat: no-repeat; background-size: contain; background-position: center center; width: 100%; height: 180px;"></div>
                @endforeach
            </div>
        </div>
    </div>    
</section>

