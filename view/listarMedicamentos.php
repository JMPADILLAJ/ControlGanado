<!DOCTYPE html>
<?php
require_once '../model/Medicamento.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Lista de Medicamentos</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="images/banner-facturacion.jpg">
            <div class="row">
                <h3>Lista de Medicamentos</h3>
            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
            </div>



            <br>

            <table data-toggle="table" data-pagination="true">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
                        <th>FECHA MEDICAMENTO</th>
                        <th>CONTRADICCIONES</th>
                        <th>DOSIS</th>
                        <th>PRECIO</th>
                        <th>DESCRIPCION</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //verificamos si existe en sesion el listado de clientes:
                    if (isset($_SESSION['listaMedicamentos'])) {
                        $listado = unserialize($_SESSION['listaMedicamentos']);
                        foreach ($listado as $medicamento) {
                            echo "<tr>";
                            echo "<td>" . $medicamento->getCodigoMedicamento() . "</td>";
//                            echo "<td>" . $medicamento->getCodigoMedicamento() . "</td>";
                            echo "<td>" . $medicamento->getNombreMedicamento() . "</td>";
                            echo "<td>" . $medicamento->getFechaMedicamento() . "</td>";
                            echo "<td>" . $medicamento->getContradiccionesMedicamento() . "</td>";
                            echo "<td>" . $medicamento->getDosisMedicamento() . "</td>";
                            echo "<td>" . $medicamento->getPrecioMedicamento() . "</td>";
                            echo "<td>" . $medicamento->getDescripcionMedicamento() . "</td>";
                            echo "<td><a class='btn btn-default btn-xs' href='../controller/controller.php?opcion=cargar_medicamento&COD_MED=" . $medicamento->getCodigoMedicamento() . "'> Editar</a>&nbsp;"
                                    ."<a class='btn btn-default btn-xs' href='../controller/controller.php?opcion=eliminar_medicamento&COD_MED=" . $medicamento->getCodigoMedicamento(). "'> Eliminar</a></td>";
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

