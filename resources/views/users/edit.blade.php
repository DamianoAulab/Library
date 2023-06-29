<x-main>
    <x-slot name="title">Presto.it | Modifica Profilo - {{ $user->name }}</x-slot>

    <div class="container py-md-5">
        <h1 class="text-center mb-4 fw-bold">Modifica Profilo</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form class="p-3 p-md-5 shadow rounded" action="{{ route('users.update', ['user' => Auth::user()]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" placeholder="Username" required>
                        <label for="name" class="form-label">Username</label>
                        @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" placeholder="Email" required>
                        <label for="email" class="form-label">Email</label>
                        @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}" placeholder="numero di telefono" required>
                        <label for="phone" class="form-label">Telefono</label>
                        @error('phone')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="gender" name="gender">
                            <option @if ($user->gender == 'Maschio') selected @endif value="Maschio">Maschio</option>
                            <option @if ($user->gender == 'Femmina') selected @endif value="Femmina">Femmina</option>
                            <option @if ($user->gender == 'Non binario') selected @endif value="Non binario">Non binario</option>
                        </select>
                        <label for="gender">Gender</label>
                        @error('gender')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="birthday" name="birthday" type="date" value="{{ isset($user->birthday) ? $user->birthday->format('Y-m-d') : ''}}" placeholder="Birthday User">
                        <label for="birthday">Data di nascita</label>
                        @error('birthday')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                        @enderror
                    </div>

                    <div class="form mb-3">
                        <label for="actual-img" class="fs-2 d-block text-center fw-bold mb-2 px-0">Immagine Attuale</label>
                        <img class="card-img-top mb-0 mb-md-0"
                            src="@if (Auth::user()->gender == 'Femmina') 
                            {{empty(Auth::user()->img) ? '/img/female-placeholder.jpg' : Storage::url(Auth::user()->img)}}
                        @elseif (Auth::user()->gender == 'Maschio') 
                            {{empty(Auth::user()->img) ? '/img/male-placeholder.jpeg' : Storage::url(Auth::user()->img)}}
                        @elseif (Auth::user()->gender == 'Non binario')
                            {{empty(Auth::user()->img) ? '/img/non-binary-placeholder.png' : Storage::url(Auth::user()->img)}}
                        @endif"
                            alt="">
                    </div>
    
                    <div class="form mb-3">
                        <label class="mb-2 text-dark text-opacity-75" for="img"><em>Carica Nuova Immagine Profilo</em></label>
                        <input class="form-control" id="img" name="img" type="file" value=""
                            placeholder="Image User">
                        @error('img')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-red btn-lg px-md-5 w-100 fw-semibold">Modifica Profilo</button>
                </form>
            </div>
        </div>
    </div>
</x-main>