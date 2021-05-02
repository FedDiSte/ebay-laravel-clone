<x-master>
    <x-slot name="navbar">
        none
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 my-5 px-5 py-2 card">
                <div class="card-img">
                    <img src="{{asset('img/logo/edday_logo_banner.png')}}" alt="Edday logo" class="card-img-top">
                </div>
                <form action="/register" method="POST" class="form-floating">
                    @csrf
                    <div class="form-floating my-3">
                        <input type="text" name="nome" id="floatingNome" placeholder="Nome" class="form-control" required>
                        <label for="floatingNome">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="cognome" id="floatingCognome" placeholder="Cognome" class="form-control" required>
                        <label for="floatingCognome">Cognome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingUsername" placeholder="Username" name="username" aria-describedby="usernameHelp" required>
                        <label for="floatingUsername">Username</label>
                        @if ($status == 'username_not_unique')
                            <div class="form-text text-danger" id="usernameHelp">Hai inserito un username gia utilizzato, perfavore riprova</div>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmail" placeholder="nome.cognome@esempio.com" name="email" aria-describedby="emailHelp" required>
                        <label for="floatingEmail">Indirizzo email</label>
                        @if ($status == 'email_not_unique')
                            <div class="form-text text-danger" id="emailHelp">Hai inserito un email gia utilizzata, perfavore riprova</div>
                        @endif
                      </div>
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                      </div>
                      <div class="row align-items-center mb-3">
                          <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Registrati</button>
                      </div>
                </form>
                <div class="mb-3 text-md-center">
                    <small class="text-muted">Hai gia un account? Effettua il <a href="{{url('/login')}}" role="button">Login</a></small>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        @if ($status == 'completed')
            <div class="row justify-content-center">
                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Eddday</strong>
                        <button class="btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Registrazione completata! Ora puoi effettuare il <a href="{{url('/login')}}" role="button">Login</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-master>
