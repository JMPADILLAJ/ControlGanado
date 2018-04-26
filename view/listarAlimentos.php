<!DOCTYPE html>
<?php
require_once '../model/Alimento.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de Alimentos</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="images/bann.jpg" width="1150" height="200">
            <div class="row">
                <h3>Lista de Alimentos</h3>
            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Volver al Inicio</a>
            </div>
         
            <br><br> 
            <table data-toggle="table" data-pagination="true">
                <thead>
                    <tr>
                        <th>COD_ALIMENTO</th>
                        <th>NOM_ALIMENTO</th>
                        <th>DESC_ALIMENTO</th>
<!--                        <th>CANT_ALIMENTO</th>-->
                        <th>PREC_X_U_MEDIDA</th>
                        <th>UNIDAD_MEDIDA</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                    //verificamos si existe en sesion el listado de clientes:
                    if (isset($_SESSION['listaAlimentos'])) {
                        $listado = unserialize($_SESSION['listaAlimentos']);
                        foreach ($listado as $alimento) {
                            echo "<tr>";
                            echo "<td>" . $alimento->getCodigoAlimento() . "</td>";
                            echo "<td>" . $alimento->getNombreAlimento() . "</td>";
                            echo "<td>" . $alimento->getDescripcionAlimento() . "</td>";
//                            echo "<td>" . $alimento->getCantidadAlimento() . "</td>";
                            echo "<td>" . $alimento->getPrecioUnidad() . "</td>";
                            echo "<td>" . $alimento->getUnidadMedida() . "</td>";
                            echo "<td><a class='btn btn-default btn-xs' href='../controller/controller.php?opcion=editar_alimento&COD_ALIMENTO=" . $alimento->getCodigoAlimento() . "'> Editar</a>&nbsp;"
                                    ."<a class='btn btn-default btn-xs' href='../controller/controller.php?opcion=eliminar_alimento&COD_ALIMENTO=" . $alimento->getCodigoAlimento(). "'> Eliminar</a></td>";
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
