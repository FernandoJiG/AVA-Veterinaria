<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/PropiHisto.css">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
        <title>Historial de propietario</title>
    </head>

    <body>
        <div class="contenedor">

            <div class="encabezado">
                <img src="img/home.svg" alt="Home Page" class="regresar" onclick="window.location='index.html';">
                <h2>Información de propietario</h2>
                <a href="index.html"><img class="logo" src="img/avaLogo.png" alt="Logo Veterinaria"></a>
            </div>
            <form action="" method="POST">
                <select name="Optbusca">
                    <option value="no">Selecciona como buscar</option>
                    <option value="id">ID de propietario</option>
                    <option value="telef">Telefono</option>
                </select>
                <input type="text" name="dato" placeholder="Ingresa datos">
                <button type="submit">Buscar</button>
            </form>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    include 'Obj/Conexion.php';
                    include 'Obj/BuscaHisto.php';
                    $busca = $_POST['Optbusca'];
                    $dato = $_POST['dato'];

                    if($busca == "no"){
                      echo "<p>¡Debes seleccionar una manera de busqueda!</p>";
                    }elseif($busca == "id"){
                        $sql = "select * from propietarios where idprop = $dato";
                        $result = mysqli_query($conex,$sql);
                        if($result->num_rows > 0){
                          $row = mysqli_fetch_array($result);
                          $idtel = $row['idtel'];
                          $telef = BuscaTel($idtel);
                          $idprop = $dato;
                        }else{
                          echo "<p>Usuario inexistente</p>";
                        }
                    }else{
                        $sql = "select * from telefonos where telefono = $dato";
                        $result = mysqli_query($conex,$sql);
                        if($result->num_rows > 0){
                          $row = mysqli_fetch_array($result);
                          $idtel = $row["idtel"];
                          $telef = $dato;

                          $sql = "select * from propietarios where idtel = $idtel";
                          $result = mysqli_query($conex,$sql);
                          $row = mysqli_fetch_array($result);
                          $idprop = $row["idprop"];
                        }else{
                          echo "<p>Telefono inexistente</p>";
                        }
                    }

                    if($busca != "no" && $result->num_rows > 0){
                      $iddire = $row['iddire'];
                      $dire = BuscaDire($iddire);

                      $ape = $row['apellidoPat'];

                      session_start();
                      $_SESSION['IDprop'] = $idprop;
                      $_SESSION['ApeMascota'] = $ape;

                      echo "<div class='propi'>";
                        //TABLA CON DATOS DEL PROPIETARIO
                      echo "<h4>Datos de cliente</h4>";
                      echo "<table>";
                      echo "<tr>";
                        echo "<td class='dat'>Nombre:</td>";
                        echo "<td>" .$row['nombre']. " " .$row['apellidoPat']. " " .$row['apellidoMat']. "</td>";
                      echo "</tr>";
                      echo "<tr>";
                        echo "<td class='dat'>Telefono:</td>";
                        echo "<td>" .$telef. "</td>" ;
                      echo "</tr>";
                      echo "<tr>";
                        echo "<td class='dat'>Email:</td>";
                        echo "<td>" .$row['mail']. "</td>";
                      echo "</tr>";
                      echo "<tr>";
                        echo "<td class='dat'>Dirección:</td>";
                        echo "<td>" .$dire. "</td>" ;
                      echo "</tr>";
                      echo "</table>";
                      echo "</div>";
                      
                      //TABLA CON LAS MASCOTAS
                      echo "<div class='mascotas'>";
                      $sql2 = "SELECT pacientes.idtipo, pacientes.idester, pacientes.nombre, pacientes.apellidop, pacientes.sexo, pacientes.raza, pacientes.edad, pacientes.color, tipos.tipo from pacientes INNER JOIN tipos on pacientes.idtipo = tipos.idtipo where idprop = $idprop";
                      $result2 = mysqli_query($conex,$sql2);
                      if($result2->num_rows > 0){
                          echo "<h4>Datos de las mascotas</h4>";
                          echo "<table>";
                          echo "<tr>";
                            echo "<th>ESPECIE</th>";
                            echo "<th>ESTERILIZADO</th>";
                            echo "<th>NOMBRE</th>";
                            echo "<th>SEXO</th>";
                            echo "<th>RAZA</th>";
                            echo "<th>EDAD</th>";
                            echo "<th>COLOR</th>";
                          echo "</tr>";
                          while($row2 = mysqli_fetch_array($result2)){
                              
                              echo "<tr>";
                                echo "<td>" .$row2['tipo']. "</td>";
                                
                                if($row2['idester'] == 3){
                                  echo "<td>No</td>";
                                }else{
                                  echo "<td>Si</td>";
                                }
                                echo "<td>" .$row2['nombre']. " " .$row2['apellidop']. "</td>";
                                echo "<td>" .$row2['sexo']. "</td>";
                                echo "<td>" .$row2['raza']. "</td>";
                                echo "<td>" .$row2['edad']. "</td>";
                                echo "<td>" .$row2['color']. "</td>"; 
                              echo "</tr>";
                          }
                          echo "</table>";
                      }else{
                        echo "<p>No cuenta con mascotas</p>";
                      }
                      echo "<form action='AddPatient.php'>
                              <button type='submit'>Agragar mascota</button>
                            </form>";
                      echo "</div>";
                      
                    }
                }
            ?>

        </div>

    </body>
</html>