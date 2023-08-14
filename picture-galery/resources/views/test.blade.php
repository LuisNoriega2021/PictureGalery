<!DOCTYPE html>
<html>
<head>
    <title>Prueba de Imagen</title>
</head>
<body>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($imagesByCollection as $collectionId => $images)
                @if(!empty($images[0]))
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="card">
                            <div class="img-wrapper">
                                <img src="{{ asset($images[0]->path) }}" class="card-img-top" alt="{{ $images[0]->title }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $images[0]->title }}</h5>
                                <p class="card-text">{{ $images[0]->details }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</body>
</html>
