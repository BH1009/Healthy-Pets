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

        

    $eliminar = "DELETE FROM clientes_veterinario WHERE id = '$id'";

    $resutadoEliminar = mysqli_query($conexion, $eliminar);

    if($resutadoEliminar) {
        header("Location: ../frontend/clientes.php");
    } else {
        echo "<script>alert('No se pudo eliminar al cliente'); window.location='../frontend/editar_cliente.php';</script>";
    }
?>