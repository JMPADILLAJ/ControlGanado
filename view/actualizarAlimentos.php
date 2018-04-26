<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF8">
        <title>Actualizacion de datos</title>
    </head>
    <body>
        <?php
        include  '../model/Alimento.php';
        
//obtenemos los datos de sesion:
        session_start();
        $alimento = $_SESSION['alimento'];
        ?>
    <center>
        <img src="images/bann.jpg" width="1150" height="200">
        
        <h3>Actualizacion de los Alimentos</h3>       
        <form action="../controller/controller.php">            
                    <input type="hidden" name="opcion" value="actualizar_alimento">
              <input type="hidden" value="<?php echo $alimento->getCodigoAlimento(); ?>" name="COD_ALIMENTO"> 
                    <table border="2px">   
                    <tr><td><font face="verdana" color="black">Codigo Alimento:</font></td><td><font face="verdana" color="red"><b><?php echo $alimento->getCodigoAlimento(); ?></b></font></td></tr>                   
                    <tr><td><font face="verdana" color="black">Nombre del Alimento:</font></td><td><input type="text" name="NOM_ALIMENTO" value="<?php echo $alimento->getNombreAlimento() ?>"></td></tr>                    
<!--                    <tr><td><font face="verdana" color="black">Cantidad del Alimento:</font></td><td><input type="text" name="CANT_ALIMENTO" value="<?php echo $alimento->getCantidadAlimento(); ?>"></td></tr>                  -->
                    <tr><td><font face="verdana" color="black">Precio Unidad Medida:</font></td><td><input type="text" name="PREC_X_U_MEDIDA" value="<?php echo $alimento->getPrecioUnidad(); ?>"></td></tr>                  
                    <tr><td><font face="verdana" color="black">Unidad Medida:</font></td><td><select name="UNIDAD_DE_MEDIDA" value="<?php echo $alimento->getUnidadMedida(); ?>">                  
                       <option value="Litros">Litros</option>
                        <option value="Libras">Libras</option>
                        <option value="Gramos">Gramos</option>
                        <option value="Kilogramos">Kilogramos</option>
                    </select> </td></tr>                                 
                    </table> 
                    <br><br><input type="submit" value="Actualizar">
                </form>
                 
         <div class="row">
             <br><br> <a class="btn btn-primary" href="../view/listarAlimentos.php">Regresar</a>
            </div>
    </center>
    </body>
</html>