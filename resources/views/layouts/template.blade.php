<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sculpt Dental </title>

    <!-- Bootstrap -->
    <link href=" {{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }} " rel="stylesheet">
    <!-- Font Awesome -->
    <link href=" {{ asset('vendors/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet">
    <!-- NProgress -->
    <link href=" {{ asset('vendors/nprogress/nprogress.css') }} " rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href=" {{ asset('build/css/custom.min.css') }} " rel="stylesheet">
    <!-- jQuery -->
    <script src=" {{ asset('vendors/jquery/dist/jquery.min.js') }} "></script>

    @stack('styles')

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href=" {{ route('inicio') }} " class="site_title"><i class="fa fa-user-md"></i> <span>SculptDental</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src=" {{ asset('img/template/user_sesion.png') }} " alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2> {{ Auth::user()->name }} </h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                  @can('menu.doctors')
                    <li><a><i class="fa fa-user-md"></i>Doctores<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        @can('doctors.create')
                          <li class="sub_menu"><a href=" {{ route('doctors.create') }} ">Agregar</a>
                          </li>
                        @endcan
                        @can('doctors.index')
                          <li><a href=" {{ route('doctors.index') }} ">Lista</a>
                          </li>
                        @endcan
                      </ul>
                    </li>
                  @endcan

                  @can('menu.clients')
                    <li><a><i class="fa fa-users"></i>Clientes<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        @can('users.create')
                          <li class="sub_menu"><a href=" {{ route('users.create') }} ">Agregar</a>
                          </li>
                        @endcan
                        @can('users.index')
                          <li><a href=" {{ route('users.index') }} ">Lista</a>
                          </li>
                        @endcan
                      </ul>
                    </li>
                  @endcan

                  @can('menu.quotes')
                    <li><a><i class="fa fa-calendar-o"></i> Citas <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">

                        @can('quotes.create')
                          <li><a href=" {{ route('quotes.create') }} ">Buscar cliente</a></li>
                        @endcan

                        @can('quotes.index')
                          <li><a href=" {{ route('quotes.index') }} ">Calendario</a></li>
                        @endcan

                      </ul>
                    </li>
                  @endcan

                  @can('doctors.calendar')
                    <li><a href=" {{ route('doctor_calendar') }} "><i class="fa fa-calendar-o"></i> Mis citas</a>
                    </li>
                  @endcan                  

                  @can('menu.services')
                    <li><a><i class="fa fa-hospital-o"></i>Tratamientos<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        @can('services.create')
                          <li><a href=" {{ route('services.create') }} ">Nuevo</a></li>
                        @endcan
                        @can('services.index')
                          <li><a href=" {{ route('services.index') }} ">Lista</a></li>
                        @endcan
                      </ul>
                    </li> 
                  @endcan

                  @can('menu.services')
                    <li><a><i class="fa fa-list-ol"></i>Paquetes<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        @can('services.create')
                          <li><a href=" {{ route('packages.create') }} ">Nuevo</a></li>
                        @endcan
                        @can('services.index')
                          <li><a href=" {{ route('packages.index') }} ">Lista</a></li>
                        @endcan
                      </ul>
                    </li> 
                  @endcan                                                  
                   
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src=" {{ asset('img/template/user_sesion.png') }}"  style="width: 40px; height: 40px"  alt=""> {{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i>Salir</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>    
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        @yield('content')

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Sistema de Administracion | Sculpt Dental
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    <!-- Bootstrap -->
    <script src=" {{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }} "></script>
    <!-- FastClick -->
    <script src=" {{ asset('vendors/fastclick/lib/fastclick.js') }} "></script>
    <!-- NProgress -->
    <script src=" {{ asset('vendors/nprogress/nprogress.js') }} "></script>
    
    <!-- Custom Theme Scripts -->
    <script src=" {{ asset('build/js/custom.min.js') }} "></script>

    @stack('scripts')

  </body>
</html>
