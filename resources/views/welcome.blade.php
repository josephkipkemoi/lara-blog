<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
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
    @livewireStyles
</head>

<body>
<nav class="navbar navbar-expand-lg bg-secondary" >
 
  <a class="navbar-brand text-white" href="{{route('main')}}">
    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-speedometer ml-2" viewBox="0 0 16 16">
      <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
      <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
    </svg>  
  </a>
  <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="{{route('main')}}">{{ config('app.name') }}</a>
      </li>
    
      @auth
      <li class="nav-item active">
        <a class="nav-link text-white" href="{{route('admin.dashboard')}}">Dashboard <span class="sr-only">(current)</span></a>
      </li>    
      @else 
      <li class="nav-item active ">
        <a class="nav-link text-white" href="{{route('register')}}">Register</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-white" href="{{route('login')}}">Login </a>
      </li>
      @endauth
    </ul>
  </div>

</nav>

<main class="py-4">
  @yield('content')
</main>

<footer class="blog-footer ">
    <div>
     <div class="d-flex justify-content-center">
      <p class="text-white">{{ config('app.name') }}</p>
     </div>
     <div class="d-flex justify-content-center">
      <p>
        <a href="#" class="text-white">Back to top</a>
      </p>
     </div>
    </div>
</footer>
@livewireScripts
</body>
</html>
