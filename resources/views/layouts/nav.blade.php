
<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <a class="nav-link active" href="{{route('index')}}">Home</a>
      <a class="nav-link" href="{{route('create')}}">Create</a>
      <a class="nav-link" href="#">Press</a>
      <a class="nav-link" href="#">New hires</a>
      <a class="nav-link" href="#">About</a>

      @if(Auth::check())
      <li class="nav-item dropdown">
      <a class="nav-link ml-auto nav-link dropdown-toggle" data-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false" href="#">{{Auth::user()->name}}</a>
        <div class="dropdown-menu">
          <a class=" nav-link dropdown-item" href="{{route('logout')}}">Logout</a>
        </div>
        @endif
      </li>
    </nav>
  </div>
</div>