<section class="no-padding wow fadeIn no-transition">
    <article class="content content-slider"> 
        
        <div class="container-info">
            <h2 class="text-white alt-font font-weight-600">Vida +</br>equilibrada</h2>
           
            <a data-toggle="modal" data-target="#ModalLogin" class="btn btn-small text-white sm-margin-30px-top" data-modal="@conecte">Conecte-se</a>

        </div>
        
          
       
        <div id="rev_slider_151_1_wrapper" class="rev_slider_wrapperd fullscreenbanner" data-alias="blur-effect-slider" data-source="gallery" style="background-color:#2d3032;padding:0px;">
            
            <div id="rev_slider_151_1" class="rev_slider fullscreenbanner" data-version="5.4.1">

                <ul>
                    @foreach($banner as $banners)

                          <!-- remove data-lik -->
                        <li data-index="{{$banners->id}}" data-transition="fadethroughtransparent" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="{{$banners->getFirstMediaUrl('banner-imagem')}}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1000" data-fsslotamount="7" data-saveperformance="off"  data-title="One" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                     
                            <!-- main image $banners->getFirstMediaUrl('banner-image') entender isto -->
                            <img src="{{ url('storage/imagem_banner/'.$banners->slug .'.png') }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="6" class="rev-slidebg" data-no-retina>
                            

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </article>  
</section>
<!-- loadding modal erro session user -->
@section('scripts_adicionais')
    @if(Session::get('retorno'))
        <script src="{{ asset('js/site/modal.js') }}"></script>
    @endif
@endsection                     
