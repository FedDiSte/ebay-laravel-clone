<x-master>
    <x-headers></x-headers>

    <div class="container">
        <div class="row">
            <div class="col-md-12 card my-5 px-5 py-2 text-center">
                <h3 class="card-title">{{ $inserzione->nome }}</h3>
                <h4 class="card-subtitle mb-2 text-muted">Prezzo attuale:
                    {{ $inserzione->offerte->max('prezzo') ?? $inserzione->prezzo }}€
                </h4>
                <div class="text-start">
                    <form action="/piazza-offerta" method="POST" class="form-floating">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPrezzo" name="prezzo"
                                placeholder="Prezzo" aria-describedby="prezzoHelp">
                            <label for="floatingPrezzo">La tua offerta</label>
                            <div class="prezzoHelp" class="form-text">Piazza la tua offerta, una volta piazzata non può
                                essere rimossa</div>
                        </div>
                        <input type="hidden" name="id_inserzione" value="{{ $inserzione->id }}">
                        <button type="submit" class="btn btn-lg btn-block btn-outline-primary mb-3">
                            Piazza la tua offerta
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @if ($status ?? '' == 'not valid')
            <div class="row">
                <div class="col-md-12 alert alert-danger">
                    <p>Asta non riuscita, il prezzo era troppo basso</p>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="row">
                <div class="col-md-12 alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
</x-master>
