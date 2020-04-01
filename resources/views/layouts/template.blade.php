<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title> @yield('title') </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap.CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap.JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- jQuery 3.4.1 -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    
    <!-- Popper.js Production version -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- JS Section -->
    <!-- app.js Laravel -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- CSS Section -->
    <!-- app.css Laravel -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- extra css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <!-- All Kit -->
    <script src="https://kit.fontawesome.com/67c5570d90.js"></script>

    <!-- Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    @yield('extraHead')
</head>

@yield('style')

<body @yield('extraBody')>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            
            <!-- Navbar brand icon -->
            <a class="navbar-brand" href="{{url('/')}}"><img src={{ asset('img/logo2.png') }} id="brand-logo"></a>

            <!-- Navbar List -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                            <a class="nav-link " href="{{url('/')}}"><i class="fa fa-home"></i>Home<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="{{route('transaction.index')}}">Transaction</a>
                    </li>
<!-- 
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
-->
            
                </ul>
                
                @if(Auth::check())
                    <ul class="nav navbar-nav pull-right">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->roleID == 1)
                                    <a class="dropdown-item" href="{{url('/panelAdmin')}}">
                                        {{ __('Menú Administrador') }}
                                    </a>
                                @endif
                                @if(Auth::user()->roleID == 2)
                                    <a class="dropdown-item" href="#}">
                                        {{ __('Mi perfil') }}
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @else
                    @guest
                        <ul class="nav navbar-nav pull-right">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                                @endif
                            </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                            </li>
                        </ul>
                    @endguest
                @endif
            </div>
        </div>
    </nav>

    <main> <!-- class="py-4" para espacio-->
        @yield('content')
    </main>

    <!-- Connection -->
    <div class="socialMedia">
        <div class="container-fluid padding">
            <div class="row text-center padding">
                <div class="col-12">
                    <h2>Conéctate</h2>
                </div>
                <div class="col-12 social padding">
                    <a href="https://www.facebook.com/aiem.cl"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="https://web.whatsapp.com/send?phone=56999822311"><i class="fab fa-whatsapp"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-md-4">
                <img src={{ asset('img/logo3.png') }}>
                <hr class="light">
                <p>Teléfonos:</p>
                <p>(569) 7663 1388 - (569) 9982 2311</p
                <p>Correos: contacto@aiem.cl finanzas@aiem.cl</p>
                <p>Av. Libertador Bernardo O'higgins #949</p>
                <p>Santiago, Región Metropolitana</p>
            </div>
            <div class="col-md-4">
                <hr class="light">
                <h5>Horario</h5>
                <hr class="light">
                <p>Lunes a Viernes de 08:30 a 19:00 horas</p>
                <p>Sábados, Domingos y festivos atención vía correo.</p>
            </div>
            <div class="col-md-4">
                <hr class="light">
                <h5>Servicio de soporte</h5>
                <hr class="light">
                <p>Servicios de soporte, Servicio técnico PC y MAC</p>
                <p>Mantenciones preventivas y correctivas, Soporte Redes y TI</p>
                <p>Instalación y mantención de servidores, Seguridad Informática</p>
                <p>Implementación tecnológica y de redes, Mejoras y upgrade de sistemas</p>
            </div>
            <div class="col-12">
                <hr class="light-100">
                <h5>2020 Diseños y Soluciones Web AIEM</h5>
                <h5>Santiago - Chile</h5> 
                <h5>Copyright AIEM © 2020 Todos los derechos reservados</h5>
                <h5>&copy; www.aiem.cl | Desarrollado por Matias Gajardo Torres | Contacto: matiasgajardotorres@gmail.com</h5> 
            </div>
        </div>
        </div>
    </footer>
</body>
</html>
