<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/area-restrita/home" class="brand-link elevation-4">
        <li class='fa fa-cogs'></li> <span class="brand-text font-weight-light"> <b>GERENCIADOR</b> </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <?php $primeiroNome = explode(' ', Auth::user()->nome); ?>
                <a href="#" class="d-block"> Olá, {{$primeiroNome[0]}}</a>
                <!-- <span  class="right badge badge-info">{{ Str::of(Auth::user()->getRoleNames())->replaceMatches('/[^A-Za-z0-9]++/', '') }}</span> -->
            </div>
            <br>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="/area-restrita/banner" class="nav-link">
                        <i class="nav-icon fas fa-images  "></i>
                        <p>
                            Banners
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/area-restrita/colaborador" class="nav-link">
                        <i class="nav-icon fas fa-user-circle  "></i>
                        <p>
                            Colaboradores
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/area-restrita/cliente-adm" class="nav-link">
                        <i class="nav-icon fas fa-users  "></i>
                        <p>
                            Clientes Cadastrados
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/area-restrita/profissional-adm" class="nav-link">
                        <i class="nav-icon fas fa-user  "></i>
                        <p>
                            Profissionais Ativos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/area-restrita/coworking-adm" class="nav-link">
                        <i class="nav-icon fas fa-building  "></i>
                        <p>
                            Coworking Ativos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/area-restrita/agendamento" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Agendamentos Finalizados
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/area-restrita/parceiros" class="nav-link">
                        <i class="nav-icon fas fa-users  "></i>
                        <p>
                            Parceiros
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/area-restrita/configuracao" class="nav-link">
                        <i class="nav-icon fas fa-cogs  "></i>
                        <p>
                            Configuração
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/area-restrita/covidas-adm" class="nav-link">
                        <i class="nav-icon fas fa-heartbeat "></i>
                        <p>
                            Covidas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Modelo de Formulário <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/area-restrita/profissional-adm/agendamento" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Profissional
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/area-restrita/coworking-adm/agendamento" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Coworking
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user nav-icon"> </i>
                        <p>Sobre Nós <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/area-restrita/sobre-nos-conteudo" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Conteúdo
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/area-restrita/sobre-nos-principal" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Principal
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/area-restrita/sobre-nos-secundario" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Secundário
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/area-restrita/time-qtm" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Time
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-handshake"> </i>
                        <p>Serviços <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/area-restrita/servicos" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>
                                    QTM
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/area-restrita/servico-oferecido" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Agregados
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-box"></i>
                        <p>Produtos <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/area-restrita/produto-conteudo" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Alterar Descrição
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/area-restrita/produto" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Gerenciar
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
               
                <li class="nav-item">
                    <a href="{{ url('area-restrita/logout') }}" class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fa-power-off"></i>
                        <p>
                            Sair da Conta
                        </p>
                    </a>
                    <form id="logout-form" action="{{ url('area-restrita/logout') }}" method="POST"
                        style="display: none;">
                        {{ csrf_field() }}
                        <input type="submit" value="logout" style="display: none;">
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>