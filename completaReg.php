<?php
include "Obj/Conexion.php"
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
    <link rel="stylesheet" href="styles/completaReg.css">
    <title>Completar Registro</title>
</head>
<body>

    <header class="header">
        <img src="img/home.svg" alt="Home Page" class="regresar" onclick="window.location='index.html';">
        <h1>Completar registro de Propietario.</h1>
        <img class="logo"src="img/avaLogo.png" alt="Logo Veterinaria" onclick="window.location='index.html';">
    </header>
    <form action="Obj/updatePropietario.php" method="post">
        <div class="busqueda">
            <label for="Busqueda">ID de busqueda:</label>
            <input class="datoBusqueda" type="text" name="busqueda">
            <button class="btngeneral btnbuscar">Buscar</button><span class="mensaje"></span>
            
        </div>
    
        <div class="formulario propietarioForm ">
            <div class="contenedor">
                <div class="nombreCompleto">
                    <div class="nombre">
                        <label for="Nombre">Nombre:</label>
                        <input class="entrada" classtype="text" name="nombre">
                    </div>
                    <div class="apellidoPat">
                        <label for="apellido">Apellido Paterno:</label>
                        <input class="entrada" type="text" name="apellidoPat">
                    </div>
                    <div class="apellidoMat">
                        <label for="apellido">Apellido Materno:</label>
                        <input class="entrada" type="text" name="apellidoMat">
                    </div>
                    
                </div>
                <div class="datosTel">
                    <div class="datTel">
                        <label for="telefono" class="telefono-acomodar">Teléfono Celular:</label>
                        <input class="entrada" type="number" name="telefono">
                    </div>
                    <div class="datTel">
                        <label for="telefonoadi">Teléfono Adicional:</label>
                        <input class="entrada" type="number" name="telefonoadi">
                    </div>
                </div>

                <div class="correo">
                    <label for="correo">Correo:</label>
                    <input class="entrada" type="email" name="correo" >
                </div>

                <div class="direccion">
                    <h3>Dirección</h3><br>
                    
                    <div class="datosDir">
                        <div class="dirData">
                            <label for="calle">Calle:</label>
                            <input class="entrada" type="text" name="calle" id="calle">
                        </div>
                        <div class="dirData">
                            <label for="colonia">Colonia:</label>
                            <input class="entrada" type="text" name="colonia" id="colonia">
                        </div>
                        <div class="dirData">
                            <label for="alcaldia">Alcaldia:</label>
                            <input class="entrada" type="text" name="alcaldia" id="alcaldia">
                        </div>
                        <div class="dirData">
                            <label for="estado">Estado:</label>
                            <input class="entrada" type="text" name="estado" id="estado">
                        </div>
                        <div class="dirData">
                            <label for="pais">Pais:</label>
                            <input class="entrada" type="text" name="pais" id="pais">
                        </div>
                        <div class="dirData">
                            <label for="codPost">Codigo Postal:</label>
                            <input class="entrada" type="number" name="codPost" id="codPost">
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
                
                <button class="btngeneral btnactualizar">Actualizar</button>
                
            </div>

        </div>
    </form>
    <script src="scripts/completaReg.js"></script>
</body>
</html>