<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
    <main class="login register" id="home">
        <h2>Tu Inmueble Ideal</h2>
        <p>Ingresa Tus Datos y Crea una Nueva. Recuerda elegir tu rol.</p>
        
        
        <form action="../Controllers/registrarUsu.php" method="POST">
            <input name="id" type="number" placeholder="Identificación">
            <input name="nombres" type="text" placeholder="Nombres">
            <input name="apellidos" type="text" placeholder="Apellidos">
            <input name="telefono" type="number" placeholder="Teléfono">
            <input name="correo" type="email" placeholder="Correo Electrónico">            
            <input name="clave" type="password" placeholder="Contraseña">
            <div class="select">
                <select name="rol">
                    <option value="">Seleccione Rol</option>
                    <option value="Usuario">Usuario</option>
                    <option value="Inmobiliaria">Inmobiliaria</option>
                </select>
            </div>
            <button>Crear Mi Cuenta</button>
        </form>
    </main>
</body>

</html>