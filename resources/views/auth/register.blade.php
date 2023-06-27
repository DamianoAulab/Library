<x-main>
    <div class="p-5 container mt-5 shadow text-center">
        <form action="{{route('register')}}" method="POST">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Conferma password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Registrati</button>
        </form>
        <p>Hai già un account? 
            <a href="{{route('login')}}">Accedi qui</a>
        </p>
    </div>
</x-main>