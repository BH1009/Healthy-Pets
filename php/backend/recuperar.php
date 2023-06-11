<?php

include 'conexion.php';

$dato = $_GET['dato'];


//Si no esta vacio se realiza la busqueda
if(!empty($dato)){
    //Se alamacena la consulta 

    $idback = $conexion->query("SELECT e.id FROM enfermedades AS e WHERE e.nombre LIKE '$dato%'");
    $id = $idback->fetch_assoc();
    $key = $id['id'];

    $consult =  "SELECT e.nombre, e.descripcion, e.recomendacion, m.tipo, GROUP_CONCAT(i.imagen) AS imagenes
    FROM enfermedades AS e
    INNER JOIN mascotas AS m ON m.id = e.tipo and e.nombre LIKE '$dato%'
    INNER JOIN imagenes AS i ON i.enfermedad = $key and e.nombre LIKE '$dato%'";
    

    //Se guarda el resultado en la consulta 
    $result = $conexion->query($consult);
    //Si la consulta no se realiza se muestra el error
    if(!$result){
        die("Error");
    }

    //Se crea un arreglo
    $json = array();

    //Se recorre el arreglo y cada fila se alamacena en la row
    while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'nombre' => $row['nombre'],
                'descripcion' => $row['descripcion'],
                'recomendacion' => $row['recomendacion'],
                'tipo' => $row['tipo'],
                'imagenes' => $row['imagenes']
            );
    }

    //Se codifica en formato json 
    $jsonstrig = json_encode($json);
    
    //Se muestra el reusltado aunque en este caso se manda la respuesta al archivo app.js
    echo $jsonstrig;
}

