<div class="container-fluid pb-4 pb-md-5">
    <h1 class="text-center mb-4 pt-md-5 fw-bold">{{__('ui.editAnnouncement')}}</h1>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form class="p-4 p-md-5 shadow rounded" wire:submit.prevent="update" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" id="title" wire:model="announcement.title" placeholder="{{__('ui.title')}}">
                    <label for="title" class="form-label">{{__('ui.title')}}</label>
                    @error('title')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <select class="form-select mb-3 capitalize" aria-label="Default select example" id="category_id"
                wire:model="category_id">
                <option selected> {{__('ui.toInsert')}} </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" class="capitalize">
                        @if (Lang::locale() == 'it') {{$category->name_it}} @elseif (Lang::locale() == 'eng') {{$category->name_en}} @elseif (Lang::locale() == 'es') {{$category->name_es}} @endif
                    </option>
                @endforeach
            </select>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="description" wire:model="announcement.description" placeholder="{{__('ui.description')}}">
                    <label for="description" class="form-label">{{__('ui.description')}}</label>
                    @error('description')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="price" step="0.01" wire:model="announcement.price" placeholder="{{__('ui.price')}}">
                    <label for="price" class="form-label">{{__('ui.price')}}</label>
                    @error('price')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="img" class="form-label">{{__('ui.addImage')}}</label>
                    <input class="form-control" id="img" wire:model="announcement.img" type="file" placeholder="img">
                    @error('img')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-red btn-lg px-5 w-100 fw-semibold">{{__('ui.update')}}</button>
            </form>
        </div>
    </div>
</div>

