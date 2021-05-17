<x-master>
    <x-headers></x-headers>
    <x-search></x-search>

    <div class="container">
        <!--TODO: Da sistemare links-->
        @sortablelink('nome', 'Nome')
        @sortablelink('prezzo_latest' ?? 'prezzo', 'Prezzo')
        @sortablelink('fine_inserzione', 'Data fine')
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

    <!-- TODO aggiornare la grafica di questa pagina-->
</x-master>
