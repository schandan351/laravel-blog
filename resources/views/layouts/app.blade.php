<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.tiny.cloud/1/fl5mbztq96fgmg77dxwtmg123pvbbhifraxm3ftnslh82s5g/tinymce/5/tinymce.min.js">
    </script>
</head>

<body>

    @include('layouts.nav')
    <main class="container-fluid py-4">
        @yield('content')
    </main>
        <div class="container">
            <div class="row">
                    <div class="col-md-8">
                        @yield('posts')
                    </div>
                    <div class="col-md-2">
                        @yield('category')
                    </div>
            </div>
    </div>

   

    <div class="container">
        @include('layouts.messages')
        @yield('create')
    </div>

    
    
    <script>
    tinymce.init({
        selector: '#mytextarea',
    });

    
    </script>
</body>

</html>