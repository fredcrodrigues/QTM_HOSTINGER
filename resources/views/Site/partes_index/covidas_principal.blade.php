<section class="wow fadeIn" id="Covidas">
    <div class="container"> 
        <div class="row equalize md-equalize-auto">
            <div class=" col-lg-6 col-md-6  col-sm-12  col-xs-12  text-center display-table xs-margin-15px-bottom wow fadeIn">
                <div class="display-table-cell vertical-align-middle">
                    <img src="{{asset('site/images/covidas.png')}}" alt="" class="width-70">

                </div>
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding display-table md-margin-five-top sm-text-center xs-no-margin-top wow fadeIn" data-wow-delay="0.4s">
                <div class="display-table-cell vertical-align-middle padding-twelve-lr md-padding-15px-lr xs-text-center xs-padding-five-lr xs-padding-ten-top width-100">
                    <h4 class="font-weight-600 alt-font text-extra-dark-gray letter-spacing-minus-1">{{$covidas_principal->titulo}}</h4>
                    @php echo $covidas_principal->conteudo @endphp
                    <a href="/covidas" class="btn btn-small btn-dark-gray">Conheça mais sobre o CoVIDAS</a>
                </div>
            </div>
        </div>
    </div>
</section>