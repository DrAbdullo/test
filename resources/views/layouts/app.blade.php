<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Doctor') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    @include('inc.header') @if(Request::is('/')) @include('inc.hero') @endif
    @include('inc.messages')


    <div class="container ">
        <div class="row ">
            <div class="col-8 ">
                @yield('content')
            </div>
            <div class="col-4 ">
                @include('inc.aside')
            </div>
        </div>
    </div>
    </div>
    </div>

    @include('inc.footer')

    </main>
</body>

</html>