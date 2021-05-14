<div class="card mb-3">
    <img src="{{ asset(App\Models\Inserzione::find($id)->foto->first()->filename) }}" alt="img" class="thumb-post">
    <div class="card-body">
        <h5 class="card-title">{{ $nome }}</h5>
        <strong>Prezzo: </strong>
        <p class="card-text">{{ $prezzo }} €</p>
        <strong>Stato:</strong>
        <p class="card-text @if ($stato==0) text-success @else text-danger @endif">
            @if ($stato == 0) Attivo @else Venduto @endif
        </p>
        <a href="/inserzione/{{ $id }}" class="btn btn-outline-primary">Apri</a>
    </div>
</div>
