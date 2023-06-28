<x-main>
    <x-slot name="title">Presto.it | Homepage</x-slot>

    <form class="d-flex w-50 mx-auto mb-5 input-group" action="{{ route('search')}}" method="POST">
        @method('POST')
        @csrf

        <input class="form-control rounded-start" id="search_announcement" name="search_announcement" type="search" placeholder="Cosa cerchi?">
        <button class="input-group-text btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
    </form>

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