<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'Laravel')</title>
    <meta name="description" content="Laravel Shopping Cart Example">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{asset('js/jquery-1.10.2.js')}}" type="text/javascript"></script> 
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
          {{-- <link rel="stylesheet" href="{{ asset('css/foundation.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link href="{{asset('css/heroic-features.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
  </head>
  <body>

<!-- Navigation -->
@include('layouts.navbar')
<!-- Page Content -->
<main class="py-4">
@yield('content')
</main>
<!-- Footer -->
@include('layouts.footer')


<!-- JavaScript -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
 <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>