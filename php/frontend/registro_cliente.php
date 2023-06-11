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

    $id_veterinario = $_GET["id_veterinario"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro cliente</title>
    <link rel="stylesheet" href="../../css/editarperfil_veterinario.css">
</head>
<body>
    <main class="hero">
        <nav class="nav">
            <h2 class="logo--text"><span>H</span>elthy <span>P</span>ets</h2>
            <div class="nav__enlaces">
                <a class="cerrar-sesion" href="../backend/cerrar_sesion.php" class="link-hover">Cerrar sesión</a>
                <a href="clientes.php"><img class="nav--icono" src="../../imagenes/iconos/clientes.svg" alt=""></a>
                <a href="veterinario_perfil.php"><img class="nav--icono" src="../../imagenes/iconos/user.svg" alt=""></a>
                <a href="mascotas.php"><img class="nav--icono" src="../../imagenes/iconos/mascota.svg" alt=""></a>
            </div>
        </nav>
        <!-- FORMULARIO REGISTRO -->
        <div class="form--container">
            <h1 class="titulo">Registro de <span>clientes</span></h1>
            <h2 class="subtitulo">Revise correctamente la información antes de mandarla.</h2>
                <form action="../backend/procesar_registrar_cliente.php" class="form form__register-usuario" id="formulario" method="POST">

                    <input type="hidden" value="<?php echo $id_veterinario ?>" name="id_veterinario">
                    <div class="formulario__grupo" id="grupo__nombre">
                        <div class="formulario__grupo-input">
                            <input type="text"  id="nombre" name="nombre" class="formulario__input" placeholder="Nombre completo" require>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">El nombre solo puede contener letras.</p>
                    </div>

                    <!-- Grupo telefono -->
                    <div class="formulario__grupo" id="grupo__telefono">
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" id="telefono" name="telefono" placeholder="Telefono" require>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark" ></i>
                        </div>
                        <p class="formulario__input-error">Escriba un numero de teléfono valido</p>
                    </div>

                    <!-- Grupo localidad -->
                    <div class="formulario__grupo" id="grupo__localidad">
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" id="localidad" name="localidad" placeholder="Localidad" require>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">No puede quedar vacío este campo</p>
                    </div>

                    <!-- Grupo calle -->
                    <div class="formulario__grupo" id="grupo__calle">
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" id="calle" name="calle" placeholder="Calle" require>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">No puede quedar vacío este campo</p>
                    </div>

                    <!-- Grupo numero -->
                    <div class="formulario__grupo" id="grupo__numero">
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" id="numero" name="numero" placeholder="# Numero" require>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">Debe tener solo números</p>
                    </div>
                    
                    <!-- Grupo Email -->
                    <div class="formulario__grupo" id="grupo__email">
                        <div class="formulario__grupo-input">
                            <input type="text" id="email" name="email" class="formulario__input" placeholder="Email" require>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">Ingresa un email valido.</p>
                    </div>

                    <button class="btn btn__registro-disable" id="btn__registro-usuario">Registrar</button>

                </form>
        </div>
    </main>

    <script src="../../js/vr.js"></script>
    <script src="https://kit.fontawesome.com/a34b92f4e5.js" crossorigin="anonymous"></script>
</body>
</html>