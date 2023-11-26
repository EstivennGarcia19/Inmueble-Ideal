<?php
    require_once("../Models/permisosInm.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Inmueble || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
    <main class="add">
        <header>
            <h2>Adicionar Inmueble</h2>
            <a href="InmoApartamentos.php" class="back"></a>
            <a href="../Controllers/cerrarSesion.php" class="close"></a>
        </header>

        <form action="../Controllers/registrarInm.php" method="POST" enctype="multipart/form-data">
            
            <input name="foto" type="file" accept=".png, .jpg" class="upload" aria-describedby="Foto Inmueble">
            <div class="select">
                <select name="tipo">
                    <option value="">Seleccione Tipo de Inmueble...</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Aparta Estudio">Aparta Estudio</option>
                    <option value="Casa">Casa</option>
                </select>
            </div>
            <div class="select">
                <select name="categoria">
                    <option value="">Seleccione Categoría...</option>
                    <option value="Arriendo">Arriendo</option>
                    <option value="Venta">Venta</option>
                </select>
            </div>
            <input name="precio" type="number" placeholder="Precio...">
            <input name="tamano" type="number" placeholder="Tamaño...">
            <input name="ciudad" type="text" placeholder="Ciudad...">
            <input name="barrio" type="text" placeholder="Localidad/Barrio...">
            
            <button class="btn-home">Guardar</button>
        </form>
    </main>
</body>

</html>