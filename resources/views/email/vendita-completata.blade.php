<x-master>

    <div class="container">
        <div class="row">
            <div class="col-md-12 card">
                <h3 class="card-title">Vendita completata!</h3>
                <h5 class="card-subtitle text-muted">
                    {{ $inserzione->nome }}
                </h5>
                <p class="card-text">
                    Ciao, {{ $inserzione->utente->nome }} {{ $inserzione->utente->cognome }} !
                </p>
                <p class="card-text">Sei riuscito a vendere il tuo prodotto a
                    {{ $inserzione->offerte->max('prezzo')->prezzo }}€!
                </p>
                <p class="card-text">Ora mettiti in contatto con l'acquirente per terminare la proceduta</p>
                <p class="card-text">
                    Nome: {{ $inserzione->offerte->max('prezzo')->utente->nome }}
                    Cognome: {{ $inserzione->offerte->max('prezzo')->utente->cognome }}
                    Email: {{ $inserzione->offerte->max('prezzo')->utente->email }}
                </p>
            </div>
        </div>
    </div>

</x-master>
