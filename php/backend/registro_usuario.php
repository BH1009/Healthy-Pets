<?php 

    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    
    $query = "INSERT INTO usuario_n(nombre, email, usuario, contraseña) VALUES('$nombre', '$email', '$usuario', '$contraseña')";    

    // Verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario_n WHERE email = '$email'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado, intenta con otro diferente");
                window.location = "../frontend/login.php";
            </script>
        ';
        exit();
    }

// Verificar que el nombre de usuario no se repita en la base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario_n WHERE usuario='$usuario'");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este nombre de usuario ya esta registrado, intenta con otro diferente");
                window.location = "../frontend/login.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
            alert("Ususario almacenado exitosamente");
            window.location = "../frontend/login.php";
            </script>
        ';
    }else{
        echo '
            <script>
            alert("Intentalo de nuevo, usuario no almacenado");
            window.location = "../frontend/login.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>