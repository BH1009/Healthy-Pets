<?php 

    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $localidad = $_POST['localidad'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];
    $id_veterinario = $_POST['id_veterinario'];

    $query = "INSERT INTO clientes_veterinario(nombre, telefono, localidad, calle, numero, email, id_veterinario) VALUES('$nombre', '$telefono', '$localidad', '$calle', '$numero', '$email', '$id_veterinario')";

    // Verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM clientes_veterinario WHERE email = '$email'");

    // if(mysqli_num_rows($verificar_correo) > 0){
    //     echo '
    //         <script>
    //             alert("Este correo ya esta registrado, intenta con otro diferente");
    //             window.location = "../frontend/registro_cliente.php";
    //         </script>
    //     ';
    //     exit();
    // }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
            alert("Cliente almacenado exitosamente");
            window.location = "../frontend/clientes.php";
            </script>
        ';
    }else{
        echo '
            <script>
            alert("Intentalo de nuevo, usuario no almacenado");
            window.location = "../frontend/clientes.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>