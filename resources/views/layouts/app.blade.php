<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-primary shadow-sm" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    InpoEvent
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav nav-pills me-auto">
                        @guest
                        @if (Route::has('login') || Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link @yield('menuHome')" href="/">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('menuLomba')" href="/lomba">{{ __('Lomba') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('menuAbout')" href="/abou">{{ __('About Us') }}</a>
                        </li>
                        @endif
                        @else
                        @if (auth()->user()->level == 1)
                        <li class="nav-item">
                            <a class="nav-link @yield('menuDashboard')" href="/admin/dashboard">Dashboard Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('menuAbout')" href="/abou">{{ __('About Us') }}</a>
                        </li>
                        @elseif (auth()->user()->level == 2)
                        <li class="nav-item">
                            <a class="nav-link @yield('menuDashboard')" href="/penyelenggara/dashboard">Dashboard Penyelenggara</a>
                        </li>
                        @elseif (auth()->user()->level == 3)
                        <li class="nav-item">
                            <a class="nav-link @yield('menuHome')" href="/">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('menuLomba')" href="/lomba">{{ __('Lomba') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('')" href="">{{ __('Lomba Anda') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('menuAbout')" href="/abou">{{ __('About Us') }}</a>
                        </li>
                        @else
                        @endif
                        @endguest
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav nav-pills ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link @yield('menuLogin')" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link @yield('menuRegister')" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nama_lengkap }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-primary text-white">
        <div>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Info Lomba
                        </h6>
                        <p>
                            Info Lomba
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Menu
                        </h6>
                        <p>
                            <a href="/tiket/pesawat" class="text-reset text-decoration-none">Info Lomba</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Our Social Media
                        </h6>
                        <p>
                            <a href="#!" class="text-reset text-decoration-none">Facebook</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset text-decoration-none">Instagram</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset text-decoration-none">Twitter</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset text-decoration-none">Youtube</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact Us
                        </h6>
                        <p><i class="fas fa-home me-3"></i> Malang</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            admin@infoevent.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> +62 812 345 6789</p>
                        <p><i class="fas fa-print me-3"></i> +62 345 678 9101</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            Sistem Informasi Perlombaan |
            Copyright &copy; {{ date("Y") }}
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>