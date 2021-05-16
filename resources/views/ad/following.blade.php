<x-master>
    <x-headers></x-headers>

    <div class="container">
        <div class="row">
            <h1>Controlla lo stato delle tue offerte</h1>
        </div>
        <div class="row">
            @if ($offerte->count() > 0)
                @foreach ($offerte->sortByDesc('prezzo')->unique('id_offerta') as $offerta)
                    <x-following_preview
                        topOfferta="{{ $offerta->prezzo >= $offerta->inserzione->offerte->sortByDesc('prezzo')->first()->prezzo ? 1 : 0 }}">
                        <x-slot name="nome">
                            {{ $offerta->inserzione->nome }}
                        </x-slot>
                        <x-slot name="prezzo">
                            {{ $offerta->prezzo }}
                        </x-slot>
                        <x-slot name="id">
                            {{ $offerta->inserzione->id }}
                        </x-slot>
                    </x-following_preview>
                @endforeach
            @else
                <div class="col-md-12">
                    <h1 class="display-4">Non hai piazzato nessuna offerta!</h1>
                </div>
            @endif
        </div>
    </div>
</x-master>
