<!DOCTYPE html> 
<?php
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
                <title>Sistema de Control para el usuario</title>
                <script src="js/jquery-2.1.4.js"></script>
                <script src="js/bootstrap.js"></script>
                <script src="js/bootstrap-table.js"></script>
                <link href="css/bootstrap.css" rel="stylesheet">
                <link href="css/bootstrap-table.css" rel="stylesheet">

                <style>
                    .dropdown-submenu {
                        position: relative;
                    }

                    .dropdown-submenu .dropdown-menu {
                        top: 0;
                        left: 100%;
                        margin-top: -1px;
                    }
                </style>    

            </head>
            <body background ="images/azul.png" width="800">
                <div class="masthead">
                    <center><img src="images/bannerP.jpg" height="200" width="1150"></center>
                </div>

                <br>
                <div class="container">
                    <div class="jumbotron">
                        <div class="dropdown"> 
                            <ul>
                                <a class="btn btn-primary" href="../view/index.php?">Inicio</a>&nbsp;&nbsp;
                                <div class="btn-group" > <button type="button" class="btn btn-primary dropdown-toggle"
                                                                 data-toggle="dropdown">Haciendas <span class="caret"></span></button>

                                    <ul class="dropdown-menu"><li><a class="btn btn- btn-info alert-info  " href="../controller/controller.php?opcion=listar_haciendas">Listar Haciendas</a> </li>   
<!--                                        <li><a class="btn btn-info alert-info" href="../controller/controller.php?opcion=crear_hacienda">Ingresar Haciendas</a> </li>  </ul>  --> 
                                    &nbsp;&nbsp;
                                </div>


                                <div class="btn-group"> <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown">Establos <span class="caret"></span></button>

                                    <ul class="dropdown-menu"><li><a class="btn btn- btn-info alert-info"  href="../controller/controller.php?opcion=listar_establos">Listar Establos</a> </li>   
<!--                                        <li><a class="btn btn-info alert-info" href="../controller/controller.php?opcion=ingresar_establo">Ingresar Establos</a> </li>  </ul>   -->
                                    &nbsp;&nbsp;
                                </div>   


                                <div class="btn-group"> <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown">Bovinos <span class="caret"></span></button>

                                    <ul class="dropdown-menu" >
                                        <li ><a class="btn btn- btn-info alert-info   " href="../controller/controller.php?opcion=listar_bovinos">Listar Bovinos</a> </li>   
<!--                                        <li><a class="btn btn-info alert-info" href="../controller/controller.php?opcion=crear_bovino">Ingresar Bovino</a> </li>    -->
                                        <li ><a class="btn btn- btn-info alert-info   " href="../controller/controller.php?opcion=listar_razas">Listar Razas</a> </li>
<!--                                        <li><a class="btn btn-info alert-info" href="../controller/controller.php?opcion=crear_raza">Ingresar Raza</a> </li>  -->
                                    </ul>    

                                    &nbsp;&nbsp;
                                </div>


                                <div class="btn-group"> <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown">Alimento <span class="caret"></span></button>

                                    <ul class="dropdown-menu" ><li ><a class="btn btn- btn-info alert-info   " href="../controller/controller.php?opcion=listar_alimentos">Listar Alimentos</a> </li>   
<!--                                        <li><a class="btn btn-info alert-info" href="../controller/controller.php?opcion=crear_alimento">Ingresar Alimento</a> </li>  </ul>   -->
                                    &nbsp;&nbsp;
                                </div>


                                <div class="btn-group"> <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown">Medicamento <span class="caret"></span></button>

                                    <ul class="dropdown-menu" ><li ><a class="btn btn- btn-info alert-info   " href="../controller/controller.php?opcion=listar_medicamentos">Listar medicamentos</a> </li>   
<!--                                        <li><a class="btn btn-info alert-info" href="../controller/controller.php?opcion=crear_medicamento">Ingresar Medicamento</a> </li>  </ul>        -->
                                </div> &nbsp;&nbsp; 



                                <div class="btn-group">  <button class="btn btn-primary " type="button" data-toggle="dropdown">Registros
                                        <span class="caret"></span></button>

                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu">
                                            <a class="test" tabindex="-1" href="#">R. Alimento <span class="caret"></span></a>

                                            <ul class="dropdown-menu">
<!--                                                <li><a tabindex="-1" href="../controller/controller.php?opcion=nueva_factura">Ingresar Alimentos</a>-->


                                                </li>

                                                <li><a tabindex="-1" href="../controller/controller.php?opcion=listar_facturas">Listar Alimentos</a></li>

                                            </ul>

                                            <a class="test" tabindex="-1" href="#">R. Produccion <span class="caret"></span></a> 

                                            <ul class="dropdown-menu">
