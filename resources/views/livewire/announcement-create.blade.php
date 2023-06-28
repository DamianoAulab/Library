<div class="p-5 container mt-5 shadow text-center">
    @if (session()->has('task'))
    <div class="alert alert-success">
      {{ session('task') }}
    </div>
    @endif
    <form wire:submit.prevent="store" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="title" wire:model="title">
        @error('title')
        <span class="error text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <input type="text" class="form-control" id="description" wire:model="description">
        @error('description')
        <span class="error text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="text" class="form-control" id="price" wire:model="price">
        @error('price')
        <span class="error text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="img" class="form-label">Immagine</label>
        <input class="form-control" id="img" wire:model="img" type="file">
        @error('img')
        <span class="error text-danger">{{$message}}</span>
        @enderror
      </div>
      <label for="category_id" class="form-label">Categoria</label>
      <select class="form-select" aria-label="Default select example" id="category_id" wire:model="category_id">
        <option selected>Seleziona categoria</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">
          {{$category->name}}
        </option>
        @endforeach
      </select>
      <div class="mt-3">
        <button type="submit" class="btn btn-primary">Salva</button>
      </div>
      
    </form>
  </div>