<!DOCTYPE html>
<?php
require_once '../model/FacturaCab.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registros - lista de registros</title>
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
                <h3>Lista de registros</h3>
            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
            </div>

            
            <br><table data-toggle="table" data-pagination="true">
                <thead>
                    <tr>
                        <th>ID REGISTRO</th>
                        <th>FECHA</th>
<!--                        //<th>CEDULA CLIENTE</th>-->
                        <th>ESTADO</th>
<!--                        <th>BASE IMPONIBLE</th>
                        <th>BASE NO IMPONIBLE</th>
                        <th>IVA</th>-->
                        <th>TOTAL $$</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //verificamos si existe en sesion el listado de facturas:
                    if (isset($_SESSION['listaFacturas'])) {
                        $listado = unserialize($_SESSION['listaFacturas']);
                        foreach ($listado as $factura) {
                            echo "<tr>";
                            echo "<td>" . $factura->getIdFacturaCab() . "</td>";
                            echo "<td>" . $factura->getFecha() . "</td>";
//                            echo "<td>" . $factura->getCedula() . "</td>";
                            echo "<td>" . $factura->getEstado() . "</td>";
//                            echo "<td>" . $factura->getBaseImponible() . "</td>";
//                            echo "<td>" . $factura->getBaseNoImponible() . "</td>";
//                            echo "<td>" . $factura->getValorIva() . "</td>";
                            echo "<td>" . $factura->getTotal() . "</td>";
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
