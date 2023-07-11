<div class="container-fluid pb-4 pb-md-5">
    <h1 class="text-center mb-4 pt-md-5 fw-bold">{{ __('ui.addAnnouncement') }}</h1>
    <x-session />
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form class="p-4 p-md-5 shadow rounded" wire:submit.prevent="store" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" wire:model="title"
                        placeholder="{{ __('ui.title') }}">
                    <label for="title" class="form-label">{{ __('ui.title') }}</label>
                    @error('title')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <select class="form-select mb-3 capitalize" aria-label="Default select example" id="category_id"
                    wire:model="category_id">
                    <option selected>{{ __('ui.selectCategory') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="capitalize">
                            @if (Lang::locale() == 'it')
                                {{ $category->name_it }}
                            @elseif (Lang::locale() == 'eng')
                                {{ $category->name_en }}
                            @elseif (Lang::locale() == 'es')
                                {{ $category->name_es }}
                            @endif
                        </option>
                    @endforeach
                </select>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="description" wire:model="description"
                        placeholder="{{ __('ui.description') }}">
                    <label for="description" class="form-label">{{ __('ui.description') }}</label>
                    @error('description')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" step="0.01" id="price" wire:model="price"
                        placeholder="{{ __('ui.price') }}">
                    <label for="price" class="form-label">{{ __('ui.price') }}</label>
                    @error('price')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input wire:model="temporary_images" type="file" name="images" multiple
                        class="form-control shadow @error('temporay_images.*') is-invalid"@enderror placeholder="img" />
                    @error('temporary_images.*')
                        <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @if (!empty($images))
                    <div class="row">
                        <div class="col-12">
                            <p>Photo preview</p>
                            <div class="row border border-4 border-info rounded shadow py-4">
                                @foreach ($images as $key => $image)
                                    <div class="col my-3">
                                        <div class="img-preview mx-auto shadow rounded"
                                            style="background-image: url({{ $image->temporaryUrl() }})"></div>
                                        <button type="button"
                                            class="btn btn-danger shadow d-block text-center mt-2 mx-auto"
                                            wire:click="removeImage({{ $key }})">Cancella
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit"
                    class="btn btn-red btn-lg px-5 w-100 fw-semibold">{{ __('ui.createAnnouncement') }}</button>
            </form>
        </div>
    </div>
</div>
