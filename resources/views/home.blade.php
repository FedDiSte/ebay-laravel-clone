<x-master>
    <x-headers></x-headers>

    <div class="container">
        <div class="row">
            @foreach ($inserzioni as $inserzione)
            <div class="col-md-3">
                <x-inserzione_preview>
                    <x-slot name="nome">
                        {{$inserzione['nome']}}
                    </x-slot>
                    <x-slot name="prezzo">
                        {{$inserzione['prezzo']}}
                    </x-slot>
                    <x-slot name="id">
                        {{$inserzione['id']}}
                    </x-slot>
                </x-inserzione_preview>
            </div>
        @endforeach
        </div>
    </div>
</x-master>
