<x-master>
    <x-headers></x-headers>

    <div class="container mt-2">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="container">
                    <div class="row text-center justify-content-center">
                        <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach ($inserzione->foto as $index => $foto)
                                    <button type="button" data-bs-target="#carousel"
                                        data-bs-slide-to="{{ $index }}" @if ($index == 0) class="active" @endif></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @if ($inserzione->foto->count() > 0)
                                    @foreach ($inserzione->foto as $foto)
                                        <div class="carousel-item
                                @if ($foto==$inserzione->foto->first()) active @endif">
                                            <img src="{{ asset($foto->filename) }}" alt="Placeholder"
                                                class="w-100 d-block thumb-post">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="carousel-item active">
                                        <img src="{{ asset('img/dark-placeholder.png') }}" alt="Placeholder"
                                            class="w-100 d-block thumb-post">
                                    </div>
                                @endif
                            </div>
                            @if ($inserzione->foto->count() > 0)
                                <button class="carousel-control-prev" data-bs-target="#carousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Precedente</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Successiva</span>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p class="card-text" id="countdown"></p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">
                            {{ $inserzione->nome }}
                        </h3>
                        <p class="card-text">
                            {{ $inserzione->descrizione }}
                        </p>
                        <p class="card-text">
                            Prezzo partenza: {{ $inserzione->prezzo }}
                        </p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">
                            Offerte
                        </h3>
                        @if ($inserzione->offerte->count() > 0)
                            <ul class="list-group list-group-flush">
                                @foreach ($inserzione->offerte->sortByDesc('prezzo')->unique('id_utente') as $index => $offerta)
                                    @if ($offerta->utente->id == Auth::id() && ($index == 1))
                                        <li class="list-group-item">
                                            <div class="alert alert-success">
                                                <p class="card-text">
                                                    La tua offerta di {{ $offerta->prezzo }} è la più alta!
                                                </p>
                                            </div>
                                        </li>
                                    @elseif ($offerta -> utente -> id == Auth::id() && !($index == 1))
                                        <li class="list-group-item">
                                            <div class="alert alert-danger">
                                                <p class="card-text">
                                                    La tua offerta di {{ $offerta->prezzo }} è stata superata!
                                                </p>
                                            </div>
                                        </li>
                                    @else
                                        <li class="list-group-item">
                                            Utente: {{$offerta -> utente -> username}} Prezzo: {{ $offerta -> prezzo }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <div class="alert alert-success">
                                <p class="card-text">
                                    Ancora non ci sono offerte, è la tua occasione per aggiudicarti l'asta!
                                </p>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">
                            Ulteriori informazioni
                        </h3>
                        <p class="card-text">
                            Creatore: {{ $inserzione->utente->username }}
                        </p>
                        <p class="card-text">
                            Data creazione: {{ Carbon\Carbon::parse($inserzione->created_at)->format('d/m/Y') }}
                        </p>
                        <p class="card-text">
                            Data fine: {{ Carbon\Carbon::parse($inserzione->fine_inserzione)->format('d/m/Y') }}
                        </p>
                    </div>
                    @if (!(Auth::id() == $inserzione->utente->id))
                        <div class="card-footer d-grid gap-2">
                            <a href="/piazza-offerta/{{ $inserzione->id }}" class="btn btn-lg btn-outline-primary">
                                Piazza un offerta
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            @if (session('status') ?? '' == 'success')
                <div class="row">
                    <div class="col-md-12 alert alert-success">
                        Asta piazzata con successo!
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        var dataTermine = new Date("{{ $inserzione->fine_inserzione }}").getTime();


        var x = setInterval(function() {

            var differenza = dataTermine - Date.parse(new Date());

            var giorni = Math.floor(differenza / (1000 * 60 * 60 * 24));
            var ore = Math.floor((differenza % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minuti = Math.floor((differenza % (1000 * 60 * 60)) / (1000 * 60));
            var secondi = Math.floor((differenza % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML = "Affrettati hai ancora " + giorni + " giorni " +
                ore + " ore " + minuti + " minuti " + secondi + " secondi prima che questa offerta termini";

            if (differenza < 0) {
                clearInterval(x);
                document.getElementById("demo".innerHTML) = "Questa offerta è terminata!";
            }
        }, 1000);

    </script>
</x-master>
