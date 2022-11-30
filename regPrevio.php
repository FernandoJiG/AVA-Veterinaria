<?php
include "Obj/Conexion.php";
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
    <link rel="stylesheet" href="styles/newPatient.css">
    <link rel="stylesheet" href="styles/mensajeRegP.css">
    <title>Registro Previo</title>
</head>
<body>
<header class="header">
        <h1>Registro previo a tu consulta.</h1>
        <img class="logo"src="img/avaLogo.png" alt="Logo Veterinaria">
    </header>

    <div class="controles">
        <div class="navegar">
            <button class="boton espacio">Propietario</button>
            <button class="boton">Paciente</button>
        </div>
        
    </div>

    <form method="post" id="form" action="">
        <div class="formulario propietarioForm ">
            <div class="contenedor">
                <div class="nombreCompleto">
                    <div class="nombre">
                        <label for="Nombre">Nombre:</label>
                        <input class="entrada solicitar" classtype="text" name="nombre">
                    </div>
                    <div class="apellidoPat">
                        <label for="apellido">Apellido Paterno:</label>
                        <input class="entrada solicitar" type="text" name="apellidoPat">
                    </div>
                    <div class="apellidoMat">
                        <label for="apellido">Apellido Materno:</label>
                        <input class="entrada solicitar" type="text" name="apellidoMat">
                    </div>
                    
                </div>
                <div class="datosTel">
                    <div class="datTel">
                        <label for="telefono">Teléfono Celular:</label>
                        <input class="entrada solicitar" type="number" name="telefono" >
                    </div>
                    <div class="datTel">
                        <label for="telefonoAdi">Telefono Adicional:</label>
                        <input class="entrada" type="number" name="telefonoAdi">
                    </div>
                </div>

                <div class="correo">
                <label for="correo">Correo:</label>
                <input class="entrada solicitar" type="email" name="correo">
                </div>

                <div class="direccion">
                    <h3>Dirección</h3><br>
                    
                    <div class="datosDir">
                        <div class="dirData">
                            <label for="calle">Calle:</label>
                            <input class="entrada solicitar" type="text" name="calle" id="calle">
                        </div>
                        <div class="dirData">
                            <label for="colonia">Colonia:</label>
                            <input class="entrada solicitar" type="text" name="colonia" id="colonia">
                        </div>
                        <div class="dirData">
                            <label for="alcaldia">Alcaldia:</label>
                            <input class="entrada solicitar" type="text" name="alcaldia" id="alcaldia">
                        </div>
                        
                    </div>
                </div>

                <div class="marketing">
                    <h3>¿De dónde nos conoces?</h3>
                    <select name="marketing" id="marketing" class="publicidad">
                        
                        <option value="NoSelected">Selecciona una Opción.</option>
                        <?php
                            
                            $query="SELECT * from mkt";
                            $result = mysqli_query($conex, $query);

                            while($row = mysqli_fetch_array($result)){//mysqli_fetch_array Obtiene los datos de la primera fila y en los indices son los nombres de los campos.
                                echo '<option value="'.$row['idmkt'].'">'.$row['descri'].'</option>';
                            }
                            
                        ?>
                    </select>
                </div>

                

            </div>
            
            <button class="btnsiguiente btngeneral">Siguiente</button>
    
        </div>

        <div class="formulario pacienteForm invisible">
            <div class="contenedorPaciente">
                <label class="etiqueta" for="Nombre">Nombre:</label>
                <input class="entrada solicitar" type="text" name="nombreMasc">
                <label class="etiqueta" for="Nombre">Apellido:</label>
                <input class="entrada solicitar" type="text" name="apellidoMasc" readonly>
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
                <div class="MotivVisita">
                        <label for="descrip">Motivo de visita:</label><br>
                        <textarea id="MotivVisita" name="descrip" cols="30" rows="10" class="solicitar"></textarea>
                </div>
                
                <p class="mensajeError">¡Hay datos faltantes!</p>
                
                <button type="submit" class="btngeneral enviar">Registrar</button>
            </div>
    
            
        </div>
        <!-- <input type="text" name="doctor" style="display: none"> -->
    </form>

    <div class="contenedorMensajeFin">
        <div class="mensajeFin">
            <h2 class="titulo">Registro exitoso.</h2>
            <p class="texto">El siguiente es tu identificador como usuario, muestralo a tu doctor cuando se te solicite:</p>
            <p class="id"></p>
        </div>
    </div>
    
    
    <script src="scripts/regPrevio.js"></script>
</body>
</html>