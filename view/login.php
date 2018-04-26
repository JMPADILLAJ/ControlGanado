<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Acceda al Sistema</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
    <center>
        
        <form action="../controller/controller.php"><br> <br> <br> 
            <img src="images/login.png"><br><br>
                 
            <table>
                
            Usuario: <input type="text" name="admin"><br><br> 
            Contraseña: <input type="password" name="contra"><br> <br>
            <input type="hidden" name="opcion" value="login">
            <input type="submit" value="Ingresar">
            
            </table>
            
        </form>
    </center>
</body>
</html>