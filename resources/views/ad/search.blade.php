<x-master>
    <x-headers></x-headers>
    <x-search></x-search>

    @foreach ($inserzioni as $inserzione)
        {{ $inserzione->nome }}
    @endforeach

    {{-- TODO da migliorare --}}

    {{ $inserzioni->links() }}
</x-master>
