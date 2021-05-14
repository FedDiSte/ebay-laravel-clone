<div class="card mb-3">
    <img src="{{ asset(App\Models\Inserzione::find($id)->foto->first()->filename) }}" alt="img" class="thumb-post">
    <div class="card-body">
        <h5 class="card-title">{{ $nome }}</h5>
        <strong>Prezzo: </strong>
        <p class="card-text">{{ $prezzo }} €</p>
        <strong>Stato:</strong>
        <p class="card-text @if ($topOfferta==1) text-success @else text-danger @endif">
        @if ($topOfferta == 1) La tua offerta è la più alta @else La tua offerta è
                stata superata @endif
        </p>
        <a href="/inserzione/{{ $id }}" class="btn btn-outline-primary">Apri</a>
    </div>
</div>
