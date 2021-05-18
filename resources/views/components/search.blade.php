<div class="navbar sticky-top navbar-expand-lg navbar-light mb-3" style="background-color: #fefefe">
    <form action="/search" method="GET" class="container">
        <div class="input-group">
            <span class="input-group-append">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Generi
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach (App\Models\Genere::all() as $genere)
                            <li>
                                <a href="/genere/{{$genere -> id}}" class="dropdown-item">
                                    {{ucfirst($genere -> nome)}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </span>
            <input type="search" name="q" placeholder="Cosa vuoi comprare?" class="form-control mx-2">
            <span class="input-group-append">
                <button class="btn btn-outline-primary" type="submit"><i class="bi-search"></i></button>
            </span>
        </div>
    </form>
</div>
