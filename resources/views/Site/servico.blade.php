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

    <div class="container" style="background-color: #F5F5F5; width: 100%;">
            <div class="row">
                <div class="col-sm-12 text-center col-filter-input">
                
                   <div class="filter col-sm-12 col-md-6 col-lg-6" style="margin: none; padding: 20px;">
                        <input type="text"  class="big-input" placeholder="Digite o serviço que você deseja" autofocus>
                        <span class="icon-input">
                            <i class="material-icons">tune</i>
                        </span>
                    </div>
                
                </div>
            </div>
    </div>   

    <section>
            <div class="container">
                <div class="card-deck"> 
                        @foreach ($servicos as $servico)
                             <div  class="card margin-50px-bottom " id="{{$servico -> titulo}}">         
                                    <span class="display-none">{{$images = $servico->slug}}</span>
                                    <div class="over-img" data-toggle="modal"  data-target="#ModalServico"  data-title="{{$servico->titulo}}" data-whatever="{{$servico->saiba_mais}}">
                                        <a > Saiba Mais</a>
                                    </div>  
                                                                                                      
                                    <div class="card-img-top" style="background-image: url({{asset('site/images/servico/'.trim($images.'.JPG',''))}})"> </div>
                                                                
                                    <div class="card-body" >
                                        <h6 class="card-title text-center">{{$servico -> titulo}}</h6>
                                        <p class="card-text text-justify  md-width-100 xs-width-100 sm-margin-lr-auto text-medium-gray">{{ $servico->descricao }}</p> 
                                    </div>
                                    <div class="card-footer">
                                        <a data-toggle="modal" data-target="#ModalLogin" data-modal="@conecte" class="btn btn-small btn-deep-pink btn-rounded">Agendar</a>
                                    </div>
                                </div>
                            
                        @endforeach
                </div>
            </div>
         
    </section>
        

@endsection


@section('scripts_adicionais')
<script src="{{ asset('js/site/filtro_servico.js') }}"></script>
@endsection

<!--- Modal -->
<div class="modal fade" id="ModalServico" tabindex="-1" role="dialog" aria-labelledby="ModalServico" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!--  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        
             
            
            <div class="modal-body">   
                    <div class="container-text">
                        <h5 class="font-weight-500 text-uppercase text-center alt-font text-extra-dark-gray center-col sm-padding-50px  sm-padding-50px width-100 margin-25px-bottom xs-width-100"></h5>
                    </div>
                        <div class="container-servico ">
                            <p style="text-align:justify; font-size:15px;"> </p>
                        </div>
                        
                    <div class="modal-footer">
                
                    </div>
            </div>
         </div>
    </div> 
</div>