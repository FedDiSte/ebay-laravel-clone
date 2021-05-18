<x-master>
    <x-headers></x-headers>
    <x-search></x-search>

    <div class="container">
        <div class="row text-center">
            <p class="h1">I nostri consigli</p>
            <p class="h3">Esplora la nostra selezione di aste, divise per genere</p>
        </div>
        @foreach (App\Models\Genere::all() as $genere)
            <div class="row mb-3">
                <p class="h1 text-primary">{{ ucfirst($genere->nome) }}</p>
            </div>
            <div class="row">
                @if (App\Models\Inserzione::where('genere_id', $genere->id)->where('stato', 0)->get()->count() > 0)
                    @foreach (App\Models\Inserzione::where('genere_id', $genere->id)->where('stato', 0)->get()->take(4)
    as $inserzione)
                        <div class="col-md-3">
                            <x-inserzione_preview stato="{{ $inserzione->stato }}">
                                <x-slot name="nome">
                                    {{ $inserzione->nome }}
                                </x-slot>
                                <x-slot name="prezzo">
                                    {{ $inserzione->offerte->max('prezzo') ?? $inserzione->prezzo }}
                                </x-slot>
                                <x-slot name="id">
                                    {{ $inserzione->id }}
                                </x-slot>
                            </x-inserzione_preview>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 mb-3">
                        <h6 class="display-6 text-muted">
                            Ci dispiace ma non abbiamo trovato inserzioni per questo genere
                        </h6>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</x-master>
