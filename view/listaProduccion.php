<!DOCTYPE html>
<?php
require_once '../model/ProduccionCab.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Produccion - lista de registros</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="images/123.jpg">
            <div class="row">
                <h3>Lista de Registros</h3>
            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
            </div>

            <br>
            <table data-toggle="table" data-pagination="true">
                <thead>
                    <tr>
                        <th>CODIGO DE REGISTRO</th>
                        <th>FECHA</th>                      
                        <th>ESTADO</th>
                        <th>TOTAL LITROS</th>
                        <th>TOTAL INGRESOS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //verificamos si existe en sesion el listado de facturas:
                    if (isset($_SESSION['listaRegistros'])) {
                        $listado = unserialize($_SESSION['listaRegistros']);
                        foreach ($listado as $factura) {
                            echo "<tr>";
                            echo "<td>" . $factura->getCodigoRegistro() . "</td>";
                            echo "<td>" . $factura->getFecha() . "</td>";
                            echo "<td>" . $factura->getEstado() . "</td>";
                            echo "<td>" . $factura->getTotal() . "</td>";
                            echo "<td>" . $factura->getTotalIngresos() . "</td>";
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
