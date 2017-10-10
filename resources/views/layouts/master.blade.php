<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/font-awesome.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Bitter|Cinzel:700|Josefin+Sans|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="{{URL::asset('js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <title>
    	@yield('title')
    </title>
</head>
<body>
	@include('components.navbar')
    <div class="container">
        @yield('header')
        @yield('content')
    </div>
</body>