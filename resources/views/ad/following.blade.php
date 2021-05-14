<x-master>
    <x-headers></x-headers>

    <div class="container">
        <div class="row">
            <h1>Controlla lo stato delle tue aste</h1>
        </div>
        <div class="row">
            @if ($offerte->count() > 0)
                @foreach ($offerte as $inserzione)
                    <x-following_preview
                        topOfferta="{{ Auth::user()->offerte->where('id_inserzione', $inserzione->id)->sortByDesc('prezzo')->first()->prezzo > $inserzione->offerte->sortByDesc('prezzo')->first()->prezzo
    ? 1
    : 0 }}">
                        <x-slot name="nome">
                            {{ $inserzione['nome'] }}
                        </x-slot>
                        <x-slot name="prezzo">
                            {{ $inserzione->offerte->sortByDesc('prezzo')->first()->prezzo ?? $inserzione['prezzo'] }}
                        </x-slot>
                        <x-slot name="id">
                            {{ $inserzione['id'] }}
                        </x-slot>
                    </x-following_preview>
                @endforeach
            @else
                Non hai piazzato ancora nessuna asta!
            @endif
        </div>
    </div>
</x-master>
