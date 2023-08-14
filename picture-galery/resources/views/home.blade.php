<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Bootstrap Carousel with Cards</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @extends('layouts.app')
    <div class="header" >
        <h1>Galeria fotografica</h1>
    </div>
    @section('content')

    <div class="header">
        <h2>Colecciones</h2>
    </div>

    <div class="container mt-5">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                    $numCards = count($imagesByCollection);
                @endphp
                @for ($i = 0; $i < $numCards; $i += 3)
                <div class="carousel-item  @if($i === 0)active @endif" data-bs-interval="8000">
                    <div class="d-flex justify-content-center">
                        @php
                            $end = min($i + 3, $numCards);
                        @endphp
                        @for ($j = $i; $j < $end; $j++)
                        <div class="card mx-2" style="height: 400px;"> <!-- Ajusta la altura aquí -->
                            <img src="{{$imagesByCollection[$j]->path}}" class="card-img-top img-fluid" alt="{{$imagesByCollection[$j]->title}}" style="max-width: 100%; max-height: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">{{$imagesByCollection[$j]->title}}</h5>
                                <!-- Agrega cualquier otro contenido de la tarjeta aquí -->
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
                @endfor
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
    <hr>
    <div class="header" >
        <h2>Colección personal</h2>
    </div>
    <div class="container mt-5">
        <div id="carouselExample2" class="carousel slide">
            <div class="carousel-inner">
                @php
                    $numCards = count($imagesByCollection);
                @endphp
                @for ($i = 0; $i < $numCards; $i += 2)
                <div class="carousel-item @if($i === 0)active @endif">
                    <div class="d-flex justify-content-center">
                        @php
                            $end = min($i + 2, $numCards);
                        @endphp
                        {{-- @for ($j = $i; $j < $end; $j++)
                        <div class="card mx-2" style="height: 400px;"> <!-- Ajusta la altura aquí -->
                            <img src="{{$imagesByCollection[$j]->path}}" class="card-img-top img-fluid" alt="{{$imagesByCollection[$j]->title}}" style="max-width: 100%; max-height: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">{{$imagesByCollection[$j]->title}}</h5>
                                <!-- Agrega cualquier otro contenido de la tarjeta aquí -->
                            </div>
                        </div>
                        @endfor --}}
                        <div >
                            <img src="{{ asset('../images/new_button.png') }}" style="width:19rem" alt="">
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <a class="carousel-control-prev" href="#carouselExample2" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample2" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#carouselExample').carousel();
            //$('#carouselExample2').carousel();
        });
    </script>
    <footer>
        <div class="container">
            <hr><div class="col text-center">
            <p class="small mb-0">{{ __('Copyright©2023') }}</p>
        </div>
        </div>
    </footer>
    @endsection
</body>
</html>
