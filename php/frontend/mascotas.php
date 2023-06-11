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
    $mascota = "SELECT * FROM mascota m INNER JOIN clientes_veterinario c ON m.id_cliente = c.id WHERE m.id_veterinario = '$id_veterinario' ORDER BY nombrem ASC"
    // $mascota = "SELECT * FROM mascota WHERE id_veterinario = '$id_veterinario' ORDER BY nombrem ASC"
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/veterinario.css">
    <title>Mascotas | Healthy Pets</title>

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
                    <a href="clientes.php"><img class="nav--icono" src="../../imagenes/iconos/clientes.svg" alt=""></a>
                </div>
                
            </nav>
            <div class="hero__copy">
                <p class="copy--paragraph"><span>Sección</span> de</p>
                <h1 class="copy__tittle">Mascotas</h1>
                <p class="copy--paragraph--2">El registro de las mascotas de tus clientes es una parte esencial del funcionamiento de tu veterinaria. Ya que tendrás registradas de una manera organizada las características de las mascotas de tus clientes y como ya lo sabes, estas características te permitirán dar un diagnóstico más acertado.</p>
                <?php 
                    $resultado = mysqli_query($conexion, $mascota);
                    if(mysqli_num_rows($resultado) <= 0){
                        ?>
                        <div class="seccion__mensage--vacio">
                            <div class="container__mensaje--vacio">
                                <img class="icono__mensaje--vacio" src="../../imagenes/iconos/alerta.svg" alt="">
                                <p class="mensaje--vacio">No hay mascotas registrados hasta el momento</p>
                            </div>
                            <a class="btn" href="registro_mascota.php?id_veterinario=<?php echo $id_veterinario;?>">Registrar mascota</a>
                        </div>
                        
                        <?php
                    } else {
                        ?>
                <p class="copy--paragraph--2">Estos son las mascotas que tienes registrados hasta el momento.</p>
                <a class="btn" href="registro_mascota.php?id_veterinario=<?php echo $id_veterinario;?>">Registrar mascota</a>
                    <div class="container__tabla--clientes">
                        <p class="copy--paragraph--2">¡La tabla esta ordenada alfabéticamente! </p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Fecha de nacimiento </th>
                                    <th>Observaciones </th>
                                    <th>Tipo</th>
                                    <th>Raza</th>
                                    <th>Sexo</th>
                                    <th>Peso</th>
                                    <th>Dueño</th>
                                    <th class="campo__link">Operacion</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                        while($row = mysqli_fetch_assoc($resultado)) {
                ?>     
                            <tr class="fila"> 
                                <td><?php echo $row["nombrem"]?></td>
                                <td><?php echo $row["fecha_nacimiento"]?></td>
                                <td><?php echo $row["observaciones"]?></td>
                                <td><?php echo $row["tipo"]?></td>
                                <td><?php echo $row["raza"]?></td>
                                <td><?php echo $row["sexo"]?></td>
                                <td><?php echo $row["peso"]?></td>
                                <td><?php echo $row["nombre"]?></td>
                                <td>
                                    <a class="link__operacion btn--2" href="../backend/procesar_eliminar_mascota.php?id= <?php echo $row["idm"];?>">Eliminar</a>
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
    <script src="../../js/confirmar_eliminar_mascota.js"></script>
</body>
</html> 