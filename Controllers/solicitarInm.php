<?php

    require_once("../Models/conexion.php");
    require_once("../Models/consultas.php");
    require_once("../Models/validarSesion.php");

    // Capturamos el id_inm enviado desde UserShowInmueble.php
    $id_inm= $_GET['id_inm'];

    // Ahora capturamos el rol del usuario, pero para ello hacermos el session_start para acceder a las variables de sesion, en este caso (id)
    session_start();
    $id_user = $_SESSION['id'];
    
    $fecha = date("Y-m-d");

    $objConsultas = new Consultas();
    $statement = $objConsultas->registrarSolicitud($id_inm, $id_user, $fecha);

?>