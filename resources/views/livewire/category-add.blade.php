<div class="container-fluid pb-4 pb-md-5">
    <h1 class="text-center mb-4 pt-md-5 fw-bold">AGGIUNGI CATEGORIA</h1>
    <x-session />
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form class="p-4 p-md-5 shadow rounded" wire:submit.prevent="add" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name_it" wire:model="name_it"
                        placeholder="Categoria in italiano">
                    <label for="name_it" class="form-label">Categoria in italiano</label>
                    @error('name_it')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name_en" wire:model="name_en"
                        placeholder="Categoria in inglese">
                    <label for="name_en" class="form-label">Categoria in inglese</label>
                    @error('name_en')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name_es" wire:model="name_es"
                        placeholder="Categoria in spagnolo">
                    <label for="name_es" class="form-label">Categoria in spagnolo</label>
                    @error('name_es')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <select class="form-select mb-3 capitalize" aria-label="Default select example" id="macro"
                    wire:model="macro">
                    <option selected>SELEZIONA MACRO</option>
                    
                    <option value="motori" class="capitalize">
                        Motori
                    </option>
                    <option value="immobili" class="capitalize">
                        Immobili
                    </option>
                    <option value="market" class="capitalize">
                        Market
                    </option>
                    
                </select>
                {{-- <div class="form-floating mb-3">
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
                    <label for="img" class="form-label">{{__('ui.addImages')}}</label>
                    <input wire:model="temporary_images" type="file" name="images" multiple
                        class="form-control shadow @error('temporay_images.*') is-invalid"@enderror placeholder="img" />
                    @error('temporary_images.*')
                        <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @if (!empty($images))
                    <div class="row mb-4">
                        <div class="col-12">
                            <p>{{__('ui.previewImages')}}</p>
                            <div class="row rounded shadow py-4 mx-1">
                                @foreach ($images as $key => $image)
                                    <div class="col px-0">
                                        <div class="img-preview mx-auto shadow rounded"
                                            style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                        <button type="button"
                                            class="btn btn-red shadow d-block text-center mt-2 mb-3 mx-auto"
                                            wire:click="removeImage({{ $key }})">{{__('ui.delete')}}
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
                @endif --}}

                <button type="submit"
                    class="btn btn-red btn-lg px-5 w-100 fw-semibold">{{ __('ui.createAnnouncement') }}</button>
            </form>
        </div>
    </div>
</div>