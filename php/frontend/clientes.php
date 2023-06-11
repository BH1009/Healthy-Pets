<?php 
    session_start();
    include ('../backend/conexion.php');

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
    $email_sesion = $_SESSION['veterinario'];

    $query_sesion = mysqli_query($conexion, "SELECT id FROM veterinario WHERE email = '$email_sesion'");
    if ($query_sesion) {
        while ($row = $query_sesion->fetch_array()) {
            $id_veterinario = $row['id'];
        }
    }
    $clientes = "SELECT * FROM clientes_veterinario WHERE id_veterinario = '$id_veterinario' ORDER BY nombre ASC"
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/veterinario.css">
    <title>Veterinario Healthy Pets</title>

</head>
<body>
    
    <main class="hero">
        <div class="hero__container">
            <nav class="nav">
                <a href="veterinario.php"><h2 class="logo--text"><span>H</span>elthy <span>P</span>ets</h2></a>
                <div class="conteiner__links">
                    <a class="cerrar-sesion" href="../backend/cerrar_sesion.php" class="link-hover">Cerrar sesión</a>
                    <a class="cerrar-sesion" href="../frontend/veterinario.php" class="link-hover">Regresar</a>
                    <a href="veterinario_perfil.php"><img class="nav--icono" src="../../imagenes/iconos/user.svg" alt=""></a>
                    <a href="mascotas.php"><img class="nav--icono" src="../../imagenes/iconos/mascota.svg" alt=""></a>
                </div>
                
            </nav>
            <div class="hero__copy">
                <p class="copy--paragraph"><span>Sección</span> de</p>
                <h1 class="copy__tittle">Clientes</h1>
                <p class="copy--paragraph--2">Tener un registro de tus clientes te será de gran ayuda, ya que de esa manera tendrás organizada toda su información para cuando la necesites.</p>
                <?php 
                    $resultado = mysqli_query($conexion, $clientes);
                    if(mysqli_num_rows($resultado) <= 0){
                        ?>
                        <div class="seccion__mensage--vacio">
                            <div class="container__mensaje--vacio">
                                <img class="icono__mensaje--vacio" src="../../imagenes/iconos/alerta.svg" alt="">
                                <p class="mensaje--vacio">No hay clientes registrados hasta el momento</p>
                            </div>
                            <a class="btn" href="registro_cliente.php?id_veterinario=<?php echo $id_veterinario;?>">Registrar cliente</a>
                        </div>
                        
                        <?php
                    } else {
                        ?>
                <p class="copy--paragraph--2">Estos son los clientes que tienes registrados hasta el momento.</p>
                <a class="btn" href="registro_cliente.php?id_veterinario=<?php echo $id_veterinario;?>">Registrar cliente</a>
                    <div class="container__tabla--clientes">
                        <p class="copy--paragraph--2">¡La tabla esta ordenada alfabéticamente! </p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Dirección</th>
                                    <th>email</th>
                                    <th class="campo__link">Operacion</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                        while($row = mysqli_fetch_assoc($resultado)) {
                ?>     
                            <tr class="fila"> 
                                <td><?php echo $row["nombre"]?></td>
                                <td><?php echo $row["telefono"]?></td>
                                <td><?php echo $row["localidad"].", Calle: ".$row["calle"]." #".$row["numero"]?></td>
                                <td><?php echo $row["email"]?></td>
                                <td>
                                    <a class="link__operacion" href="../frontend/editar_cliente.php?id= <?php echo $row["id"];?>">Modificar</a>
                                    <a class="link__operacion btn--2" href="../backend/procesar_eliminar_cliente.php?id= <?php echo $row["id"];?>">Eliminar</a>
                                </td>
                            </tr>
                <?php
                        } 
                    }
                    mysqli_free_result($resultado);
                ?>  
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </main>
    <script src="../../js/confirmar_eliminar.js"></script>
    <script src="../../js/modal.js"></script>
</body>
</html> 