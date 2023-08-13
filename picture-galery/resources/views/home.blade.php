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
        <h1>Galeria X</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body text-center">
                    <div class="row align-items-center mb-1">
                        <div class="col text-left">
                            <p class="customDetails-font-size mb-0">{{ __('"Detalle de la galería y características"') }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="column">
                    <div class="img-hover-zoom">
                        <a href="{{ asset('images/img1.jpg') }}" data-lightbox="models" data-title="Caption1">
                            <img src="{{ asset('images/img1.jpg') }}" style="width:100%" alt="">
                        </a>
                    </div>
                    <div class="img-hover-zoom">
                        <a href="{{ asset('images/img2.jpg') }}" data-lightbox="models" data-title="Caption2">
                            <img src="{{ asset('images/img2.jpg') }}" style="width:100%" alt="">
                        </a>
                    </div>
                    <div class="img-hover-zoom">
                        <a href="{{ asset('images/img3.jpg') }}" data-lightbox="models" data-title="Caption3">
                            <img src="{{ asset('images/img3.jpg') }}" style="width:100%" alt="">
                        </a>
                    </div>
                </div>
                <div class="column">
                    <div class="img-hover-zoom">
                        <img src="{{ asset('images/img6.jpg') }}" style="width:100%" alt="">
                    </div>
                    <div class="img-hover-zoom">
                        <img src="{{ asset('images/img5.jpg') }}" style="width:100%" alt="">
                    </div>
                    <div class="img-hover-zoom">
                        <img src="{{ asset('images/img4.jpg') }}" style="width:100%" alt="">
                    </div>
                </div>
                <div class="column">
                    <div class="img-hover-zoom">
                        <img src="{{ asset('images/img7.jpg') }}" style="width:100%" alt="">
                    </div>
                    <div class="img-hover-zoom">
                        <img src="{{ asset('images/img8.jpg') }}" style="width:100%" alt="">
                    </div>
                    <div class="img-hover-zoom">
                        <img src="{{ asset('images/img9.jpg') }}" style="width:100%" alt="">
                    </div>
                </div>
                <div class="column">
                    <div class="img-hover-zoom">
                        <img src="{{ asset('images/img10.jpg') }}" style="width:100%" alt="">
                    </div>
                    <div class="img-hover-zoom">
                        <img src="{{ asset('images/img11.jpg') }}" style="width:100%" alt="">
                    </div>
                    <div class="img-hover-zoom">
                        <img src="{{ asset('images/img12.jpg') }}" style="width:100%" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col text-center">
                <button class="btn button_style_glass mt-3">{{ __('Editar galería') }}</button>
                <p class="custom-font-size mb-0">{{ __('Autor: Luis Noriega') }}</p>

            </div>
        </div>
    </div>
    <script src="script/lightbox-plus-jquery.js"></script>
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
