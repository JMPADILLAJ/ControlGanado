<!DOCTYPE html>
<?php
require_once '../model/Bovino.php';
require_once '../model/Alimento.php';
require_once '../model/ProduccionDet.php';
include_once '../model/CrudModel.php';
require_once '../model/ProduccionModel.php';

session_start();
$crudModel = new CrudModel();
$produccionModel = new ProduccionModel();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registros de Produccion</title>
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
                <h3>Nuevo Registro</h3>
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
                <input type="hidden" name="opcion" value="guardar_registro2">


                Fecha:<input type="date" name="fecha" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>">
                <input type="submit" value="Guardar registro">
            </form>
        </p>
        <p>
        <form action="../controller/controller.php">
            <input type="hidden" name="opcion" value="adicionar_registro">
            Seleccione el bovino:
            <select name="COD_BOVINO">
                <?php
                $listaBovinos = $crudModel->getBovinos();
                foreach ($listaBovinos as $bovino) {
                    echo "<option value='" . $bovino->getCodigoBovino() . "'>" . $bovino->getNombreBovino() . "</option>";
                }
                ?>
            </select>
            Seleccione la seccion:
            <select name="seccion">                
                <option value="mañana">MAÑANA</option>
                <option value="tarde">TARDE</option>

            </select>
            Numero de Litros:<input type="text" name="numLitros" maxlength="10" required="true" value="1">
            Hora de Ordeño:<input type="text" name="horaOrdeno" maxlength="10" required="true" value="0:00">
            <input type="submit" value="Adicionar">
        </form>
    </p>
    <table data-toggle="table">
        <thead>
            <tr>
                <th>CODIGO BOVINO</th>
                <th>NOMBRE BOVINO</th>   
                <th>SECCION ORDEÑO</th>
                <th>NUMERO DE LITROS</th>
                <th>HORA ORDEÑO</th>             
                <th>OPCIONES</th>
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
                    echo "<td><a href='../controller/controller.php?opcion=eliminar_registro&codigoBovino=" . $produccionDet->getCodigoBovino() . "'>Eliminar</a></td>";
                    echo "</tr>";
                }
                echo "</tbody>
    </table><br><table width='30%' border='1' bordercolor='#0000FF' align='right' cellspacing='10' cellpadding='10'><tr><td WIDTH=100><b>TOTAL LITROS:</b></td><td WIDTH=100 align=center>" . $produccionModel->calcularTotal($listado) . "&nbsp; Litros</td></tr></table>"
                        . " <br><br><table width='30%' border='1' bordercolor='#0000FF' align='right' cellspacing='10' cellpadding='10'><tr><td WIDTH=100><b>TOTAL INGRESOS:</b></td><td WIDTH=100 align=center>" . $produccionModel->calcularTotalngresos($listado) . " &nbsp; Dolares</td></tr></table>";
                
                } else {
                echo "No se han cargado datos.";
            }
            ?>
            </div>
            </body>
            </html>
