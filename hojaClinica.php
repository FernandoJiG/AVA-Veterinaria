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
    <link rel="stylesheet" href="styles/hojaClinica.css">
    <title>Hoja Clinica.</title>
</head>
<body>
    <header>
        <div class="encabezado">
            <img src="img/home.svg" alt="Home-Page" class="regresar" onclick="window.location='index.html';">
            <h1>Hoja Clinica</h1>
            <img class="logo"src="img/avaLogo.png" alt="Logo Veterinaria" onclick="window.location='index.html';">
        </div>
        
    </header>

    <div class="Primera-Info">
        <div>
            <label for="date">Fecha:</label>
            <input type="text" name="date" class="fecha">
        </div>
        
        <div>
            <label for="expediente">Expediente:</label>
            <input type="text" name="expediente" class="expediente">
        </div>
        
    </div>
    <div class="navegar">
        <button class="boton espacio">Hoja 1</button>
        <button class="boton">Hoja 2</button>
    </div>

    <div class="contenedor">
        <div class="cuerpoExpediente expediente-hoja-1">
            <div class="datos-mascota">
                <div class="div-width-compartido">
                    <label for="raza">Raza:</label>
                    <input type="text" name="raza" class="raza input-width-compartido">
                </div>
                <div class="div-width-compartido">
                    <label for="color">Color:</label>
                    <input type="text" name="color" class="color input-width-compartido">
                </div>
            </div>
        
        
            <div class="datos-propietario">
                <div>
                    <label for="propietario">Propietario:</label>
                    <input type="text" name="propietario" class="propietario">
                </div>
                <div>
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" name="domicilio" class="domicilio">
                </div>
                <div>
                    <label for="telefono">Teléfonos:</label>
                    <div style="display:inline-block">
                        <input type="text" name="telefono" class="telefono">
                        <input type="text" name="telefonoAdi" class="telefonoAdi">
                    </div>
                    
                </div>
                <div>
                    <label for="marketing">¿Cómo nos conoció?</label>
                    <select name="marketing" id="marketing">
                        <?php
                            rellenar_select("mkt","una opción");
                        ?>
                    </select>
                </div>
            </div>
        
            <div class="datos-especificos">
                <div>
                    <img src="img/macho.png" alt="macho" class="icono">
                    <img src="img/hembra.png" alt="hembra" class="icono">
                </div>
                <div>
                    <label for="edad">Edad:</label>
                    <input type="text" name="edad" class="edad input-width-compartido">
                </div>
                <div>
                    <label for="esterilizado">Esterilizado</label>
                    <select name="esterilizado" id="esterilizado" class="input-width-compartido">
                        <option value="No Selected">Selecciona una opción</option>
                    </select>
                </div>
                <div>
                    <label for="numRegistro">Número de registro</label>
                    <input type="text" name="numRegistro" id="numRegistro" class="input-width-compartido">
                </div>
            </div>
        
            <div class="motivo">
                <div>
                    <div style="background-color: rgb(250, 128, 149);">
                        <label for="motivoConsul">Motivo de Consulta</label>
                    </div>
                    <textarea name="motivoConsul" id="motivoConsul" cols="150" style="max-width: 100%; display: block;" rows="2"></textarea>
                </div>
            </div>
        
            <div class="medPrev">
                <select id="vacunas">
                    <?php
                        rellenar_select("tipos", "una vacuna");
                    ?>
                </select>
                <select id="labs">
                    <?php
                        rellenar_select("laboratorios","un laboratorio");
                    ?>
                </select>
                <input id="fecha" type="date">
                <button id="agr">Agregar</button>
                <table id="tabla">
                    
                    <tr id="titulos">
                        <th colspan="2">Ultimas vacunas aplicadas</th>
                        <th>Laboratorio</th>
                        <th>Fecha</th>
                    </tr>
                    <tr>
                        <th class="subDato">Desp. Int</th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="subDato">Desp. Ext</th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <div class="tituloEnfer">
                    <div style="background-color: pink;">
                        <label for="enferPrev">Enfermedades Previas:</label>
                    </div>
                    <textarea name="enferPrev" id="enferPrev" cols="100" rows="3" style="max-width: 100%;"></textarea>
                </div>
            </div>
         
            <div class="datosPrev">
                <div class="espacioForm">
                    <label for="origen">¿Origen?</label><br>
                    <select name="origen" id="origen" class="div-width-compartido">
                    <?php
                        rellenar_select("origen_masc", "un origen");
                    ?>
                    </select>
                </div>

                <div class="espacioForm">
                    <label for="tratPrev">¿Tratamientos Previos?</label>
                    <input type="text" name="tratPrev" id="tratPrev" class="input-width-compartido">
                </div>
        
                <div class="espacioForm">
                    <div class="tiempoMasc">
                        <div class="div-width-compartido">
                            <label for="tiempMasc">¿Tiempo con su mascota?</label>
                            <input type="text" name="tiempMasc" id="tiempMasc" class="input-width-compartido">
                        </div>
                        <div class="div-width-compartido">
                            <label for="saleCalle">¿Sale a la calle?</label>
                            <input type="text" name="saleCalle" id="saleCalle" class="input-width-compartido">
                        </div>
                    </div>
                </div>
                
                
                <div class="espacioForm">
                    
                    <div>
                        <label for="masMasc">¿Más mascotas en casa?</label>
                        <input type="radio" name="mas" id="si"><label for="si">Sí</label>
                        <input type="radio" name="mas" id="no"><label for="no">No</label>
                        <input type="text" name="masMasc" id="masMasc">
                    </div>
                </div>
        
                <div class="espacioForm">
                    <label for="dndDuerme">¿Dónde duerme?</label>
                    <select name="dndDuerme" id="dndDuerme">
                        <?php
                            rellenar_select("lugar_duerme", "un lugar");
                        ?>
                    </select>
                </div>
        
                <div class="espacioForm">
                    <div>
                        <label for="viajRec">¿Viajes Recientes?</label>
                        <input type="radio" name="viajes"><label for="si">Sí</label>
                        <input type="radio" name="viajes"><label for="no">No</label>
                        <input type="text" name="viajRec" id="viajRec">
                        
                    </div>
                </div>
                <div class="espacioForm">
                    <div>
                        <label for="fumanCasa">¿Fuman en casa?</label>
                        <input type="text" id="fumanCasa" name="fumanCasa">
                    </div>
                </div>
                <div class="espacioForm">
                    <div class="plantas">
                        <div class="div-width-compartido plantasCambios">
                            <label for="plntCambios">¿Plantas y/o cambios recientes?</label>
                            <input type="text" name="plntCambios" id="plntCambios" class="input-width-compartido">
                        </div>
                        <div class="div-width-compartido plantasDatos">
                            <div>
                                <label for="numeroPlatos">Numero de platos</label><br>
                                <input type="number" name="numeroPlatos" id="numeroPlatos">
                            </div>
                            <div>
                                <label for="numAreneros">Numero de Areneros</label><br>
                                <input type="number" name="numAreneros" id="numAreneros">
                            </div>
                            <div>
                                <label for="numMaterial">Numero de material</label><br>
                                <input type="text" name="numMaterial" id="numMaterial">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="datos-dieta">
                <div class="tituloDiet">
                    <h4>Dieta</h4>
                </div>
                <div class="dietaOpcion">
                    <div>
                        <label for="croqueta">Croqueta</label>
                        <input type="radio" name="croqueta" style="margin-left: 10px;"><label for="si">Sí</label>
                        <input type="radio" name="croqueta" style="margin-left: 5px;"><label for="no">No</label>
                    </div>
                    <div style="margin-left: 10px; width: 50%;">
                        <input type="text" placeholder="Marca/Tipo" id="marcacroqueta" name="marcaCroqueta" style="width: 100%;" >
                    </div>
                </div>
                <div>
                    <h5>Cantidad</h5>
                    <div class="cantidades">
                        <div class="div-width-compartido-tres">
                            <label for="suelta">Suelta</label>
                            <input type="text" name="suelta" id="suelta" class="input-width-compartido">
                        </div>
                        <div class="div-width-compartido-tres">
                            <label for="bulto">Bulto</label>
                            <input type="text" name="bulto" id="bulto" class="input-width-compartido">
                        </div>
                        <div class="div-width-compartido-tres">
                            <label for="">No se que son estos:</label>
                            <select name="" id="" class="input-width-compartido">
                                <option value="SID">SID</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="dietaOpcion">
                    <label for="descripCasera">Dieta Casera/Humeda</label>
                    <input type="radio" name="caseraHum" id="si" style="margin-left: 10px;"><label for="si">Sí</label>
                    <input type="radio" name="caseraHum" id="no" style="margin-left: 5px;"><label for="no">No</label>
                    <div style="margin-left: 10px; width: 50%;">
                        <input type="text" placeholder="Describa porfavor" id="descripCasera" name="descripCasera" style="width: 100%;">
                    </div>
                </div>
                <div class="cantidades">
                    <div class="div-width-compartido">
                        <label for="cant">Cantidad</label>
                        <input type="text" name="cuanto" id="cuanto" class="input-width-compartido">
                    </div>
                    <div class="div-width-compartido">
                        <label for="">No se que son estos:</label>
                        <select name="" id="" class="input-width-compartido">
                            <option value="SID">SID</option>
                        </select>
                    </div>
                    
                </div>
                
            </div>
        
            <div class="datos-sistema">
                <div class="tituloSistema">
                    <h4>Sistema</h4>
                </div>
        
                <div class="contentSist">
                    <table style="width:fit-content;">
                        <tr>
                            <td><p>Lesiones en Piel</p></td>
                            <td><div>
                                <input type="radio" name="lesiones" id="lesiones"><label for="lesiones" style="margin-right: 10px;">No</label>
                                <input type="radio" name="lesiones" id="lesiones"><label for="lesiones" style="margin-right: 10px;">N/S</label>
                                <input type="radio" name="lesiones" id="lesiones"><label for="lesiones" style="margin-right: 10px;">Sí</label>
                            </div></td>
                        </tr>
                        <tr>
                            <td><p>Comezón/Lamio</p></td>
                            <td><div>
                                <input type="radio" name="comezonLam" id="comezonLam"><label for="comezonLam" style="margin-right: 10px;">No</label>
                                <input type="radio" name="comezonLam" id="comezonLam"><label for="comezonLam" style="margin-right: 10px;">N/S</label>
                                <input type="radio" name="comezonLam" id="comezonLam"><label for="comezonLam" style="margin-right: 10px;">Sí</label>
                            </div></td>
                        </tr>
                        <tr>
                            <td><p>Olor en piel</p></td>
                            <td ><div>
                                <input type="radio" name="olorPiel" id="olorPiel"><label for="olorPiel" style="margin-right: 10px;">No</label>
                                <input type="radio" name="olorPiel" id="olorPiel"><label for="olorPiel" style="margin-right: 10px;">N/S</label>
                                <input type="radio" name="olorPiel" id="olorPiel"><label for="olorPiel" style="margin-right: 10px;">Sí</label>
                            </div></td>
                        </tr>
                    </table>
        
                    <div class="continuaSistema div-width-compartido">
                        <div>
                            <label for="descripRegion">Descripción / Región Anatomica:</label>
                            <textarea name="descripRegion" id="descripRegion" cols="100" rows="2" style="max-width: 100%;"></textarea>
                        </div>
                        <div>
                            <label for="duracion">Duracion:</label>
                            <input type="text" name="duracion" id="duracion" class="input-width-completo">
                        </div>
                    </div>
                    
                </div>           
        
            </div>
        
            <div class="datos-musculoEsque">
                <div class="tituloMusculoEsque">
                    <h4>Musculoesqueletico</h4>
                </div>
                <div class="infoMusculoEsque">
                    <table style="width:fit-content;">
                        <tbody>
                            <tr>
                                <td><p>Anormalidad al Caminar</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="anormCaminar" id="anormCaminar"><label for="anormCaminar" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="anormCaminar" id="anormCaminar"><label for="anormCaminar" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="anormCaminar" id="anormCaminar"><label for="anormCaminar" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Aumenta con el ejercicio</p></td>
                                <td><div>
                                    <input type="radio" name="aumentaEjer" id="aumentaEjer"><label for="aumentaEjer" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="aumentaEjer" id="aumentaEjer"><label for="aumentaEjer" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="aumentaEjer" id="aumentaEjer"><label for="aumentaEjer" style="margin-right: 10px;">Sí</label>
                                </div></td>
                            </tr>
                            <tr>
                                <td><p>Mejora con Tratamiento</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="mejoraTrata" id="mejoraTrata"><label for="mejoraTrata" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="mejoraTrata" id="mejoraTrata"><label for="mejoraTrata" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="mejoraTrata" id="mejoraTrata"><label for="mejoraTrata" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
        
                    <div id="txtarea-MuscEsque">
                        <div>
                            <p>Miembro Afectado:</p>
                            <textarea name="miemAfec" id="miemAfec" cols="100" rows="1" style="max-width: 100%;"></textarea>
                        </div>
                        <div >
                            <p>¿Cual?</p>
                            <textarea name="cual" id="cual" cols="100" rows="1" style="max-width: 100%;"></textarea>
                        </div>
                    </div>
        
                    <table style="width:fit-content;">
                        <tbody>
                            <tr>
                                <td><p>Intermitente</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="intermitente" id="intermitente"><label for="intermitente" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="intermitente" id="intermitente"><label for="intermitente" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="intermitente" id="intermitente"><label for="intermitente" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Constante</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="constante" id="constante"><label for="constante" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="constante" id="constante"><label for="constante" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="constante" id="constante"><label for="constante" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Empeora</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="empeora" id="empeora"><label for="empeora" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="empeora" id="empeora"><label for="empeora" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="empeora" id="empeora"><label for="empeora" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    
                </div>            
        
            </div>
        
            <div class="datos-sistRespi">
                <div class="tituloSistRespi">
                    <h4>Sistema Respiratorio</h4>
                </div>
                <div class="contentSistRespi">
                    <table style="width:fit-content;">
                        <tbody>
                            <tr>
                                <td><p>Tos</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="tos" id="tos"><label for="tos" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="tos" id="tos"><label for="tos" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="tos" id="tos"><label for="tos" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Estornudo</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="estornudo" id="estornudo"><label for="estornudo" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="estornudo" id="estornudo"><label for="estornudo" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="estornudo" id="estornudo"><label for="estornudo" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Dificultad Respiratoria</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="difRespi" id="difRespi"><label for="difRespi" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="difRespi" id="difRespi"><label for="difRespi" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="difRespi" id="difRespi"><label for="difRespi" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
        
                    <table style="width:fit-content;">
                        <tbody>
                            <tr>
                                <td><p>Frecuente</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="frec" id="frec"><label for="frec" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="frec" id="frec"><label for="frec" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="frec" id="frec"><label for="frec" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Productiva</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="produc" id="produc"><label for="produc" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="produc" id="produc"><label for="produc" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="produc" id="produc"><label for="produc" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Descarga</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="descar" id="descar"><label for="descar" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="descar" id="descar"><label for="descar" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="descar" id="descar"><label for="descar" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
        
                    <div class="div-width-compartido-tres txtDuracTip">
                        <label for="">Duración/Tipo</label>
                        <textarea name="duraTipo" id="duraTipo" cols="100" rows="3" style="max-width: 100%;"></textarea>
                    </div>
                </div>
        
            </div>
        
            <div class="datos-cardVasc">
                <div class="tituloCardVasc">
                    <h4>Cardiovascular</h4>
                </div>
        
                <div class="contentCardVasc">
                    <table style="width:fit-content;">
                        <tbody>
                            <tr>
                                <td><p>Fatiga</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="fatiga" id="fatiga"><label for="fatiga" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="fatiga" id="fatiga"><label for="fatiga" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="fatiga" id="fatiga"><label for="fatiga" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Debilidad</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="dbilidad" id="dbilidad"><label for="dbilidad" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="dbilidad" id="dbilidad"><label for="dbilidad" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="dbilidad" id="dbilidad"><label for="dbilidad" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
        
                    <table style="width:fit-content;">
                        <tbody>
                            <tr>
                                <td><p>Intolerancia al ejercicio</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="intEjer" id="intEjer"><label for="intEjer" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="intEjer" id="intEjer"><label for="intEjer" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="intEjer" id="intEjer"><label for="intEjer" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Palidez</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="palidez" id="palidez"><label for="palidez" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="palidez" id="palidez"><label for="palidez" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="palidez" id="palidez"><label for="palidez" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
        
                    <table style="width:fit-content;">
                        <tbody>
                            <tr>
                                <td><p>Cianosis</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="cianosis" id="cianosis"><label for="cianosis" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="cianosis" id="cianosis"><label for="cianosis" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="cianosis" id="cianosis"><label for="cianosis" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Desmayo</p></td>
                                <td>
                                    <div>
                                        <input type="radio" name="desmayo" id="desmayo"><label for="desmayo" style="margin-right: 10px;">No</label>
                                        <input type="radio" name="desmayo" id="desmayo"><label for="desmayo" style="margin-right: 10px;">N/S</label>
                                        <input type="radio" name="desmayo" id="desmayo"><label for="desmayo" style="margin-right: 10px;">Sí</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        
            <div class="datos-GastrEnterico">
                <div class="tituloGastrEnterico">
                    <h4>Gastroenterico</h4>
                </div>
                <div class="contentGastrEnterico">
                    <div class="div-width-compartido divisionGastr">
                        <table>
                            <tbody>
                                <tr>
                                    <td><p>Apetito</p></td>
                                    <td>
                                        <div>
                                            <input type="radio" name="apetito" id="apetito"><label for="apetito" style="margin-right: 10px;">Normal</label>
                                            <input type="radio" name="apetito" id="apetito"><label for="apetito" style="margin-right: 10px;">Aumentada</label>
                                            <input type="radio" name="apetito" id="apetito"><label for="apetito" style="margin-right: 10px;">Disminuida</label>
                                            <input type="radio" name="apetito" id="apetito"><label for="apetito" style="margin-right: 10px;">No</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Ingesta de Agua</p></td>
                                    <td>
                                        <div>
                                            <input type="radio" name="ingstAgua" id="ingstAgua"><label for="ingstAgua" style="margin-right: 10px;">Normal</label>
                                            <input type="radio" name="ingstAgua" id="ingstAgua"><label for="ingstAgua" style="margin-right: 10px;">Aumentada</label>
                                            <input type="radio" name="ingstAgua" id="ingstAgua"><label for="ingstAgua" style="margin-right: 10px;">Disminuida</label>
                                            <input type="radio" name="ingstAgua" id="ingstAgua"><label for="ingstAgua" style="margin-right: 10px;">No</label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="sintomsGastro">
                            <table class="div-width-compartido">
                                <tbody>
                                    <tr>
                                        <td><p>Dolor al comer</p></td>
                                        <td>
                                            <input type="radio" name="dlrComer" id="dlrComer"><label for="dlrComer" style="margin-right: 10px;">No</label>
                                            <input type="radio" name="dlrComer" id="dlrComer"><label for="dlrComer" style="margin-right: 10px;">N/S</label>
                                            <input type="radio" name="dlrComer" id="dlrComer"><label for="dlrComer" style="margin-right: 10px;">Sí</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p>Vomito</p></td>
                                        <td>
                                            <input type="radio" name="vomito" id="vomito"><label for="vomito" style="margin-right: 10px;">No</label>
                                            <input type="radio" name="vomito" id="vomito"><label for="vomito" style="margin-right: 10px;">N/S</label>
                                            <input type="radio" name="vomito" id="vomito"><label for="vomito" style="margin-right: 10px;">Sí</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p>Reflujo</p></td>
                                        <td>
                                            <input type="radio" name="reflujo" id="reflujo"><label for="reflujo" style="margin-right: 10px;">No</label>
                                            <input type="radio" name="reflujo" id="reflujo"><label for="reflujo" style="margin-right: 10px;">N/S</label>
                                            <input type="radio" name="reflujo" id="reflujo"><label for="reflujo" style="margin-right: 10px;">Sí</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="div-width-compartido">
                                <label for="tipFrec">Tipo/Frecuencia</label>
                                <textarea name="tipFrec" id="tipFrec" cols="100" rows="3" style="max-width: 100%;"></textarea>
                            </div>
                        </div>
                    </div>
        
                    <div class="div-width-compartido divisionGastr">
                        <div class="gastroSeg">
                            <table style="width: 80%;">
                                <tbody>
                                    <tr>
                                        <td><p>Evacuación</p></td>
                                        <td>
                                            <input type="radio" name="evac" id="evac"><label for="evac" style="margin-right: 10px;">No</label>
                                            <input type="radio" name="evac" id="evac"><label for="evac" style="margin-right: 10px;">N/S</label>
                                            <input type="radio" name="evac" id="evac"><label for="evac" style="margin-right: 10px;">Sí</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p>Cantidad</p></td>
                                        <td>
                                            <input type="radio" name="cantEvac" id="cantEvac"><label for="cantEvac" style="margin-right: 10px;">Normal</label>
                                            <input type="radio" name="cantEvac" id="cantEvac"><label for="cantEvac" style="margin-right: 10px;">Aumentada</label>
                                            <input type="radio" name="cantEvac" id="cantEvac"><label for="cantEvac" style="margin-right: 10px;">Disminuida</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <p>Consistencia</p>
                                <label for="epf">EPF</label><br>
                                <input type="checkbox" name="moco" id="moco"><label for="moco">Moco</label>
                                <div style="display:inline-block;">
                                    <input type="checkbox" name="sangre" id="sangre"><label for="sangre">Sangre</label>
                                </div>
                            </div>
                        </div>
                        <div class="gastroSeg">
                            <div class="div-width-compartido">
                                <label for="color">Color</label>
                                <textarea name="color" id="color" cols="200" rows="3" style="max-width: 90%;"></textarea>
                            </div>
                            <div class="div-width-compartido">
                                <label for="olor">Olor</label>
                                <textarea name="olor" id="olor" cols="200" rows="3" style="max-width: 95%;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="tituloGenUrin">
                <h4>Genitourinario</h4>
            </div>
            <div class="datos-genUrin-uno">
                <div class="elementoInterno">
                    <div>
                        <p>Orina</p>
                        <div>
                            <div style="display:inline-block ;">
                                <input type="radio" name="orina" id="si"><label for="si">Si</label>
                            </div>
                            <div style="display:inline-block ;">
                                <input type="radio" name="orina" id="ns"><label for="ns">N/S</label>
                            </div>
                            <div style="display:inline-block ;">
                                <input type="radio" name="orina" id="no"><label for="no">No</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>Cantidad</p>
                        <div>
                            <div style="display:inline-block ;">
                                <input type="radio" name="cantOrina" id="normOrina"><label for="normOrina">Normal</label>
                            </div>
                            <div style="display:inline-block ;">
                                <input type="radio" name="cantOrina" id="dismiOrina"><label for="dismiOrina">Disminuida</label>
                            </div>
                            <div style="display:inline-block ;">
                                <input type="radio" name="cantOrina" id="aumentOrina"><label for="aumentOrina">Aumentada</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>Presenta</p>
                        <div>
                            <div style="display:inline-block ;">
                                <input type="checkbox" name="dolOrina" id="dolOrina"><label for="dolOrina">Dolor</label>
                            </div>
                            <div style="display:inline-block ;">
                                <input type="checkbox" name="gotOrina" id="gotOrina"><label for="gotOrina">Goteo</label>
                            </div>
                            <div style="display:inline-block ;">
                                <input type="checkbox" name="mocOrina" id="mocOrina"><label for="mocOrina">Moco</label>
                            </div>
                            <div style="display:inline-block ;">
                                <input type="checkbox" name="sanOrina" id="sanOrina"><label for="sanOrina">Sangre</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="elementoInterno">
                    <div class="div-width-compartido">
                        <label for="colOrina">Color</label>
                        <textarea name="colOrina" id="colOrina" cols="100" rows="2" style="max-width: 95%;"></textarea>
                    </div>
                    <div class="div-width-compartido">
                        <label for="olorOrina">Olor</label>
                        <textarea name="olorOrina" id="olorOrina" cols="100" rows="2" style="max-width: 95%;"></textarea>
                    </div>
                    
                </div>
            </div>
        
            <div class="datos-genUrin-dos">
                <table style="width:fit-content;">
                    <tbody>
                        <tr>
                            <td><p>Secreción Vulva</p></td>
                            <td>
                                <input type="radio" name="secVulv" id="secVulv"><label for="secVulv" style="margin-right: 10px;">No</label>
                                <input type="radio" name="secVulv" id="secVulv"><label for="secVulv" style="margin-right: 10px;">N/S</label>
                                <input type="radio" name="secVulv" id="secVulv"><label for="secVulv" style="margin-right: 10px;">Sí</label>
                            </td>
                            <td><p>Monta</p></td>
                            <td>
                                <input type="radio" name="monta" id="monta"><label for="monta" style="margin-right: 10px;">No</label>
                                <input type="radio" name="monta" id="monta"><label for="monta" style="margin-right: 10px;">N/S</label>
                                <input type="radio" name="monta" id="monta"><label for="monta" style="margin-right: 10px;">Sí</label>
                            </td>
                        </tr>
                        <tr>
                            <td><p>Gestación</p></td>
                            <td>
                                <input type="radio" name="gest" id="gest"><label for="gest" style="margin-right: 10px;">No</label>
                                <input type="radio" name="gest" id="gest"><label for="gest" style="margin-right: 10px;">N/S</label>
                                <input type="radio" name="gest" id="gest"><label for="gest" style="margin-right: 10px;">Sí</label>
                            </td>
                            <td><p>Tiene ambos testiculos</p></td>
                            <td>
                                <input type="radio" name="dosTest" id="dosTest"><label for="dosTest" style="margin-right: 10px;">No</label>
                                <input type="radio" name="dosTest" id="dosTest"><label for="dosTest" style="margin-right: 10px;">N/S</label>
                                <input type="radio" name="dosTest" id="dosTest"><label for="dosTest" style="margin-right: 10px;">Sí</label>
                            </td>
                        </tr>
        
                    </tbody>
                </table>
                <div class="elementoInterno">
                    <div class="div-width-compartido">
                        <div>
                            <p>Ultimo Celo</p>
                            <textarea name="lastCel" id="lastCel" cols="100" rows="1" style="max-width: 90%;"></textarea>
                        </div>
                        <div>
                            <p>Es Regular</p>
                            <div>
                                <input type="radio" name="esReg" id="esReg"><label for="esReg" style="margin-right: 10px;">No</label>
                                <input type="radio" name="esReg" id="esReg"><label for="esReg" style="margin-right: 10px;">N/S</label>
                                <input type="radio" name="esReg" id="esReg"><label for="esReg" style="margin-right: 10px;">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="div-width-compartido">
                        <div>
                            <p>Frecuencia</p>
                            <textarea name="frecuCelo" id="frecuCelo" cols="100" rows="1" style="max-width: 90%;"></textarea>
                        </div>
                        <div>
                            <p>Fecha OSH/ORQ</p>
                            <textarea name="fechaEster" id="fechaEster" cols="100" rows="1" style="max-width: 90%;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="datos-sistNerv">
                <div class="tituloSistNerv">
                    <h4>Sistema Nervioso</h4>
                </div>
        
                 <div class="divSistNerv"><!--display:flex COMENTAR-->
                    <div class="primeroSistNerv">
                        <table>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td class="tdAlignment">
                                        <p>No</p>
                                    </td>
                                    <td class="tdAlignment">
                                        <p>N/S</p>
                                    </td>
                                    <td class="tdAlignment">
                                        <p>Sí</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Convulsión</p></td>
                                    <td class="tdAlignment">
                                        <input type="radio" name="convul" id="noConv">
                                    </td>
                                    <td class="tdAlignment"><input type="radio" name="convul" id="nsConv">
                                    </td>
                                    <td class="tdAlignment"><input type="radio" name="convul" id="siConv"></td>
                                </tr>
                                <tr>
                                    <td><p>Incordinación</p></td>
                                    <td class="tdAlignment"><input type="radio" name="inCord" id="noInCon"></td>
                                    <td class="tdAlignment"><input type="radio" name="inCord" id="nsInCon"></td>
                                    <td class="tdAlignment"> <input type="radio" name="inCord" id="siInCon"></td>
                                </tr>
                                <tr>
                                    <td><p>Camina de lado</p></td>
                                    <td class="tdAlignment"><input type="radio" name="camLado" id="noCamLado"></td>
                                    <td class="tdAlignment"><input type="radio" name="camLado" id="nsCamLado"></td>
                                    <td class="tdAlignment"><input type="radio" name="camLado" id="siCamLado"></td>
                                </tr>
                                <tr>
                                    <td><p>Camina Ladeado</p></td>
                                    <td class="tdAlignment"><input type="radio" name="camLade" id="noCamLade"></td>
                                    <td class="tdAlignment"><input type="radio" name="camLade" id="nsCamLade"></td>
                                    <td class="tdAlignment"><input type="radio" name="camLade" id="siCamLade"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
        
                    <div class="segundoSistNerv">
                        <div>
                            <label for="descripSistnerv">Describa</label><br>
                            <textarea name="descripSistnerv" id="descripSistnerv" cols="200" rows="7" style="max-width: 90%;"></textarea>
                        </div>
                    </div>
                </div>
        
            </div>
        
            <div class="datos-ojo">
                <div class="tituloOjo">
                    <h4>Ojo</h4>
                </div>
        
                <div>
                    <table>
                        <tbody>
                            <tr>
                                <td><p>Lagrimeo</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="lagrimeo" id="lagrimeo"><label for="lagrimeo" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="lagrimeo" id="lagrimeo"><label for="lagrimeo" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="lagrimeo" id="lagrimeo"><label for="lagrimeo" style="margin-right: 10px;">Sí</label>
                                </td>
                                <td><p>Secreción</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="secre" id="secre"><label for="secre" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="secre" id="secre"><label for="secre" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="secre" id="secre"><label for="secre" style="margin-right: 10px;">Sí</label>
                                </td>
                               
                            </tr>
                            <tr>
                                <td><p>Ceguera</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="cegue" id="cegue"><label for="cegue" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="cegue" id="cegue"><label for="cegue" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="cegue" id="cegue"><label for="cegue" style="margin-right: 10px;">Sí</label>
                                </td>
                                <td><p>Ojos Saltantes</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="ojoSal" id="ojoSal"><label for="ojoSal" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="ojoSal" id="ojoSal"><label for="ojoSal" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="ojoSal" id="ojoSal"><label for="ojoSal" style="margin-right: 10px;">Sí</label>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Irritación</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="irrit" id="irrit"><label for="irrit" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="irrit" id="irrit"><label for="irrit" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="irrit" id="irrit"><label for="irrit" style="margin-right: 10px;">Sí</label>
                                </td>
                                <td><p>Opacidad</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="opaci" id="opaci"><label for="opaci" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="opaci" id="opaci"><label for="opaci" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="opaci" id="opaci"><label for="opaci" style="margin-right: 10px;">Sí</label>
                                </td>
                                
                            </tr>
                            <tr>
                                <td><p>Dolor</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="dolOjo" id="dolOjo"><label for="dolOjo" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="dolOjo" id="dolOjo"><label for="dolOjo" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="dolOjo" id="dolOjo"><label for="dolOjo" style="margin-right: 10px;">Sí</label>
                                </td>
                                <td colspan="2">
                                    <p>Otro</p>
                                    <textarea name="otroOjo" id="otroOjo" cols="50" rows="2" style="width: 100%;"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        
            <div class="datos-oido">
                <div class="tituloOido">
                    <h4>Oido</h4>
                </div>
        
                <div>
                    <table>
                        <tbody>
                            <tr>
                                <td><p>Secreción</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="secreOido" id="secreOido"><label for="secreOido" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="secreOido" id="secreOido"><label for="secreOido" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="secreOido" id="secreOido"><label for="secreOido" style="margin-right: 10px;">Sí</label>
                                </td>
                                <td><p>Irritación</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="irritOido" id="irritOido"><label for="irritOido" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="irritOido" id="irritOido"><label for="irritOido" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="irritOido" id="irritOido"><label for="irritOido" style="margin-right: 10px;">Sí</label>
                                </td>
                               
                            </tr>
                            <tr>
                                <td><p>Cambio de color</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="cambColor" id="cambColor"><label for="cambColor" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="cambColor" id="cambColor"><label for="cambColor" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="cambColor" id="cambColor"><label for="cambColor" style="margin-right: 10px;">Sí</label>
                                </td>
                                <td><p>Olor</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="olorOido" id="olorOido"><label for="olorOido" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="olorOido" id="olorOido"><label for="olorOido" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="olorOido" id="olorOido"><label for="olorOido" style="margin-right: 10px;">Sí</label>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Comezón</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="comez" id="comez"><label for="comez" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="comez" id="comez"><label for="comez" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="comez" id="comez"><label for="comez" style="margin-right: 10px;">Sí</label>
                                </td>
                                <td><p>Sordera</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="sord" id="sord"><label for="sord" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="sord" id="sord"><label for="sord" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="sord" id="sord"><label for="sord" style="margin-right: 10px;">Sí</label>
                                </td>
                                
                            </tr>
                            <tr>
                                <td><p>Sacude las Orejas</p></td>
                                <td class="tdAlignment">
                                    <input type="radio" name="sacOrej" id="sacOrej"><label for="sacOrej" style="margin-right: 10px;">No</label>
                                    <input type="radio" name="sacOrej" id="sacOrej"><label for="sacOrej" style="margin-right: 10px;">N/S</label>
                                    <input type="radio" name="sacOrej" id="sacOrej"><label for="sacOrej" style="margin-right: 10px;">Sí</label>
                                </td>
                                <td colspan="2">
                                    <p>Otro</p>
                                    <textarea name="otroOido" id="otroOido" cols="50" rows="2" style="width: 100%;"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="datos-otro">
                <div class="tituloOtro">
                    <h4>Otro</h4>
                </div>
        
                <div>
                    <textarea name="otroDato" id="otroDato" cols="100" rows="6" style="width: 95%; margin: 5px auto; display: block;"></textarea>
                </div>
            </div>
            
        </div>

        <div class="cuerpoExpediente expediente-hoja-2 ocultarHoja">
            <div class="datos-examFisi">
                <div class="tituloExamFisi">
                    <h4>Examen Fisico General</h4>
                </div>
            
                <div class="tablasExamFisi">
                    <div class="div-width-compartido">
                        <table style="max-width:100%; width: fit-content;">
                            <tbody>
                                <tr>
                                    <td><p>EM</p></td>
                                    <td><input type="text" class="input-width-compartido"></td>
                                    <td><p>MCra</p></td>
                                    <td><input type="text" class="input-width-compartido"></td>
                                    <td><p>TRC</p></td>
                                    <td><input type="text" class="input-width-compartido"></td>
                                    <td><p>%H</p></td>
                                    <td><input type="text" class="input-width-compartido"></td>
                                    <td><p>LØ</p></td>
                                    <td><input type="text" class="input-width-compartido"></td>
                                </tr>
                                <tr>
                                    <td><p>Tipo</p></td>
                                    <td><input type="text" class="input-width-compartido"></td>
                                    <td><p>FC</p></td>
                                    <td><input type="text" class="input-width-compartido"></td>
                                    <td><p>Pulso</p></td>
                                    <td><input type="text" class="input-width-compartido"></td>
                                    <td><p>MCau</p></td>
                                    <td><input type="text" class="input-width-compartido"></td>
                                    <td><p>PY</p></td>
                                    <td><input type="text" class="input-width-compartido"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="div-width-compartido">
                        <table style="max-width:100%;">
                            <tbody>
                                <tr>
                                    <td><p>PP</p></td>
                                    <td><input type="text" class="inputWidth"></td>
                                    <td><p>RD</p></td>
                                    <td><input type="text" class="inputWidth"></td>
                                    <td><p>RT</p></td>
                                    <td><input type="text" class="inputWidth"></td>
                                    <td><p>CP</p></td>
                                    <td><input type="text" class="inputWidth"></td>
                                    <td><p>FR</p></td>
                                    <td><input type="text" class="inputWidth"></td>
                                </tr>
                                <tr>
                                    <td><p>PA</p></td>
                                    <td><input type="text" class="inputWidth"></td>
                                    <td><p>CC</p></td>
                                    <td><input type="text" class="inputWidth"></td>
                                    <td><p>KG</p></td>
                                    <td><input type="text" class="inputWidth"></td>
                                    <td><p>T°C</p></td>
                                    <td><input type="text" class="inputWidth"></td>
                                    <td><p>Talla</p></td>
                                    <td><input type="text" class="inputWidth"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <p>Observaciones</p>
                    <textarea name="obserExamFisi" id="obserExamFisi" cols="100" rows="10" style="width: 100%;"></textarea>
                </div>
                <div>
                    <label for="presion">Presion Arterial</label>
                    <input type="text" name="presion" id="presion">
                </div>
            </div>
            
            <div class="datos-factPred">
                <div class="tituloFactPred">
                    <h4>Factores Predisponentes</h4>
                </div>
                <div class="partesFactPred">
                    <div class="primeroFactPred">
                        <table id="tablaProblemas">
                            <tbody>
                                <tr>
                                    <th>Lista de Problemas</th>
                                </tr>
                            </tbody>
                        </table>
                        <button id="agrProblema" class="btnAgregar">+</button>
                    </div>
            
                    <div class="segFactPred">
                        <table id="tablaMaestra">
                            <tbody>
                                <tr>
                                    <th>Lista Maestra</th>
                                </tr>
                            </tbody>
                        </table>
                        <button id="agrMaestra" class="btnAgregar">+</button>
                    </div>
            
                    <div class="tercerFactPred">
                        <table>
                            <tbody>
                                <tr>
                                    <th colspan="2">DAMNITV</th>
                                    <th>N°</th>
                                    <th>Dx Presuntivo y diferenciales</th>
                                </tr>
                                <tr>
                                    <td rowspan="2">D</td>
                                    <td>Desarrollo</td>
                                    <td style="width: 15%;"><input type="text" name="nDesarr" id="nDesarr" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxDesarr" id="dxDesarr" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td>Degenerativo</td>
                                    <td style="width: 15%;"><input type="text" name="nDege" id="nDege" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxDege" id="dxDege" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">A</td>
                                    <td>Alergico</td>
                                    <td style="width: 15%;"><input type="text" name="nAler" id="nAler" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxAler" id="dxAler" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td>Autoinmune</td>
                                    <td style="width: 15%;"><input type="text" name="nAuto" id="nAuto" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxAuto" id="dxAuto" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">M</td>
                                    <td>Metabolico</td>
                                    <td style="width: 15%;"><input type="text" name="nMeta" id="nMeta" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxMeta" id="dxMeta" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td>Mecanico</td>
                                    <td style="width: 15%;"><input type="text" name="nMeca" id="nMeca" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxMeca" id="dxMeca" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td>Miscelaneo</td>
                                    <td style="width: 15%;"><input type="text" name="nMisc" id="nMisc" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxMisc" id="dxMisc" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">N</td>
                                    <td>Neoplastico</td>
                                    <td style="width: 15%;"><input type="text" name="nNeop" id="nNeop" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxNeop" id="dxNeop" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td>Nutricional</td>
                                    <td style="width: 15%;"><input type="text" name="nNutr" id="nNutr" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxNutr" id="dxNutr" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td rowspan="4">I</td>
                                    <td>Ideopatico</td>
                                    <td style="width: 15%;"><input type="text" name="nIdeo" id="nIdeo" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxIdeo" id="dxIdeo" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td>Inmunomed</td>
                                    <td style="width: 15%;"><input type="text" name="nInmu" id="nInmu" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxInmu" id="dxInmu" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td>Inflamatorio</td>
                                    <td style="width: 15%;"><input type="text" name="nInfla" id="nInfla" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxInfla" id="dxInfla" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td>Infeccioso</td>
                                    <td style="width: 15%;"><input type="text" name="nInfecc" id="nInfecc" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxInfecc" id="dxInfecc" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">T</td>
                                    <td>Traumatico</td>
                                    <td style="width: 15%;"><input type="text" name="nTrau" id="nTrau" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxTrau" id="dxTrau" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td>Toxico</td>
                                    <td style="width: 15%;"><input type="text" name="nToxi" id="nToxi" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxToxi" id="dxToxi" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td>V</td>
                                    <td>Vascular</td>
                                    <td style="width: 15%;"><input type="text" name="nVasc" id="nVasc" style="width: 100%;"></td>
                                    <td style="width: 50%;"><input type="text" name="dxVasc" id="dxVasc" style="width: 100%;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="cuartoFactPred">
                    <div class="signos">
                        <div><p>Signos Inespecificos (SI)</p></div>
                        <div><p>Signos Secundarios (SS)</p></div>
                        <div><P>Signos Caracteristicos (SC)</P></div>
                        <div><p>Signos Principales (SP)</p></div>
            
                    </div>
                    <div class="confirmaOri">
                        <div>
                            <input type="radio" name="confirma" id="confirma"><label for="confirma">Confirma (C)</label>
                        </div>
                        <div>
                            <input type="radio" name="orienta" id="orienta" style="margin-left: 10px;"><label for="orienta">Orienta (O)</label>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="datos-planDiag">
                <div class="tablPlanDiag">
                    <table id="tablaPlanDiag">
                        <tbody>
                            <tr class="tablaEncabezado">
                                <td>Plan Diagnostico</td>
                                <td>Copro</td>
                                <td>BH</td>
                                <td>QS</td>
                                <td>UA</td>
                                <td>P. Derma</td>
                                <td>Cito</td>
                                <td>HP</td>
                                <td>US</td>
                                <td>PM</td>
                            </tr>
                        </tbody>
                    </table>
                    <button id="agrPlanDiag" class="btnAgregar">+</button>
                </div>
                        
                
                <div class="tablaOtros">
                    <table id="tablaOtros">
                        <tbody>
                            <tr class="tablaEncabezado">
                                <td>Otro 1</td>
                                <td>Otro 2</td>
                                <td>Otro 3</td>
                            </tr>
                        </tbody>
                    </table>
                    <button id="agrOtro" class="btnAgregar">+</button>
                </div>
                
            </div>
            
            <div class="datos-planTera">
                <div class="tituloPlanTera">
                    <h4>Plan Terapeutico</h4>
                </div>
                <div>
                    <label for="costoPlanTera">Costo:</label>
                    <input type="text" name="costoPlanTera" id="costoPlanTera">
                </div><br>
                <textarea name="descriPlanTera" id="descriPlanTera" cols="300" rows="20" style="max-width: 90%; display: block; margin: 0 auto;"></textarea>
            </div>
            
            <div class="datos-proxCita">
                <div class="tituloProxCita">
                    <h4>Proxima Cita:</h4>
                </div>
                <div class="fechaProxCita">
                    <div>
                        <label for="fechaProxCita">Fecha:</label>
                        <input type="date" name="fechaProxCita" id="fechaProxCita">
                    </div>
                    <div>
                        <label for="horaProxCita">Hora:</label>
                        <input type="time" name="horaProxCita" id="horaProxCita">
                    </div>
                </div>
            </div>
        </div>

    </div>

    
    <script src="scripts/hojaClinica.js"></script>
</body>
</html>