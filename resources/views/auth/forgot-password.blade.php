<x-master>
    <x-slot name="navbar">
        none
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 my-5 px-5 py-2 card">
                <p class="h1">Password dimenticata?</p>
                <p class="small">Inserisci il tuo indirizzo email e ti invieremo una mail per cambiarla</p>
                <form action="/forgot-password" method="POST" class="form-floating">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmail" placeholder="Email" name="email" aria-describedby="emailHelp" required>
                        <label for="floatingEmail">Email</label>
                    </div>
                    <div class="row align-items-center mb-3">
                          <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Invia l'email</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                Ti abbiamo inviato la mail per resettare la password
            </div>
        @endif
        @error($errors -> any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach ($errors -> all() as $error)
                        <li class="list-group-item list-group-item-danger">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @enderror
    </div>
</x-master>
