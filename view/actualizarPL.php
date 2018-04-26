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
<body>

            <?php
            $hacienda=unserialize($_SESSION['hacienda']);
            
        ?>
 <form action="../controller/controller.php">
        <input type="hidden" value="actualizar_hacienda" name="opcion">
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
    
     <br> <form action="../view/index.php">
           <input type="submit" value="Pagina Principal" onclick="$('#capa').css('display','block')" class="btn btn-primary">
                    </form>
       
    
</body>
</html>
<?php
}
}
?>