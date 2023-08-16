
@php
$collectionId = request()->query('collection_id');
$collectionTitle = request()->query('collection_title');
$collectionDetails = request()->query('collection_details');
$users_id = request()->query('users_id');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
    <title>Responsive Image Grid</title>
</head>
<body data-users-id="{{ $users_id }}">
    @extends('layouts.app')
    @section('content')
    <div class="header">
        <h2>{{ request()->query('collection_title') }}</h2>
    </div>
    <div class="container main-content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body text-center">
                    <div class="row align-items-center mb-1">
                        <div class="col text-left">
                            <p class="customDetails-font-size mb-0">{{ __(request()->query('collection_details')) }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php

        $imagePath = 'images/789.jpg';
        $imageUrl = asset('storage/' . $imagePath);
    ?>
    <img src="{{ $imageUrl }}" alt="Imagen">
        <P>"{{ $imageUrl }}"</P>


        <div class="col text-center">
            <a href="{{ route('home') }}" class="btn button_style_glass">
                Volver a la página principal
            </a>
        </div>
        @yield('content')
        <div class="row">
            <div class="row">
                <div class="row" id="image-container">
                    <div class="loading-overlay">
                        <div class="loader"></div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col text-center">
                <button class="btn button_style_glass mt-3" data-bs-toggle="modal" data-bs-target="#myModal"

                @if(request()->query('collection_title')!== 'Crea tu nueva Galería!') disabled @endif>
                    {{ __('Editar galería') }}
                </button>
                <p class="custom-font-size mb-0">{{ __('Autor: Luis Noriega') }}</p>

            </div>
        </div>
    </div>

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
                            <label for="details_text" class="col-form-label">Detalle de galeria:</label>
                            <textarea class="form-control"  id="details_text"></textarea>
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

                        <button class="btn button_style_glass" id="startShakeButton" data-bs-dismiss="modal"
                        @if(request()->query('collection_title')!== 'Crea tu nueva Galería!') disabled @endif>
                            {{ __('Editar') }}
                        </button>
                       </p>
                    <hr>
                    <p class="d-flex justify-content-between align-items-center">
                        <span>Eliminar la galería actual</span>

                        <button class="btn button_style_glass" data-bs-toggle="modal" data-bs-target="modal" data-bs-target="#modalSecundario"
                        @if(request()->query('collection_title')!== 'Crea tu nueva Galería!') disabled @endif>
                            {{ __('Eliminar') }}
                        </button>
                    </p>
                    <hr>
                    <p class="d-flex justify-content-center align-items-center">
                        <button class="btn button_style_glass" data-bs-dismiss="modal" id="saveChangesButton" onclick="SaveAndCloseModal()">
                            Guardar cambios
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>

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
<div class="modal fade" id="selectedImageModal" tabindex="-1" aria-labelledby="selectedImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectedImageModalLabel">Fotografia Seleccionada</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="selectedImagePreview" src="#" alt="Fotografia Seleccionada" style="max-width: 100%;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn button_style_glass" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn button_style_glass" id="acceptImageButton">Aceptar</button>
            </div>
        </div>
    </div>
</div>


    <input type="file" id="fileInput" accept=".jpg, .jpeg, .png, .tif" style="display:none;">

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const collectionData = @json($collection_id);
            const imageContainer = document.getElementById("image-container");
            const loadingOverlay = document.querySelector(".loading-overlay");

            let loadedImages = 0;
            const totalImages = collectionData.length;

            collectionData.forEach((image, index) => {
                const img = new Image();
                img.src = "../" + image.path;
                img.alt = image.title;
                img.addEventListener("load", function() {
                    loadedImages++;
                    if (loadedImages === totalImages) {
                        loadingOverlay.style.display = "none";
                    }
                });

                // Crear y agregar icono flotante
                const icon = document.createElement("i");
                icon.classList.add("fas", "fa-star", "image-icon", "hidden"); // Agregar la clase "hidden" para ocultar el icono inicialmente
                img.parentNode.appendChild(icon); // Agregar el icono como un hijo del contenedor de la imagen
            });

            // Agregar evento de clic al botón para mostrar/ocultar iconos
            const toggleIconsButton = document.getElementById("toggle-icons-button");
            toggleIconsButton.addEventListener("click", function() {
                const icons = document.querySelectorAll(".image-icon");
                icons.forEach(icon => {
                    icon.classList.toggle("hidden"); // Agregar/eliminar la clase para ocultar los iconos
                });
            });

            // Agregar otros eventos aquí si es necesario
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const collectionData = @json($collection_id);
            const imageContainer = document.getElementById("image-container");
            let columnDiv = null;
            let columnCount = 0;
            if (collectionData && collectionData.length > 0) {
            collectionData.forEach((image, index) => {
                if(image.$collection_id !== 'f6e5ccbe-3085-463d-af1e-442e0ada244e'){
                if (columnCount === 0) {
                    columnDiv = document.createElement("div");
                    columnDiv.classList.add("column");
                    imageContainer.appendChild(columnDiv);
                }

                const imgDiv = document.createElement("div");
                imgDiv.classList.add("img-hover-zoom");

                const imgLink = document.createElement("a");
                imgLink.href = "../"+ image.path;
                imgLink.setAttribute("data-lightbox", "models");
                imgLink.setAttribute("data-title", image.title);

                const img = document.createElement("img");
                img.src =  "../" + image.path;
                img.alt = image.title;
                if (collectionData.length < 4) {
                    img.style.width = "50%";
                } else {
                    img.style.width = "100%";
                }

                imgLink.appendChild(img);
                imgDiv.appendChild(imgLink);
                columnDiv.appendChild(imgDiv);

                columnCount++;

                if (columnCount === 3 || index === collectionData.length - 1) {
                    columnCount = 0;
                }
            }
            });
        }
        });
    </script>

    <script>
     document.addEventListener("DOMContentLoaded", function() {
    var startShakeButton = document.getElementById("startShakeButton");
    var imageDivs = document.querySelectorAll('.img-hover-zoom');
        startShakeButton.addEventListener("click", function() {
            imageDivs.forEach(function(div) {
                div.classList.add('shake');
                setTimeout(function() {
                    div.classList.remove('shake');
                }, 500);
            });
        });
    });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var openFileUpload = document.getElementById("openFileUpload");
            var fileInput = document.getElementById("fileInput");
            var selectedImageModal = new bootstrap.Modal(document.getElementById('selectedImageModal'));
            var selectedImagePreview = document.getElementById('selectedImagePreview');
            var acceptImageButton = document.getElementById('acceptImageButton');

            openFileUpload.addEventListener("click", function(event) {
                event.preventDefault();
                fileInput.click();
            });

            fileInput.addEventListener("change", function() {
                var selectedFile = fileInput.files[0];
                if (selectedFile) {
                    var validFormats = [".jpg", ".jpeg", ".png", ".tif"];
                    var fileExtension = selectedFile.name.substring(selectedFile.name.lastIndexOf(".")).toLowerCase();

                    if (validFormats.includes(fileExtension)) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            selectedImagePreview.src = e.target.result;
                        };
                        reader.readAsDataURL(selectedFile);
                        selectedImageModal.show();
                    } else {
                        alert("Formato de archivo no válido. Selecciona una imagen en formato jpg, jpeg, png o tif.");
                        fileInput.value = "";
                    }
                }
            });

            acceptImageButton.addEventListener('click', function() {


                selectedImageModal.hide();
            });
        });
    </script>
