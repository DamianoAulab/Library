<x-main>
    <x-slot name="title">Presto.it | Admin Dashboard</x-slot>

    <h1 class="text-center mb-5 fw-bold">ADMIN DASHBOARD</h1>


    <h3 class="text-center mb-3">Tutti gli Annunci</h3>

    <div class="container-fluid">
        <table class="table border mt-2">
            <thead>
                <tr>
                    <th scope="col" class="text-center col-1 text-light bg-black">#</th>
                    <th scope="col" class="text-center col-1 text-light bg-black">VISIBILITÀ</th>
                    <th scope="col" class="text-center col-1 text-light bg-black">IMG</th>
                    <th scope="col" class="text-center col-1 text-light bg-black">CATEGORIA</th>
                    <th scope="col" class="col-3 text-light bg-black">TITOLO</th>
                    <th scope="col" class="text-center col-1 text-light bg-black">AUTORE</th>
                    <th scope="col" class="col-4 text-light bg-black"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($announcements as $announcement)
                <tr class="align-middle">
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <th class="text-center">
                        @if($announcement->is_accepted)
                        <form action="{{ Route('admin.hidden', ['announcement' => $announcement])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn px-2 py-0"><i class="bi bi-eye fs-3 text-success"></i></button>
                        </form>
                        @elseif(!isset($announcement->is_accepted))
                        <a href="{{ Route('revisor.index') }}" class="btn px-2 py-0"><i class="bi bi-question fs-3 text-black"></i></a>
                        @else
                        <form action="{{ Route('admin.visible', ['announcement' => $announcement])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn px-2 py-0"><i class="bi bi-eye-slash fs-3 text-danger"></i></button>
                        </form>
                        @endif
                    </th>
                    <td class="text-center"><img class="card-img max-vh-5"
                        src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(600,600) : '/img/presto.it_placeholder.jpg'}}"
                        alt=""></td>
                    <td class="text-center text-uppercase fw-bold">
                        @if (Lang::locale() == 'it') {{$announcement->category->name_it}} @elseif (Lang::locale() == 'eng') {{$announcement->category->name_en}} @elseif (Lang::locale() == 'es') {{$announcement->category->name_es}} @endif
                    </td>
                    <td>{{$announcement->title}}</td>
                    <td class="text-center">{{$announcement->user->name}}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            {{-- Si vede quando è revisionato --}}
                            <a href=""
                                class="btn btn-primary me-md-2"><i class="bi bi-search"></i></a>

                            <a href=""
                                class="btn btn-warning me-md-2"><i class="bi bi-pencil-square"></i></a>

                            <form action="" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>

                        </div>
                    </td>
                </tr>
                @empty
                <td colspan="12" class="text-center mt-4 text-dark text-opacity-75"><em>{{__('ui.noAnnouncement')}}</em></td>
                @endforelse
            </tbody>
        </table>

        <x-session />

    </div>

</x-main>