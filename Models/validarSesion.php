<?php

    class Sesion{

        public function iniciarSesion($correo, $clave){
            
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
    
            $sql = "SELECT * FROM usuarios WHERE correo = :correo";
            
            $statement = $conexion->prepare($sql);
    
            $statement->bindParam(":correo", $correo);
    
            $statement->execute();
    
            if ($f = $statement->fetch()) {
                                
                if ($clave == $f['clave']) {

                    session_start();
                    
                    $_SESSION['id'] = $f['id']; 
                    $_SESSION['rol'] = $f['rol'];
                    $_SESSION['autenticado'] = "SI";

                    if ($f['rol'] == "Usuario") {

                        echo '<script>alert("Bienvenido")</script>';
                        echo "<script>location.href='../Views/UserDashboard.php'</script>";

                        
                    } else {

                        echo '<script>alert("Bienvenido | Inmobiliaria")</script>';
                        echo "<script>location.href='../Views/InmoDashboard.php'</script>";

                    }


                } else {

                    echo '<script>alert("Contraseña Incorrecta")</script>';
                    echo "<script>location.href='../Views/login.php'</script>";


                }
    
    
            } else {
                echo '<script>alert("El correo no se encuentra registrado")</script>';
                echo "<script>location.href='../Views/login.php'</script>";
            }
        }


        public function cerrarSesion() {
            
            session_start();
            session_destroy();

            echo '<script>alert("Cerraste sesion")</script>';
            echo "<script>location.href='../Views/login.php'</script>";

        }

    }


?>