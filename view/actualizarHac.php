<!DOCTYPE html>
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
        <title>HACIENDAS</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
    </head>
<body >
     <div class="caret">
         <img src="images/hacienda5.jpg" height="542" width="1215">
        </div>

            <?php
            $hacienda=unserialize($_SESSION['hacienda']);
            
        ?>
    
    <center>  <h1><font face="verdana" color="white"><b>Actualización de Haciendas</b></font></h1>
 <form action="../controller/controller.php">
        <input type="hidden" value="actualizar_hacienda" name="opcion">
            <!Utilizamos
            pequeños scripts PHP para obtener los valores del producto: >
  
                <input type="hidden" value="<?php echo $hacienda->getCodHacienda(); ?>" name="codHacienda">
                    
                <table border="2px">
                    
                    <tr><td><font face="verdana" color="white">Codigo Hacienda:</font></td><td><font face="verdana" color="white"><b><?php echo $hacienda->getCodHacienda(); ?></b></font></td></tr>
                    <tr><td><font face="verdana" color="white">Nombre Hacienda:</font></td><td><input type="text" name="nombreHacienda" value="<?php echo $hacienda->getNombreHacienda(); ?>"></td></tr>
                    <tr><td><font face="verdana" color="white">Provincia Hacienda:</font></td><td><input type="text" name="provinciaHacienda" value="<?php echo $hacienda->getProvinciaHacienda(); ?>"></td></tr>
                    <tr><td><font face="verdana" color="white">Canton Hacienda:</font></td><td><input type="text" name="cantonHacienda" value="<?php echo $hacienda->getCantonHacienda(); ?>"></td></tr>
                    <tr><td><font face="verdana" color="white">Parroquia Hacienda:</font></td><td><input type="text" name="parroquiaHacienda" value="<?php echo $hacienda->getParroquiaHacienda(); ?>"></td></tr>
                    <tr><td><font face="verdana" color="white">Direccion Hacienda:</font></td><td><input type="text" name="direccionHacienda" value="<?php echo $hacienda->getDireccionHacienda(); ?>"></td></tr>
                    <tr><td><font face="verdana" color="white">Telefono Hacienda:</font></td><td><input type="text" name="telefonoHacienda" value="<?php echo $hacienda->getTelefonoHacienda(); ?>"></td></tr>

                </table>
               <br> <input type="submit" value="OK" class="btn btn-info">
                    </form>
    
     <br> <form action="../view/index.php">
           <input type="submit" value="Pagina Principal" onclick="$('#capa').css('display','block')" class="btn btn-primary">
                    </form>
       
    
</body>
</html>
<?php
}
}
?>