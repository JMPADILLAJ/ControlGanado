<!DOCTYPE html>
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


<html >
    
    <head>
        <meta charset="UTF-8">
        <title>ESTABLOS</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
    </head>
     
    <body  >      
        <div class="caret">
         <img src="images/establo3.jpg" >
        </div>

            <?php
            $establo=unserialize($_SESSION['establo']);
            
        ?>
    
      <center>  <h1><font face="verdana" color="white"><b>Actualización de Establos</b></font></h1>
 <form action="../controller/controller.php">
        <input type="hidden" value="actualizar_establo" name="opcion">
            <!Utilizamos
            pequeños scripts PHP para obtener los valores del producto: >
            
              
             
                    <input type="hidden" value="<?php echo $establo->getCodigoEstablo(); ?>" name="codEstablo">
                   
                    <table border="2px">
                    
                    <tr><td><font face="verdana" color="white">Codigo Establo:</font></td><td><font face="verdana" color="white"><b><?php echo $establo->getCodigoEstablo(); ?></b></font></td></tr>
                    
                    <tr><td><font face="verdana" color="white">Codigo Hacienda:</font></td><td><input type="text" name="codHacienda" value="<?php echo $establo->getCodHacienda() ?>"></td></tr>
                    
                    <tr><td><font face="verdana" color="white">Capacidad Maxima:</font></td><td><input type="text" name="capMaxima" value="<?php echo $establo->getCapMaxima(); ?>"></td></tr>
                    
                    <tr><td><font face="verdana" color="white">Numero de Animales:</font></td><td><input type="text" name="numAnimales" value="<?php echo $establo->getNumAnimales(); ?>"></td></tr>
                    
                    </table>
                    
                <br><br> <input type="submit" value="OK" class="btn btn- bg-success">
                    </form> 
    
    
     <br> <form action="../view/index.php">
           <input type="submit" value="Pagina Principal" onclick="$('#capa').css('display','block')" class="btn btn-primary">
                    </form></center>
       
    
</body>


</html>
<?php
}
}
?>