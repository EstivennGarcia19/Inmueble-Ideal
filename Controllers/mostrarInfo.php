<?php

    require_once("../Models/validarSesion.php");


    // Esta funcion muestra todos los muebles registradis
    function mostrarInmuebles(){

        
        $id_user = $_SESSION['id'];

        $objConultas = new Consultas();
        $statement = $objConultas->buscarInmuebles($id_user); //Esta cnsulta busca los inmuebles para mostrarlos

        if (!isset($statement)){

            echo '

                <tr>
                    <td style="text-align:center">No hay Inmuebles Disponibles</td>
                </tr>
                
            
            
            
            ';
        } else {

            foreach ($statement as $f) {
    
                echo '
    
                    <tr>
                        <td>
                            <figure class="photo">
                                <img src="'.$f['foto'].'" alt="">
                            </figure>
                            <div class="info">
                                <h3>'.$f['tipo'].'</h3>
                                <h4>$'.$f['precio'].'</h4>
                                <p>'.$f['ciudad'].'/'.$f['barrio'].'</p>
                            </div>
                            <div class="controls">
                                
                                <a href="InmoEdit.php?id_inm='.$f['id'].'" class="edit"></a>
                                <a href="../Controllers/eliminarInm.php?id_inm='.$f['id'].'" class="delete"></a>
                            </div>
                        </td>
                    </tr>
                
                ';
            }
        }

    }


    // Esta funcion muestra un inmueble especifico
    function mostrarImueble() {

        $id_inm = $_GET['id_inm'];

        $objConultas = new Consultas();
        $statement = $objConultas->buscarInmueble($id_inm);//Esta consulta busca la info de un inm segun el id

        foreach ($statement as $f) {

            echo '

                <form action="../Controllers/modificarInm.php" method="POST">
                
                    <div class="select">
                        <select name="tipo">
                            <option value="'.$f['tipo'].'">'.$f['tipo'].'</option>
                            <option value="Apartamento">Apartamento</option>
                            <option value="Aparta Estudio">Aparta Estudio</option>
                            <option value="Casa">Casa</option>
                        </select>
                    </div>
                    <div class="select">
                        <select name="categoria">
                            <option value="'.$f['categoria'].'">'.$f['categoria'].'</option>
                            <option value="Arriendo">Arriendo</option>
                            <option value="Venta">Venta</option>
                        </select>
                    </div>
                    <input name="precio" type="number" placeholder="Precio..." value="'.$f['precio'].'">
                    <input name="id" type="hidden" placeholder="Precio..." value="'.$f['id'].'">
                    <input name="tamano" type="number" placeholder="Tamaño..." value="'.$f['tamano'].'">
                    <input name="ciudad" type="text" placeholder="Ciudad..." value="'.$f['ciudad'].'">
                    <input name="barrio" type="text" placeholder="Localidad/Barrio..." value="'.$f['barrio'].'">
                    
                    <button class="btn-home">Modificar</button>
                </form>
            
                ';
        }


    }



    // Esta funcion muestra todos los inmuebles registrados al USUARIO
    function mostrarInmueblesToUser(){

        $objConultas = new Consultas();
        $statement = $objConultas->buscarInmueblesToUser(); //Esta consulta busca los inmuebles registrados (se reutiliza la que se uso en mostrarInmuebles)

        if (!isset($statement)){

            echo '

                <tr>
                    <td style="text-align:center">No hay Inmuebles Disponibles</td>
                </tr>
                
            
            
            
            ';
        } else {

            foreach ($statement as $f) {
    
                echo '
    
                    <div class="card-inmueble">
                        <img src="'.$f['foto'].'" alt="">
                        <div class="info-card">
                            <h4>Valor de Arriendo:</h4>
                            <h2>$'.$f['precio'].'</h2>
                            <p>'.$f['tipo'].' - '.$f['tamano'].'m2</p>
                            <p class="direccion">'.$f['ciudad'].'/'.$f['barrio'].'</p>
                            <a href="UserShowInmueble.php?id_inm='.$f['id'].'">Ver Más</a>
                        </div>
                    </div>
                
                ';
            }
        }


    }




    // Esta funcion muestra un inmueble especifico
    function mostrarImuebleToUser() {

        $id_inm = $_GET['id_inm'];

        $objConultas = new Consultas();
        $statement = $objConultas->buscarInmueble($id_inm);//Esta consulta busca la info de un inm segun el id (se reutiliza la de mostrarInmueble)

        foreach ($statement as $f) {

            echo '

            <figure class="photo-preview">
            <img src="'.$f['foto'].'" alt="">
            </figure>
            <div class="cont-details">
                <div>
                    <article class="info-name"><p>'.$f['tipo'].'</p></article>
                    <article class="info-category"><p>'.$f['categoria'].'</p></article>
                    <article class="info-precio"><p>$'.$f['precio'].'</p></article>
                    <article class="info-direccion"><p>'.$f['barrio'].'/'.$f['ciudad'].'</p></article>
                    <article class="info-tamano"><p>'.$f['tamano'].'M2</p></article>

                    <a href="../Controllers/solicitarInm.php?id_inm='.$f['id'].'" class="btn-home">Solictar cita</a>

                </div>
            </div>
            
                ';
        }


    }



    function mostrarSolicitudes(){

        $id_usuario = $_SESSION['id'];

        $objConultas = new Consultas();
        $statement = $objConultas->buscarSolicitudes($id_usuario); //Esta cnsulta busca las solicitudes para mostrarlos

        if (!isset($statement)){

            echo '

                <tr>
                    <td style="text-align:center">No hay Solicitudes Disponibles</td>
                </tr>
                
            
            
            
            ';
        } else {

            foreach ($statement as $f) {
    
                echo ' 
                
                <tr>
                    <td>
                        <figure class="photo">
                            <img src="'.$f['foto'].'" alt="">
                        </figure>
                        <div class="info">
                            <h3>'.$f['tipo'].'</h3>                        
                            <p>'.$f['ciudad'].'/'.$f['barrio'].'</p>
                            <p>'.$f['nombres'].'</p>
                        </div>
                        <div class="controls">
                            <a href="InmoShowSolicitud.php?id_sol='.$f['id'].'" class="show"></a>
                        </div>
                    </td>
                </tr>

                

                
                    ';
            }
        }

    }



    function mostrarSolicitud() {

        $id_sol = $_GET['id_sol'];

        $objConultas = new Consultas();
        $statement = $objConultas->buscarSolicitud($id_sol);//Esta consulta busca la info de un inm segun el id

        foreach ($statement as $f) {

            echo '

                <figure class="photo-preview">
                <img src="'.$f['foto'].'" alt="">
                </figure>
                <div class="cont-details">
                    <div>
                        <article class="info-name">
                            <p>'.$f['tipo'].'</p>
                        </article>
                        <article class="info-category">
                            <p>'.$f['categoria'].'</p>
                        </article>
                        <article class="info-precio">
                            <p>$'.$f['precio'].'</p>
                        </article>
                        <article class="info-direccion">
                            <p>'.$f['barrio'].'/'.$f['ciudad'].'</p>
                        </article>
                        <hr>
                        <br>
                        <article class="info-fecha">
                            <p>'.$f['fecha'].'</p>
                        </article>
                        <article class="info-usuario">
                            <p>'.$f['nombres'].'</p>
                        </article>
                        <article class="info-telefono">
                            <p>'.$f['telefono'].'</p>
                        </article>
                        <article class="info-correo">
                            <p>'.$f['correo'].'</p>
                        </article>
                    </div>
                </div>
            
                ';
        }


    }





?>