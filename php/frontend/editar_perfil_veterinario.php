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
    <title>Editar perfil veterinario</title>
    <link rel="stylesheet" href="../../css/editarperfil_veterinario.css">
</head>
<body>
    <main class="hero">
        <nav class="nav">
            <h2 class="logo--text"><span>H</span>elthy <span>P</span>ets</h2>
            <div class="nav__enlaces">
                <a class="cerrar-sesion" href="../backend/cerrar_sesion.php" class="link-hover">Cerrar sesión</a>
                <a class="cerrar-sesion" href="../../php/frontend/veterinario_perfil.php" class="link-hover">Regresar</a>
                <a href="clientes.php"><img class="nav--icono" src="../../imagenes/iconos/clientes.svg" alt=""></a>
                <a href="#"><img class="nav--icono" src="../../imagenes/iconos/mascota.svg" alt=""></a>
            </div>
        </nav>
        <!-- FORMULARIO REGISTRO -->
        <div class="form--container">
            <h1 class="titulo">Modificar <span>perfil</span></h1>
            <h2 class="subtitulo">Revise correctamente la información antes de mandarla.</h2>
                <form action="../backend/procesar_editar_perfil_veterinario.php" class="form form__register-usuario" id="formulario" method="POST">

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

                    <!-- Grupo Email -->
                    <div class="formulario__grupo" id="grupo__email">
                        <label class="label" for="email">Email:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" id="email" name="email" class="formulario__input" value="<?php echo $email?>" require></input>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">Ingresa un email valido.</p>
                    </div>


                    <!-- Grupo Usuario -->
                    <div class="formulario__grupo" id="grupo__usuario">
                    <label for="usuario" class="label">Usuario:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" id="usuario" name="usuario" class="formulario__input" value="<?php echo $usuario?>" require></input>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">El usuario debe ser de 4 a 16 dígitos y solo debe contener números, letras y guiones bajos.</p>
                    </div>

                    <!-- Grupo Contraseña -->
                    <div class="formulario__grupo" id="grupo__contraseña">
                        <label for="contraseña" class="label">Contraseña:</label>
                        <div class="formulario__grupo-input">
                            <input type="password" id="contraseña" name="contraseña" class="formulario__input" value="<?php echo $contraseña?>" require></input>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">La contraseña debe ser entre 4 y 12 dígitos.</p>
                    </div>

                    <!-- Grupo nombre veterinaria -->
                    <div class="formulario__grupo" id="grupo__veterinaria">
                        <label for="veterinaria" class="label">Veterinaria:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" id="veterinaria" name="veterinaria" value="<?php echo $veterinaria?>" require>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">No puede quedar vacío este campo</p>
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
                        <p class="formulario__input-error">Debe tener solo números.</p>
                    </div>

                    <!-- Grupo telefono -->
                    <div class="formulario__grupo" id="grupo__telefono">
                        <label for="telefono" class="label">Teléfono</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" id="telefono" name="telefono" value="<?php echo $telefono?>" require>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">Escriba un numero de teléfono valido.</p>
                    </div>
                    
                    <button class="btn btn__registro-disable" id="btn__registro-usuario">Actualizar</button>

                </form>
        </div>
    </main>
            

    
    <script src="../../js/vr.js"></script>
    <script src="https://kit.fontawesome.com/a34b92f4e5.js" crossorigin="anonymous"></script>
</body>
</html>