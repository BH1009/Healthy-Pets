<?php 

include 'conexion.php';

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $veterinaria = $_POST['veterinaria'];
    $localidad = $_POST['localidad'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $telefono = $_POST['telefono'];
    // $servicios = 'Completo';

    $query = "INSERT INTO veterinario(nombre, email, usuario, contraseña, veterinaria, localidad, calle, numero, telefono) VALUES('$nombre', '$email', '$usuario', '$contraseña', '$veterinaria', '$localidad', '$calle', '$numero', '$telefono')";

    // Verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM veterinario WHERE email = '$email'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado, intenta con otro diferente");
                window.location = "../frontend/login1.php";
            </script>
        ';
        exit();
    }

    // Verificar que el nombre de usuario no se repita en la base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM veterinario WHERE usuario='$usuario'");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este nombre de usuario ya esta registrado, intenta con otro diferente");
                window.location = "../frontend/login1.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
            alert("Ususario almacenado exitosamente");
            window.location = "../frontend/login1.php";
            </script>
        ';
    }else{
        echo '
            <script>
            alert("Intentalo de nuevo, usuario no almacenado");
            window.location = "../frontend/login1.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>