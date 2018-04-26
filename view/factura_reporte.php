<!DOCTYPE html>
<html lang="en">
<?php
require_once '../model/Alimento.php';
require_once '../model/Bovino.php';
require_once '../model/FacturaDet.php';
require_once '../model/CrudModel.php';
require_once '../model/FacturaModel.php';
session_start();
$facturaCab=$_SESSION['facturaCab'];
$facturaModel = new FacturaModel();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registros</title>
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
                <h3>Registro Final</h3>
            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
                <a class="btn btn-primary" href="javascript:window.print()">Imprimir</a>
              <a class="btn btn-primary" href="../view/email.php">Enviar al Email</a>
            </div>
            <p>
          
                
           
                
            <table>
                <tr>
                    <td>Nro. registro:</td>
                    <td><?php echo $facturaCab->getIdFacturaCab(); ?></td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td><?php echo $facturaCab->getFecha(); ?></td>
                </tr>
                <tr>
                    <td>Estado del registro:</td>
                    <td><?php echo $facturaCab->getEstado(); ?></td>
                </tr>

                
            </table>
            
    </p>
    <table data-toggle="table">
        <thead>
            <tr>
                <th>COD BOVINO</th>
                <th>NOMBRE BOVINO</th>         
                <th>NOMBRE ALIMENTO</th>             
                <th>CANTIDAD</th>
                <th>SUBTOTAL</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
            //verificamos si existe en sesion el listado de clientes:
            if (isset($_SESSION['listaFacturaDet'])) {
                $listado = unserialize($_SESSION['listaFacturaDet']);
                foreach ($listado as $facturaDet) {
                    echo "<tr>";
                     echo "<td>" . $facturaDet->getCodigoBovino() . "</td>";
                    echo "<td>" . $facturaDet->getNombreBovino() . "</td>";
                    echo "<td>" . $facturaDet->getNombreAlimento() . "</td>";
                    echo "<td>" . $facturaDet->getCantidad() . "</td>";
                    echo "<td>" . $facturaDet->getPrecioUnidad(). "</td>";
                    echo "</tr>";
                }echo "</tbody>
    </table><br><table width='30%' border='1' bordercolor='#0000FF' align='right' cellspacing='10' cellpadding='10'><tr><td WIDTH=100><b>TOTAL $$:</b></td><td WIDTH=100 align=center>" . $facturaModel->calcularTotal($listado) . "&nbsp; Dolares</td></tr></table>";
            } else {
                echo "No se han cargado datos.";
            }
            ?>
        </tbody>
    </table>
     
</div>         
           
</body>
</html>