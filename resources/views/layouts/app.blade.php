<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Shop')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Free HTML5 Website Template')" />
    <meta name="keywords" content="@yield('meta_keywords', 'html5, css3, bootstrap, responsive')" />
    <meta name="author" content="gettemplates.co" />

    <!-- Social Meta -->
    <meta property="og:title" content="@yield('og_title', 'Shop')" />
    <meta property="og:image" content="@yield('og_image')" />
    <meta property="og:url" content="@yield('og_url')" />
    <meta property="og:site_name" content="@yield('og_site_name', 'Shop')" />
    <meta property="og:description" content="@yield('og_description')" />
    <meta name="twitter:title" content="@yield('twitter_title')" />
    <meta name="twitter:image" content="@yield('twitter_image')" />
    <meta name="twitter:url" content="@yield('twitter_url')" />
    <meta name="twitter:card" content="@yield('twitter_card', 'summary_large_image')" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Modernizr -->
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>

    @stack('styles')
</head>

<body>
    <div class="fh5co-loader"></div>

    <div id="page">
        {{-- ✅ Header --}}
        @include('layouts.header')

        {{-- ✅ Main Content --}}
        <main>
            @yield('content')
        </main>

        {{-- ✅ Footer --}}
        @include('layouts.footer')
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
