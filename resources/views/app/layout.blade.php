<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lara Blog</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Crimson+Pro">
 
    <style>
      body {
        font-family: 'Crimson Pro', serif;
        font-size: 24px;
        background-color: #46494C;
      }  
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-secondary" >
 
  <a class="navbar-brand text-white" href="{{route('main')}}">{{ config('app.name') }}</a>
  <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="{{route('admin.dashboard')}}">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
   
        <a class="nav-link text-white" href="{{route('laravel')}}">Laravel 9</a>
      </li>   
    </ul>
  </div>

</nav>

<main class="py-4">
  @yield('app.layout')
</main>

<footer class="blog-footer ">
    <div>
     <div class="d-flex justify-content-center">
      <p>Lara Blog</p>
     </div>
     <div class="d-flex justify-content-center">
      <p>
        <a href="#">Back to top</a>
      </p>
     </div>
    </div>
</footer>

</body>
</html>
