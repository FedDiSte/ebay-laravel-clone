<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offCanvasTitle">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offCanvasTitle">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="list-group mb-3">
            <a href="{{ url('/') }}" class="list-group-item list-group-item-action"><i class="bi-house"></i>
                Home</a>
        </div>
        <div class="list-group mb-3">
            <a href="{{ url('/profile') }}" class="list-group-item list-group-item-action"><i class="bi-person"></i>
                Il
                mio profilo</a>
        </div>
        <div class="list-group mb-3">
            <a href="{{ url('/create-ad') }}" class="list-group-item list-group-item-action"><i
                    class="bi-bag-plus"></i>
                Crea una nuova inserzione</a>
        </div>
        <div class="list-group mb-3">
            <a href="{{ url('/my-ads') }}" class="list-group-item list-group-item-action"><i
                    class="bi-check-circle"></i>
                Le mie inserzioni</a>
        </div>
        <div class="list-group mb-3">
            <a href="{{ url('/following') }}" class="list-group-item list-group-item-action"><i class="bi-search"></i>
                Aste piazzate</a>
        </div>
        <div class="list-group mb-3" style="position: relative; bottom: 0">
            <a href="{{ url('/logout') }}" class="list-group-item list-group-item-danger list-group-item-action"><i
                    class="bi-person-x"></i> Effettua il logout</a>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light mb-3" style="background-color: #fff">
    <div class="container-fluid">
        <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
            aria-controls="offcanvas" aria-label="Apri Il Menu">
            <span class="navbar-toggler-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
                aria-controls="offcanvas" aria-label="Apri Il Menu"></span>
        </button>
        <a class="navbar-brand" href="{{ @url('/') }}">
            <img src="{{ @asset('img/logo/edday_logo_banner.png') }}" alt="Edday" width="100" height="40">
        </a>
    </div>
    </div>
</nav>
