<?php 

    session_start();

    include ('conexion.php');

    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuario_n WHERE email = '$correo' and
    contraseña ='$contraseña'");

    if(mysqli_num_rows($validar_login) > 0){
        header("location: ../frontend/healthyPets.php");

        $_SESSION['usuario'] = $correo;

        exit;
    }else {
        echo '
            <script>
                alert("Usuario o contraseña incorrectas");
                window.location = "../frontend/login.php";
            </script>
        ';
        exit;
    }
?>