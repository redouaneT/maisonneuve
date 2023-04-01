<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" rel="stylesheet">

    <!-- Styles adminlte -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/custom.css') }}">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-datepicker.min.css') }}">



</head>

<body>
    <div class="wrapper">
        <!-- Header adminlte -->
        @include('components.adminlte.navbar')

        @if(Auth::check())
            @canany(['isAdmin', 'isStudent'], auth()->user())
                <!-- Sidebar adminlte -->
                @include('components.adminlte.sidebar')
            @endcanany
        @endif
  
        <!-- Content adminlte -->

        @canany(['isAdmin', 'isStudent'], auth()->user())
            <div class="content-wrapper">
                @yield('content')
            </div>
        @else
            <div class="content-wrapper mx-0">
                @yield('content')
            </div>
        @endcanany
     
       
        @if(Auth::check())
            <!-- Footer adminlte -->
            @include('components.adminlte.footer')
        @endif
    </div>

    <!-- Scripts adminlte -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/custom.js') }}"></script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    @stack('scripts')

</body>

</html>
