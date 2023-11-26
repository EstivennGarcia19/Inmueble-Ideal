<?php

    require_once("../Models/conexion.php");
    require_once("../Models/consultas.php");

    $id = $_POST['id'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];

    $claveMd = md5($clave);

    if (strlen($id > 0) && strlen($nombres > 0) && strlen($apellidos > 0) && strlen($telefono > 0) && strlen($correo > 0) && strlen($clave > 0) && strlen($rol > 0)) {

        if (strlen($clave < 8)) {

            echo '<script>alert("La contraseña debe tener mas de 8 caracteres")</script>';
            echo "<script>location.href='../Views/register.php'</script>";

            

        } else {
            $objConsultas = new Consultas();
            $statement = $objConsultas->registrarUsu($id, $nombres, $apellidos, $telefono, $correo, $claveMd, $rol);

        }

    } else {

        echo '<script>alert("Por favor completa todos los campos")</script>';
        echo "<script>location.href='../Views/register.php'</script>";

    }





?>