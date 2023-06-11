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
    $query = ("SELECT id,nombre FROM clientes_veterinario WHERE id_veterinario = $id_veterinario");

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
                <a href="clientes_veterinari.php"><img class="nav--icono" src="../../imagenes/iconos/clientes.svg" alt=""></a>
                <a href="veterinario_perfil.php"><img class="nav--icono" src="../../imagenes/iconos/user.svg" alt=""></a>
                <a href="mascotas.php"><img class="nav--icono" src="../../imagenes/iconos/mascota.svg" alt=""></a>
            </div>
        </nav>
        <!-- FORMULARIO REGISTRO -->
        <div class="form--container">
            <h1 class="titulo">Registro de <span>mascotas</span></h1>
            <h2 class="subtitulo">Revise correctamente la información antes de mandarla.</h2>
                <form action="../backend/procesar_registrar_mascota.php" class="form form__register-usuario" id="formulario" method="POST">

                    <input type="hidden" value="<?php echo $id_veterinario ?>" name="id_veterinario">
                    
                    <div class="formulario__grupo" id="grupo__nombre">
                        <div class="formulario__grupo-input">
                            <input type="text"  id="nombre" name="nombre" class="formulario__input" placeholder="Nombre de la mascota" require>
                            <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                        </div>
                        <p class="formulario__input-error">El nombre solo puede contener letras.</p>
                    </div>

                    <!-- Grupo fecha nac -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <div class="formulario__grupo-input">
                            <label for="date">Fecha de nacimiento</label>
                            <input type="date"  id="date" name="date" class="formulario__input"  require>   
                        </div>
                    </div>

                    <!-- observaciones -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <div class="formulario__grupo-input">
                            <input type="text"  id="observaciones" name="observaciones" class="formulario__input" placeholder="Observaciones" require>
                        </div>
                    </div>
                    <!-- TIPO -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <div class="formulario__grupo-input">
                            <input type="text"  id="tipo" name="tipo" class="formulario__input" placeholder="Perro o Gato" require>
                        </div>
                    </div>
                    <!-- Raza -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <div class="formulario__grupo-input">
                            <input type="text"  id="raza" name="raza" class="formulario__input" placeholder="Raza" require>
                        </div>
                    </div>
                    <!-- sexo -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <div class="formulario__grupo-input">
                            <input type="text"  id="sexo" name="sexo" class="formulario__input" placeholder="Macho o Hembra" require>
                        </div>
                    </div>
                    <!-- Peso -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <div class="formulario__grupo-input">
                            <input type="number"  id="peso" name="peso" class="formulario__input" placeholder="Peso" require>
                        </div>
                    </div>
<br>
                    <!-- dueño -->
                    <label for="dueño">Dueño</label>
                    <select name="dueño" id="dueño">
                        <?php 
                        $resultado = mysqli_query($conexion, $query);
                        while($row = $resultado->fetch_assoc()):
                            $id = $row['id'];
                            $dueño = $row['nombre'];
                            echo "<option value=$id>$dueño</option>";
                        endwhile;
                        ?>
                    </select>
                    <br>

                    <button class="btn btn__registro-disable" id="btn__registro-usuario">Registrar</button>

                </form>
        </div>
    </main>

    <script src="../../js/vr.js"></script>
    <script src="https://kit.fontawesome.com/a34b92f4e5.js" crossorigin="anonymous"></script>
</body>
</html>