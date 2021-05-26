<x-master>
    <x-slot name="navbar">
        none
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 my-5 px-5 py-2 card">
                <p class="h1">Password dimenticata?</p>
                <p class="small">Inserisci la tua mail e ti arriverà una mail per cambiarla</p>
                <form action="/reset-password" method="POST" class="form-floating">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingEmail" placeholder="Email" name="email"
                            aria-describedby="emailHelp" required>
                        <label for="floatingEmail">Email</label>
                        @if ($status ?? '' == 'email_not_found')
                            <div class="form-text text-danger" id="emailHelp">Email non trovata, riprova</div>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                            name="password" required>
                        <label for="floatingPassword">Nuova password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword_confirmation"
                            placeholder="Conferma password" name="password_confirmation" required>
                        <label for="floatingPassword_confirmation">Conferma password</label>
                    </div>
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="row align-items-center mb-3">
                        <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Cambia la tua
                            password</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
        @if ($errors -> any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach ($errors -> all() as $error)
                        <li class="list-group-item list-group-item-danger">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-master>
