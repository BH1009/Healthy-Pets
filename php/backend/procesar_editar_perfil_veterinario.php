<?php 
    session_start();
    include ('conexion.php');

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
    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $veterinaria = $_POST['veterinaria'];
    $localidad = $_POST['localidad'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $telefono = $_POST['telefono'];
        

    $actualizar = "UPDATE veterinario SET nombre = '$nombre', email = '$email', usuario = '$usuario', contraseña = '$contraseña', veterinaria = '$veterinaria', localidad = '$localidad', calle = '$calle', numero = '$numero', telefono = '$telefono' WHERE id = '$id'";

    $resutado = mysqli_query($conexion, $actualizar);

    if($resutado) {
        echo "<script>alert('Se han guardado los cambios correctamente'); window.location='../frontend/veterinario_perfil.php';</script>";
    } else {
        echo "<script>alert('No se pudo modificar la informacion, intentelo de nuevo'); window.location='../frontend/editar_perfil_veterinario.php';</script>";
    }
?>