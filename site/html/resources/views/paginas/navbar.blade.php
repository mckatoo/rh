<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/navbar-brand.png') }}" alt="IESI - Comissão Própria de Avaliação" /></a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-database fa-fw"></i> Cadastros <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
            {{--  @if (Auth::user()->tipo->tipo !== 'Professor')  --}}
                <li>
                    <a href="{{ route('registro') }}">
                        <i class="fa fa-user fa-fw"></i>
                        <div class="inline">
                            Usuários
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
            {{--  @endif  --}}
                <li>
                    <a href="{{ route('cursos.index') }}">
                        <i class="fa fa-twitter fa-fw"></i>
                        <div class="inline">
                            Cursos
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('publicacoes.tipo') }}">
                        <i class="glyphicon glyphicon-education"></i>
                        <div class="inline">
                            Tipo de Publicações
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('producoes.tipo') }}">
                        <i class="fa fa-twitter fa-fw"></i>
                        <div class="inline">
                            Tipo de Produções
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-users fa-fw"></i>
                
                @if (Auth::check())
                    {{ Auth::user()->name }}
                @else
                    {{ $user[0]['name'] }}
                @endif
                
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    {{--  <a href="{{ route('perfil',Auth::user()->id) }}">  --}}
                    <div class="inline">
                        Perfil
                    </div>
                    {{--  </a>  --}}
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i>
                    <div class="inline">
                        Sair
                    </div>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Procurar...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="{{ url('/') }}"><i class="fa fa-dashboard fa-fw"></i> Principal</a>
                </li>
                <li>
                    <a href="{{ route('relatorios.index') }}"><i class="fa fa-file-text fa-fw"></i> Relatórios</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Futuras Implementações<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
