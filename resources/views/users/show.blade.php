<x-main>
    <x-slot name="title">Presto.it | Profilo - {{ $user->name }}</x-slot>

    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-12 col-md-6 d-flex justify-content-center ps-0">
                <img class="card-img rounded shadow border-0" src="@if (Auth::user()->gender == 'Femmina') 
                {{empty(Auth::user()->img) ? '/img/female-placeholder.jpg' : Storage::url(Auth::user()->img)}}
            @elseif (Auth::user()->gender == 'Maschio') 
                {{empty(Auth::user()->img) ? '/img/male-placeholder.jpeg' : Storage::url(Auth::user()->img)}}
            @elseif (Auth::user()->gender == 'Non binario')
                {{empty(Auth::user()->img) ? '/img/non-binary-placeholder.png' : Storage::url(Auth::user()->img)}}
            @endif">
            </div>
            <div class="col-12 col-md-6 mt-5 mt-md-0 px-0 px-md-2 justify-content-center align-items-beetween">
                <div class="card border-0 d-flex justify-content-between ps-md-4">
                        <a class="btn btn-dark text-white position-absolute top-0 end-0 me-3 shadow opacity-50 px-2 py-1" href="{{ route('users.edit', ['user' => Auth::user()->id]) }}"><i class="bi bi-pencil"></i></a>


                    <h1 class="mb-3 fw-bold">{{ $user->name }}</h1>
                
                    <p class="mb-1 fs-5 fw-semibold"><i class="bi bi-envelope me-2"></i>{{ $user->email }}</p>
                    <p class="mb-3 fs-5 fw-semibold"><i class="bi bi-telephone me-2"></i>{{ $user->phone }}</p>

                    <p class="mt-2 fs-5 mb-1 fw-semibold"><i class="bi bi-gender-@if (Auth::user()->gender == 'Femmina')female @elseif (Auth::user()->gender == 'Maschio')male @elseif (Auth::user()->gender == 'Non binario')trans @endif me-2"></i>{{ $user->gender }}</p>
                    <p class="mb-3 fs-5 fw-semibold"><i class="bi bi-calendar2-heart me-2"></i>{{ isset($user->birthday) ? $user->birthday->format('d-m-Y') : 'unknown' }}</p>

                    <p class="mt-3 mb-2 text-dark text-opacity-75"><i class="bi bi-tags me-2"></i><em>{{ $user->announcementCount() }} Annunci Online</em></p>

                    <a href="{{ route('announcements.create') }}" class="btn btn-lg btn-light-orange w-100 fw-semibold shadow fs-3 py-3"><i class="bi bi-plus-square"></i> Inserisci Annuncio</a>
                    
                    @if (Auth::user()->is_revisor)
                        <a href="{{ route('revisor.index') }}" class="btn btn-lg btn-success w-100 fw-semibold shadow fs-3 py-3 mt-3"><i class="bi bi-shield-lock"></i> Zona Revisore</a>              
                    @endif

                </div>
            </div>
        </div>
    </div>


    <div id="my-annunci" class="col-12 justify-content-center align-items-center mb-5">
        <h2 class="text-center fw-bold mt-5 mb-4 fs-2">I miei Annunci</h2>
        <div class="row g-3">
            @forelse ($user->announcements as $announcement)
            <div class="col-12 col-md-3">
                <div class="card border-0 shadow h-100 @if($announcement->is_accepted == null) opacity-50 @endif">
                    <a class="btn @if ($announcement->category->macro == 'motori') btn-light-orange @elseif ($announcement->category->macro == 'immobili') btn-orange @elseif ($announcement->category->macro == 'market') btn-red @endif text-capitalize fw-semibold text-white position-absolute mt-3 ms-3 shadow"
                         href="{{ route('categories.show', ['category' => $announcement->category_id]) }}">
                        {{ $announcement->category->name }}</a>
                    @if (Auth::user() !== null && Auth::user()->id == $announcement->user_id && $announcement->is_accepted)
                        <a class="btn btn-dark text-white position-absolute top-0 end-0 mt-3 me-3 shadow opacity-50 px-2 py-1" href="{{ route('announcements.edit', ['announcement' => $announcement]) }}"><i class="bi bi-pencil"></i></a>
                    @endif
                    <img src="https://unsplash.it/500" alt="" class="card-img-top object-fit-cover position-center" height="180rem">
                    <div class="card-body">
                        <h5 class="fs-3 fw-bold mb-5">{{ $announcement->title }}</h5>
                        <p class=" position-absolute bottom-0 fs-4 fw-semibold" style="color: var(--grey);">€ {{ number_format($announcement->price, 2, ',', ' ') }}</p>
                        @if ($announcement->is_accepted)
                            <a class="btn @if ($announcement->category->macro == 'motori') btn-light-orange @elseif ($announcement->category->macro == 'immobili') btn-orange @elseif ($announcement->category->macro == 'market') btn-red @endif text-white position-absolute bottom-0 end-0 mb-3 me-3 shadow"
                                href="{{ route('announcements.show', ['announcement' => $announcement->id]) }}"><i class="bi bi-search"></i></a>                          
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center mt-4 text-dark text-opacity-75"><em>Nessun annuncio trovato...</em></div>
            @endforelse
        </div>
    </div>

</x-main>