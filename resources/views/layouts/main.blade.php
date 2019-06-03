<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>

    <!-- Defaults -->
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Shop') }}</title>
    <meta name="author" content="Aurelijus Pošius">
    <link rel="icon" href="/parduotuve/img/favicon.ico">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    <script src="{{ asset('js/shop.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/shop.css') }}" rel="stylesheet">

</head>

<body>

    <div id="shop" class="container">
        
        <!-- Header BEGIN -->
        <header class="shadow">
            <div class="bg-dark header-top">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand mr-auto" href="{{ url('/') }}">{{ config('app.name', 'APP.NAME NOT FOUND') }}</a>
                    <div class="m-auto">
                        <form action="{{ route('language.change') }}" method="post" class="d-flex">
                            @csrf
@if(session('lang') != 'lt')
                            <button type="submit" class="bg-transparent border-0" name="lang" value="lt"><img src="{{ asset('img/flags/flag-lt.png')}}" class="flag"></button>
@elseif(session('lang') != 'en')
                            <button type="submit" class="bg-transparent border-0" name="lang" value="en"><img src="{{ asset('img/flags/flag-usa.png')}}" class="flag"></button>
@endif
                        </form>
                    </div>
                    <ul class="navbar-nav ml-auto">
@guest
@if (Route::has('login'))
                        <a href="{{ route('login') }}">
                            <button type="button" class="btn btn-light mr-1">
                                <i class="fas fa-sign-in-alt"></i> {{ __('auth.login') }}
                            </button>
                        </a>
@endif
@if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            <button type="button" class="btn btn-light ml-1">
                                <i class="fas fa-user-plus"></i> {{ __('auth.register') }}
                            </button>
                        </a>
@endif
@else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
@if (Auth::user()->admin)
                                <a href="{{ route('admin') }}" class="dropdown-item">
                                    <i class="fas fa-user-shield"></i> {{ __('admin.title') }}
                                </a>
@endif
@if (Route::has('profile.index'))
                                <a href="{{ route('profile.index') }}" class="dropdown-item">
                                    <i class="fas fa-user"></i> {{ __('profile.title.profile') }}
                                </a>
@endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('auth.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
                                </form>
                            </div>
                        </li>
@endguest
                    </ul>
                </nav>
            </div>
            <div class="header-middle">
                <div id="header" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header" data-slide-to="0" class="active"></li>
                        <li data-target="#header" data-slide-to="1"></li>
                        <li data-target="#header" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/parduotuve/img/header1.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-shadow-1">Model S | Tesla</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/parduotuve/img/header2.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>-75% off!</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/parduotuve/img/header3.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>...</h5>
                                <p>...</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#header" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="header-bottom my-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link{{ Request::is('/') ? ' active' : NULL }}" href="{{ route('home') }}">{!! __('shop.nav.home') !!}</a>
                    </li>
                    <li class="nav-item dropdown {{ Request::is('catalog*') ? ' border' : NULL }}">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{!! __('shop.nav.categories') !!}</a>
                        <div class="dropdown-menu">
@foreach($categories as $category)
                                <a class="dropdown-item" href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
@endforeach
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('categories.index') }}">{!! __('shop.nav.categories') !!}</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ Request::is('forum*') ? ' active' : NULL }}" href="{{ route('forum.index') }}">{!! __('shop.nav.forum') !!}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ Request::is('about*') ? ' active' : NULL }}" href="{{ route('about.index') }}">{!! __('shop.nav.about') !!}</a>
                    </li>
                    <div class="ml-auto mx-3 d-flex">
                        <a href="{{ route('cart.index') }}" class="m-auto"><i class="fas fa-shopping-cart">{!! __('shop.nav.cart') !!} ({{ !empty(session('cart')) ? count(session('cart')) : '0' }})</i></a>
                    </div>
                </ul>
            </div>
        </header>
        <!-- Header END -->

        <!-- Main BEGIN -->
        <main class="container p-0">
@yield('content')
        </main>
        <!-- Main END -->
        
        <!-- Footer BEGIN -->
        <footer>
            <div class="footer-top container d-flex justify-content-around flex-column flex-md-row">
                <div class="about-us py-4 px-2 ">
                    <div class="text-white h5">{!! __('shop.footer.structure') !!}</div>
                    <div>
                        <a href="{{ route('home') }}" class="text-decoration-none d-block">{!! __('shop.nav.home') !!}</a>
                        <a href="{{ route('categories.index') }}" class="text-decoration-none d-block">{!! __('shop.nav.categories') !!}</a>
                        <a href="{{ route('forum.index') }}" class="text-decoration-none d-block">{!! __('shop.nav.forum') !!}</a>
                        <a href="{{ route('about.index') }}" class="text-decoration-none d-block">{!! __('shop.nav.about') !!}</a>
                    </div>
                </div>
                <div class="about-us py-4 px-2">
                    <div class="text-white h5">{!! __('shop.footer.contacts') !!}</div>
                    <div>
                        <p class="text-white-50 my-1 animate-icon" title="Email"><i class="far fa-envelope mr-1"></i> info@shop.com</p>
                        <p class="text-white-50 my-2 animate-icon" title="Phone"><i class="fas fa-phone mr-1"></i> +370 00 000</p>
                        <p class="text-white-50 my-1 animate-icon" title="Address"><i class="fas fa-map-marker-alt mr-1"></i> Lorem st. 00, Vilnius</p>
                    </div>
                </div>
                <div class="about-us py-4 px-2">
                    <div class="text-white h5">{!! __('shop.footer.social') !!}</div>
                    <div>
                        <a href="#" class="text-white animate-icon" title="Facebook"><i class="fab fa-facebook-square h3"></i></a>
                        <a href="#" class="text-white animate-icon" title="LinkedIn"><i class="fab fa-linkedin h3"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom container">
                <div class="text-center py-2">
                    <span>Copyright © 2019 - All Rights Reserved</span>
                </div>
            </div>
        </footer>
        <!-- Footer END -->
        
    </div>

</body>

</html>
