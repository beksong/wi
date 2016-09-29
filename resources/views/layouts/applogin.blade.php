<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Badan Diklat Sulteng</title>

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
    <link href="{{asset('css/ripples.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{elixir('css/app.css')}}"> --}}
    
</head>

<body id="app-layout">
    @if(Auth::check())
        @include('layouts.mainnav')
    @endif
    @include('auth.loginmodal')
    @yield('content')
    
    <!-- JavaScripts -->
     <script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/material.min.js')}}"></script>
    <script src="{{asset('js/ripples.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/datatables.bootstrap.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.js')}}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script type="text/javascript" src="{{asset('js/my.min.js')}}"></script>
</body>
</html>
