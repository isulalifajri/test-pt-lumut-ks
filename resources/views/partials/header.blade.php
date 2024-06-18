
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">PT LUMUT K.S</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>

          @auth
          <li class="nav-item">
            <a class="nav-link {{ Request::is('post*') ? 'active' : '' }}" aria-current="page" href="#">Data POST</a>
          </li>
          @endauth
          @can('admin')  
            <li class="nav-item">
              <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" aria-current="page" href="{{ route('users.index') }}">List Users</a>
            </li>
          @endcan
        </ul>

        <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{auth()->user()->username }}
                <button class="btn pe-0"><i class="fa-solid fa-user text-light"></i></button>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#"><i class="bi bi-layout-text-sidebar-reverse"></i> Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                      <button type="submit" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> logout</button>
                  </form>
                </li>
              </ul>
            </li>
          @else
            <li class="nav-item">
              <form action="{{ route('login') }}">
                  <button class="btn btn-outline-success" type="submit">Login</button>
              </form>             
            </li>
          @endauth
          </ul>    
      </div>
    </div>
  </nav>