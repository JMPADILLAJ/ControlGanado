<!DOCTYPE html>
<?php
require_once '../model/Bovino.php';
require_once '../model/Establo.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Lista de Bovinos</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="images/bovino.jpg" width="1150" height="200">
            <div class="row">
                <h3>Lista de Bovinos</h3>
            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
            </div>


            
            
            <br><br>
            <table data-toggle="table" data-pagination="true">
                <thead>
                    <tr>
                        <th>CODIGO BOVINO</th>
                         <th>CODIGO ESTABLO</th>
                          <th>CODIGO RAZA</th>
                        <th>NOMBRE</th>
                        <th>FECHA NAC</th>
                        <th>ADQUISICION</th>
                        <th>GENERO</th>
                        <th>BOVINO ACTIVO</th>
                        <th>COLOR</th>
                        <th>OPCIONES</th>
         
                    </tr>
                </thead>
                <tbody>
                     <?php
                    
                    if (isset($_SESSION['listaBovinos'])) {
                        $listado = unserialize($_SESSION['listaBovinos']);
                        foreach ($listado as $bovino) {
                            echo "<tr>";
                            echo "<td>" . $bovino->getCodigoBovino() . "</td>";
                            echo "<td>" . $bovino->getCodEstablo() . "</td>";
                            echo "<td>" . $bovino->getCodigoRaza() . "</td>";
                            echo "<td>" . $bovino->getNombreBovino() . "</td>";
                            echo "<td>" . $bovino->getFechaNacimiento() . "</td>";
                            echo "<td>" . $bovino->getTipoAdquisicion() . "</td>";
                            echo "<td>" . $bovino->getGenero() . "</td>";
                            echo "<td>" . $bovino->getBovinoActivo() . "</td>";
                            echo "<td>" . $bovino->getColorBovino() . "</td>";
                            echo "<td><a class='btn btn-default btn-xs' href='../controller/controller.php?opcion=editar_bovino&COD_BOVINO=" . $bovino->getCodigoBovino() . "'> Editar</a>&nbsp;"
                                    ."<a class='btn btn-default btn-xs' href='../controller/controller.php?opcion=eliminar_bovino&COD_BOVINO=" . $bovino->getCodigoBovino(). "'> Eliminar</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No se han cargado datos.";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
