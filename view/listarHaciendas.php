<!DOCTYPE html>
<?php
require_once '../model/Hacienda.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Lista de Haciendas</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <center><div class="">
         <img src="images/bannerHacienda.jpg" height="200" width="1200"></div>
       </center>
        <div class="container">
           
            <div class="row">
                <h3>Lista de Haciendas</h3>
            </div>
            <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
                <a class="btn btn-success" href="../controller/controller.php?opcion=listar_haciendas">Actualizar Lista</a>
            </div>

            <br><br>
            <table data-toggle="table" data-pagination="true">
                <thead>
                    <tr>
                        <th>COD. HACIENDA</th>
                        <th>NOM. HACIENDA</th>
                        <th>PROV. HACIENDA</th>
                        <th>CANTON HACIENDA</th>
                        <th>PARROQUIA HACIENDA</th>
                        <th>DIREC. HACIENDA</th>
                        <th>TELF. HACIENDA</th>
                        <th>OPCIONES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
                            echo "<td><div ><a class='btn btn-default btn-xs' href='../controller/controller.php?opcion=editar_hacienda&codHacienda=" . $hacienda->getCodHacienda() . "'> Editar</a>&nbsp;"
                                    . "<a class='btn btn-default btn-xs' href='../controller/controller.php?opcion=eliminarHac&codHacienda=" . $hacienda->getCodHacienda() . "'> Eliminar</a></td>";
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
