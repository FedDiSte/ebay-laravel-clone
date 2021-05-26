<x-master>
    <x-slot name="navbar">
        none
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 my-3 px-5 py-2 card">
                <div class="card-img">
                    <img src="{{ asset('img/logo/edday_logo_banner.png') }}" alt="Edday logo"
                        class="card-img-top img-fluid">
                </div>
                @if ($status == 'completed')
                    <div class="alert alert-success">
                        <p class="card-text">
                            Registrazione completata! Ora puoi effettuare il <a href="{{ url('/login') }}"
                                role="button">Login</a>
                        </p>
                    </div>
                @endif
                <form action="/register" method="POST" class="form-floating">
                    @csrf
                    <div class="form-floating my-3">
                        <input type="text" name="nome" id="floatingNome" placeholder="Nome" class="form-control"
                            aria-describedby="nomeHelp" required>
                        <label for="floatingNome">Nome</label>
                        @if ($errors->has('nome'))
                            @foreach ($errors->get('nome') as $error)
                                <div class="text-danger form-text" id="nomeHelp">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="cognome" id="floatingCognome" placeholder="Cognome"
                            class="form-control" aria-describedby="cognomeHelp" required>
                        <label for="floatingCognome">Cognome</label>
                        @if ($errors->has('cognome'))
                            @foreach ($errors->get('cognome') as $error)
                                <div class="text-danger form-text" id="cognomeHelp">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingUsername" placeholder="Username"
                            name="username" aria-describedby="usernameHelp" required>
                        <label for="floatingUsername">Username</label>
                        @if ($errors->has('username'))
                            @foreach ($errors->get('username') as $error)
                                <div class="text-danger form-text" id="usernameHelp">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmail"
                            placeholder="nome.cognome@esempio.com" name="email" aria-describedby="emailHelp" required>
                        <label for="floatingEmail">Indirizzo email</label>
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $error)
                                <div class="text-danger form-text" id="emailHelp">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                    {{-- TODO aggiungere controllo per password se <8 caratteri --}}
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="floatingPassword"
                            placeholder="Password" aria-describedby="passwordHelp" required>
                        <label for="floatingPassword">Password</label>
                        @if ($errors->has('password'))
                            @foreach ($errors->get('password') as $error)
                                <div class="text-danger form-text" id="passwordHelp">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <select name="genere_preferito" id="floatingSelect" class="form-select"
                            aria-describedby="genereHelp">
                            @foreach (\App\Models\Genere::all() as $genere)
                                <option value="{{ $genere->id }}">{{ ucfirst($genere->nome) }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Genere preferito</label>
                        <div class="form-text" id="genereHelp">
                            Scegliere un genere preferito ci aiuta a personalizzare i risultati, in futuro potrai
                            cambiarlo
                        </div>
                        <div class="row align-items-center mb-3 mt-1">
                            <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Registrati</button>
                        </div>
                    </div>
                </form>
                <div class="mb-3 text-md-center">
                    <small class="text-muted">Hai gia un account? Effettua il <a href="{{ url('/login') }}"
                            role="button">Login</a></small>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</x-master>
