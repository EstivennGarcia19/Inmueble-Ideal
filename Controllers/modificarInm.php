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

    $foto = "../fotoperfiles/inmueble1919/".$_FILES['foto']['name'];
    $statement = move_uploaded_file($_FILES['foto']['tmp_name'], $foto);

    echo $_FILES['foto']['name'];

    
    $objConsultas = new Consultas();
    $fotosAntiguas = $objConsultas->obtenerFotosInmueble($id);
    
    foreach ($fotosAntiguas as $fotoAntigua) {
        if ($fotoAntigua != $foto) {
            unlink($fotoAntigua);
        }
    }
    $statement = $objConsultas->modificarInm($id, $tipo, $categoria, $precio, $tamano, $ciudad, $barrio, $foto);

    // Elimina las fotos antiguas excepto la última
    

?>