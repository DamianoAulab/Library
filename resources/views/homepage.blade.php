<x-main>
    <x-slot name="title">Presto.it | Homepage</x-slot>

    <form class="d-flex w-50 mx-auto mb-5 input-group" action="{{ route('search')}}" method="POST">
        @method('POST')
        @csrf

        <input class="form-control rounded-start" id="search_announcement" name="search_announcement" type="search" placeholder="Cosa cerchi?">
        <button class="input-group-text btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
    </form>

    <div class="row g-5 text-center align-items-center my-5">
        <div class="col-12 col-md-4">
            <div class="card pb-4 border-0 shadow">
                <img src="\img\macro_motori.png" class="card-img-top position-absolute w-50 bottom-50 start-25" alt="">
                <div class="card-body mt-5 pt-5">
                  <a href="" class="btn btn-lg btn-light-orange fw-bold text-white mt-5 shadow">Cerca in Motori</a>
                </div>
              </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card pb-4 border-0 shadow">
                <img src="\img\macro_immobili.png" class="card-img-top position-absolute w-50 bottom-50 start-25" alt="">
                <div class="card-body mt-5 pt-5">
                  <a href="" class="btn btn-lg btn-orange fw-bold text-white mt-5 shadow">Cerca in Immobili</a>
                </div>
              </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card pb-4 border-0 shadow">
                <img src="\img\macro_market.png" class="card-img-top position-absolute w-50 bottom-50 start-25" alt="">
                <div class="card-body mt-5 pt-5">
                  <a href="" class="btn btn-lg btn-red fw-bold text-white mt-5 shadow">Cerca in Market</a>
                </div>
              </div>
        </div>
    </div>

    <h2 class="text-center fw-bold mt-4 mb-0 fs-2">Ultimi Annunci</h2>

    <div class="row g-4 mt-1">
            @foreach ($announcements as $announcement)

                <div class="col-12 col-md-3">
                    <div class="card border-0 shadow h-100">
                        <a class="btn @if ($announcement->category->macro == 'motori') btn-light-orange @elseif ($announcement->category->macro == 'immobili') btn-orange @elseif ($announcement->category->macro == 'market') btn-red @endif text-capitalize fw-semibold text-white position-absolute mt-3 ms-3 shadow" href="">
                            {{ $announcement->category->name }}</a>
                        @if (Auth::user() !== null && Auth::user()->id == $announcement->user_id)
                            <a class="btn btn-dark text-white position-absolute top-0 end-0 mt-3 me-3 shadow opacity-50 px-2 py-1" href=""><i class="bi bi-pencil"></i></a>
                        @endif
                        <img src="https://unsplash.it/500" alt="" class="card-img-top object-fit-cover position-center" height="180rem">
                        <div class="card-body">
                            <h5 class="fs-3 fw-bold mb-5">{{ $announcement->title }}</h5>
                            <p class=" position-absolute bottom-0 fs-4 fw-semibold" style="color: var(--grey);">€ {{ $announcement->price }}</p>
                            <a class="btn @if ($announcement->category->macro == 'motori') btn-light-orange @elseif ($announcement->category->macro == 'immobili') btn-orange @elseif ($announcement->category->macro == 'market') btn-red @endif text-white position-absolute bottom-0 end-0 mb-3 me-3 shadow"
                                href="{{ route('announcements.show', ['announcement' => $announcement->id]) }}"><i class="bi bi-search"></i></a>
                        </div>
                    </div>
                </div>
           

        @endforeach

    </div>

</x-main>