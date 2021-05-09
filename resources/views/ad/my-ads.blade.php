<x-master>
    <x-headers></x-headers>


    <div class="container">
        <div class="row mb-3">
            <p class="h1">Controlla lo stato delle tue inserzioni</p>
        </div>
        <div class="row @if( ! (($inserzioni -> count()) > 0) ) text-center @endif ">
            @if(($inserzioni -> count()) > 0)
                @foreach ($inserzioni as $inserzione)
                    <div class="col-md-3">
                        <x-inserzione_preview stato="{{$inserzione['stato']}}">
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
            @else
                <div class="col-md-12 alert alert-danger text-align-center text-justify-center">
                    <p>
                        Non hai creato nessuna inserzione, <a href="{{url('/create-ad')}}">Creala</a>
                    </p>
                </div>
            @endif
        </div>
    </div>
</x-master>
