<!DOCTYPE html>
<?php
require_once '../model/Hacienda.php';
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
    </head>
    <body>
        
          <?php
            $hacienda=unserialize($_SESSION['hacienda']);
            
        ?>
        
         <div class="masthead">
             <img src="images/bannerHacienda.jpg" height="300" width="1400"></div>
        
        <div class="container">
             <div class="row">
                <h3>Haciendas</h3>
            </div>
            <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
                 <button type="button " data-toggle="modal" href="#mimodal" class="btn btn-primary" >Añadir Hacienda </button>
            </div>
          
            <br><br>
            
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
                    <input type="hidden" name="opcion" value="crear_hacienda">
                     
                    Codigo de Hacienda:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<input type="text" name="codigoHacienda" maxlength="50" required="true"> <br><br>
                    
                    Nombre de la Hacienda:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="nombreHacienda" maxlength="50" required="true"> <br><br>
                    
                    Provincia de la Hacienda:&nbsp;&nbsp;<input type="text" name="provinciaHacienda" maxlength="50" required="true"> <br><br>
                   
                    Cantón de la Hacienda:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cantonHacienda" maxlength="50" required="true">  <br><br>
                    
                    Parroquia de la Hacienda:&nbsp;<input type="text" name="parroquiaHacienda" maxlength="50" required="true"><br><br> 
                    
                    Dirección de la Hacienda:&nbsp;&nbsp;<input type="text" name="direccionHacienda" maxlength="50" required="true"> <br><br>
                    
                    Telefono de la Hacienda:&nbsp;&nbsp;&nbsp;<input type="text" name="telefonoHacienda" maxlength="100"><br>
                   
                    
                    <input type="submit" value="Crear"><br>
                </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>

            
         
            
          <!-- LISTADO -->    
            <table data-toggle="table">
                <thead>
                    <tr>
                        <th>COD. HACIENDA</th>
                        <th>NOM. HACIENDA</th>
                        <th>PROV. HACIENDA</th>
                        <th>CANTON HACIENDA</th>
                        <th>PARROQUIA HACIENDA</th>
                        <th>DIREC. HACIENDA</th>
                        <th>TELF. HACIENDA</th>
                        
                       
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //verificamos si existe en sesion el listado de clientes:
                    if (isset($_SESSION['listaHaciendas'])) {
                        $listado = unserialize($_SESSION['listaHaciendas']);
                        foreach ($listado as $hacienda) {
   
                            echo "<tr>";
                            echo "<td>" . $hacienda->getCodHacienda() . "</td>";
                            echo "<td>" . $hacienda->getNombreHacienda() . "</td>";
                            echo "<td>" . $hacienda->getProvinciaHacienda() . "</td>";
                            echo "<td>" . $hacienda->getCantonHacienda() . "</td>";  
                            echo "<td>" . $hacienda->getParroquiaHacienda() . "</td>";
                            echo "<td>" . $hacienda->getDireccionHacienda() . "</td>";
                            echo "<td>" . $hacienda->getTelefonoHacienda() . "</td>";
                            
                            echo "</tr></div>";
                        }
                    } else {
                        echo "No se han cargado datos.";
                    }
                    ?>
                </tbody>
            </table>
          
          
               <!-- Modal EDITAR --> 
            <div class="modal fade" id="ModalEditar" role="document">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar Hacienda</h4>
                    </div>
                    <div class="modal-body">
     
                  <form action="../controller/controller.php">
        <input type="hidden" value="editar_hacienda" name="opcion">
            <!Utilizamos
            pequeños scripts PHP para obtener los valores del producto: >
  
                <input type="hidden" value="<?php echo $hacienda->getCodHacienda(); ?>" name="codHacienda">
                    Codigo Hacienda:<b><?php echo $hacienda->getCodHacienda(); ?></b><br>
                    <br>Nombre Hacienda:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="nombreHacienda" value="<?php echo $hacienda->getNombreHacienda(); ?>"><br>
                    <br>Provincia Hacienda:&nbsp;&nbsp;<input type="text" name="provinciaHacienda" value="<?php echo $hacienda->getProvinciaHacienda(); ?>"><br>
                    <br>Canton Hacienda:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cantonHacienda" value="<?php echo $hacienda->getCantonHacienda(); ?>"><br>
                    <br>Parroquia Hacienda:&nbsp;<input type="text" name="parroquiaHacienda" value="<?php echo $hacienda->getParroquiaHacienda(); ?>"><br>
                    <br>Direccion Hacienda:&nbsp;&nbsp;<input type="text" name="direccionHacienda" value="<?php echo $hacienda->getDireccionHacienda(); ?>"><br>
                    <br>Telefono Hacienda:&nbsp;&nbsp;&nbsp;<input type="text" name="telefonoHacienda" value="<?php echo $hacienda->getTelefonoHacienda(); ?>"><br>

                <br><br> <input type="submit" value="OK" class="btn btn-info">
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
            
          
          
          
        </div>
    </body>
</html>
<?php
}
}
?>