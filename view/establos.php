<!DOCTYPE html>
<?php
require_once '../model/Establo.php';
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
        <title>Pagina Establos</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
         <div class="masthead">
         <img src="images/bannerEstablo.jpg" height="300" width="1400"></div>
        
         <div class="masthead">
   <div class="container">
             <div class="row">
                <h3>Establos</h3>
            </div>
            <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
                <button type="button " data-toggle="modal" href="#mimodal" class="btn btn-primary" >Añadir Establo </button>
                
            </div>
            <br>
                 <!-- Modal AÑADIR --> 
            <div class="modal fade" id="mimodal" role="document">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar Hacienda</h4>
                    </div>
                    <div class="modal-body">
                <form action="../controller/controller.php">
                    <input type="hidden" name="opcion" value="ingresar_establo">
                      
                    Codigo de Establo:&nbsp;&nbsp;&nbsp; <input type="text" name="codEstablo" maxlength="50" required="true"> &nbsp;&nbsp;&nbsp;&nbsp; 
                    
                    <br><br>Codigo Hacienda:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <select name="codHacienda"><?php
                             $crudModel=new CrudModel();
                             $listado=$crudModel->getHaciendas();
                                foreach($listado as $haci){
                                echo "<option selected='true' value='".$haci->getCodHacienda()."'>".$haci->getNombreHacienda()."</option>";
                            }
                             ?>
                        </select>                    
                   <br><br>
                    
                   Capacidad Maxima:&nbsp;&nbsp;&nbsp;<input type="number" name="capMaxima" maxlength="50" required="true"> &nbsp;&nbsp;&nbsp;&nbsp; 
                   
                    <br><br>Numero de animales:&nbsp;<input type="number" name="numAnimales" maxlength="100"><br><br>
                   
                    
                    <input type="submit" value="Crear"><br><br>
                </form>
                        
                         </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
           
            <table data-toggle="table">
                <thead>
                    <tr>
                        <th>CODIGO ESTABLO</th>
                        <th>CODIGO HACIENDA</th>
                        <th>CAPACIDAD MAXIMA</th>
                        <th>NUMERO DE ANIMALES</th>                  
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //verificamos si existe en sesion el listado de clientes:
                    if (isset($_SESSION['listaEstablos'])) {
                        $listado = unserialize($_SESSION['listaEstablos']);
                        foreach ($listado as $establo) {
                            echo "<tr>";
                            echo "<td>" . $establo->getCodigoEstablo() . "</td>";
                            echo "<td>" . $establo->getCodHacienda() . "</td>";
                            echo "<td>" . $establo->getCapMaxima() . "</td>";
                            echo "<td>" . $establo->getNumAnimales() . "</td>";                         
                            echo "</tr>";
                        }
                    } else {
                        echo "No se han cargado datos.";
                    }
                    ?>
                </tbody>
            </table>
        </div>
            </div>     
    </body>
</html>
<?php
}
                            }
?>