<!DOCTYPE html>
<?php
require_once '../model/Bovino.php';

include_once '../model/CrudModel.php';
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
        <title>Pagina Bovinos</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="images/banner-bovinos.jpg" width="1150" height="200">
            <div class="row">
                <h3>Bovinos</h3>
            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
            
            
            
            
            
            <button type="button" data-toggle="modal" href="#mimodal" class="btn btn-primary" >Añadir Bovino</button>
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
                    <input type="hidden" name="opcion" value="crear_bovino">
                    <center>
                    Codigo del Bovino:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="COD_BOVINO" maxlength="50" required="true"><br>               
                    <br>Codigo del establo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="codigoEstablo"><?php
                             $crudModel=new CrudModel();
                             $listado=$crudModel->getEstablos();
                                foreach($listado as $haci){
                                echo "<option selected='true' value='".$haci->getCodigoEstablo()."'>".$haci->getCodigoEstablo()."</option>";
                            }
                             ?>
                        </select>     <br>
                    <br>Codigo de Raza:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="COD_RAZA" maxlength="50" required="true"><br>
                    <br>Nombre del Bovino:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="NOMBRE_B" maxlength="50" required="true"><br>
                    <br>Fecha de Nacimiento:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="FECHA_NAC" maxlength="50" required="true"><br>
                    <br>Tipo de Adquisicion:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="TIPO_ADQ" maxlength="100"><br>
                    <br>Genero:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="GENERO_B" maxlength="1" required="true"><br>
                    <br>Bovino Activo:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="BOVINO_ACTIVO" maxlength="50" required="true"><br>
                    <br>Color:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="COLOR_B" maxlength="100"><br>
                    <br><input type="submit" value="Crear"</center>      
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
                        <th>CODIGO</th>
                        <th>CODIGO establo</th>
                        <th>CODIGO raza</th>
                        <th>NOMBRE</th>
                        <th>FECHA NAC</th>
                        <th>ADQUISICION</th>
                        <th>GENERO</th>
                        <th>BOVINO ACTIVO</th>
                        <th>COLOR</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //verificamos si existe en sesion el listado de clientes:
                    if (isset($_SESSION['listaBovinos'])) {
                        $listado = unserialize($_SESSION['listaBovinos']);
                        foreach ($listado as $bovino) {
                            echo "<tr>";
                            echo "<td>" . $bovino->getCodigoBovino() . "</td>";
                            echo "<td>" . $bovino->getCodEstablo() . "</td>";
                            echo "<td>" . $bovino->getCodigoRaza() . "</td>";
                            echo "<td>" . $bovino->getNombreBovino() . "</td>";
                            echo "<td>" . $bovino->getFechaNacimiento() . "</td>";
                            echo "<td>" . $bovino->getTipoAdquisicion() . "</td>";
                            echo "<td>" . $bovino->getGenero() . "</td>";
                            echo "<td>" . $bovino->getBovinoActivo() . "</td>";
                            echo "<td>" . $bovino->getColorBovino() . "</td>";
                            
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