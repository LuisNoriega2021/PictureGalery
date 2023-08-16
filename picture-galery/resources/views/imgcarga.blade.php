<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Imagen</title>
</head>
<body>
    <img class="logo" src="{{ asset('storage/app/public/images/123.jpg') }}">
    <img src="{{ asset('storage/images/' . $imagePath) }}" alt="Imagen Cargada">
</body>
</html>
