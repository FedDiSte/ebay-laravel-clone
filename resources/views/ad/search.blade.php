<x-master>
    <x-headers></x-headers>
    <x-search></x-search>

    <div class="container">
        <div class="row mb-3">
            <div class="dropdown d-grid gap-2 mx-auto ">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Ordina risultati
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>@sortablelink('nome', 'Nome')</li>
                    <li>@sortablelink('prezzo_latest' ?? 'prezzo', 'Prezzo')</li>
                    <li>@sortablelink('fine_inserzione', 'Data fine')</li>
                </ul>
            </div>
        </div>
        @foreach ($inserzioni as $inserzione)
            <div class="row mb-3 mx-md-2">
                <x-search_elements stato="{{ $inserzione->stato }}">
                    <x-slot name="nome">
                        {{ $inserzione->nome }}
                    </x-slot>
                    <x-slot name="prezzo">
                        {{ $inserzione->offerte->max('prezzo') ?? $inserzione->prezzo }}
                    </x-slot>
                    <x-slot name="id">
                        {{ $inserzione->id }}
                    </x-slot>
                </x-search_elements>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $inserzioni->links() }}
        </div>
    </div>
</x-master>
