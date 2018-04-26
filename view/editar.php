<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar Medicamentos</title>
    </head>
    <body>
        <?php
        include '../model/Medicamento.php';
        include_once '../model/CrudModel.php';
//obtenemos los datos de sesion:
        session_start();
        $medicamento = $_SESSION['listaMedicamentos'];
        ?>
        <form action="../controller/controller.php">
            <input type="hidden" value="editar_medicamento" name="opcion">
            <!Utilizamos
                pequeños scripts PHP para obtener los valores del producto: >
             <input type="hidden" value="<?php echo $medicamento ->getCodigoMedicamento();?>" name="COD_MED">
           <br> Codigo Medicamento:<b><?php echo $medicamento ->getCodigoMedicamento();?></b><br>
           <br> Nombre Medicamento: <input type="text" name="NOMBRE_MED" value="<?php echo $medicamento ->getNombreMedicamento();?>"><br>
           <br> Fecha Medicamento:<input type="text" name="FECHA_MED" value="<?php echo $medicamento ->getFechaMedicamento();?>"><br>
           <br> Contradicciones medicamento:<input type="text" name="CONTRADICCIONES_MED" value="<?php echo $medicamento ->getContradiccionesMedicamento();?>"><br>
           <br> Dosis Medicamneto:<input type="text" name="DOSIS_MED" value="<?php echo $medicamento ->getDosisMedicamento();?>"><br>
           <br> Precio Medicamento:<input type="text" name="PRECIO_MED" value="<?php echo $medicamento ->getPrecioMedicamento();?>"><br>
          <br>  Descripcion Medicamento:<input type="text" name="DESCRIPCION_DEL_MEDICAMENTO" value="<?php echo $medicamento ->getDescripcionMedicamento();?>"><br>
          <br>   <input type="submit" value="Actualizar"><br><br>
        </form>
    </body>
</html>