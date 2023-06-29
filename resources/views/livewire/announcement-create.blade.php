<div class="p-5 container mt-5 shadow text-center">

    <form wire:submit.prevent="store" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" wire:model="title">
            @error('title')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <input type="text" class="form-control" id="description" wire:model="description">
            @error('description')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" class="form-control" id="price" wire:model="price">
            @error('price')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Immagine</label>
            <input class="form-control" id="img" wire:model="img" type="file">
            @error('img')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <label for="category_id" class="form-label">Categoria</label>
        <select class="form-select" aria-label="Default select example" id="category_id" wire:model="category_id">
            <option selected>Seleziona categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Salva</button>
        </div>

    </form>
</div>

<div class="container-fluid py-4 py-md-5">
    <h1 class="text-center mb-4 pt-md-5 fw-bold">Inserisci Annuncio</h1>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form class="p-4 p-md-5 shadow rounded" wire:submit.prevent="store" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" wire:model="title" placeholder="Titolo">
                    <label for="title" class="form-label">Titolo</label>
                    @error('title')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <select class="form-select mb-3 capitalize" aria-label="Default select example" id="category_id"
                wire:model="category_id">
                <option selected>Seleziona categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" class="capitalize">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="description" wire:model="description" placeholder="Descrizione">
                    <label for="description" class="form-label">Descrizione</label>
                    @error('description')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="price" wire:model="price" placeholder="Prezzo">
                    <label for="price" class="form-label">Prezzo</label>
                    @error('price')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="img" class="form-label">Inserisci un'immagine</label>
                    <input class="form-control" id="img" wire:model="img" type="file" placeholder="img">
                    @error('img')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-red btn-lg px-5 w-100 fw-semibold">Crea Annuncio</button>
            </form>
        </div>
    </div>
</div>
