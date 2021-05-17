<x-master>
    <x-headers></x-headers>
    <x-search></x-search>

    @foreach ($inserzioni as $inserzione)
        <x-search_elements stato="{{$inserzione -> stato}}">
            <x-slot name="nome">
                {{$inserzione -> nome}}
            </x-slot>
            <x-slot name="prezzo">
                {{ $inserzione -> offerte -> max('prezzo') ?? $inserzione -> prezzo }}
            </x-slot>
            <x-slot name="id">
                {{ $inserzione -> id }}
            </x-slot>
        </x-search_elements>
    @endforeach

    <!-- TODO aggiornare la grafica di questa pagina-->

    {{ $inserzioni->links() }}
</x-master>
