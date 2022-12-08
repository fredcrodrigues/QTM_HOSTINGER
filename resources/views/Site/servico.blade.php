@extends('layouts.app')
@section('head_title', 'serviços')

@section('conteudo')    

    <section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url(' {{ asset('site/images/fundo-sobre.png') }}">
            <!-- <div class="opacity-medium bg-extra-dark-gray"></div> -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large" style="height: 150px;">
                        <div class="display-table-cell vertical-align-middle text-center">
                            <!-- start page title -->
                            <h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom">QTM Healthtech!</h1>
                            <!-- end page title -->
                            <!-- start sub title -->
                            <span class="text-white opacity6 alt-font">Ciência | Saúde e Bem-Estar | Educação</span>
                            <!-- end sub title -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h4 class="text-extra-dark-gray alt-font font-weight-600 ">{{$servico->titulo}}</h4>
                    <p class="text-medium line-height-30 text-medium-gray"> 
                    </p>
                </div>
            </div>
        </div>   

       
        <section>
            <div class="container">
                <div class="row">
                    <main class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
                        <div class="col-md-12 col-sm-12 col-xs-12 blog-details-text last-paragraph-no-margin">

                            <!-- <img src="{{$servico->getFirstMediaUrl('servico-imagem')}}" style="margin-bottom: 50px;">   -->
                        
                            @php echo $servico->descricao @endphp
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 margin-seven-bottom margin-eight-top">
                            <div class="divider-full bg-medium-light-gray"></div>
                        </div>
                        
                    </main>  
                    <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                        <div class="margin-45px-bottom xs-margin-25px-bottom text-center">
                            <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase text-small font-weight-600"><span>Agende agora o seu horário</span></div>
                            <a href="{{$servico->link}}"><img src="http://placehold.it/800x533" alt="" class="margin-25px-bottom"/></a>
                            <p class="margin-20px-bottom text-small">Clique no botão abaixo e agende agora mesmo o seu horário com um de nossos terapeutas.</p>
                            <a class="btn btn-very-small btn-dark-gray text-center text-uppercase" data-toggle="modal" data-target="#ModalLogin" data-modal="@conecte" >Agendar Agora</a>
                        </div>                                                              <!--{{$servico->link}}-->
                    </aside>
                </div>
            </div>
        </section>
@endsection