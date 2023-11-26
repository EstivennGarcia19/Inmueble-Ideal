<?php

    require_once("../Models/conexion.php");
    require_once("../Models/consultas.php");
    require_once("../Controllers/mostrarInfo.php");

    require_once("../Models/permisosInm.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inmuebles || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
    <main class="dashboard">
        <header>
            <h2>Administrar Inmuebles</h2>
            <a href="InmoDashboard.php" class="back"></a>
            <a href="../Controllers/cerrarSesion.php" class="close"></a>
        </header>
        <a href="InmoAdd.php" class="btn-home adicionar">+ Adicionar</a>
        <table>

           <?php

                mostrarInmuebles();
           ?>



          
        </table>
    </main>
</body>

</html>