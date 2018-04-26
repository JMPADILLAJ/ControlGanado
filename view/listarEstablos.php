<!DOCTYPE html>
<?php
require_once '../model/Establo.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Lista de Establos</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="masthead">
         <img src="images/bannerEstablo.jpg" height="300" width="1400">
        </div>
        
        <div class="container">
           
            <div class="row">
                <h3>Lista de Establos</h3>
            </div>
            <div class="row" >
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
                <a class="btn btn-success" href="../controller/controller.php?opcion=listar_establos">Actualizar</a>
                <br><br>
            </div>


                
            
            
            <table data-toggle="table" data-pagination="true">
                <thead>
                    <tr>
                        <th>CODIGO ESTABLO</th>
                        <th>CODIGO HACIENDA</th>
                        <th>CAPACIDAD MAXIMA</th>
                        <th>NUMERO DE ANIMALES</th>
                        <th>OPCIONES</th>
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
                            echo "<td><a class='btn btn-default btn-xs' href='../controller/controller.php?opcion=editar_establo&codEstablo=" . $establo->getCodigoEstablo() . "'> Editar</a>&nbsp;"
                                    ."<a class='btn btn-default btn-xs' href='../controller/controller.php?opcion=eliminarEst&codEstablo=" . $establo->getCodigoEstablo(). "'> Eliminar</a></td>";
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
