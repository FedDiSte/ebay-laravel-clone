<x-master>
    <x-slot name="navbar">
        none
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 my-5 px-5 py-2 card">
                <div class="card-img">
                    <img src="{{ asset('img/logo/edday_logo_banner.png') }}" alt="Edday logo" class="card-img-top">
                </div>
                <form action="/login" method="POST" class="form-floating">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingUsername" placeholder="Username"
                            name="username" aria-describedby="usernameHelp" required>
                        <label for="floatingUsername">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                            name="password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="flexCheckDefault" name="remember">
                        <label for="flexCheckDefault" class="form-check-label">Ricordami</label>
                    </div>
                    <div class="row align-items-center mb-3">
                        <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Effettua
                            l'accesso</button>
                    </div>
                </form>
                <div class="mb-3 text-md-center">
                    <small class="text-muted">Non hai un account? <a href="{{ url('/register') }}"
                            role="button">Registrati</a></small>
                </div>
                <div class="mb-3 text-md-center">
                    <small class="text-muted">Password dimenticata? <a href="{{ url('/forgot-password') }}"
                            role="button">Cambiala</a></small>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        @if (session('status'))
            <div class="col-md-3"></div>
            <div class="col-md-6 alert alert-success">
                La password è stata cambiata correttamente!
            </div>
            <div class="col-md-3"></div>
        @endif
        @error('status')
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 alert alert-danger">
                    Username o password errati, per favore riprova.
                </div>
                <div class="col-md-3"></div>
            </div>
        @enderror
    </div>

</x-master>
