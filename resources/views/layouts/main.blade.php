<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('meta')
        
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome/css/all.min.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet">
        <link href="{{ asset('js/OwlCarousel2-2.3.4/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('js/OwlCarousel2-2.3.4/owl.theme.default.css') }}" rel="stylesheet">
        <link href="{{ asset('js/toastr/toastr.min.css') }}" rel="stylesheet">
        <link href="{{ asset('js/slick-1.8.1/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('js/slick-1.8.1/slick-theme.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        @yield('head')

    </head>
    <body>
        <header class="header container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="logo"><a href="/">News CMS</a></h2>
                </div>
                <div class="col-md-5">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </header>

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbarSupportedContent">
                <div class="collapse navbar-collapse" id="navbarNav">
                <x-categories></x-categories>
                </div>
            </nav>
        </div>

        <div class="content">
            <div class="container">
                <div class="content-box">
                    @yield('content')
                </div>
            </div>
        </div>

        <footer class="footer">
            Footer
        </footer>

        @if(session('status'))
        {{session('status')}}
        @endif


        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        {{-- <script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
        <script src="{{ asset('js/OwlCarousel2-2.3.4/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('js/slick-1.8.1/slick.min.js') }}"></script> --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}"></script>
        
        @yield('scripts')

    </body>
</html>
