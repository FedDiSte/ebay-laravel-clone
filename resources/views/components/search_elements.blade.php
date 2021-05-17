<div class="container card mb-3">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset(App\Models\Inserzione::find($id)->foto->first()->filename) }}" alt="img"
                class="thumb-post">
        </div>
        <div class="col-md-6 card-body">
            <div class="row">
                <h5 class="card-title">{{ $nome }}</h5>
            </div>
            <div class="row d-flex justify-content-around">
                <strong>Prezzo: </strong>
                <p class="card-text">{{ $prezzo }} €</p>
            </div>
            <div class="row d-flex justify-content-around">
                <strong>Stato:</strong>
                <p class="card-text @if ($stato==0) text-success @else text-danger @endif">
                    @if ($stato == 0)
                        Attivo
                    @else
                        Venduto
                    @endif
                </p>
            </div>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-center">
            <a href="{{ url('/inserzione/$id') }}" class="btn btn-lg btn-block btn-outline-primary">Apri</a>
        </div>
    </div>
</div>
