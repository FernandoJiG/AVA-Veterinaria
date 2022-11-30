<?php
//Datos de conexion
$serv = "127.0.0.1";
$usuario = "root";
$password = "";
$base = "veterinaria";

//Creación con mysqli_connect()
$conex = mysqli_connect($serv, $usuario, $password, $base);

function rellenar_select($table_name,$complement){
    global $conex;
    $query="SELECT * from ". $table_name;
    $result = mysqli_query($conex, $query);
    echo '<option value="No Selected">Seleccione '. $complement.'</option>';
    while($row = mysqli_fetch_array($result)){//mysqli_fetch_array Obtiene los datos de la primera fila y en los indices son los nombres de los campos.
        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
    }
}


// $server = '82.180.138.103';
// $user = 'u540349646_admin';
// $pass = 'hanna254Cvet';
// $base ='u540349646_Veterinaria';

// $conex = mysqli_connect($server, $user, $pass, $base);

// if (!$conex)
// {
//    echo "Error no se pudo conectar";
//    exit;
// }
?>