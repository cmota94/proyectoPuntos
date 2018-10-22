<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sistema de puntos FCA @yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="shortcut icon" href="https://www.portalautomotriz.com/sites/portalautomotriz.com/files/styles/colorbox-open/public/media/photos/00072273-original.jpeg?itok=DU_kg609" type="image/x-icon">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('lib/nivo-slider/css/nivo-slider.cs') }}s" rel="stylesheet">
  <link href="{{ asset('lib/owlcarousel/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/owlcarousel/owl.transitions.cs') }}s" rel="stylesheet">
  <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/venobox/venobox.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

  <!-- Nivo Slider Theme -->
  <link href="{{ asset('css/nivo-slider-theme.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false" style="color: white;">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar" style="background-color: white;"></span>
										<span class="icon-bar" style="background-color: white;"></span>
										<span class="icon-bar" style="background-color: white;"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="{{ url('/eventos') }}">
                  <h3 class="unam"><img src="http://arquitectura.unam.mx/uploads/8/1/1/0/8110907/_2634437_orig.png" width="45px" alt="Logo UNAM">UNAM</h3>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!--<img src="http://www.politicayestilo.com/wp-content/uploads/2010/04/UNAM-2.gif" alt="" title="" width="50px">-->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="{{ url('eventos/') }}"><span class="fa-home fa"></span>Home</a>
                  </li>
                  <!-- Titular cultural -->
                     @if (Auth::user()->usu_idrol == 1)

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Buscar</a>
                          <a href="" style="color: black">Registrar</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Buscar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Logout</a>
                          <a href=""></a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar puntos <span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Registrar</a>
                          <a href="" style="color: black">Generar reporte</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar inscripción<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Logout</a>
                          <a href=""></a>
                        </li>
                      </ul>
                  </li>
                  <!-- Responsable cultural -->
                  @elseif (Auth::user()->usu_idrol == 2)

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Buscar</a>
                          <a href="" style="color: black">Registrar</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Buscar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Buscar</a>
                          <a href="" style="color: black">Registrar</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar puntos <span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Registrar</a>
                          <a href="" style="color: black">Generar carta express</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar inscripción<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Registrar</a>
                          <a href="" style="color: black">Buscar</a>
                        </li>
                      </ul>
                  </li>
                  
                  <!-- Titular de responsabilidad social-->
                  @elseif (Auth::user()->usu_idrol == 3)

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Buscar</a>
                          <a href="" style="color: black">Registrar</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Buscar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Buscar</a>
                          <a href="" style="color: black">Registrar</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar puntos <span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Registrar</a>
                          <a href="" style="color: black">Generar reporte</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar inscripción<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Registrar</a>
                          <a href="" style="color: black">Buscar</a>
                        </li>
                      </ul>
                  </li>

                   <!-- Responsable de responsabilidad social-->
                  @elseif (Auth::user()->usu_idrol == 4)

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Buscar</a>
                          <a href="" style="color: black">Registrar</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Buscar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Buscar</a>
                          <a href="" style="color: black">Registrar</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar puntos <span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Registrar</a>
                          <a href="" style="color: black">Generar reporte</a>
                          <a href="" style="color: black">Generar carta exprés</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar inscripción<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Registrar</a>
                          <a href="" style="color: black">Buscar</a>
                        </li>
                      </ul>
                  </li>

                   <!-- Titular deportivo -->
                  @elseif (Auth::user()->usu_idrol == 5)

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Buscar</a>
                          <a href="" style="color: black">Registrar</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Buscar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Buscar</a>
                          <a href="" style="color: black">Registrar</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar puntos <span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Registrar</a>
                          <a href="" style="color: black">Generar reporte</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar inscripción<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Registrar</a>
                          <a href="" style="color: black">Buscar</a>
                        </li>
                      </ul>
                  </li>

                   <!-- Responsable deportivo-->
                  @elseif (Auth::user()->usu_idrol == 6)

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Buscar</a>
                          <a href="" style="color: black">Registrar</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Buscar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Buscar</a>
                          <a href="" style="color: black">Registrar</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar puntos <span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Registrar</a>
                          <a href="" style="color: black">Generar reporte</a>
                          <a href="" style="color: black">Generar carta exprés</a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar inscripción<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Registrar</a>
                          <a href="" style="color: black">Buscar</a>
                        </li>
                      </ul>
                  </li>

                   <!-- Responsable proyectos especiales-->
                  @elseif (Auth::user()->usu_idrol == 7)

                    
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar puntos <span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Generar constancias</a>
                        </li>
                      </ul>
                    </li>

                    <!-- Administracion escolar -->
                  @elseif (Auth::user()->usu_idrol == 8)

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar puntos <span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Generar constancias</a>
                        </li>
                      </ul>
                    </li>
                  
                   <!-- Administrador del sistema -->
                  @elseif (Auth::user()->usu_idrol == 11)

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{ url('/eventos') }}" style="color: black">Buscar <span class="fa fa-search "></span></a>
                          <a href="{{ url('/eventos/registrar') }}" style="color: black">Registrar <span class="fa fa-pencil "></span></a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar puntos <span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{ url('/eventos/constancias') }}" style="color: black">Generar constancia <span class="fa fa-book"></span></a>
                          <a href="{{ url('/eventos/cartas') }}" style="color: black">Generar carta exprés <span class="fa-envelope-o fa"></span></a>
                          <a href="{{ url('/eventos/historialIndex') }}" style="color: black">Historial puntos <span class="fa fa-list-alt "></span></a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar inscripción<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="" style="color: black">Registrar <span class="fa fa-pencil "></span></a>
                          <a href="{{ url('/inscripciones') }}" style="color: black">Buscar <span class="fa fa-search "></span></a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar usuarios<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{ url('/usuarios/registrar') }}" style="color: black">Registrar <span class="fa fa-pencil "></span></a>
                          <a href="{{ url('/usuarios') }}" style="color: black;">Buscar <span class="fa fa-search "></span></a>
                        </li>
                      </ul>
                    </li>

                    @elseif (Auth::user()->usu_idrol == 12)

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Administrar Eventos<span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{ url('/eventos') }}" style="color: black">Buscar <span class="fa fa-search "></span></a>
                          <a href="{{ url('/eventos/registrar') }}" style="color: black">Registrar <span class="fa fa-pencil "></span></a>
                        </li>
                      </ul>
                    </li>                
                    @endif
                  

                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="fa fa-user-o"></span>
                           {{ Auth::user()->usu_nombre }} <span class="caret"></span>
                      </a>
         
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: black;">
                            <span class="fa-sign-out fa"></span> Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}                                        
                          </form>
                        </li>
                      </ul>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div><br><br><br>
    <!-- header-area end -->
  </header><br>
  <!-- header end -->

  <!-- Contenedor principal -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        @yield('contenido')
      </div>
    </div>
  </div><br><br><br>
  <!-- Fin del contenedor principal -->

  <footer class="footer">
    <div class="container"><br>
      <p class="text-center menu">Hecho en México, D.R. &copy; 2018. Sitio web administrado por el Centro de Informática de la Facultad de Contaduría y Adminisración (CIFCA)</p>
    </div>
  </footer>



  <!--<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>-->

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.min.j') }}s"></script>
  <script src="{{ asset('lib/owlcarousel/owl.carousel.min.j') }}s"></script>
  <script src="{{ asset('lib/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('lib/knob/jquery.knob.j') }}s"></script>
  <script src="{{ asset('lib/wow/wow.min.j') }}s"></script>
  <script src="{{ asset('lib/parallax/parallax.js') }}"></script>
  <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('lib/nivo-slider/js/jquery.nivo.slider.j') }}s" type="text/javascript"></script>
  <script src="{{ asset('lib/appear/jquery.appear.j') }}s"></script>
  <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  
  



  <!-- Uncomment below if you want to use dynamic Google Maps -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script> -->
  <!-- Latest compiled and minified JavaScript -->

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <script src="{{ asset('js/main.js') }}"></script>
  @yield('js')

</body>

</html>
