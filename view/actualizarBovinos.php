<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF8">
        <title>Actualizacion de datos</title>
    </head>
    <body>
        <?php
        include  '../model/Bovino.php';    
//obtenemos los datos de sesion:
        session_start();
         $bovino= $_SESSION['bovino'];
        ?>
    <center>
        <img src="images/banner-bovinos.jpg" width="1150" height="200">
        <h3>Actualizacion del Bovino</h3>
        <form action="../controller/controller.php"> 
            
                <input type="hidden" name="opcion" value="actualizar_bovino">
              <input type="hidden" value="<?php echo $bovino->getCodigoBovino(); ?>" name="COD_BOVINO"> 
                    <table border="2px">   
                    <tr><td><font face="verdana" color="black">Codigo Bovino:</font></td><td><font face="verdana" color="red"><b><?php echo $bovino->getCodigoBovino(); ?></b></font></td></tr>                   
                    <tr><td><font face="verdana" color="black">Nombre:</font></td><td><input type="text" name="NOMBRE_B" value="<?php echo $bovino->getNombreBovino() ?>"></td></tr>                    
                    <tr><td><font face="verdana" color="black">Fecha Nacimiento:</font></td><td><input type="text" name="FECHA_NAC" value="<?php echo $bovino->getFechaNacimiento(); ?>"></td></tr>                  
                    <tr><td><font face="verdana" color="black">Tipo adquisicion:</font></td><td><input type="text" name="TIPO_ADQ" value="<?php echo $bovino->getTipoAdquisicion(); ?>"></td></tr>                  
                    <tr><td><font face="verdana" color="black">Genero:</font></td><td><input type="text" name="GENERO_B" value="<?php echo $bovino->getGenero(); ?>"></td></tr>                  
                    <tr><td><font face="verdana" color="black">Bovino Activo:</font></td><td><input type="text" name="BOVINO_ACTIVO" value="<?php echo $bovino->getBovinoActivo(); ?>"></td></tr>                  
                    <tr><td><font face="verdana" color="black">Color:</font></td><td><input type="text" name="COLOR_B" value="<?php echo $bovino->getColorBovino(); ?>"></td></tr>                  
                                                        
                    </table> 
                    <br><br><input type="submit" value="Actualizar">
                </form>
    
        <div class="row">
            <br><br> <a class="btn btn-primary" href="../view/listarBovinos.php">Regresar</a>
            </div>
    </center>
    </body>
</html>