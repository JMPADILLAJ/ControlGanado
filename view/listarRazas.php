<!DOCTYPE html>
<?php
require_once '../model/Raza.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de Razas</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="images/banner-bovinos.jpg" width="1150" height="200"><br>
            <div class="row">
                <h3>Lista de Razas</h3>
            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
            </div>         
            <br><br>
            <table data-toggle="table" data-pagination="true">
                <thead>
                    <tr>
                        <th>COD_RAZA</th>
                        <th>NOMBRE_RAZA</th>
                        <th>DESCP_RAZA</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                    //verificamos si existe en sesion el listado de clientes:
                    if (isset($_SESSION['listaRazas'])) {
                        $listado = unserialize($_SESSION['listaRazas']);
                        foreach ($listado as $raza) {
                            echo "<tr>";
                             echo "<td>" . $raza->getCodigoRaza() . "</td>";
                            echo "<td>" . $raza->getNombreRaza() . "</td>";
                            echo "<td>" . $raza->getDescripcionRaza() . "</td>";
                            echo "<td><a class='btn btn-default btn-xs' href='../controller/controller.php?opcion=editar_raza&COD_RAZA=" . $raza->getCodigoRaza() . "'> Editar</a>&nbsp;"
                                    ."<a class='btn btn-default btn-xs' href='../controller/controller.php?opcion=eliminar_raza&COD_RAZA=" . $raza->getCodigoRaza(). "'> Eliminar</a></td>";
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
