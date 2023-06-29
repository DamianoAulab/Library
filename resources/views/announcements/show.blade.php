<x-main>
    <x-slot name="title">Presto.it | {{ $announcement->title }}</x-slot>

    <x-session />

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
            <div class="card border-0 d-flex h-100 justify-content-between">
                @if (Auth::user() !== null && Auth::user()->id == $announcement->user_id)
                    <a class="btn btn-dark text-white position-absolute top-0 end-0 mt-2 me-0 shadow opacity-50 px-2 py-1"
                        href="{{ route('announcements.edit', ['announcement' => $announcement]) }}"><i class="bi bi-pencil"></i></a>
                @endif
                <div>
                    <h2 class="fw-bold fs-1 w-75 mb-3">{{ $announcement->title }}</h2>
                    <a class="btn @if ($announcement->category->macro == 'motori') btn-light-orange @elseif ($announcement->category->macro == 'immobili') btn-orange @elseif ($announcement->category->macro == 'market') btn-red @endif fit-content text-capitalize fw-semibold text-white shadow"
                        href="{{ route('categories.show', ['category' => $announcement->category_id]) }}">

                        {{ $announcement->category->name }}</a>

                    <p class="mb-0 fw-semibold fs-5 mt-3 mt-md-5">Prezzo</p>
                    <p class="mb-0 fw-bold fs-2" style="color: var(--grey); margin-top: -0.5rem;">€
                        {{ $announcement->price }}</p>
                </div>

                <div>
                    <p class="mb-0 fw-light mb-3">Pubblicato il {{ $announcement->created_at->format('d-m-Y') }}</p>

                    <div class="card border-0 shadow px-4 py-3">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="fs-4 fw-semibold mb-1"><img class="card-img max-vh-4 mx-2 rounded-circle w-auto"
                                        style="clip-path: circle(50%)" src="https://unsplash.it/500" alt="">
                                    <span class="fw-bold d-inline-block"> {{ $announcement->user->name }}</span>
                                </p>
                                <p class="fs-5 ms-3 mb-3 mb-md-0"><span class="fw-bold fs-4 me-1"> {{ $announcement->user->announcementCount() }} </span> Annunci Online</p>
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center justify-content-end">
                                <a class="btn btn-lg btn-primary shadow fw-semibold w-100"
                                    href="tel:{{ $announcement->user->phone }}">Contatta <i
                                        class="bi bi-telephone"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-center fw-bold mt-4 mb-0 fs-1">Descrizione</h2>
    <p class="text-justify px-md-5 mx-md-5 my-3">{{ $announcement->description }}</p>


    <h2 class="text-center fw-bold mt-5 mb-0 fs-2">Ultimi Annunci</h2>

    <div class="row g-4 mt-1">
        @foreach ($announcements as $announcement)
            <div class="col-12 col-md-3">
                <div class="card border-0 shadow h-100">
                    <a class="btn @if ($announcement->category->macro == 'motori') btn-light-orange @elseif ($announcement->category->macro == 'immobili') btn-orange @elseif ($announcement->category->macro == 'market') btn-red @endif text-capitalize fw-semibold text-white position-absolute mt-3 ms-3 shadow"
                        href="{{ route('categories.show', ['category' => $announcement->category_id]) }}">
                        {{ $announcement->category->name }}</a>
                    @if (Auth::user() !== null && Auth::user()->id == $announcement->user_id)
                        <a class="btn btn-dark text-white position-absolute top-0 end-0 mt-3 me-3 shadow opacity-50 px-2 py-1"
                            href="{{ route('announcements.edit', ['announcement' => $announcement]) }}"><i class="bi bi-pencil"></i></a>
                    @endif
                    <img src="https://unsplash.it/500" alt=""
                        class="card-img-top object-fit-cover position-center" height="180rem">
                    <div class="card-body">
                        <h5 class="fs-3 fw-bold mb-5">{{ $announcement->title }}</h5>
                        <p class=" position-absolute bottom-0 fs-4 fw-semibold" style="color: var(--grey);">€
                            {{ $announcement->price }}</p>
                        <a class="btn @if ($announcement->category->macro == 'motori') btn-light-orange @elseif ($announcement->category->macro == 'immobili') btn-orange @elseif ($announcement->category->macro == 'market') btn-red @endif text-white position-absolute bottom-0 end-0 mb-3 me-3 shadow"
                            href="{{ route('announcements.show', ['announcement' => $announcement->id]) }}"><i
                                class="bi bi-search"></i></a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>



</x-main>
