<?php 

    include 'conexion.php';

    
    $nombre = $_POST['nombre'];
    $date = $_POST['date'];
    $observaciones = $_POST['observaciones'];
    $tipo = $_POST['tipo'];
    $raza = $_POST['raza'];
    $sexo = $_POST['sexo'];
    $peso = $_POST['peso'];
    $dueño = $_POST['dueño'];
    $id_veterinario = $_POST['id_veterinario'];

    

    $query = "INSERT INTO mascota(nombrem, fecha_nacimiento, observaciones, tipo, raza, sexo, peso, id_cliente, id_veterinario) VALUES('$nombre', '$date', '$observaciones', '$tipo', '$raza', '$sexo', '$peso', '$dueño', '$id_veterinario')";


    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
            alert("Mascota almacenado exitosamente");
            window.location = "../frontend/mascotas.php";
            </script>
        ';
    }else{
        echo '
            <script>
            alert("Intentalo de nuevo, mascota no almacenado");
            window.location = "../frontend/mascota.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>