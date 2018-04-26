<!DOCTYPE html>
<?php
require_once '../model/Alimento.php';
require_once '../model/Bovino.php';
require_once '../model/FacturaDet.php';
require_once '../model/CrudModel.php';
require_once '../model/FacturaModel.php';
session_start();
$crudModel = new CrudModel();
$facturaModel = new FacturaModel();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registros de Alimentacion</title>
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
                <h3>Nuevo registro</h3>
            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
                <?php
                if (isset($_SESSION['mensajeError'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['mensajeError'] . "</div>";
                }
                ?>
            </div>
            <p>
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="guardar_factura">

                Fecha:<input type="date" name="fecha" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>">
                <input type="submit" value="Guardar registro">
            </form>
        </p>
        <p>
        <form action="../controller/controller.php">
            <input type="hidden" name="opcion" value="adicionar_detalle">
            Seleccione el bovino:
            <select name="COD_BOVINO">
                <?php
                $listaBovinos = $crudModel->getBovinos();
                foreach ($listaBovinos as $bovino) {
                    echo "<option value='" . $bovino->getCodigoBovino() . "'>" . $bovino->getNombreBovino() . "</option>";
                }
                ?>
            </select>
            Seleccione el alimento:
            <select name="COD_ALIMENTO">
                <?php
                $listaAlimentos = $crudModel->getAlimentos();
                foreach ($listaAlimentos as $alimento) {
                    echo "<option value='" . $alimento->getCodigoAlimento() . "'>" . $alimento->getNombreAlimento() . "</option>";
                }
                ?>
            </select>
            Cantidad:<input type="text" name="cantidad" maxlength="10" required="true" value="1">
            <input type="submit" value="Adicionar">
        </form>
    </p>

    <table data-toggle="table">
        <thead>
            <tr>
                <th>COD BOVINO</th>
                <th>NOMBRE BOVINO</th>         
                <th>NOMBRE ALIMENTO</th>             
                <th>CANTIDAD</th>
                <th>SUBTOTAL</th>
                <th>OPCIONES</th>
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
                    
                    echo "<td><a href='../controller/controller.php?opcion=eliminar_detalle&COD_ALIMENTO=" . $facturaDet->getCodigoAlimento() . "'>Eliminar</a></td>";
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
