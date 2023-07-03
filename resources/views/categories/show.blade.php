<x-main>
    <x-slot name="title">Presto.it | {{$category->name}}</x-slot>

    <div class="row justify-content-center">
        <div class="@if ($category->macro == 'motori') btn-light-orange @elseif ($category->macro == 'immobili') btn-orange @elseif ($category->macro == 'market') btn-red @endif fw-bold text-white mb-4 shadow text-uppercase fit-content fs-1 px-5 py-2 rounded">{{ $category->name }}</div>
    </div>
   
    <x-session />

    <div class="row g-4 mt-1">
        @forelse ($category->announcements as $announcement)
            <div class="col-12 col-md-3">
                <div class="card border-0 shadow h-100">
                    <a class="btn @if ($announcement->category->macro == 'motori') btn-light-orange @elseif ($announcement->category->macro == 'immobili') btn-orange @elseif ($announcement->category->macro == 'market') btn-red @endif text-capitalize fw-semibold text-white position-absolute mt-3 ms-3 shadow"
                        href="{{ route('categories.show', ['category' => $announcement->category_id]) }}">
                        {{ $announcement->category->name }}</a>
                    @if (Auth::user() !== null && Auth::user()->id == $announcement->user_id)
                        <a class="btn btn-dark text-white position-absolute top-0 end-0 mt-3 me-3 shadow opacity-50 px-2 py-1" href="{{ route('announcements.edit', ['announcement' => $announcement]) }}"><i class="bi bi-pencil"></i></a>
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
       
            @empty
            <div class="text-center mt-4 text-dark text-opacity-75"><em>Nessun annuncio trovato...</em></div>

        @endforelse 

</div>

</x-main>