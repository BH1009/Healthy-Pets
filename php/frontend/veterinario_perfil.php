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
    <title>Perfil veterinario</title>
    <link rel="stylesheet" href="../../css/veterinario_perfil.css">
</head>
<body>
    <main class="hero">
        <div class="hero__container">
            <nav class="nav">
                <a href="veterinario.php"><h2 class="logo--text"><span>H</span>elthy <span>P</span>ets</h2></a>
                
                <div class="nav__enlaces">
                    <a class="cerrar-sesion" href="../backend/cerrar_sesion.php" class="link-hover">Cerrar sesión</a>
                    <a class="cerrar-sesion" href="../frontend/veterinario.php" class="link-hover">Regresar</a>
                    <a href="clientes.php"><img class="nav--icono" src="../../imagenes/iconos/clientes.svg" alt=""></a>
                    <a href="mascotas.php"><img class="nav--icono" src="../../imagenes/iconos/mascota.svg" alt=""></a>
                </div>
            </nav>
            <div class="hero__copy">
                <p class="text--usuario">Usuario</p>
                <h1 class="hero__title"><?php echo $usuario ?></h1>
                <h2 class="hero__subtitle">Es muy importante que tu información sea correcta, ya que así será visualizada por los usuarios que busquen un veterinario.</h2>
                <div class="card--perfil">
                    <div class="card--perfil__header">
                        <img class="card--perfil__icono" src="../../imagenes/iconos/user.svg" alt="">
                        <div class="container__header--text">
                            <h2 class="card--perfil__title"> <?php echo $nombre ?> </h2>
                            <h3 class="card--perfil__subtitle"> Veterinaria: <span><?php echo $veterinaria ?></span> </h3>
                        </div>
                    </div>
                    <div class="card--perfil__content">
                        <div class="card--perfil__dato">
                            <img class="card--perfil__icono2" src="../../imagenes/iconos/location_on.svg" alt="">
                            <p class="card--perfil__paragraph">Localidad: <span><?php echo $localidad?>, Calle: <?php echo $calle?>, #<?php echo $numero?></span></p>
                        </div>
                        <div class="card--perfil__dato">
                            <img class="card--perfil__icono2" src="../../imagenes/iconos/mail.svg" alt="">
                            <p class="card--perfil__paragraph"> <?php echo $email ?></p>
                        </div>
                        <div class="card--perfil__dato card--perfil__dato--btn">
                            <img class="card--perfil__icono2" src="../../imagenes/iconos/phone.svg" alt="">
                            <p class="card--perfil__paragraph"> <?php echo $telefono ?></p>
                        </div>
                        <a class="card--perfil__btn" href="editar_perfil_veterinario.php">Modificar</a>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
</body>
</html>