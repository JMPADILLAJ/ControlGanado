<!DOCTYPE html>
<!DOCTYPE html>
<?php
require_once '../model/Raza.php';
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
        
        <meta charset="UTF8">
        <title>Actualizacion de datos</title>
    </head>
    <body>
    <center>
        <img src="images/banner-bovinos.jpg" width="1150" height="200">
        
           <?php
            $raza=unserialize($_SESSION['raza']);
            
        ?>
        
        <h3>Actualizacion de las Razas</h3>       
        <form action="../controller/controller.php">            
                    <input type="hidden" name="opcion" value="actualizar_raza">
              <input type="hidden" value="<?php echo $raza->getCodigoRaza(); ?>" name="COD_RAZA"> 
                    <table border="2px">   
                    <tr><td><font face="verdana" color="black">Codigo Raza:</font></td><td><font face="verdana" color="red"><b><?php echo $raza->getCodigoRaza(); ?></b></font></td></tr>                   
                    <tr><td><font face="verdana" color="black">Nombre de la raza:</font></td><td><input type="text" name="NOMBRE_RAZA" value="<?php echo $raza->getNombreRaza() ?>"></td></tr>                    
                    <tr><td><font face="verdana" color="black">Descripcion:</font></td><td><input type="text" name="DESCRP_RAZA" value="<?php echo $raza->getDescripcionRaza(); ?>"></td></tr>                  
                                        
                    </table>
                    

                    
                    <br><br><input type="submit" value="Actualizar">
                </form>
         <div class="row">
             <br><br> <a class="btn btn-primary" href="../view/listarRazas.php">Regresar</a>
            </div>
    </center>
    </body>
</html>
<?php
}
}
?>