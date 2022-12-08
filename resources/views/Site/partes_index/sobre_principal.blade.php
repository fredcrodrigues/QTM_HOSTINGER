<section class="wow fadeIn">
    <div class="container"> 
        <div class="row equalize md-equalize-auto">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center display-table xs-margin-15px-bottom wow fadeIn">
                <div class="display-table-cell vertical-align-middle">
                    <!--{{$sobre_principal->getFirstMediaUrl('sobre-principal-01')}}-->
                    <img src="{{asset('site/images/imagem-lateral-2.png')}}" alt="" class="width-100">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center display-table wow fadeIn" data-wow-delay="0.2s">
                <div class="display-table-cell vertical-align-middle">
                    <!--$sobre_principal->getFirstMediaUrl('sobre-principal-02')}-->
                    <img src="{{asset('site/images/imagem-lateral.png')}}" alt="" class="width-100">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 no-padding display-table md-margin-five-top sm-text-center xs-no-margin-top wow fadeIn" data-wow-delay="0.4s">
                <div class="display-table-cell vertical-align-middle padding-twelve-lr md-padding-15px-lr xs-text-center xs-padding-five-lr xs-padding-ten-top width-100">
                    <h4 class="font-weight-600 alt-font text-extra-dark-gray letter-spacing-minus-1">{{$sobre_principal->titulo}}</h4>
                    @php echo $sobre_principal->conteudo @endphp
                    <a href="/sobre-nos" class="btn btn-small btn-dark-gray">Conheça mais sobre nós</a>
                </div>
            </div>
        </div>
    </div>
</section>