<nav class="navbar navbar-expand-lg bg-light" >
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @foreach ($categories as $category)
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{route('blog.category.index', [$category->id])}}">{{ $category->category }}</a>
        </li>  
        @endforeach
      
      </ul>
    </div>
  
  </nav>