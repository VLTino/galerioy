<nav class="navbar navbar-expand-xl bg-white pb-4 pt-3">
    <div class="container-fluid">
        <a class="navbar-brand" style="color:red" href="/">Pinterus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" style="" href="/galeriku">Galeriku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" style="" href="/favorit">Favorit</a>
                </li>
            </ul>
            <form class="d-flex container-fluid" role="search">
                <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search">
            </form>
            <!-- Default dropstart button -->
            {{-- <div class="btn-group dropstart dropdown" style="margin-right: 10px">
                <a data-bs-toggle="dropdown" aria-expanded="false" style="" href="/profile">
                    <i class="fa-solid fa-user">Profile</i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="" style="color: black" class="pl-1">Favorit</a></li>
                </ul>
            </div> --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
              <li class="nav-item">
                <a href="" style="" class="nav-link">Profile</a>
              </li>
              <li class="nav-item">
                <a href="/logout" style="" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
              </li>
              @else
              <li class="nav-item">
                <a href="/login" style="" class="nav-link">Login</a>
              </li>
              <li class="nav-item">
                <a href="/reg" style="" class="nav-link signup">Registrasi</i></a>
              </li>
              @endauth
          </ul>
        </div>
    </div>
</nav>
