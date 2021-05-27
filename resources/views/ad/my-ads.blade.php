<x-master>
    <x-headers></x-headers>


    <div class="container">
        <div class="row mb-3">
            <p class="h1">Controlla lo stato delle tue inserzioni</p>
        </div>
        <div class="row @if( ! (($inserzioni -> count()) > 0) ) text-center @endif ">
            @if ($inserzioni->count() > 0)
                <div class="row mb-3">
                    <div class="dropdown d-grid gap-2 mx-auto ">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Ordina risultati
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>@sortablelink('nome', 'Nome')</li>
                            <li>@sortablelink('prezzo_latest' ?? 'prezzo', 'Prezzo')</li>
                            <li>@sortablelink('fine_inserzione', 'Data fine')</li>
                        </ul>
                    </div>
                </div>
                <div class="row text-center">
                    @foreach ($inserzioni->sortBy('stato') as $inserzione)
                        <div class="col-md-3">
                            <x-inserzione_preview stato="{{ $inserzione['stato'] }}">
                                <x-slot name="nome">
                                    {{ $inserzione['nome'] }}
                                </x-slot>
                                <x-slot name="prezzo">
                                    {{ $inserzione->prezzo_latest ?? $inserzione['prezzo'] }}
                                </x-slot>
                                <x-slot name="id">
                                    {{ $inserzione['id'] }}
                                </x-slot>
                            </x-inserzione_preview>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row">
                    <div class="col-md-12 alert alert-danger text-align-center text-justify-center">
                        <p>
                            Non hai creato nessuna inserzione, <a href="{{ url('/create-ad') }}">Creala</a>
                        </p>
                    </div>
                </div>
            @endif
            <div class="d-flex justify-content-center">
                {{ $inserzioni->links() }}
            </div>
        </div>
    </div>
</x-master>
