<?php

    require_once("../Models/conexion.php");
    require_once("../Models/consultas.php");

    $id_inm = $_GET['id_inm'];

    $objConsultas = new Consultas();
    $statement = $objConsultas->eliminarInm($id_inm);
   

   





?>