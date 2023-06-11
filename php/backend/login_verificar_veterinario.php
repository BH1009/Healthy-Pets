<?php 

    session_start();

    include ('conexion.php');

    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM veterinario WHERE email = '$correo' and
    contraseña ='$contraseña'");

    if(mysqli_num_rows($validar_login) > 0){
        header("location: ../frontend/veterinario.php");

        $_SESSION['veterinario'] = $correo;

        exit;
    }else {
        echo '
            <script>
                alert("Usuario o contraseña incorrectas");
                window.location = "../frontend/login1.php";
                // CAMBIAR LA LOCACION POR LA PAGINA DE VETERINARIOS
            </script>
        ';
        exit;
    }

?>