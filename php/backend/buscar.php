<?php
include 'conexion.php';//Se importa  la conexion

//Se revice el dato enviado por metodo post y se guarda en la variable buscar
$buscar = $_GET['buscar'];

//Si no esta vacio se realiza la busqueda
if(!empty($buscar)){
    //Se alamacena la consulta 
    $query = "SELECT e.nombre FROM enfermedades AS e WHERE nombre LIKE '$buscar%'"; 
    
    //Se guarda el resultado en la consulta 
    $result = mysqli_query($conexion,$query);


    //Si la consulta no se realiza se muestra el error
    if(!$result){
        die("Error: " . mysqli_error($conexion));
    }

    //Se crea un arreglo
    $json = array();

    //Se recorre el arreglo y cada fila se alamacena en la row
    while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'nombre' => $row['nombre']
            );
    }

    //Se codifica en formato json 
    $jsonstrig = json_encode($json);
    
    //Se muestra el reusltado aunque en este caso se manda la respuesra al archivo app.js
    echo $jsonstrig;   
} 
?>