<?php 
    session_start();
    include ('../backend/conexion.php');

    if(!isset($_SESSION['veterinario'])) {
        echo '
            <script>
                alert("Debes iniciar sesion");
                window.location ="../../index.html";
            </script>   
        ';
        session_destroy();
        die();
    }
    
    $email_sesion = $_SESSION['veterinario'];
    $query_sesion = mysqli_query($conexion, "SELECT * FROM veterinario WHERE email = '$email_sesion'");
    if ($query_sesion) {
        while ($row = $query_sesion->fetch_array()) {
            $id = $row['id'];
            $nombre = $row['nombre'];
            $email = $row['email'];
            $usuario = $row['usuario'];
            $contraseña = $row['contraseña'];
            $veterinaria = $row['veterinaria'];
            $localidad = $row['localidad'];
            $calle = $row['calle'];
            $numero = $row['numero'];
            $telefono = $row['telefono'];
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/veterinario.css">
    <title>Veterinario Healthy Pets</title>
</head>
<body>
    
    <main class="hero">
        <div class="hero__container">
            <nav class="nav">
                <h2 class="logo--text"><span>H</span>elthy <span>P</span>ets</h2>
                <a class="cerrar-sesion" href="../backend/cerrar_sesion.php" class="link-hover">Cerrar sesion</a>
            </nav>
            <div class="hero__copy">
                <p class="copy--paragraph">!Hola, <span> <?php echo $usuario.'!' ?> </span></p>
                <h1 class="copy__tittle">!Bienvenido a tu página!</h1>
                <p class="copy--paragraph--2">Recuerda que nuestra página cuenta con diversas herramientas creadas para ti, que te ayudaran a llevar un mejor manejo de tu veterinaria..</p>
                <p class="copy--paragraph">¿Qué acciones deseas realizar hoy?</p>
                <div class="copy__containtainer--opciones">
                    <a href="veterinario_perfil.php" class="copy__opcion">
                        <img class="opciones--iconos" src="../../imagenes/iconos/user.svg" alt="">
                        <p class="paragraph__opciones">Perfil</p>
                    </a>
                    <a href="../frontend/clientes.php" class="copy__opcion">
                        <img class="opciones--iconos" src="../../imagenes/iconos/clientes.svg" alt="">
                        <p class="paragraph__opciones">Clientes</p>
                    </a>
                    <a href="mascotas.php" class="copy__opcion">
                        <img class="opciones--iconos" src="../../imagenes/iconos/mascota.svg" alt="">
                        <p class="paragraph__opciones">Mascota</p>
                    </a>
                </div>
            </div>
        </div>
        
    </main>

    
</body>
</html> 