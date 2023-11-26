<?php

    class Consultas {

        public function registrarUsu($id, $nombres, $apellidos, $telefono, $correo, $claveMd, $rol){

            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $sql = "SELECT * FROM usuarios WHERE correo = :correo or id = :id";

            $statement = $conexion->prepare($sql);

            $statement->bindParam(":id", $id);
            $statement->bindParam(":correo", $correo);
           

            $statement->execute();

            if ($f = $statement->fetch()) {
                echo '<script>alert("Los datos ingresados ya se encuentran registrados en el sistema")</script>';
                echo "<script>location.href='../Views/login.php'</script>";


            } else {


                $sql = "INSERT INTO usuarios (id, nombres, apellidos, telefono, correo, clave, rol) VALUES (:id, :nombres, :apellidos, :telefono, :correo, :claveMd, :rol)";
    
                $statement = $conexion->prepare($sql);
    
                $statement->bindParam(":id", $id);
                $statement->bindParam(":nombres", $nombres);
                $statement->bindParam(":apellidos", $apellidos);
                $statement->bindParam(":telefono", $telefono);
                $statement->bindParam(":correo", $correo);
                $statement->bindParam(":claveMd", $claveMd);
                $statement->bindParam(":rol", $rol);
    
                $statement->execute();
    
                echo '<script>alert("Usuario Registrado Con exito")</script>';
                echo "<script>location.href='../Views/login.php'</script>";
            }

            










        }

        public function registrarInm($tipo, $categoria, $precio, $tamano, $ciudad, $barrio, $id_user, $foto){

            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $sql = "INSERT INTO inmuebles (tipo, categoria, precio, tamano, ciudad, barrio, id_user, foto) VALUES (:tipo, :categoria, :precio, :tamano, :ciudad, :barrio, :id_user, :foto)";

            $statement = $conexion->prepare($sql);
    
            $statement->bindParam(":tipo", $tipo);
            $statement->bindParam(":categoria", $categoria);
            $statement->bindParam(":precio", $precio);
            $statement->bindParam(":tamano", $tamano);
            $statement->bindParam(":ciudad", $ciudad);
            $statement->bindParam(":barrio", $barrio);
            $statement->bindParam(":id_user", $id_user);
            $statement->bindParam(":foto", $foto);

            $statement->execute();

            echo '<script>alert("Inmueble Registrado Con exito")</script>';
            echo "<script>location.href='../Views/InmoApartamentos.php'</script>";

            
        }


        public function buscarInmuebles($id_user){
            
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $sql = "SELECT * FROM inmuebles WHERE id_user=:id_user ORDER BY id DESC";

            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_user", $id_user);

            $statement->execute();

            $f = null;

            while ($result = $statement->fetch()) {

                $f[] = $result;
            }
            return $f;

            

        }

        public function buscarInmueblesToUser(){
            
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $sql = "SELECT * FROM inmuebles ORDER BY id DESC";

            $statement = $conexion->prepare($sql);
            

            $statement->execute();

            $f = null;

            while ($result = $statement->fetch()) {

                $f[] = $result;
            }
            return $f;

            

        }



        public function buscarInmueble($id_inm){
            
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $sql = "SELECT * FROM inmuebles WHERE id = :id_inm";

            $statement = $conexion->prepare($sql);

            $statement->bindParam(":id_inm", $id_inm);

            $statement->execute();

            $f = null;

            while ($result = $statement->fetch()) {

                $f[] = $result;
            }
            return $f;

            

        }





        public function modificarInm($id, $tipo, $categoria, $precio, $tamano, $ciudad, $barrio){

            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $sql = "UPDATE inmuebles SET tipo = :tipo, categoria = :categoria, precio = :precio, tamano = :tamano, ciudad = :ciudad, barrio = :barrio WHERE id = :id";

            $statement = $conexion->prepare($sql);
    
            $statement->bindParam(":id", $id);
            $statement->bindParam(":tipo", $tipo);
            $statement->bindParam(":categoria", $categoria);
            $statement->bindParam(":precio", $precio);
            $statement->bindParam(":tamano", $tamano);
            $statement->bindParam(":ciudad", $ciudad);
            $statement->bindParam(":barrio", $barrio);

            $statement->execute();

            echo '<script>alert("Inmueble Actualizado Con exito")</script>';
            echo "<script>location.href='../Views/InmoApartamentos.php'</script>";
        }




        public function eliminarInm($id_inm){

            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();


            $sql = "DELETE FROM inmuebles WHERE id = :id_inm";
    
            $statement = $conexion->prepare($sql);

            $statement->bindParam(":id_inm", $id_inm);
          

            $statement->execute();

            echo '<script>alert("Inmuebles Eliminado Con exito")</script>';
            echo "<script>location.href='../Views/InmoApartamentos.php'</script>";


        }




        public function registrarSolicitud($id_inm, $id_user, $fecha){

            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $sql = "INSERT INTO solicitudes (id_inm, id_user, fecha) VALUES (:id_inm, :id_user, :fecha)";

            $statement = $conexion->prepare($sql);
    
            $statement->bindParam(":id_inm", $id_inm);
            $statement->bindParam(":id_user", $id_user);
            $statement->bindParam(":fecha", $fecha);
    

            $statement->execute();

            echo '<script>alert("Solicitud Enviada")</script>';
            echo "<script>location.href='../Views/UserDashboard.php'</script>";
        }






        public function buscarSolicitudes($id_usuario){
            
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $sql = "SELECT
                s.id_sol as id,
                i.tipo as tipo, 
                i.ciudad as ciudad, 
                i.barrio as barrio, 
                i.foto as foto, 
                u.nombres as nombres
                from solicitudes s 
                inner join usuarios u on s.id_user = u.id
                inner join inmuebles i on s.id_inm = i.id WHERE i.id_user=:id_usuario;
            
            ";

            $statement = $conexion->prepare($sql);
            $statement->bindParam(":id_usuario", $id_usuario);

            

            $statement->execute();

            $f = null;

            while ($result = $statement->fetch()) {

                $f[] = $result;
            }
            return $f;

            

        }



        public function buscarSolicitud($id_sol){
            
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $sql = "SELECT
                s.id_sol as id,
                s.fecha as fecha,
                i.tipo as tipo, 
                i.categoria as categoria, 
                i.precio as precio, 
                i.ciudad as ciudad, 
                i.barrio as barrio, 
                i.foto as foto, 
                u.nombres as nombres,
                u.telefono as telefono,
                u.correo as correo
                from solicitudes s 
                inner join usuarios u on s.id_user = u.id
                inner join inmuebles i on s.id_inm = i.id WHERE id_sol = :id_sol;
            
            ";



            $statement = $conexion->prepare($sql);

            $statement->bindParam(":id_sol", $id_sol);

            $statement->execute();

            $f = null;

            while ($result = $statement->fetch()) {

                $f[] = $result;
            }
            return $f;

            

        }


    }


?>