<script>
    window.addEventListener("load", function() {
        const loadingOverlay = document.querySelector(".loading-overlay");
        loadingOverlay.style.display = "none";
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const usersId = document.body.getAttribute("data-users-id");
        const saveChangesButton = document.getElementById("saveChangesButton");
        saveChangesButton.addEventListener("click", function() {
            const recipientName = document.getElementById("recipient-name").value;
            const messageText = document.getElementById("details_text").value;
            const data = {
                title: recipientName,
                details: messageText,
                users_id: usersId,
                state: 1
            };
            fetch("{{ route('collection.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                const collectionId = data.id;
                saveImageWithCollectionId(collectionId);
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    });

    function saveImageWithCollectionId(collectionId) {
        const fileInput = document.getElementById("fileInput");
        const collectionTitle = document.getElementById("recipient-name").value;
        const collectionDetails = document.getElementById("details_text").value;
        const usersId = document.body.getAttribute("data-users-id");

        const formData = new FormData();
        formData.append("title", collectionTitle);
        formData.append("details", collectionDetails);
        formData.append("image", fileInput.files[0]);
        formData.append("collection_id", collectionId);

        fetch("{{ route('imagenes.store') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);

        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
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
    {{-- <script src="script/lightbox-plus-jquery.js"></script> --}}
    <script src="{{ asset('script/lightbox-plus-jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script>
        $(document).ready(function () {
            $('[data-bs-toggle="popover"]').popover();
            $('[data-bs-toggle="tooltip"]').tooltip();
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
