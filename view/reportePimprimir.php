<!DOCTYPE html>
<?php
require_once '../model/Bovino.php';
require_once '../model/ProduccionDet.php';
require_once '../model/CrudModel.php';
require_once '../model/ProduccionModel.php';
session_start();
$produccionCab=$_SESSION['produccionCab'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registros Produccion</title>
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
                <h3>Registros de Produccion</h3>
            </div>
            <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
                <a class="btn btn-success" href="javascript:window.print()">Imprimir</a>
            </div>
            <p>
            <table>
                <tr>
                    <td>Nro. Registro:</td>
                    <td><?php echo $produccionCab->getCodigoRegistro(); ?></td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td><?php echo $produccionCab->getFecha(); ?></td>
                </tr>
                <tr>
                    <td>Estado de la factura:</td>
                    <td><?php echo $produccionCab->getEstado(); ?></td>
                </tr>
                
             
            </table>
            
    </p>
    <table data-toggle="table">
        <thead>
            <tr>
                <th>CODIGO DE BOVINO</th>
                <th>NOMBRE DEL BOVINO</th>
                <th>SECCION ORDEÑO</th>
                <th>NUMERO DE LITROS</th>
                <th>HORA ORDEÑO</th>
              
            </tr>
        </thead>
        <tbody>
            <?php
            //verificamos si existe en sesion el listado de clientes:
            if (isset($_SESSION['listaProduccionDet'])) {
                $listado = unserialize($_SESSION['listaProduccionDet']);
                foreach ($listado as $produccionDet) {
                    echo "<tr>";
                    echo "<td>" . $produccionDet->getCodigoBovino() . "</td>";
                    echo "<td>" . $produccionDet->getNombreBovino() . "</td>";
                    echo "<td>" . $produccionDet->getSeccionOrdeno() . "</td>";
                    echo "<td>" . $produccionDet->getNumeroLitros() . "</td>";
                    echo "<td>" . $produccionDet->getHoraOrdeno() . "</td>";
                    echo "</tr>";
                }

            } else {
                echo "No se han cargado datos.";
            }
            ?>
        </tbody>
    </table>
    
      <?php echo "<br><table width='30%' border='1' bordercolor='#0000FF' align='right' cellspacing='10' cellpadding='10'><tr><td WIDTH=100><b>TOTAL LITROS:</b></td><td WIDTH=100 align=center>" . $produccionCab->getTotal() . "&nbsp; Litros</td></tr></table>"
             . "<br><br><table width='30%' border='1' bordercolor='#0000FF' align='right' cellspacing='10' cellpadding='10'><tr><td WIDTH=100><b>TOTAL INGRESOS:</b></td><td WIDTH=100 align=center>" . $produccionCab->getTotalIngresos() . "&nbsp; Dolares</td></tr></table>";?>

    
</div>
</body>
</html>
