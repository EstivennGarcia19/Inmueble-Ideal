<?php

    // Lo perimero que hacemos es llamar al sesion_start() para poder acceder a las variables de session

    session_start();
    // Ahora hacemos un condificonal para ver si el usuario esta autenticado o no

    if (!isset($_SESSION['autenticado'])) {
        
        echo '<script>alert("Inicia Sesion Para acceder a este sitio")</script>';
        echo "<script>location.href='../Views/login.php'</script>";

        
    }

    if ($_SESSION['rol'] != "Inmobiliaria") {

        echo '<script>alert("Tu rol no tiene Permisos Para acceder a este sitio")</script>';
        echo "<script>location.href='../Views/login.php'</script>";

    }


?>