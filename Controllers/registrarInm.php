<?php

    require_once("../Models/conexion.php");
    require_once("../Models/consultas.php");
    require_once("../Models/validarSesion.php");

    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $tamano = $_POST['tamano'];
    $ciudad = $_POST['ciudad'];
    $barrio = $_POST['barrio'];
    session_start();
    $id_user = $_SESSION['id'];


    if (strlen($tipo > 0) && strlen($categoria > 0) && strlen($precio > 0) && strlen($tamano > 0) && strlen($ciudad > 0) && strlen($barrio > 0)) {

        $foto = "../Upload/".$_FILES['foto']['name'];

        $statement = move_uploaded_file($_FILES['foto']['tmp_name'], $foto);

        $objConsultas = new Consultas();
        $statement = $objConsultas->registrarInm($tipo, $categoria, $precio, $tamano, $ciudad, $barrio, $id_user, $foto);


    } else {

        echo '<script>alert("Por favor completa todos los campos")</script>';
        echo "<script>location.href='../Views/InmoAdd.php'</script>";

    }





?>