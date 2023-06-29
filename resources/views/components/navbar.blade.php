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
                    <ul class="navbar-nav ms-auto mb-2 mb-sm-0 flex-col-reverse flex-lg-row-reverse">
    
                    @auth
                        <li class="nav-item dropdown fs-5 pe-0 pe-md-3 mx-auto">
                            <a class="nav-link text-white fw-semibold d-flex align-items-center d-none d-md-flex " href="" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }} <img class="card-img max-vh-3 ms-2 rounded-circle w-auto" style="clip-path: circle(50%)"
                                src="@if (Auth::user()->gender == 'Femmina') 
                                {{empty(Auth::user()->img) ? '/img/female-placeholder.jpg' : Storage::url(Auth::user()->img)}}
                            @elseif (Auth::user()->gender == 'Maschio') 
                                {{empty(Auth::user()->img) ? '/img/male-placeholder.jpeg' : Storage::url(Auth::user()->img)}}
                            @elseif (Auth::user()->gender == 'Non binario')
                                {{empty(Auth::user()->img) ? '/img/non-binary-placeholder.png' : Storage::url(Auth::user()->img)}}
                            @endif" alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end d-block d-md-none mb-4">
                                <li><a class="dropdown-item fw-bold d-flex justify-content-between fs-5 d-none d-md-flex" href="{{ route('users.show', ['user' => Auth::user()->id]) }}">
                                    Profilo <i class="bi bi-person-circle"></i></a></li>
                                <li>
                                <li><a class="dropdown-item fw-bold d-flex justify-content-between fs-5 d-block d-md-none" href="">
                                    {{ Auth::user()->name }} <img class="card-img max-vh-4 mt-1 rounded-circle w-auto" style="clip-path: circle(50%)"
                                src="@if (Auth::user()->gender == 'Femmina') 
                                {{empty(Auth::user()->img) ? '/img/female-placeholder.jpg' : Storage::url(Auth::user()->img)}}
                            @elseif (Auth::user()->gender == 'Maschio') 
                                {{empty(Auth::user()->img) ? '/img/male-placeholder.jpeg' : Storage::url(Auth::user()->img)}}
                            @elseif (Auth::user()->gender == 'Non binario')
                                {{empty(Auth::user()->img) ? '/img/non-binary-placeholder.png' : Storage::url(Auth::user()->img)}}
                            @endif" alt=""></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item fw-semibold" href="{{ route('users.show', ['user' => Auth::user()->id]) }}/#my-annunci">
                                    <i class="bi bi-tags me-2"></i>I miei Annunci</a></li>
                                </li>
                                <li class="px-2 mt-2"><a class="btn btn-light-orange w-100 fw-semibold" href="{{ route('announcements.create') }}">
                                    <i class="bi bi-plus-square"></i> Annuncio</a>
                                </li>
                                <li class="px-2 mt-2">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-red w-100 fw-bold"
                                            onclick="event.preventDefault(); this.closest('form').submit();">Esci</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item me-0 me-lg-4">
                            <a class="nav-link text-center d-none d-md-block fw-semibold" href="{{ route('announcements.create') }}">
                                <i class="bi bi-plus-square"></i> Inserisci Annuncio
                            </a>
                        </li>
                    @else
                    <ul class="navbar-nav justify-content-evenly flex-row mb-4 mb-md-0">
                        <li class="nav-item mt-1">
                            <a href="{{ route('login') }}" class="btn btn-light text-black px-4 fw-semibold">Accedi</a>
                        </li>
                        <li class="nav-item mt-1 ms-md-3">
                            <a href="{{ route('register') }}" class="btn btn-red px-4 fw-semibold">Registrati</a>
                        </li>
                    </ul>
                    @endauth
    
                    <li class="dropdown me-0 me-lg-4">
                        <a class="nav-link dropdown-toggle text-center d-none d-md-block fw-semibold" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Categorie
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end d-block d-md-none px-2 text-center">
                            <li><a class="btn btn-light-orange w-100 fw-bold fs-5" href="{{ route('macro', ['macro' => 'motori']) }}">Motori</a></li>
                            @foreach ($categories as $category)
                                @if ($category->macro == 'motori')
                                <li><a class="dropdown-item capitalize fw-semibold" href="{{ route('categories.show', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                                @endif
                            @endforeach
                            <li class="mt-3"><a class="btn btn-orange w-100 fw-bold fs-5" href="{{ route('macro', ['macro' => 'immobili']) }}">Immobili</a></li>
                            @foreach ($categories as $category)
                                @if ($category->macro == 'immobili')
                                <li><a class="dropdown-item capitalize fw-semibold" href="{{ route('categories.show', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                                @endif
                            @endforeach
                            <li class="mt-3"><a class="btn btn-red w-100 fw-bold fs-5" href="{{ route('macro', ['macro' => 'market']) }}">Market</a></li>
                            @foreach ($categories as $category)
                                @if ($category->macro == 'market')
                                <li><a class="dropdown-item capitalize fw-semibold" href="{{ route('categories.show', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
                </div>
              </div>
    </div>
</nav>