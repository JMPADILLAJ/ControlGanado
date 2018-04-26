<!DOCTYPE html>
<?php
require_once '../model/Medicamento.php';
session_start();
if (!isset($_SESSION['entrada'])) {
    session_destroy();
    header('Location: ../view/login.php');
} else {
    $entrada = unserialize($_SESSION['entrada']);
    if ($entrada == false) {
        session_destroy();
        header('Location: ../view/login.php');
    } else {
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Pagina Medicamento</title>
                <script src="js/jquery-2.1.4.js"></script>
                <script src="js/bootstrap.js"></script>
                <script src="js/bootstrap-table.js"></script>
                <link href="css/bootstrap.css" rel="stylesheet">
                <link href="css/bootstrap-table.css" rel="stylesheet">
            </head>
            <body>
                <div class="container">
                    <img src="images/banner-bovinos.jpg">
                    <div class="row">
                        <h3>Medicamentos</h3>
                    </div>
                    <div class="row">
                        <a class="btn btn-success" href="../view/index.php">Inicio</a>
                    </div>
                    <p>
                    <form action="../controller/controller.php">
                        <input type="hidden" name="opcion" value="crear_medicamento">
                        Codigo Medicamento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="COD_MED" maxlength="50" required="true">
                        &nbsp;&nbsp;&nbsp;&nbsp; 
                        Nombre Medicamento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="NOMBRE_MED" maxlength="50" required="true">
                        <br>  <br>Fecha Medicamento:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="FECHA_MED" maxlength="50" required="true">
                        &nbsp;&nbsp;&nbsp;&nbsp; Contradicciones medicamento:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="CONTRADICCIONES_MED" maxlength="100">
                        <br><br> Dosis Medicamneto:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="DOSIS_MED" maxlength="50" required="true">
                        &nbsp;&nbsp;&nbsp;&nbsp;Precio Medicamento:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="PRECIO_MED" maxlength="50" required="true">
                        &nbsp;&nbsp;&nbsp;&nbsp;Descripcion Medicamento:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="DESCRIPCION_DEL_MEDICAMENTO" maxlength="500"><br><br>
                        <input type="submit" value="Crear"><br><br>
                    </form>
                </p>
                <table data-toggle="table">
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
                        //verificamos si existe en sesion el listado de cmedicamentos:
                        if (isset($_SESSION['listaMedicamentos'])) {
                            $listado = unserialize($_SESSION['listaMedicamentos']);
                            foreach ($listado as $medicamento) {
                                echo "<tr>";
                                echo "<td>" . $medicamento->getCodigoMedicamento() . "</td>";
                                echo "<td>" . $medicamento->getNombreMedicamento() . "</td>";
                                echo "<td>" . $medicamento->getFechaMedicamento() . "</td>";
                                echo "<td>" . $medicamento->getContradiccionesMedicamento() . "</td>";
                                echo "<td>" . $medicamento->getDosisMedicamento() . "</td>";
                                echo "<td>" . $medicamento->getPrecioMedicamento() . "</td>";
                                echo "<td>" . $medicamento->getDescripcionMedicamento() . "</td>";
                                echo "<td><a href='../controller/controller.php?opcion=cargar_medicamento&COD_MED=" . $medicamento->getCodigoMedicamento() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
                                echo "<td><a href='../controller/controller.php?opcion=eliminar_medicamento&COD_MED=" . $medicamento->getCodigoMedicamento() . "'>Eliminar</a></td>";
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
        <?php
    }
}
?>