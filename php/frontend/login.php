<?php 
    session_start();

    if(isset($_SESSION['usuario'])) {
        header("location: healthyPets.php");
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Healthy Pets</title>
    <link rel="stylesheet" href="../../css/login-style.css">

</head>
<body>
    <main class="login">
        <nav class="nav">
            <a href="../../index.html"><h1 class="logo--text"><span>H</span>elthy <span>P</span>ets</h1></a>
            <a href="../../index.html" class="link">Regresar</a>
        </nav>
        <div class="main__container">
            <div class="container">
                <div class="header">
                    <h2 class="title activo">Entrar</h2>
                    <h2 class="title title-regiter">Registrarse</h2>
                </div>
                
                <!-- ****************** U S U A R I O ***************** -->
                <h3 class="subtitle"><span class="color--active">U</span>suario</h3>
    
                <div class="container__form">
                    <form action="../backend/login_verificar_usuario.php" method="POST" class="form form__login-usuario activo">
                        <div class="formulario__grupo">
                            <input class="formulario__input" type="text" placeholder="Correo" name="correo"></input>
                        </div>
                        <div class="formulario__grupo">
                            <input class="formulario__input" type="password" placeholder="Contraseña" name="contraseña"></input>
                        </div>
    
                        <div class="container__btn">
                            <div class="btns">
                                <button class="btn btn-1">Entrar</button>
                                <a href="login1.php" class="btn btn-2">Soy Veterinario</a>
                            </div> 
                        </div>    
                    </form>
                
                    <!-- FORMULARIO REGISTRO -->
                    <form action="../backend/registro_usuario.php" class="form
                    form__register-usuario" id="formulario" method="POST">

                        <!-- grupo Nombre -->
                        <div class="formulario__grupo" id="grupo__nombre">
                            <div class="formulario__grupo-input">
                                <input type="text" placeholder="Nombre" id="nombre" name="nombre" class="formulario__input"></input>
                                <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                            </div>
                            <p class="formulario__input-error">El nombre solo puede contener letras y numerós.</p>
                        </div>

                        <!-- Grupo Email -->
                        <div class="formulario__grupo" id="grupo__email">
                            <div class="formulario__grupo-input">
                                <input type="text" placeholder="Correo" id="email" name="email" class="formulario__input"></input>
                                <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                            </div>
                            <p class="formulario__input-error">Ingresa un email válido.</p>
                        </div>

                        
                        <!-- Grupo Usuario -->
                        <div class="formulario__grupo" id="grupo__usuario">
                            <div class="formulario__grupo-input">
                                <input type="text" placeholder="Usuario" id="usuario" name="usuario" class="formulario__input"></input>
                                <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                            </div>
                            <p class="formulario__input-error">El usuario debe ser de 4 a 16 dígitos y solo debe contener números, letras y guiones bajos.</p>
                        </div>

                        <!-- Grupo Contraseña -->
                        <div class="formulario__grupo" id="grupo__contraseña">
                            <div class="formulario__grupo-input">
                                <input type="password" placeholder="Contraseña" id="contraseña" name="contraseña" class="formulario__input"></input>
                                <i class="formulario__validacion-estado fa-solid fa-circle-xmark"></i>
                            </div>
                            <p class="formulario__input-error">La contraseña debe se entre 4 y 12 dígitos.</p>
                        </div>

                        <div class="container__btn">
                            <div class="btns">
                                <button disabled class="btn btn-1 btn__registro-disable" id="btn__registro-usuario">Registrarse</button>
                                <a href="login1.php" class="btn btn-2">Soy Veterinario</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
    <script src="../../js/tabs_login.js"></script>
    <script src="../../js/validacionRegistro.js"></script>
    <script src="https://kit.fontawesome.com/a34b92f4e5.js" crossorigin="anonymous"></script>
</body>
</html>