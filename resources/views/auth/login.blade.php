<x-main>
    <x-slot name="title">Presto.it | Accedi</x-slot>


    <div class="container py-4 py-md-5">
        <h1 class="text-center mb-4 pt-md-5 fw-bold">Log In</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form class="p-4 p-md-5 shadow rounded" action="{{ route('login') }}" method="POST">
                    @method('POST')
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
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Email" required>
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}" placeholder="Password" required>
                        <label for="password" class="form-label">Password</label>
                    </div>

                    <button type="submit" class="btn btn-red btn-lg px-5 w-100 fw-semibold">Accedi</button>
                </form>
                <p class="text-center mt-2">Non hai ancora un account? 
                    <a href="{{route('register')}}" class="text-decoration-none fw-semibold" style="color: var(--red)">Registrati</a>
                </p>
                <a href="{{route('socialite.login.google')}}" class="text-decoration-none fw-semibold" style="color: var(--red)">Accedi con Google</a>
            </div>
        </div>
    </div>
</x-main>