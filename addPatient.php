<?php
include "Obj/Conexion.php";
session_start();
$apellido = $_SESSION["ApeMascota"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/addPatient.css">
    <title>Agregar Paciente</title>
</head>
<body>
    <header class="header">
        <h1>Registro de nuevo paciente.</h1>
        <a href="index.html"><img class="logo"src="img/avaLogo.png" alt="Logo Veterinaria"></a>
        
    </header>

    <div class="controles">
        <button class="boton">Paciente</button>
    </div>

    <form method="post" id="form" action="">
        <div class="formulario pacienteForm">
                <div class="contenedorPaciente">
                    <label class="etiqueta" for="Nombre">Nombre:</label>
                    <input class="entrada solicitar" type="text" name="nombreMasc">
                    <label class="etiqueta" for="Nombre">Apellido:</label>
                    <input class="entrada solicitar" type="text" name="apellidoMasc" value="<?php echo $apellido ?>" readonly>
                    <div class="primeraDivision">
                        <div class="uno">
                            <label class="etiqueta" for="sex">Sexo:</label>
                            <select name="sex" id="sex">
                                <option value="NoSelected">Selecciona una Opción.</option>
                                <option value="hembra">Hembra</option>
                                <option value="macho">Macho</option>
                            </select>
                        </div>
                        <div class="dos">
                            <label class="etiqueta" for="edad">Edad:</label>
                            <input class="solicitar" type="text" name="edad">
                        </div>
                        
                    </div>
                    <div class="segundaDivision">
                        <div class="uno">
                            <label class="etiqueta" for="tipoMascota">Tipo de mascota:</label>
                            <select name="tipoMascota" id="tipoMascota">
                                <option value="NoSelected">Selecciona una Opción.</option>
                                <?php
                                
                                    $query="SELECT * from tipos";
                                    $result = mysqli_query($conex, $query);

                                    while($row = mysqli_fetch_array($result)){//mysqli_fetch_array Obtiene los datos de la primera fila y en los indices son los nombres de los campos.
                                        echo '<option value="'.$row['idtipo'].'">'.$row['tipo'].'</option>';
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="dos">
                            <label class="etiqueta" for="raza">Raza:</label>
                            <input class="solicitar" type="text" name="raza">
                        </div>                    
                    </div>
                    <div class="terceraDivision">
                        <div class="color">
                            <label class="etiqueta" for="color">Color:</label>
                            <input class="solicitar" type="text" name="color">
                        </div>
                        <div class="esterilizado">
                            <p>Esterilizado:</p>
                            <select name="esterilizado" id="esterilizado">
                                <option value="NoSelected">Selecciona una Opción.</option>
                                <?php
                                
                                    $query="SELECT * from esteril";
                                    $result = mysqli_query($conex, $query);

                                    while($row = mysqli_fetch_array($result)){//mysqli_fetch_array Obtiene los datos de la primera fila y en los indices son los nombres de los campos.
                                        echo '<option value="'.$row['idester'].'">'.$row['tipoester'].'</option>';
                                    }
                                
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="nReg">
                        <label class="etiqueta" for="numReg">Número de Registro</label>
                        <select name="optReg" id="optReg">
                            <option value="NoSelected">Selecciona una Opción.</option>
                            <option value="chip">Chip</option>
                            <option value="tatuaje">Tatuaje</option>
                        </select>
                        <input type="text" class="numReg solicitar" name="numReg">
                    </div>

                    <div class="doc">
                        <h3 class="doctor">Doctor</h3> 
                        <div class="cedula">
                            <label for="cedula">Cedula:</label> <input name="cedula" type="text">
                        </div>
                        <br><br>
                        <label for="doctor">Nombre del Doctor:</label>
                        <input class="entrada solicitar" type="text" name="doctor" id="doctor" readonly>
                    </div>
                    
                    <p class="mensajeError">¡Hay datos faltantes!</p>
                    
                    <button type="submit" class="btngeneral enviar">Registrar</button>
                </div>
        </div>
    </form>
    <script src="scripts/addPatient.js"></script>
</body>
</html>