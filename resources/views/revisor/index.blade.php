<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it | Zona Revisore</title>

    <link rel="icon" type="image/x-icon" href="\img\presto.it_favicon.ico">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="container-fluid min-vh-100 p-0 bg-zona-revisore">
    <x-navbar />

    <div class="container min-vh-84 pt-5 px-5">

        <x-session />

        @if (!$announcement_to_check)
            <div class="text-center mt-4 text-dark text-opacity-75 fs-2"><em>Nessun annuncio da revisionare...</em></div>
        @else
            <div class="row g-5 mt-md-2 mb-5">
                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow">
                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner rounded">
                                <div class="carousel-item active" data-bs-interval="5000">
                                    <img src="https://unsplash.it/1000" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://unsplash.it/1200" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://unsplash.it/1500" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card border-0 d-flex h-100 justify-content-between bg-transparent">
                        <div>
                            <h2 class="fw-bold fs-1 w-75 mb-3">{{ $announcement_to_check->title }}</h2>
                            <a class="btn @if ($announcement_to_check->category->macro == 'motori') btn-light-orange @elseif ($announcement_to_check->category->macro == 'immobili') btn-orange @elseif ($announcement_to_check->category->macro == 'market') btn-red @endif fit-content text-capitalize fw-semibold text-white shadow"
                                href="{{ route('categories.show', ['category' => $announcement_to_check->category_id]) }}">

                                {{ $announcement_to_check->category->name }}</a>

                            <p class="mb-0 fw-semibold fs-5 mt-3 mt-md-5">Prezzo</p>
                            <p class="mb-0 fw-bold fs-2" style="color: var(--grey); margin-top: -0.5rem;">€
                                {{ number_format($announcement_to_check->price, 2, ',', ' ') }}</p>
                        </div>

                        <div>
                            <p class="mb-0 fw-light mb-3">Pubblicato il
                                {{ $announcement_to_check->created_at->format('d-m-Y') }}</p>

                            <div class="card border-0 shadow px-4 py-3">
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <p class="fs-4 fw-semibold mb-1"><img
                                                class="card-img max-vh-4 mx-2 rounded-circle w-auto"
                                                style="clip-path: circle(50%)"
                                                src="@if ($announcement_to_check->user->gender == 'Femmina') {{ empty($announcement_to_check->user->img) ? '/img/female-placeholder.jpg' : Storage::url($announcement_to_check->user->img) }}
                                            @elseif ($announcement_to_check->user->gender == 'Maschio') 
                                                {{ empty($announcement_to_check->user->img) ? '/img/male-placeholder.jpeg' : Storage::url(Auth::user()->img) }}
                                            @elseif ($announcement_to_check->user->gender == 'Non binario' || $announcement_to_check->user->gender == 'Non specificato')
                                                {{ empty($announcement_to_check->user->img) ? '/img/user-placeholder.png' : Storage::url($announcement_to_check->user->img) }} @endif"
                                                alt="">
                                            <span class="fw-bold d-inline-block">
                                                {{ $announcement_to_check->user->name }}</span>
                                        </p>
                                        <p class="fs-5 ms-3 mb-3 mb-md-0"><span class="fw-bold fs-4 me-1">
                                                {{ $announcement_to_check->user->announcementCount() }} </span> Annunci
                                            Online</p>
                                    </div>
                                    <div class="col-12 col-md-7 d-flex align-items-center justify-content-end flex-wrap">
                                        <div class="col-12 col-md-6 px-1 pb-2 pb-md-0">
                                            <a class="btn btn-lg btn-primary shadow fw-semibold w-100 mx-1"
                                            href="tel:{{ $announcement_to_check->user->phone }}">Contatta <i
                                                class="bi bi-telephone"></i></a>
                                        </div>
                                        <div class="col-12 col-md-6 px-1">
                                            <a class="btn btn-lg btn-primary shadow fw-semibold w-100 mx-1"
                                            href="mailto:{{ $announcement_to_check->user->email }}">Email <i
                                                class="bi bi-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="text-center fw-bold mt-4 mb-0 fs-1">Descrizione</h2>
            <p class="text-center px-md-5 mx-md-5 my-3">{{ $announcement_to_check->description }}</p>

            <div class="row my-5 align-items-center">
                <div class="col-12 col-md-5 text-center">
                    <button class="btn btn-lg btn-green w-75 fw-semibold shadow fs-1" data-bs-toggle="modal"
                        data-bs-target="#modalAccept"><i class="bi bi-patch-check"></i> ACCETTA</button>
                </div>
                <div class="col-12 col-md-2 text-center">
                    <form action="{{ Route('revisor.undo_announcement', ['announcement' => ' '])}}" method="POST">
                        @csrf
                        @method('POST')
                        <button class="btn btn-lg btn-secondary fw-semibold shadow fs-3"><i class="bi bi-arrow-counterclockwise"></i></button>
                    </form>
                </div>
                <div class="col-12 col-md-5 mt-2 mt-md-0 text-center">
                    <button class="btn btn-lg btn-red w-75 fw-semibold shadow fs-1" data-bs-toggle="modal"
                        data-bs-target="#modalReject"><i class="bi bi-x-octagon"></i> RIFIUTA</button>
                </div>
            </div>
        @endif

    </div>

    <x-footer />

    {{-- ! MODAL ACCEPT --}}
    <div class="modal fade" id="modalAccept" tabindex="-1" aria-labelledby="modaleAccept" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 w-110">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5">Sei sicuro di voler <b>ACCETTARE</b> questo annuncio?</h1>
                    <form action="{{ Route('revisor.accept_announcement', ['announcement' => $announcement_to_check->id])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-green px-2 py-0 fs-4"><i class="bi bi-check"></i></button>
                    </form>
                    <button type="button" class="btn btn-red px-2 py-0 fs-4" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                </div>
            </div>
        </div>
    </div>

    {{-- ! MODAL REJECT --}}
    <div class="modal fade" id="modalReject" tabindex="-1" aria-labelledby="modalReject" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 w-110">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5">Sei sicuro di voler <b>RIFIUTARE</b> questo annuncio?</h1>
                    <form action="{{route('revisor.reject_announcement', ['announcement' => $announcement_to_check->id])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-green px-2 py-0 fs-4"><i class="bi bi-check"></i></button>
                    </form>
                    <button type="button" class="btn btn-red px-2 py-0 fs-4" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
