<x-master>
    <x-headers></x-headers>
    <div class="container">
        <div class="row">
            <div class="col-md-12 card text-center my-5 px-5 py-2">
                <h3 class="card-title mb-2">
                    Il tuo profilo
                </h3>
                <h5 class="card-subtitle mb-3 text-muted">
                    Rivedi le tue informazioni
                </h5>
                <div class="text-start">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item mb-3">
                            <p><strong>Username: </strong></p><p class="lead">{{$username}}</p>
                        </li>
                        <li class="list-group-item mb-3">
                            <p><strong>Nome: </strong></p><p class="lead">{{$nome}}</p>
                        </li>
                        <li class="list-group-item mb-3">
                            <p><strong>Cognome: </strong></p><p class="lead">{{$cognome}}</p>
                        </li>
                        <li class="list-group-item mb-3">
                            <p><strong>Email: </strong></p><p class="lead">{{$email}}</p>
                        </li>
                        <li class="list-group-item mb-3">
                            <p><strong>Data creazione: </strong></p><p class="lead">{{$data_creazione}}</p>
                        </li>
                    </ul>
                </div>
                <div class="row align-items-center mb-3">
                    <a href="{{url('/logout')}}" class="btn btn-lg btn-block btn-outline-danger">Effettua il logout</a>
                </div>
            </div>
        </div>
    </div>

</x-master>
