<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
    <title>Responsive Image Grid</title>
</head>
<body>
    @extends('layouts.app')


    @section('content')
    <div class="header">
        <h1>Colecciones</h1>
    </div>
    <div class="container">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($image as $index => $image)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="card" style="width: 28rem;">
                            <img src="{{ asset($image->path) }}" class="card-img-top" alt="{{ $image->title }}">
                            <div class="card-body">
                              <h5 class="card-title">{{ $image->title }}</h5>
                              <p class="card-text">{{ $image->details }}</p>
                            </div>
                          </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


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
