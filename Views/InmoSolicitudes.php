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
    <title>Dashboard Solicitudes || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
    <main class="dashboard solicitudes">
        <header>
            <h2>Administrar Solicitudes</h2>
            <a href="InmoDashboard.php" class="back"></a>
            <a href="../Controllers/cerrarSesion.php" class="close"></a>
        </header>
        <table>
            <!-- <tr>
                <td>
                    <figure class="photo">
                        <img src="../imgs/inmueble-1.png" alt="">
                    </figure>
                    <div class="info">
                        <h3>Apartamento</h3>                        
                        <p>Bogotá/Engativa</p>
                        <p>Nombre del Usuario</p>
                    </div>
                    <div class="controls">
                        <a href="InmoShowSolicitud.php" class="show"></a>
                    </div>
                </td>
            </tr> -->

            <?php
                mostrarSolicitudes();
            ?>


           
        </table>
    </main>
</body>

</html>