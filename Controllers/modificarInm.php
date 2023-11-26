<?php

    require_once("../Models/conexion.php");
    require_once("../Models/consultas.php");

    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $tamano = $_POST['tamano'];
    $ciudad = $_POST['ciudad'];
    $barrio = $_POST['barrio'];

    $objConsultas = new Consultas();
    $statement = $objConsultas->modificarInm($id, $tipo, $categoria, $precio, $tamano, $ciudad, $barrio);

    





?>