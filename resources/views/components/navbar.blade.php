<nav id="nav"  class="navbar navbar-expand-lg navbar-light bg-light pt-2 pb-2 mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('index')}}">Akram Blog</a>
        <button class="navbar-toggler" type="button"  data-bs-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @auth
                   <a class="nav-link active" href="{{route('profile.edit')}}">profile <i class="bi bi-person"></i></a>
                   <a class="nav-link active" href="{{route('posts.dashboard')}}">posts <i class="bi bi-stickies"></i></a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="nav-link active"  type="submit">Logout <i class="bi bi-box-arrow-left"></i></button>
                    </form>
                @else
                <a class="nav-link active" href="{{ route('login') }}">Log in <i class="bi bi-box-arrow-in-right"></i></a>
                <a class="nav-link active" href="{{ route('register') }}">Create Account <i class="bi bi-check-square"></i></a>

                @endauth
            </div>
        </div>
        <form method="get" action="{{route('searched.show')}}" class="d-flex" role="search">

            <div class="input-group">
              <input  name="search"  type="text" value="{{ old('search') }}" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" required>
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
               <i class="bi bi-search"></i>
              </button>
 
            </div>
      </form>

    </div>

</nav>
