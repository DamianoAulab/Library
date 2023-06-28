<x-main>
    <x-slot name="title">Presto.it | {{ $announcement->title }}</x-slot>


    <div class="row g-5 my-2">
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
                        href=""><i class="bi bi-pencil"></i></a>
                @endif
                    <div>
                        <h2 class="fw-bold fs-1">{{ $announcement->title }}</h2>
                        <a class="btn @if ($announcement->category->macro == 'motori') btn-light-orange @elseif ($announcement->category->macro == 'immobili') btn-orange @elseif ($announcement->category->macro == 'market') btn-red @endif fit-content text-capitalize fw-semibold text-white shadow"
                            href="">

                            {{ $announcement->category->name }}</a>

                            <p class="mb-0 fw-semibold fs-5 mt-5">Prezzo</p>
                            <p class="mb-0 fw-bold fs-2" style="color: var(--grey); margin-top: -0.5rem;">€
                                {{ $announcement->price }}</p>
                    </div>

                    <div>
                        <p class="mb-0 fw-light mb-3">Pubblicato il {{ $announcement->created_at->format('d m Y') }}</p>

                        <div class="card border-0 shadow p-4">
                            <div class="row">
                                <div class="col-6">
                                    <p class="fs-4 fw-semibold"><img class="card-img max-vh-4 mx-2 rounded-circle w-auto"
                                        style="clip-path: circle(50%)" src="https://unsplash.it/500" alt=""> Nome</p>
                                    <p class="fs-5 ms-2 mb-0"><span class="fw-bold fs-4 me-2">12</span> Annunci Online</p>                                
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <a class="btn btn-lg btn-primary shadow fw-semibold" href="">Contatta <i class="bi bi-telephone"></i></a>
                                </div>
                            </div>



                        </div>
        
                    </div>


            </div>
        </div>
    </div>


</x-main>
