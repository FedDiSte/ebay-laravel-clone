<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $title ?? 'Ebay' }}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="FedDiSte">
        <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css')}}">
        <link href="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offCanvasTitle">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offCanvasTitle">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <div class="list-group mb-3">
                <a href="{{url('/')}}" class="list-group-item list-group-item-action"><i class="bi-house"></i>Home</a>
              </div>
              <div class="list-group mb-3">
                <a href="{{url('/profile')}}" class="list-group-item list-group-item-action"><i class="bi-person"></i>Il mio profilo</a>
              </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light {{ $navbar ?? ''}}" style="background-color: #fff">
            <div class="container-fluid">
              <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" aria-label="Apri Il Menu">
                <span class="navbar-toggler-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" aria-label="Apri Il Menu"></span>
              </button>
              <a class="navbar-brand" href="{{@url('/')}}">
                <img src="{{@asset('img/logo/edday_logo_banner.png')}}" alt="Edday" width="100" height="40">
              </a>
              </div>
            </div>
          </nav>

        {{ $slot }}
        <script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>
