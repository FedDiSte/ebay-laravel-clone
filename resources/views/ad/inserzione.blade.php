<x-master>
    <x-headers></x-headers>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-8">
                <div class="container">
                    <div class="row text-center justify-content-center">
                        <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
                                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1"></button>
                            </div>
                            <div class="carousel-inner">
                                @foreach($inserzione -> foto as $foto)
                                    <div class="carousel-item @if($foto == $inserzione -> foto -> first()) active @endif">
                                        <img src="{{@asset($foto -> filename)}}" alt="Placeholder" class="w-100 d-block thumb-post">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" data-bs-target="#carousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Precedente</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Successiva</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <p class="h1">{{$inserzione['nome']}}</p>
                <p class="h5 text-muted">{{$inserzione['descrizione']}}</p>
                <p class="h3">Prezzo partenza: <small class="text-muted">{{$inserzione['prezzo']}}</small></p>
                <p class="h3">Creatore: <small class="text-muted">@php
                    $utente = $inserzione['utente'];
                    echo $utente['username'];
                @endphp</small></p>
                <p class="h3">Data inizio: <small class="text-muted">{{ Carbon\Carbon::parse($inserzione['created_at']) -> format('d/m/Y')}}</small></p>
                <p class="h3">Data fine: <small class="text-muted">{{ Carbon\Carbon::parse($inserzione['fine_inserzione']) -> format('d/m/Y')}}</small></p>
                {{--TODO da terminare, finire di stampare informazioni su inserzione e metodo per piazzare la propria asta--}}
            </div>
        </div>
    </div>
</x-master>
