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
    
    $id = $_GET['id'];

    $eliminar = "DELETE FROM mascota WHERE idm = '$id'";

    $resutadoEliminar = mysqli_query($conexion, $eliminar);

    if($resutadoEliminar) {
        header("Location: ../frontend/mascotas.php");
    } else {
        echo "<script>alert('No se pudo eliminar la mascota'); window.location='../frontend/mascotas.php';</script>";
    }
?>