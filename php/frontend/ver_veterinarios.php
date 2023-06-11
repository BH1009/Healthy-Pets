<?php 
    session_start();
    include ('../backend/conexion.php');
    if(!isset($_SESSION['usuario'])) {
        echo '
            <script>
                alert("Debes iniciar sesion");
                window.location ="../../index.html";
            </script>   
        ';
        session_destroy();
        die();
    }

    $consulta = "SELECT * FROM veterinario ORDER BY veterinaria ASC";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/veterinario.css">
    <title>Ver Veterinarios</title>
</head>
<body>
    <main class="hero">
        <div class="hero__content">
            <nav class="nav">
                <h2 class="logo--text"><span>H</span>elthy <span>P</span>ets</h2>
                <div class="conteiner__links">
                    <a class="cerrar-sesion" href="../backend/cerrar_sesion.php" class="link-hover">Cerrar sesion</a>
                    <a class="cerrar-sesion" href="../frontend/healthyPets.php" class="link-hover">Regresar</a>
                </div>                
            </nav>
            <div class="hero__copy">
                    <h1 class="copy__tittle">¿Estas buscando un veterinario?</h1>
                    <p class="copy--paragraph--2">Aquí encontraras los perfiles de los veterinarios que tenemos registrados, para que elijas la mejor opción para ti y tu mascota.</p>
                    <p class="copy--paragraph">Contáctate con la veterinaria para pedir tu cita!</p>
            </div>
            <div class="container__content">
                <?php 
                    $veterinarios = mysqli_query($conexion, $consulta);
                    if(mysqli_num_rows($veterinarios) <= 0){
                        ?>
                        <div class="seccion__mensage--vacio">
                            <div class="container__mensaje--vacio">
                                <img class="icono__mensaje--vacio" src="../../imagenes/iconos/alerta.svg" alt="">
                                <p class="mensaje--vacio">No hay veterinarios disponibles en este momento</p>
                            </div>
                        </div>
                        
                        <?php
                    } else {
                        ?>
                        <p class="copy--paragraph--2">¡A buscar! Recuerda que están ordenados por el nombre de la veterinaria.</p>
                        <div class="content__ficha--veterinario">
                        <?php 
                        
                        while ($row = $veterinarios->fetch_array()) {
                            // $id = $row['id'];
                            $nombre = $row['nombre'];
                            $email = $row['email'];
                            // $usuario = $row['usuario'];
                            // $contraseña = $row['contraseña'];
                            $veterinaria = $row['veterinaria'];
                            $localidad = $row['localidad'];
                            $calle = $row['calle'];
                            $numero = $row['numero'];
                            $telefono = $row['telefono'];
                        ?>      
                            <article class="card--veterinario">
                                <h3 class="title__card--veterinario">Veterinaria <span><?php echo $veterinaria?></span>.</h3>
                                <div class="card--veterinaria__content">
                                    <div class="content--dato">
                                        <img src="../../imagenes/iconos/user.svg" alt="">
                                        <p class="card--paragraph">Medico: <span><?php echo $nombre?></span>.</p>
                                        
                                    </div>
                                    <div class="content--dato">
                                        <img src="../../imagenes/iconos/mail.svg" alt="">
                                        <p class="card--paragraph">Email: <span><?php echo $email?></span>.</p>
                                    </div>
                                    <div class="content--dato">
                                        <img src="../../imagenes/iconos/location_on.svg" alt="">
                                        <p class="card--paragraph">Dirección: <span><?php echo $localidad.", $calle #$numero"?></span>.</p>
                                    </div>
                                    <div class="content--dato">
                                        <img src="../../imagenes/iconos/phone.svg" alt="">
                                        <p class="card--paragraph">Teléfono: <span><?php echo $telefono?>.</span></p>
                                    </div>
                                </div>

                            </article>
                            

                        <?php

                        }
                        mysqli_free_result($veterinarios);
                        ?> 
                            </div><!--div content__ficha--veterinariov-->
                        <?php 
                    }
                ?>

            </div>
        </div>
    </main>
</body>
</html>