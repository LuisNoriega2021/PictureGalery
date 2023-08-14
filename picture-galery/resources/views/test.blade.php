<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Imagen</title>
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    {{-- <div class="background-video">
        <video src="videos/tela.mp4" autoplay loop muted></video>
    </div> --}}
    @extends('layouts.app')
    @section('content')
    <div class="content">
        <div class="header">
            <h1>Colecciones</h1>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#carouselExample').carousel();
            $('#carouselExample2').carousel();
        });
    </script>
    <footer>
        <div class="container">
            <hr>
            <div class="col text-center">
                <p class="small mb-0">{{ __('Copyright©2023') }}</p>
            </div>
        </div>
    </footer>
    @endsection
</body>
</html>
