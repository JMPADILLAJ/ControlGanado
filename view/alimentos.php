<!DOCTYPE html>
<?php
require_once '../model/Alimento.php';
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
        <title>Informacion - Alimentos</title>
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
                <center><h3>Informacion sobre los alimentos</h3></center>
            </div>
            <div class="row">
                <rigth><a class="btn btn-primary" href="../view/index.php">Volver al inicio</a></right>
                
            <button type="button" data-toggle="modal" href="#mimodal" class="btn btn-primary" >Añadir Alimento</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="../controller/controller.php?opcion=salir">Salir</a>
            </div>
            
            <!-- Modal --> 
            <div class="modal fade" id="mimodal" role="document">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Llenar todos los campos</h4>
                    </div>
                    <div class="modal-body">
     
                     <form action="../controller/controller.php">
                    <input type="hidden" name="opcion" value="crear_alimento">
            
                    Codigo del Alimento:<input type="text" name="COD_ALIMENTO" maxlength="50" required="true"><br>
                     <br>Nombre del Alimento:<input type="text" name="NOM_ALIMENTO" maxlength="50" required="true"><br>
                     <br>Descripcion:<input type="text" name="DESCRI_ALIMENTO" maxlength="50" required="true"><br>
<!--                     <br>Cantidad :<input type="number" name="CANT_ALIMENTO" maxlength="100"><br>-->
                     <br>Precio x Unidad Medida:<input type="text" name="PREC_X_U_MEDIDA" maxlength="50" required="true"><br>
                     <br>Unidad de Medida:<select name="UNIDAD_DE_MEDIDA">
                        <option value="Litros">Litros</option>
                        <option value="Libras">Libras</option>
                        <option value="Gramos">Gramos</option>
                        <option value="Kilogramos">Kilogramos</option>ç
                        <option value="Gramos">Pacas</option>
                    </select> 
                    <br><br><input type="submit" value="Crear">
            
             </form>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
            
            
            
            <br><br>
            <table data-toggle="table">
                <thead>
                    <tr>
                        <th>COD_ALIMENTO</th>
                        <th>NOM_ALIMENTO</th>
                        <th>DESC_ALIMENTO</th>
<!--                        <th>CANT_ALIMENTO</th>-->
                        <th>PREC_X_U_MEDIDA</th>
                        <th>UNIDAD_MEDIDA</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
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