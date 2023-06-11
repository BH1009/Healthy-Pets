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
    $telefono = $_POST['telefono'];
    $localidad = $_POST['localidad'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];
        

    $actualizar = "UPDATE clientes_veterinario SET nombre = '$nombre', telefono = '$telefono', localidad = '$localidad', calle = '$calle', numero = '$numero', email = '$email' WHERE id = '$id'";

    $resutado = mysqli_query($conexion, $actualizar);

    if($resutado) {
        echo "<script>alert('!Se han guardado los cambios correctamente!'); window.location='../frontend/clientes.php';</script>";
    } else {
        echo "<script>alert('No se pudo modificar la informacion, intentelo de nuevo'); window.location='../frontend/editar_cliente.php';</script>";
    }
?>