<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería fotográfica</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @extends('layouts.app')
    <div class="header" >
        <h1>Galería fotográfica</h1>
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
                <div class="carousel-item @if($i === 0)active @endif" data-bs-interval="8000">
                    <div class="d-flex justify-content-center">
                        @php
                            $end = min($i + 3, $numCards);
                        @endphp
                        @for ($j = $i; $j < $end; $j++)
                            @if($imagesByCollection[$j]['users_id'] !== '5')
                            <div class="card mx-2" style="height: 400px;">
                                <div class="img-hover-zoom">
                                    <a href="{{ route('collection.show', [
                                        'collection_id' => $imagesByCollection[$j]['collection_id'],
                                        'collection_title' => $imagesByCollection[$j]['collection_title'],
                                        'users_id' => $imagesByCollection[$j]['users_id'],
                                        'collection_details' => $imagesByCollection[$j]['collection_details']
                                    ]) }}">
                                        <img src="{{ $imagesByCollection[$j]['path'] }}" class="card-img-top img-fluid" alt="{{ $imagesByCollection[$j]['title'] }}" style="max-width: 100%; max-height: 100%;">
                                        <div class="card-body">
                                            <h3 class="carousel-title">{{ $imagesByCollection[$j]['collection_title'] }}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endif
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
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $numCards = count($imagesByCollection);
                    @endphp
                    @if ($numCards > 0)
                    @for ($i = 0; $i < $numCards; $i += 4)
                    <div class="carousel-item @if($i === 0)active @endif" data-bs-interval="8000">
                        <div class="d-flex justify-content-center">
                            @php
                                $end = min($i + 4, $numCards);
                            @endphp
                           @for ($j = $i; $j < $end; $j++)
                           @if($imagesByCollection[$j]['users_id'] === '5')
                            @if ($j===0)
                            <div class="card mx-2" style="height: 400px;">
                                <div class="img-hover-zoom">
                                    <div >
                                        <a href="{{ route('collection.show', [
                                            'collection_id' => 'f6e5ccbe-3085-463d-af1e-442e0ada244e',
                                            'collection_title' => 'Crea tu nueva Galería!',
                                            'users_id' => $imagesByCollection[0]['users_id'],
                                            'collection_details' => 'Presiona el boton \'\'Editar\'\' para adicionar imagenes y editar tu nueva galería'
                                        ]) }}">
                                        <img src="{{ asset('../storage/public/images/new_button.png') }}" style="width:19rem" alt="">
                                    </a>
                                    </div>
                                </div>
                            </div>
                           @endif
                           <div class="card mx-2" style="height: 400px;">
                               <div class="img-hover-zoom">
                                   <a href="{{ route('collection.show', [
                                       'collection_id' => $imagesByCollection[$j]['collection_id'],
                                       'collection_title' => $imagesByCollection[$j]['collection_title'],
                                       'users_id' => $imagesByCollection[$j]['users_id'],
                                       'collection_details' => $imagesByCollection[$j]['collection_details']
                                   ]) }}">
                                       <img src="{{ $imagesByCollection[$j]['path'] }}" class="card-img-top img-fluid" alt="{{ $imagesByCollection[$j]['title'] }}" style="max-width: 100%; max-height: 100%;">
                                       <div class="card-body">
                                           <h3 class="carousel-title">{{ $imagesByCollection[$j]['collection_title'] }}</h3>
                                       </div>
                                   </a>
                               </div>
                           </div>
                        @endif
                    @endfor
                        </div>
                    </div>
                    @endfor
                    @else
                    <div class="carousel-item @if($i === 0)active @endif" data-bs-interval="8000">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex justify-content-center">
                                @php
                                    $end = min($i + 2, $numCards);
                                @endphp
                                <div >
                                    <a href="{{ route('collection.show', [
                                        'collection_id' => 'f6e5ccbe-3085-463d-af1e-442e0ada244e',
                                        'collection_title' => 'Crea tu nueva Galería!',
                                        'users_id' => $imagesByCollection[0]['users_id'],
                                        'collection_details' => 'Presiona el boton \'\'Editar\'\' para adicionar imagenes y editar tu nueva galería'
                                    ]) }}">
                                    <img src="{{ asset('../storage/public/images/new_button.png') }}" style="width:19rem" alt="">
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
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
            <p class="small mb-0">{{ __('LNR-Copyright©2023') }}</p>
        </div>
        </div>
    </footer>
    @endsection
</body>
</html>
