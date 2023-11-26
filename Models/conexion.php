<?php

    class Conexion {

        function get_conexion() {

            $user = "root";
            $pass = "";
            $host = "localhost";
            $db = "inmueble_ideal";

            $conexion = new PDO("mysql:host=$host; dbname=$db;", $user, $pass);

            return $conexion;
        }
    }



?>