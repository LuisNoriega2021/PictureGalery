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
                <button class="btn button_style_glass mt-3" data-bs-toggle="modal" data-bs-target="#myModal">{{ __('Editar galería') }}</button>
                <p class="custom-font-size mb-0">{{ __('Autor: Luis Noriega') }}</p>

            </div>
        </div>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="header">Edición de galeria</h2>
                    <div class="modal-body">
                        <form>
                          <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Titulo de galeria:</label>
                            <input type="text" class="form-control" id="recipient-name">
                          </div>
                          <div class="mb-3">
                            <label for="message-text" class="col-form-label">Detalle de galeria:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                          </div>
                        </form>
                      </div>
                      <hr>
                      <p class="d-flex justify-content-between align-items-center">
                        <span>Añadir nueva imagen a la galeria</span>
                        <button  id="openFileUpload" class="btn button_style_glass">
                            Añadir
                        </button>
                    </p>
                      <hr>
                      <p class="d-flex justify-content-between align-items-center">
                        <span>Editar o eliminar imágenes de la galería</span>
                        <button class="btn button_style_glass" id="toggleEffectBtn" data-bs-dismiss="modal">
                            Editar
                        </button>
                       </p>
                    <hr>
                    <p class="d-flex justify-content-between align-items-center">
                        <span>Eliminar la galería actual</span>
                        <button class="btn button_style_glass" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#modalSecundario" >
                            Eliminar
                        </button>
                    </p>
                    <hr>
                    <p class="d-flex justify-content-center align-items-center">
                        <button class="btn button_style_glass" data-bs-dismiss="modal" onclick="SaveAndCloseModal()">
                            Guardar cambios
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal confrimacion de eliminacion -->
<div class="modal fade" id="modalSecundario" tabindex="-1" aria-labelledby="modalSecundarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered justify-content-center">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="header" id="modalSecundarioLabel">Atención!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Esta seguro que desea eliminar esta colección? al hacer click en el boton "Eliminar" se eliminará la colección permanentemente asi como tambien las fotografias contenidas en dicha colección.</p>
                <p class="d-flex justify-content-center align-items-center" style="color: brown">
                <button class="btn button_style_glass"  data-bs-dismiss="modal" onclick="confirmAndCloseModal()">
                    Eliminar
                </button>
            </p>
            </div>
        </div>
    </div>
</div>


    <input type="file" id="fileInput" accept=".jpg, .jpeg, .png, .tif" style="display:none;">

    <script>
        var images = document.querySelectorAll('.img-hover-zoom img');
        var isShaking = false;

        function startShaking() {
            if (!isShaking) {
                images.forEach(function(image) {
                    image.classList.add('img-shake');
                });
                isShaking = true;
            }
        }

        function stopShaking() {
            if (isShaking) {
                images.forEach(function(image) {
                    image.classList.remove('img-shake');
                });
                isShaking = false;
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            var toggleEffectBtn = document.getElementById("toggleEffectBtn");
            toggleEffectBtn.addEventListener("click", function() {
                if (isShaking) {
                    stopShaking();
                } else {
                    startShaking();
                }
            });

            document.addEventListener("click", function(event) {
                var target = event.target;
                if (target !== toggleEffectBtn) {
                    stopShaking();
                }
            });
        });
    </script>
    <script>
        var openFileUpload = document.getElementById("openFileUpload");
        var fileInput = document.getElementById("fileInput");
        openFileUpload.addEventListener("click", function() {
            fileInput.click();
        });

        fileInput.addEventListener("change", function() {
            var selectedFile = fileInput.files[0];
            if (selectedFile) {
                var validFormats = [".jpg", ".jpeg", ".png", ".tif"];
                var fileExtension = selectedFile.name.substring(selectedFile.name.lastIndexOf(".")).toLowerCase();

                if (validFormats.includes(fileExtension)) {
                    alert("Imagen válida seleccionada: " + selectedFile.name);
                } else {
                    alert("Formato de archivo no válido. Selecciona una imagen en formato jpg, jpeg, png o tif.");
                    fileInput.value = "";
                }
            }
        });
    </script>
    <script>
        function confirmAndCloseModal() {
            //if (confirm("¿Está seguro que desea eliminar esta colección?")) {
                // Aquí puedes agregar el código para realizar la acción de eliminación
                // y luego cerrar el modal.
                // Por ejemplo:
                // deleteCollection();
                // closeModal();

                closeModal(); // Cerrar el modal en caso de que no haya una acción de eliminación real.
            //}
        }

        function closeModal() {
            var modal = new bootstrap.Modal(document.getElementById('modalSecundario'));
            modal.hide();
        }
    </script>
    <script>
        function SaveAndCloseModal() {

                // y luego cerrar el modal.
                // Por ejemplo:
                // deleteCollection();
                // closeModal();

                closeModal();
            //}
        }

        function closeModal() {
            var modal = new bootstrap.Modal(document.getElementById('modalSecundario'));
            modal.hide();
        }
    </script>
    <script src="script/lightbox-plus-jquery.js"></script>
    <script>
        $(document).ready(function () {
            $('[data-bs-toggle="popover"]').popover();
            $('[data-bs-toggle="tooltip"]').tooltip();
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
