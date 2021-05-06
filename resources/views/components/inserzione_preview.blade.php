<div class="card mb-3">
    <img src="{{asset('img/dark-placeholder.png')}}" alt="img" class="thumb-post">
    <div class="card-body">
        <h5 class="card-title">{{$nome}}</h5>
        <strong>Prezzo: </strong><p class="card-text">{{$prezzo}} €</p>
        <a href="/inserzione/{{$id}}" class="btn btn-outline-primary">Apri</a>
    </div>
</div>
