@extends('layouts.app')
@section('head_title', 'Cadastre-se')

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
                            <span class="text-white opacity6 alt-font">Ciência | Saúde e Bem-Estar | Tecnologia</span>
                            <!-- end sub title -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        <section class="wow fadeIn" id="start-your-project">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Cadastre-se e tenha a sua consulta agendada com os profissionais de nossa plataforma</span>
                        </div>
                    </div>
                </div>
                
                <x-alert :alerta="Session::get('retorno')"></x-alert> 
                <x-erro :erros=$errors> </x-erro> 

                <form id="formGeral">
                   @csrf
                    <div id="form" class="row">
                        
                        <div class="col-md-4 display-none" >
                            <label>Agendamento para:<span style="color: red;">*</span></label>
                            <div class="select-style big-select" disabled>
                                <select name="selecao" id="selecao" class="select2 bg-transparent no-margin-bottom @error('selecao') is-invalid @enderror" disabled>
                                     <option value="profissional" {{ ($tipo == "profissional" ? "selected":"") }}>Profissional</option>
                                     <option value="coworking" {{ ($tipo == "coworking" ? "selected":"") }}>Coworking</option>
                                </select>
                            </div>   
                        </div>
                        <div class="col-md-8 display-none">
                             <label>Nome do Local/Profissional<span style="color: red;">*</span></label>
                            <input type="text" name="profissional_local" id="profissional_local" class="big-input" value="{{$profissional_local ?? 'não possui'}}" disabled>
                            <input type="hidden" name="user_profissional" id="user_profissional" value="{{$slug_user_agendamento ?? ''}}">
                            <input type="hidden" name="user_cliente" id="user_cliente" value="{{$user->slug}}">
                            <input type="hidden" name="tipo" id="tipo" value="{{$tipo}}">
                        </div>  
                        <div class="col-md-6 display-none">
                             <label>Nome do Cliente<span style="color: red;">*</span></label>
                            <input type="text" name="nome" id="nome" placeholder="Nome Completo" class="big-input @error('nome') is-invalid @enderror" value="{{ $user->nome }}" disabled>
                        </div>
                        <div class="col-md-6 display-none ">
                             <label>E-Mail<span style="color: red;">*</span></label>
                             <input type="email" name="email" id="email" placeholder="example@email.com" class="big-input @error('email') is-invalid @enderror" value="{{ $user->email }}" disabled>
                        </div> 
                        
                        @if($tipo == "profissional")
                           
                            <div class="col-md-12 text-center" >
                                <hr>
                                <h6>Formulário de agendamento para profissional </h6>
                            </div>
                            <div class="col-md-12" >
                            
                                <label>Qual cidade deseja atendimento?</label>
                                <input id="cidade"  placeholder="Cidade/UF" type="text" class="big-input">

                            </div>
                            <div class="col-md-6 selectpicker">
                                <label>Como prefere ser contatado?</label>
                                <select id="contato" class="selectpicker  form-control"   data-width="100%"  title="Selecione..." multiple > 
                                    <option>Whatsapp</option>
                                    <option>Ligação</option>
                                    <option>Email</option>
                                </select>
                                
                            </div>
                            <div class="col-md-6 selectpicker ">
                                <label>Qual tipo de serviço você deseja</label>
                                <select id="servicos"  class="selectpicker form-control big-input" title="Selecione..." data-width="100%" multiple> 
                                    <option>Alinhamento de Chakras</option>
                                    <option>Mapa Astral Védico</option>
                                    <option>Psicoterapia</option>
                                    <option>Tarô Terapêutico</option>
                                    <option>Reiki</option>
                                    <option>Barras de Acesso</option>
                                    <option>Hipnose</option>
                                    <option>Face Lifting</option>
                                    <option>Massoterapia</option>
                                    <option>Cristalterapia</option>
                                    <option>Revolução Solar</option>
                                    <option>Fitoterapia</option>
                                    
                                </select>
                            </div>  
                            <div class="col-md-6 selectpicker ">
                                    <label>Que tipo de atendimento você deseja?</label>
                                    <select id="atendimeto" class="selectpicker  form-control big-input" title="Selecione..." data-width="100%" > 
                                        <option>Online</option>
                                        <option>Presencial</option>
                                        <option>Assícrono</option>            
                                    </select>
                            </div>  

                            <div class="col-md-6 selectpicker ">
                                <label>Você prefere ser atendido por:</label>
                                <select id="preferencias" class="selectpicker  form-control big-input" title="Selecione..."  data-width="100%" > 
                                    <option>Mulher</option>
                                    <option>Homem</option>
                                    <option>LGBTQIA+</option>            
                                </select>
                            </div>  

                            <div class="col-md-12">
                                <div class="cotent-info">
                                    <div class="content-urgency">
                                        <input id="urgencia" type="checkbox" style="width:5%;">
                                        <label>Atendimento de Urgência</label>
                                    </div>
                                    <div  class="content-services">
                                        <input id="informacoes" type="checkbox"  style="width:5%;">
                                        <label>Desejo receber informações sobre os nossos serviços</label>
                                        
                                    </div> 
                                </div>
                            </div>

                        @else  
                         
                            <div class="col-md-12 text-center" id="tipo" value="coworking">
                                <hr>
                                <h6>Formulário para agendamento</h6>
                            </div>
                            

                            <div  class="col-md-12" >
                            
                                <label>Qual cidade deeseja atedimento?</label>
                                <input id="cidade"  placeholder="Cidade/UF" type="text" class="big-input">
                                
                            </div>
                            <div  class="col-md-6 selectpicker " >
                                <label>Como prefere ser contatado?</label>
                                <select id="contato" class="selectpicker form-control"  data-width="100%"  title="Selecione..." multiple > 
                                    <option>Whatsapp</option>
                                    <option>Ligação</option>
                                    <option>Email</option>
                                </select>
                            </div>
                            <div class="col-md-6 selectpicker ">
                                <label>Qual tipo de serviço você deseja</label>
                                <select id="servico" class="selectpicker form-control big-input" title="Selecione..." data-width="100%" multiple> 
                                    <option>Alinhamento de Chakras</option>
                                    <option>Mapa Astral Védico</option>
                                    <option>Psicoterapia</option>
                                    <option>Tarô Terapêutico</option>
                                    <option>Reiki</option>
                                    <option>Barras de Acesso</option>
                                    <option>Hipnose</option>
                                    <option>Face Lifting</option>
                                    <option>Massoterapia</option>
                                    <option>Cristalterapia</option>
                                    <option>Revolução Solar</option>
                                    <option>Fitoterapia</option>
                                    
                                </select>
                            </div>  
                            <div class="col-md-12">
                                <div class="cotent-info">
                                    <div class="content-urgency">
                                    
                                        <input id="urgencia" type="checkbox" style="width:5%;">
                                        <label>Atendimento de Urgência</label>
                                    </div>
                                    <div  class="content-services">
                                        <input id="informacoes" type="checkbox"  style="width:5%;">
                                        <label>Desejo receber informções sobre os nossos serviços</label>
                                        
                                    </div> 
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12 text-center">
                            <button id="save" type="button" class="btn btn-transparent-dark-gray btn-large margin-20px-top" style="padding-right:44px; padding-left:44px;">agendar</button>
                        </div>
                                
                    </div>
                </form>
            </div>
        </section>
    

@endsection
@section('scripts_adicionais')
<script src="{{ asset('js/site/base.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweet.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('plugins/formbuilder/form-render.min.js') }}"></script>
  <script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/site/agendamento.js') }}"></script>
@endsection                     