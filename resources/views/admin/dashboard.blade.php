<x-main>
    <x-slot name="title">Presto.it | Admin Dashboard</x-slot>

    <h1 class="text-center mb-5 fw-bold">ADMIN DASHBOARD</h1>

    <x-session />

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
                {{-- @forelse ($books as $book) --}}
                <tr class="align-middle">
                    <th scope="row" class="text-center">1</th>
                    <th class="text-center"><a href="" class="btn px-2 py-0"><i class="bi bi-eye-slash fs-3 text-danger"></i></a></th>
                    <td class="text-center"><img class="card-img max-vh-5"
                        {{-- src="{{ empty($book->img) ? Storage::url('\images\placeholder.jpg') : Storage::url($book->img) }}" --}}
                        src="/img/presto.it_placeholder_center.jpg"
                        alt=""></td>
                    <td class="text-center text-uppercase fw-bold">Auto</td>
                    <td>TestTitolo</td>
                    <td class="text-center">Linda</td>
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
                {{-- @empty
                <td colspan="12" class="text-center mt-4 text-dark text-opacity-75"><em>{{__('ui.noAnnouncement')}}</em></td>
                @endforelse --}}
            </tbody>
        </table>
    </div>

</x-main>