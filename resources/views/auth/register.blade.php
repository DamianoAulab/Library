<x-main>
    <x-slot name="title">Presto.it | Registrati</x-slot>

    <div class="container py-md-5">
        <h1 class="text-center mb-4 fw-bold">Registrati</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form class="p-4 p-md-5 shadow rounded" action="{{ route('register') }}" method="POST">
                    @method('POST')
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Username" required>
                        <label for="name" class="form-label">Username</label>
                        @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Email" required>
                        <label for="email" class="form-label">Email</label>
                        @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" placeholder="numero di telefono" required>
                        <label for="phone" class="form-label">Telefono</label>
                        @error('phone')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}" placeholder="Password" required>
                        <label for="password" class="form-label">Password</label>
                        @error('password')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="{{ old('confirm_password') }}" placeholder="Confirm Password" required>
                        <label for="password_confirmation" class="form-label">Conferma password</label>
                        @error('password_confirmation')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="gender" name="gender" required>
                            <option selected value="Maschio">Maschio</option>
                            <option value="Femmina">Femmina</option>
                            <option value="Non binario">Non binario</option>
                        </select>
                        <label for="gender">Genere</label>
                        @error('gender')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="birthday" name="birthday" type="date" value="{{ old('birthday') }}" placeholder="Birthday User">
                        <label for="birthday">Data di nascita</label>
                        @error('birthday')
                            <span class="text-danger">
                                {{$message}}
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

                    <button type="submit" class="btn btn-red btn-lg px-5 w-100 fw-semibold">Registrati</button>
                </form>
                <p class="text-center mt-2">Hai già un account? 
                    <a href="{{route('login')}}" class="text-decoration-none fw-semibold" style="color: var(--red)">Accedi</a>
                </p>
            </div>
        </div>
    </div>
</x-main>