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
    $id = $_GET["id"];
    $cliente = "SELECT * FROM clientes_veterinario WHERE id = '$id'";

    $resultado = mysqli_query($conexion, $cliente);
    if ($resultado) {
        while ($row = $resultado->fetch_array()) {
            $nombre = $row['nombre'];
            $telefono = $row['telefono'];
            $localidad = $row['localidad'];
            $calle = $row['calle'];
            $numero = $row['numero'];
            $email = $row['email'];
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar cliente</title>
    <link rel="stylesheet" href="../../css/editarperfil_veterinario.css">
</head>
<body>
    <main class="hero">
        <nav class="nav">
            <a href="veterinario.php"><h2 class="logo--text"><span>H</span>elthy <span>P</span>ets</h2></a>
            
            <div class="nav__enlaces">
                <a class="cerrar-sesion" href="../backend/cerrar_sesion.php" class="link-hover">Cerrar sesión</a>
                <a class="cerrar-sesion" href="../../php/frontend/clientes.php" class="link-hover">Regresar</a>
                <a href="veterinario_perfil.php"><img class="nav--icono" src="../../imagenes/iconos/user.svg" alt=""></a>
                <a href="#"><img class="nav--icono" src="../../imagenes/iconos/mascota.svg" alt=""></a>
            </div>
        </nav>
        <!-- FORMULARIO REGISTRO -->
        <div class="form--container">
            <h1 class="titulo">Modificar registro del <span><?php echo $nombre?></span></h1>
            <h2 class="subtitulo">Revise correctamente la información antes de mandarla. </h2>
                <form action="../backend/procesar_editar_cliente.php" class="form form__register-usuario" id="formulario" method="POST">

                    <input type="hidden" value="<?php echo $id ?>" name="id">
                    <!-- grupo Nombre -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="label">Nombre:</label>
                        <div class="formulario__grupo-input">
                            <input type="text"  id="nombre" name="nombre" class="formulario__input" value="<?php echo $nombre ?>" require></input>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">El nombre solo puede contener letras y números.</p>
                    </div>

                    <!-- Grupo telefono -->
                    <div class="formulario__grupo" id="grupo__telefono">
                        <label for="telefono" class="label">Teléfono</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" id="telefono" name="telefono" value="<?php echo $telefono?>" require>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">Escriba un número de teléfono valido.</p>
                    </div>

                    <!-- Grupo localida -->
                    <div class="formulario__grupo" id="grupo__localidad">
                        <label for="localidad" class="label">Localidad:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" id="localidad" name="localidad" value="<?php echo $localidad?>" require>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">No puede quedar vacío este campo.</p>
                    </div>

                    <!-- Grupo calle -->
                    <div class="formulario__grupo" id="grupo__calle">
                        <label for="calle" class="label">Calle:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" id="calle" name="calle" value="<?php echo $calle?>" require>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">No puede quedar vacío este campo.</p>
                    </div>

                    <!-- Grupo numero -->
                    <div class="formulario__grupo" id="grupo__numero">
                        <label for="numero" class="label">Numero:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" id="numero" name="numero" value="<?php echo $numero?>" require>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">Debe tener solo numeros.</p>
                    </div>
                    
                    <!-- Grupo Email -->
                    <div class="formulario__grupo" id="grupo__email">
                        <label class="label" for="email">Email:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" id="email" name="email" class="formulario__input" value="<?php echo $email?>" require></input>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">Ingresa un email valido.</p>
                    </div>

                    <button class="btn btn__registro-disable" id="btn__registro-usuario">Actualizar</button>

                </form>
        </div>
    </main>
            

    
    <script src="../../js/vr.js"></script>
    <script src="https://kit.fontawesome.com/a34b92f4e5.js" crossorigin="anonymous"></script>
</body>
</html>