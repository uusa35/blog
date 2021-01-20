<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script>
        window.User = {
            user_id: '{{ auth()->user()->id  ?? null}}',
            api_token: '{{ auth()->user()->api_token ?? null }}',
            avatar: '{{ auth()->user()->avatar  ?? null}}',
            csrfToken: '{{ csrf_token() }}',
        }
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg">
<div>
    @include('nav')
    @include('notification')

    <main class="py-4" id="app">
        @yield('content')
    </main>
</div>
</body>
</html>
