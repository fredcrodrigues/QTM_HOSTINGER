<header>
    <nav class="nav-top-main">
        <div class="container">
            <div class="container-logo" >
                 <a href="/" title="Logo QTM" >
                    <img src="{{asset('/site/images/logo-qtm-branca.png')}}"  class="width-30" ></a> 
                </a> 
            </div>
            <div id="mainlistDiv"  class="main_list">
                <ul class="navlinks">
                    <li><a title="Inicio" style="font-size: 15px; line-height: 20px;" href="#" >Inicio</a></li>
                    <li><a title="Sobre" style="font-size: 15px; line-height: 20px;" href="#Cadastro">Cadastra-se</a></li>
                    <li><a title="Serviços" style="font-size: 15px; line-height: 20px;" href="#Serviço">Serviços</a></li>
                    <!--<li><a title="Covidas" style="font-size: 15px; line-height: 20px;" href="#Covidas">Covidas</a></li>-->
                    <li><a title="Produtos" style="font-size: 15px; line-height: 20px;"  href="#Produtos">Produtos</a></li>
                    <li><a title="Covidas" style="font-size: 15px; line-height: 20px;" href="#Contato">Contato</a></li>
                </ul>
            </div>
            <span class="navTringger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>
</header>
    <!--
    <div class="top-nav">
        start logo 
        <div class="sidebar-part1">
            <a href="/" title="Logo QTM" class="logo">
                <img src="{{$configuracao->getFirstMediaUrl('logomarca-imagem')}}" data-rjs="{{ asset('site/images/logo-icon-fill@2x.png') }}" alt="Logo QTM"></a> 
        </div>
        end logo
        <div class="sidebar-part2">  sidebar define barra lateral bootstrap 
            <div class="sidebar-middle">
                <div class="sidebar-middle-menu alt-font font-weight-600">
                    <nav class="navbar bootsnav alt-font">  
                        <div id="navbar-menu" class="collapse navbar-collapse no-padding">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="/" title="Home" style="font-size: 25px; line-height: 20px;">Home</a>
                                </li>
                                <li>
                                    <a href="/sobre-nos" title="A QTM" style="font-size: 25px; line-height: 20px;">A QTM</a>
                                </li>
                                <li>
                                    <a href="/servicos" title="Serviços" style="font-size: 25px; line-height: 20px;">Serviços</a>
                                </li>
                                <li>
                                    <a href="/produtos" title="Produtos" style="font-size: 25px; line-height: 20px;">Produtos</a>
                                </li>
                                <li>
                                    <a href="/escolha-cadastro" title="Cadastre-se Conosco" style="font-size: 25px; line-height: 20px;">Cadastre-se</a>
                                </li>
                                <li>
                                    <a href="/agendamento" title="Agendamento" style="font-size: 25px; line-height: 20px;">Agendamento</a>
                                </li>
                                <li>
                                    <a href="/busca-escolha" title="busca" style="font-size: 25px; line-height: 20px;">Busca</a>
                                </li>
                                <li>
                                    <a href="covidas" title="CoVIDAS" style="font-size: 25px; line-height: 20px;">CoVIDAS</a>
                                </li>
                                <li>
                                    <a href="#" title="APP" style="font-size: 25px; line-height: 20px;">Baixe o APP</a>
                                </li>
                                <li>
                                    <div class="side-left-menu-close close-side"></div>
                                </li>
                            </ul>
                        </div>  
                    </nav>
                    <div class="icon-social-medium sm-display-none">
                        <a href="{{$configuracao->facebook}}" target="_blank" class="text-extra-dark-gray text-deep-pink-hover margin-10px-right"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                        <a href="{{$configuracao->instagram}}" target="_blank" class="text-extra-dark-gray text-deep-pink-hover margin-10px-right"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        <a href="{{$configuracao->tiktok}}" target="_blank" class="text-extra-dark-gray text-deep-pink-hover margin-10px-right"><i class="fab fa-tiktok" aria-hidden="true"></i></a>

                        
                    </div>
                    <div class="right-bg"><img src="{{ asset('site/images/logo-linearOK.png') }}" alt="QTM Healthtech"></div>
                </div>
            </div>
        </div>
        <div class="sidebar-part3">
            <div class="bottom-menu-icon">
                <a href="javascript:void(0);" class="right-menu-button text-extra-dark-gray nav-icon" id="showRightPush">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div> 
        </div>
    </div>
    -->

<!-- menu mobile -->
        <!-- <div id="menu-fixo" class="section">
            <div class="container">
                <div class="row">
                    <div  style="padding-top: 20px; padding-bottom: 20px; margin-top: 50px;">
                        <div class="col-md-2 col-xs-6 text-center">
                            <a href="/sobre-nos" class="btn btn-small btn-transparent-dark-gray border-radius-4 margin-5px-all" style="width: 100%;"><i class="fa fa-check-square-o"></i> A QTM</a>
                        </div>    
                    
                        <div class="col-md-2 col-xs-6 text-center">
                            <a href="/escolha-cadastro" class="btn btn-small btn-transparent-dark-gray border-radius-4 margin-5px-all" style="width: 100%;"><i class="fa fa-check-square-o"></i> Cadastre-se</a>
                        </div>
            
                        <div class="col-md-2 col-xs-6 text-center">
                            <a href="/servicos" class="btn btn-small btn-transparent-dark-gray border-radius-4 margin-5px-all" style="width: 100%;"><i class="fa fa-check-square-o"></i> Serviços</a>
                        </div>
            
                        <div class="col-md-2 col-xs-6 text-center">
                            <a href="/produtos" class="btn btn-small btn-transparent-dark-gray border-radius-4 margin-5px-all" style="width: 100%;"><i class="fa fa-check-square-o"></i> Produtos</a>
                        </div>
            
                        <div class="col-md-2 col-xs-6 text-center">
                            <a href="/agendamento" class="btn btn-small btn-transparent-dark-gray border-radius-4 margin-5px-all" style="width: 100%;"><i class="fa fa-check-square-o"></i> Agendamento</a>
                        </div>

                        <div class="col-md-2 col-xs-6 text-center">
                            <a href="/covidas" class="btn btn-small btn-transparent-dark-gray border-radius-4 margin-5px-all" style="width: 100%;"><i class="fa fa-check-square-o"></i> Covidas</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div> -->
        
        <!-- fim menu mobile -->

        