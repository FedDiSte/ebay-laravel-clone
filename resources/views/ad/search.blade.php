<x-master>
    <x-headers></x-headers>
    <x-search></x-search>

    @foreach ($inserzioni as $inserzione)
        {{ $inserzione->nome }}
    @endforeach

    <!-- TODO aggiornare la grafica di questa pagina-->

    {{ $inserzioni->links() }}
</x-master>
