<nav class="navbar navbar-expand-lg navbar-dark bg-black sticky-top">
    <div class="container px-3 px-md-5 align-items-center">
        <a class="navbar-brand" href="{{ Route('homepage') }}"><img src="\img\presto.it_logo.png" alt=""
                height="50rem"></a>
        <button id="hamburger-list" class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcavasNavbar" aria-expanded="false" aria-label="Toggle navigation"><i class="bi bi-hash text-white"></i></button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <a class="offcanvas-title" id="offcanvasNavbarLabel" href="{{ Route('homepage') }}"><img src="\img\presto.it_logo.png" alt=""
                    height="50rem"></a>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav ms-auto mb-2 mb-sm-0 flex-col-reverse flex-md-row-reverse">
    
                    @auth
                        <li class="nav-item dropdown fs-5 pe-3">
                            <a class="nav-link dropdown-toggle text-white fw-semibold" href="" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }} <img class="card-img max-vh-3 ms-0 rounded-circle" style="clip-path: circle(50%)"
                                src="" alt="">
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item fw-bold d-flex justify-content-between" href="">
                                    Profilo <i class="bi bi-person-circle"></i></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="">
                                    <i class="bi bi-tags me-2"></i>I miei Annunci</a></li>
                                </li>
                                <li class="px-2">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger w-100 fw-bold"
                                            onclick="event.preventDefault(); this.closest('form').submit();">Esci</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                    <ul class="navbar-nav justify-content-evenly flex-row mb-4 mb-md-0">
                        <li class="nav-item mt-1">
                            <a href="{{ route('login') }}" class="btn btn-light text-black px-4 fw-bold">Accedi</a>
                        </li>
                        <li class="nav-item mt-1 ms-md-2">
                            <a href="{{ route('register') }}" class="btn btn-red px-4 fw-bold">Registrati</a>
                        </li>
                    </ul>
                    @endauth
    
                    <li class="dropdown me-0 me-lg-5">
                        <a class="nav-link dropdown-toggle text-center d-none d-md-block fw-semibold" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Categorie
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end d-block d-md-none px-2 text-center">
                            <li><a class="btn btn-light-orange w-100 fw-bold fs-5" href="">Motori</a></li>
                            @foreach ($categories as $category)
                                @if ($category->macro == 'motori')
                                <li><a class="dropdown-item capitalize fw-semibold" href="">{{ $category->name }}</a></li>
                                @endif
                            @endforeach
                            <li class="mt-3"><a class="btn btn-orange w-100 fw-bold fs-5" href="">Immobili</a></li>
                            @foreach ($categories as $category)
                                @if ($category->macro == 'immobili')
                                <li><a class="dropdown-item capitalize fw-semibold" href="">{{ $category->name }}</a></li>
                                @endif
                            @endforeach
                            <li class="mt-3"><a class="btn btn-red w-100 fw-bold fs-5" href="">Market</a></li>
                            @foreach ($categories as $category)
                                @if ($category->macro == 'market')
                                <li><a class="dropdown-item capitalize fw-semibold" href="">{{ $category->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
                </div>
              </div>
    </div>
</nav>