<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        @yield('meta')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('js/OwlCarousel2-2.3.4/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('js/OwlCarousel2-2.3.4/owl.theme.default.css') }}" rel="stylesheet">
        <link href="{{ asset('js/toastr/toastr.min.css') }}" rel="stylesheet">
        <link href="{{ asset('js/slick-1.8.1/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('js/slick-1.8.1/slick-theme.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
        <script src="{{ asset('js/OwlCarousel2-2.3.4/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('js/slick-1.8.1/slick.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="content">
            <div class="container">
                <div class="row header">
                    <div class="col-md-12">
                        <h2 class="logo"><a href="/">Кулинарные видео рецепты</a></h2>
                    </div>
                </div>
                <div class="row content-box">
                    <div class="col-md-3">
                        <x-categories></x-categories>
                    </div>
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">

        </footer>

        @if(session('status'))
        {{session('status')}}
        @endif
    </body>
</html>