<!--                                                <li><a tabindex="-1" href="../controller/controller.php?opcion=nuevo_registro">Ingresar Produccion</a></li>-->
                                                <li><a tabindex="-1" href="../controller/controller.php?opcion=listar_registros">Listar Produccion</a></li>
                                            </ul>

<!--                                            <a class="test" tabindex="-1" href="#">R. Ficha Medica<span class="caret"></span></a>

                                            <ul class="dropdown-menu">
                                                <li><a tabindex="-1" href="#">Registrar Ficha </a></li>
                                                <li><a tabindex="-1" href="#">Listar Fichas</a></li>
                                            </ul>-->
                                        </li>
                                    </ul> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <div class="btn btn top-right" >
                                    <a class="btn btn-danger alert-danger  " href="../controller/controller.php?opcion=salir">Salir</a>
                                </div> 
                            </ul>    

                        </div>               
                    </div>
                     
                </div>
                
                 <!-- CODIGO PARA INSERTAR  UN SLIDER-->
               <div class="container">
                    <div class="jumbotron">
                <div class="active">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- aqui insertaremos el slider -->
                            <div id="carousel1" class="carousel slide" data-ride="carousel">
                                <!-- Indicatodores -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel1" data-slide-to="1" class="active"></li>
                                    <li data-target="#carousel1" data-slide-to="1"></li>
                                    <li data-target="#carousel1" data-slide-to="1"></li>
                                </ol>
                                <!-- Contenedor de las imagenes -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item">
                                        <img src="images/hacienda3.jpg" height="200" width="1150" alt="Imagen 1">
                                    </div>
                                    <div class="item active">
                                        <img src="images/bannerHacienda.jpg" height="200" width="1150" alt="Imagen 2">
                                    </div>
                                    <div class="item">
                                        <img src="images/bannerEstablo.jpg" alt="Imagen 3" height="200" width="1150"  >
                                    </div>
                                    <div class="item">
                                        <img src="images/establo3.jpg" alt="Imagen 4"  height="200" width="1150">
                                    </div>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Anterior</span>
                                </a>
                                <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Siguiente</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
                    </div>

                <div class="container">
                    <div class="jumbotron">
                <center><h3> MISION</h3>
                        <h4>Nos especializamos en servicios ganaderos ofreciendo leche pura en nuestro sector.<br> 
                            Asumimos el compromiso de crecer con nuestros colaboradores, <br> creando valor agregado a nuestros accionistas 
                            generando un ambiente favorable para el desarrollo de las actividades <br> de nuestros clientes y trabajar por el 
                            bienestar de la comunidad 
                        </h4></center><br><br>
                <center>
                        <h3>VISION</h3>  
                        <h4>
                            Para el 2021 la Hacienda Ganadera "Santa Rosa" ,sera la empresa líder en la industrialización ganadera,<br> 
                            desarrollando actividades con calidad y excelencia, utilizando la mejor tecnología y talento humano,<br>
                            en beneficio de la comunidad y en armonía con el medio ambiente. 
                        </h4>
                    </center> <br><br>  
                 <center>
                        <h3>VALORES</h3>  
                        <h4>
                            COMPROMISO: Aceptamos el reto con el desarrollo empresarial y comunitario.<br> 
                            ENTUSIASMO: Trabajamos con amor y alegría para el logro de objetivos comunes.<br>
                            NOBLEZA: Procedemos con humildad y sencillez.<br>
                            TRANSPARENCIA: Actuamos siempre con integridad y honestidad.<br>
                            RESPETO: Exaltamos el trato digno con nuestro entorno.<br>
                            AMABILIDAD: Tratamos con reconocimiento y decoro a los demás.<br>
                            LEALTAD: Somos fieles a los principios que fundamentan nuestra actividad. 
                        </h4>
                 </center>
                       </div>               
                    </div>
                   <!-- www.TuTiempo.net - Ancho:454px - Alto:91px -->
<center><div id="TT_vBJEE11kkA1B28hAjfuDjjzzzWaALf22Ld1YkZCIKkjoG5Gom">Pronóstico de Tutiempo.net</div>
            <script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_vBJEE11kkA1B28hAjfuDjjzzzWaALf22Ld1YkZCIKkjoG5Gom"></script></center>
                <BR>
               
                <script>
                    $(document).ready(function() {
                        $('.dropdown-submenu a.test').on("click", function(e) {
                            $(this).next('ul').toggle();
                            e.stopPropagation();
                            e.preventDefault();
                        });
                    });
                </script>
                <script src="jquery.min.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>
            <left>       
                <font face="Arial" size="3" color="black">Todos los derechos reservados</font>
            </left> 
        </body>
        </html>
        //<?php
    }
}
?>
