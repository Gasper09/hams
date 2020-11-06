<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield ('title' , 'AMS')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">     

    <link rel="stylesheet" type="text/css" href="file:///D:/SYSTEMS/system%20designing%20toutorial/templets/bootstrap-4.4.1-dist/css/bootstrap.min.css">

    <script type="text/javascript" src="file:///D:/SYSTEMS/system%20designing%20toutorial/templets/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
  
  <div class="conteiner">
  <div class="card-body">

     @include('nav')
     @yield('content')
   
  </div>
</div>
     

 <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->

     

</body>
</html>
