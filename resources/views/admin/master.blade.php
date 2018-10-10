<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>User KedaiFood - @yield('title')</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="{{asset('css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/> --}}
    <script src="{{asset('js/jquery-1.10.2.js')}}" type="text/javascript"></script> 
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="{{asset('css/heroic-features.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    

</head>
<body>

@include('layouts.usernavbar')

<!-- Page Content -->
<main class="py-4">
  @include('layouts.info')
    @yield('content')
</main>

<!-- Footer -->
@include('layouts.footer')
  
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- JavaScript -->
 {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
 <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
 <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

 <script>
   $('#hapus').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var cat_id = button.data('catid')
    var modal = $(this)
    modal.find('.modal-body #cat_id').val(cat_id);
   })
 </script>
</body>
</html>