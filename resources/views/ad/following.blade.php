<x-master>
    <x-headers></x-headers>
    <x-search></x-search>

    <div class="container">
        <div class="row">
            <h1>Controlla lo stato delle tue offerte</h1>
        </div>
        <div class="row">
            @if ($offerte->count() > 0)
                @foreach ($offerte->sortByDesc('prezzo')->unique('id_inserzioned') as $offerta)
                    <div class="col-md-3">
                        <x-following_preview
                            topOfferta="{{ $offerta->prezzo >= $offerta->inserzione->prezzo_latest ? 1 : 0 }}">
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
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <h1 class="display-4">Non hai piazzato nessuna offerta!</h1>
                </div>
            @endif
        </div>
    </div>
</x-master>
