<x-master>
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-5 px-5 py-2 card text-center">
                <h3 class="card-title">Crea la tua inserzione</h3>
                <div class="text-start">
                    <form action="/create-ad" method="POST" class="form-floating">
                        @csrf
                        {{-- TODO da aggiungere controlli su lunghezza dati --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingNome" placeholder="Nome" name="nome"
                                   aria-describedby="nomeHelp" required>
                            <label for="floatingNome">Nome</label>
                            <div id="nomeHelp" class="form-text">Massimo 30 caratteri.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="floatingTextArea" name="descrizione"
                                      placeholder="Descrizone" aria-describedby="descHelp" style="height: 7em"
                                      required></textarea>
                            <label for="floatingTextArea">Descrizione</label>
                            <div id="descHelp" class="form-text">Massimo 250 caratteri</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPrice" name="prezzo"
                                   placeholder="Prezzo" required>
                            <label for="floatingPrice">Prezzo (€)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingDate" name="fine_inserzione"
                                   placeholder="Data termine" required>
                            <label for="floatingDate">Data Termine</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="genere_id" id="floatingSelect" class="form-select">
                                @foreach(\App\Models\Genere::all() as $genere)
                                    <option value="{{$genere -> id}}">{{ucfirst($genere -> nome)}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Inserisci un genere</label>
                        </div>
                        <div class="row align-items-center mb-3">
                            <p class="text-danger form-text text-center" id="buttonHelp">
                                Attenzione questi dati (per ora) {{--TODO da aggiungere possibilita modifica--}} non potranno essere modificati una volta inseriti
                            </p>
                            <button type="submit" class="btn btn-lg btn-block btn-outline-primary" aria-describedby="buttonHelp">Aggiungi questa
                                inserzione
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master>
