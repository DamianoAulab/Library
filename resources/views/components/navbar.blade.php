<nav class="navbar navbar-expand-lg navbar-dark bg-black sticky-top">
    <div class="container px-5 align-items-center">
        <a class="navbar-brand" href="{{ Route('homepage') }}"><img src="\img\presto.it_logo.png" alt=""
                height="50rem"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown me-2">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Categorie
                        </a>
                        <ul class="dropdown-menu">
                            {{-- @foreach ($categories as $category)
                                <li><a class="dropdown-item" href="">{{ $category->name }}</a></li>
                            @endforeach --}}
                            <li><a class="dropdown-item" href="">Auto</a></li>

                        </ul>
                </li>

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
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-light px-4 fw-bold">Accedi</a>
                    </li>
                    <li class="nav-item  ms-2">
                        <a href="{{ route('register') }}" class="btn btn-primary px-4 fw-bold">Registrati</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>