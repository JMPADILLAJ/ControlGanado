<?php

///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////
require_once '../model/CrudModel.php';
require_once '../model/FacturaModel.php';
require_once '../model/ProduccionModel.php';
session_start();
//instanciamos los objetos de negocio:
$crudModel = new CrudModel();
$facturaModel= new FacturaModel();
$produccionModel= new ProduccionModel();
//recibimos la opcion desde la vista:
$opcion = $_REQUEST['opcion'];
$mensajeError = "";
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensajeError']);
switch ($opcion) {

    case "login":
        $usuario = $_REQUEST['admin'];
        $contra = $_REQUEST['contra'];
        if ($usuario == 'admin' && $contra == '1234') {
            $_SESSION['entrada'] = serialize(true);
            header('Location: ../view/index.php');
        } else if ($usuario == 'usuario' && $contra == '1234') {
            $_SESSION['entrada'] = serialize(true);
            header('Location: ../view/index2.php');
        }else{
            header('Location: ../view/login.php');
        }
        break;

    case "salir":
        session_destroy();
        header('Location: ../view/login.php');
        break;

    case "listar_bovinos":
        //obtenemos la lista:
        $listaBovinos = $crudModel->getBovinos();
        //y los guardamos en sesion:
        $_SESSION['listaBovinos'] = serialize($listaBovinos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/listarBovinos.php');
        break;

    case "crear_bovino":
        //obtenemos los parametros del formulario:
        $codigoBovino = $_REQUEST['COD_BOVINO'];
        $codigoEstablo=$_REQUEST['COD_ESTABLO'];
        $codigoRaza=$_REQUEST['COD_RAZA'];
        $nombreBovino = $_REQUEST['NOMBRE_B'];
        $fechaNacimiento = $_REQUEST['FECHA_NAC'];
        $tipoAdquisicion = $_REQUEST['TIPO_ADQ'];
        $genero = $_REQUEST['GENERO_B'];
        $bovinoActivo = $_REQUEST['BOVINO_ACTIVO'];
        $colorBovino = $_REQUEST['COLOR_B'];
        //creamos el nuevo registro:
        $crudModel->insertarBovino($codigoBovino, $codigoEstablo,$codigoRaza,$nombreBovino, $fechaNacimiento, $tipoAdquisicion, $genero, $bovinoActivo, $colorBovino);
        //actualizamos el listado:
        $listaBovinos = $crudModel->getBovinos();
        //y los guardamos en sesion:
        $_SESSION['listaBovinos'] = serialize($listaBovinos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/bovinos.php');
        break;

    case "editar_bovino":
        $codigoBovino = $_REQUEST['COD_BOVINO'];
        $bovino = $crudModel->getBovino($codigoBovino);
        $_SESSION['bovino'] = $bovino;
        header('Location: ../view/actualizarBovinos.php');
        break;

    case "actualizar_bovino":
        $codigoBovino = $_REQUEST['COD_BOVINO'];
        $nombreBovino = $_REQUEST['NOMBRE_B'];
        $fechaNacimiento = $_REQUEST['FECHA_NAC'];
        $tipoAdquisicion = $_REQUEST['TIPO_ADQ'];
        $genero = $_REQUEST['GENERO_B'];
        $bovinoActivo = $_REQUEST['BOVINO_ACTIVO'];
        $colorBovino = $_REQUEST['COLOR_B'];
        $crudModel->actualizarBovino($codigoBovino, $nombreBovino, $fechaNacimiento, $tipoAdquisicion, $genero, $bovinoActivo
                , $colorBovino);
        $listaBovinos = $crudModel->getBovinos();
        $_SESSION['listaBovinos'] = serialize($listaBovinos);
        header('Location: ../view/actualizarBovinos.php');
        break;
    
    case "eliminar_bovino":
        $codigoBovino = $_REQUEST['COD_BOVINO'];
        $crudModel->eliminarBovino($codigoBovino);
        $listaBovinos = $crudModel->getBovinos();
        $_SESSION['listaBovinos'] = serialize($listaBovinos);
        header('Location: ../view/listarBovinos.php');
        break;



    // OPCIONES PARA EL ALIMENTO
    case "listar_alimentos":
        $listaAlimentos = $crudModel->getAlimentos();
        $_SESSION['listaAlimentos'] = serialize($listaAlimentos);
        header('Location: ../view/listarAlimentos.php');
        break;

    case "crear_alimento":
        $codigoAlimento = $_REQUEST['COD_ALIMENTO'];
        $nombreAlimento = $_REQUEST['NOM_ALIMENTO'];
        $descripcionAlimento = $_REQUEST['DESCRI_ALIMENTO'];
        //$cantidadAlimento = $_REQUEST['CANT_ALIMENTO'];
        $precioUnidad = $_REQUEST['PREC_X_U_MEDIDA'];
        $unidadMedida = $_REQUEST['UNIDAD_DE_MEDIDA'];
        $crudModel->insertarAlimento($codigoAlimento, $nombreAlimento, $descripcionAlimento,  $precioUnidad, $unidadMedida);
        $listaAlimentos = $crudModel->getAlimentos();
        $_SESSION['listaAlimentos'] = serialize($listaAlimentos);
        header('Location: ../view/alimentos.php');
        break;

    case "editar_alimento":
        $codigoAlimento = $_REQUEST['COD_ALIMENTO'];
        $alimento = $crudModel->getAlimento($codigoAlimento);
        $_SESSION['alimento'] = $alimento;
        header('Location: ../view/actualizarAlimentos.php');
        break;

    case "actualizar_alimento":
        $codigoAlimento = $_REQUEST['COD_ALIMENTO'];
        $nombreAlimento = $_REQUEST['NOM_ALIMENTO'];
        $descripcionAlimento = $_REQUEST['DESCRI_ALIMENTO'];
        //$cantidadAlimento = $_REQUEST['CANT_ALIMENTO'];
        $precioUnidad = $_REQUEST['PREC_X_U_MEDIDA'];
        $unidadMedida = $_REQUEST['UNIDAD_DE_MEDIDA'];
        $crudModel->actualizarAlimento($codigoAlimento, $nombreAlimento, $descripcionAlimento, $precioUnidad
                , $unidadMedida);
        $listaAlimentos = $crudModel->getAlimentos();
        $_SESSION['listaAlimentos'] = serialize($listaAlimentos);
        header('Location: ../view/actualizarAlimentos.php');
        break;
    
    case "eliminar_alimento":
        $codigoAlimento = $_REQUEST['COD_ALIMENTO'];
        $crudModel->eliminarAlimento($codigoAlimento);
        $listaAlimentos = $crudModel->getAlimentos();
        $_SESSION['listaAlimentos'] = serialize($listaAlimentos);
        header('Location: ../view/listarAlimentos.php');
        break;

// OPCIONES PARA LAS RAZAs
    case "listar_razas":
        $listaRazas = $crudModel->getRazas();
        $_SESSION['listaRazas'] = serialize($listaRazas);
        header('Location: ../view/listarRazas.php');
        break;

    case "crear_raza":
        $codigoRaza = $_REQUEST['COD_RAZA'];
        $nombreRaza = $_REQUEST['NOMBRE_RAZA'];
        $descripcionRaza = $_REQUEST['DESCRP_RAZA'];
        $crudModel->insertarRaza($codigoRaza, $nombreRaza, $descripcionRaza);
        $listaRazas = $crudModel->getRazas();
        $_SESSION['listaRazas'] = serialize($listaRazas);
        header('Location: ../view/razas.php');
        break;

    case "editar_raza":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $codigoRaza=$_REQUEST['COD_RAZA'];
        $raza=$crudModel->getRaza($codigoRaza);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['raza']=  serialize($raza);
        header('Location: ../view/actualizarRazas.php');
        break;

    case "actualizar_raza":
        $codigoRaza = $_REQUEST['COD_RAZA'];
        $nombreRaza = $_REQUEST['NOMBRE_RAZA'];
        $descripcionRaza= $_REQUEST['DESCRP_RAZA'];
        $crudModel->actualizarRaza($codigoRaza, $nombreRaza, $descripcionRaza);
        $listaRazas = $crudModel->getRazas();
        $_SESSION['listaRazas'] = serialize($listaRazas);
        header('Location: ../view/listarRazas.php');
        break;
 
    case "eliminar_raza":
        $codigoRaza = $_REQUEST['COD_RAZA'];
        $crudModel->eliminarRaza($codigoRaza);
        $listaRazas = $crudModel->getRazas();
        $_SESSION['listaRazas'] = serialize($listaRazas);
        header('Location: ../view/listarRazas.php');
        break;


    //OPCIONES PARA LOS ESTABLOS

    case "listar_establos":
        //obtenemos la lista:
        $listaEstablos = $crudModel->getEstablos();
        //y los guardamos en sesion:
        $_SESSION['listaEstablos'] = serialize($listaEstablos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/listarEstablos.php');
        break;

    case "ingresar_establo":
        //obtenemos los parametros del formulario:$codEstablo, $codHacienda, $capMaxima, $numAnimales
        $codigoEstablo = $_REQUEST['codEstablo'];
        $codHacienda = $_REQUEST['codHacienda'];
        $capMaxima = $_REQUEST['capMaxima'];
        $numAnimales = $_REQUEST['numAnimales'];
        //creamos el nuevo registro:
        $crudModel->insertarEstablo($codigoEstablo, $codHacienda, $capMaxima, $numAnimales);
        //actualizamos el listado:
        $listaEstablos = $crudModel->getEstablos();
        //y los guardamos en sesion:
        $_SESSION['listaEstablos'] = serialize($listaEstablos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/establos.php');
        break;

     case "editar_establo":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $codEstablo=$_REQUEST['codEstablo'];
        $establo=$crudModel->getEstablo($codEstablo);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['establo']=  serialize($establo);
        header('Location: ../view/actualizarEst.php');
        break;

    case "actualizar_establo":
        //obtenemos los parametros del formulario:
        $codEstablo = $_REQUEST['codEstablo'];
        $codHacienda = $_REQUEST['codHacienda'];
        $capMaxima = $_REQUEST['capMaxima'];
        $numAnimales = $_REQUEST['numAnimales'];

        //actualizamos la factura:
        $crudModel->actualizarEstablo($codEstablo, $codHacienda, $capMaxima, $numAnimales);
        //actualizamos lista de facturas:
        $listado = $crudModel->getEstablos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/listarEstablos.php');
        break;
    
    case "eliminarEst":
  //obtenemos los parametros del formulario:
         $codEstablo=$_REQUEST['codEstablo'];     
        //actualizamos la factura:
         $crudModel->eliminarEstablo($codEstablo);
        //actualizamos lista de facturas:
        $listado = $crudModel->getEstablos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/listarEstablos.php');
        
break;


    //OPCIONES PARA LAS HACIENDAS

    case "listar_haciendas":
        //obtenemos la lista:
        $listaHaciendas = $crudModel->getHaciendas();
        //y los guardamos en sesion:
        $_SESSION['listaHaciendas'] = serialize($listaHaciendas);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/listarHaciendas.php');
        break;

    case "crear_hacienda":
        // $codigoHacienda, $nombreHacienda, $provinciaHacienda, $cantonHacienda, $parroquiaHacienda, $direccionHacienda, $telefonoHacienda
        $codigoHacienda = $_REQUEST['codigoHacienda'];
        $nombreHacienda = $_REQUEST['nombreHacienda'];
        $provinciaHacienda = $_REQUEST['provinciaHacienda'];
        $cantonHacienda = $_REQUEST['cantonHacienda'];
        $parroquiaHacienda = $_REQUEST['parroquiaHacienda'];
        $direccionHacienda = $_REQUEST['direccionHacienda'];
        $telefonoHacienda = $_REQUEST['telefonoHacienda'];
        //creamos el nuevo registro:
        $crudModel->insertarHacienda($codigoHacienda, $nombreHacienda, $provinciaHacienda, $cantonHacienda, $parroquiaHacienda, $direccionHacienda, $telefonoHacienda);
        //actualizamos el listado:
        $listaHaciendas = $crudModel->getHaciendas();
        //y los guardamos en sesion:
        $_SESSION['listaHaciendas'] = serialize($listaHaciendas);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/haciendas.php');
        break;

    
     case "editar_hacienda":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $codHacienda=$_REQUEST['codHacienda'];
        $hacienda=$crudModel->getHacienda($codHacienda);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['hacienda']=  serialize($hacienda);
        header('Location: ../view/actualizarHac.php');
        break;
    
    
    
    case "actualizar_hacienda":
        //obtenemos los parametros del formulario:
        $codHacienda = $_REQUEST['codHacienda'];
        $nombreHacienda = $_REQUEST['nombreHacienda'];
        $provinciaHacienda = $_REQUEST['provinciaHacienda'];
        $cantonHacienda = $_REQUEST['cantonHacienda'];
        $parroquiaHacienda = $_REQUEST['parroquiaHacienda'];
        $direccionHacienda = $_REQUEST['direccionHacienda'];
        $telefonoHacienda = $_REQUEST['telefonoHacienda'];

        //actualizamos la factura:
        $crudModel->actualizarHacienda($codHacienda, $nombreHacienda, $provinciaHacienda, $cantonHacienda, $parroquiaHacienda, $direccionHacienda, $telefonoHacienda);
        //actualizamos lista de facturas:
        $listado = $crudModel->getHaciendas();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/haciendas.php');
        break;

     case "eliminarHac":
  //obtenemos los parametros del formulario:
         $codHacienda=$_REQUEST['codHacienda'];
       
        
        //actualizamos la factura:
        $crudModel->eliminarHacienda($codHacienda);
        //actualizamos lista de facturas:
        $listado = $crudModel->getHaciendas();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/listarHaciendas.php');
        
break;

    //OPCIONES PARA LA PRODUCCION DE LECHE

    case "listar_produccion":
        //obtenemos la lista:
        $listaProducciones = $crudModel->getProducciones();
        //y los guardamos en sesion:
        $_SESSION['listaProducciones'] = serialize($listaProducciones);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/listarProduccionLeche.php');
        break;

    case "crear_produccion":
        //$codigoProduccion, $codigoBovino, $fechaordeno, $seccionOrdeno, $numeroLitros, $horaOrdeno
        $codigoProduccion = $_REQUEST['codigoProduccion'];
        $codigoBovino = $_REQUEST['codigoBovino'];
        $fechaordeno = $_REQUEST['fechaordeno'];
        $seccionOrdeno = $_REQUEST['seccionOrdeno'];
        $numeroLitros = $_REQUEST['numeroLitros'];
        $horaOrdeno = $_REQUEST['horaOrdeno'];

        //creamos el nuevo registro:
        $crudModel->insertarProduccion($codigoProduccion, $codigoBovino, $fechaordeno, $seccionOrdeno, $numeroLitros, $horaOrdeno);
        //actualizamos el listado:
        $listaProducciones = $crudModel->getProducciones();
        //y los guardamos en sesion:
        $_SESSION['listaProducciones'] = serialize($listaProducciones);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/produccionLeche.php');
        break;

    case "editar_produccion":
        //obtenemos los parametros del formulario:
        $codigoProduccion = $_REQUEST['codigoProduccion'];
        $codigoBovino = $_REQUEST['codigoBovino'];
        $fechaordeno = $_REQUEST['fechaordeno'];
        $seccionOrdeno = $_REQUEST['seccionOrdeno'];
        $numeroLitros = $_REQUEST['numeroLitros'];
        $horaOrdeno = $_REQUEST['horaOrdeno'];

        //actualizamos la factura:
        $crudModel->actualizarProduccion($codigoProduccion, $codigoBovino, $fechaordeno, $seccionOrdeno, $numeroLitros, $horaOrdeno);
        //actualizamos lista de facturas:
        $listado = $crudModel->getProducciones();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/produccionLeche.php');
        break;
    
    //crear medicamento
    case "crear_medicamento":
        //obtenemos los parametros del formulario:
        $codigoMedicamento = $_REQUEST['COD_MED'];
        $nombreMedicamento = $_REQUEST['NOMBRE_MED'];
        $fechaMedicamentoo = $_REQUEST['FECHA_MED'];
        $contradiccionesMedicamento = $_REQUEST['CONTRADICCIONES_MED'];
        $dosisMedicamento = $_REQUEST['DOSIS_MED'];
        $precioMedicamento = $_REQUEST['PRECIO_MED'];
        $descripcionMedicamento = $_REQUEST['DESCRIPCION_DEL_MEDICAMENTO'];
        //creamos el nuevo registro:
        $crudModel->insertarMedicamento($codigoMedicamento, $nombreMedicamento, $fechaMedicamentoo, $contradiccionesMedicamento, $dosisMedicamento, $precioMedicamento, $descripcionMedicamento);
        //actualizamos el listado:
        $listaMedicamentos = $crudModel->getMedicamentos();
        //y los guardamos en sesion:
        $_SESSION['listaMedicamentos'] = serialize($listaMedicamentos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/medicamento.php');
        break;

    case "listar_medicamentos":
        //obtenemos la lista:
        $listaMedicamentos = $crudModel->getMedicamentos();
        //y los guardamos en sesion:
        $_SESSION['listaMedicamentos'] = serialize($listaMedicamentos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/listarMedicamentos.php');
        break;

    case "eliminar_medicamento":
//obtenemos el codigo del producto a eliminar:
        $codigoMedicamento = $_REQUEST['COD_MED'];
//eliminamos el producto:
        $crudModel->eliminarMedicamento($codigoMedicamento);
//actualizamos la lista de productos para grabar en sesion:
        $medicamento = $crudModel->getMedicamentos();
        $_SESSION['listaMedicamentos'] = serialize($medicamento);
       header('Location: ../view/medicamento.php');
        break;
    
    case "cargar_medicamento":
//para permitirle actualizar un producto al usuario primero
//obtenemos los datos completos de ese producto:
        $codigoMedicamento = $_REQUEST['COD_MED'];
        $medicamento = $crudModel->getMedicamento($codigoMedicamento);
//guardamos en sesion el producto para posteriormente visualizarlo
//en un formulario para permitirle al usuario editar los valores:
        $_SESSION['listaMedicamentos'] = $medicamento;
        header('Location: ../view/editar.php');
        break;
    
    case "editar_medicamento":
//obtenemos los datos modificados por el usuario:
        $codigoMedicamento = $_REQUEST['COD_MED'];
        $nombreMedicamento = $_REQUEST['NOMBRE_MED'];
        $fechaMedicamentoo = $_REQUEST['FECHA_MED'];
        $contradiccionesMedicamento = $_REQUEST['CONTRADICCIONES_MED'];
        $dosisMedicamento = $_REQUEST['DOSIS_MED'];
        $precioMedicamento = $_REQUEST['PRECIO_MED'];
        $descripcionMedicamento = $_REQUEST['DESCRIPCION_DEL_MEDICAMENTO'];
//actualizamos los datos del producto:
        $crudModel->actualizarMedicamento($codigoMedicamento, $nombreMedicamento, $fechaMedicamentoo, $contradiccionesMedicamento, $dosisMedicamento, $precioMedicamento, $descripcionMedicamento);
//actualizamos la lista de productos para grabar en sesion:
        $medicamento = $crudModel->getMedicamentos();
        $_SESSION['listaMedicamentos'] = serialize($medicamento);
        header('Location: ../view/medicamento.php');
        break;
    default:
    
    
    
    
        
        
        
    
    case "listar_facturas":
        //obtenemos la lista de facturas y subimos a sesion:
        $_SESSION['listaFacturas']=serialize($facturaModel->getFacturas());
        header('Location: ../view/facturas.php');
        break;
    case "nueva_factura":
        unset($_SESSION['listaFacturaDet']);
        header('Location: ../view/factura.php');
        break;
    
    case "adicionar_detalle":
        //obtenemos los parametros del formulario:
        $codigoBovino=$_REQUEST['COD_BOVINO'];
        $codigoAlimento=$_REQUEST['COD_ALIMENTO'];
        $cantidad=$_REQUEST['cantidad'];   
        if(!isset($_SESSION['listaFacturaDet'])){
            $listaFacturaDet=array();
        }else{
            $listaFacturaDet=unserialize($_SESSION['listaFacturaDet']);
        }
        try{
            $listaFacturaDet=$facturaModel->adicionarDetalle($listaFacturaDet, $codigoBovino,$codigoAlimento, $cantidad);
            $_SESSION['listaFacturaDet']=serialize($listaFacturaDet);
        }catch(Exception $e){
            $mensajeError=$e->getMessage();
            $_SESSION['mensajeError']=$mensajeError;
        }
        header('Location: ../view/factura.php');
        break;
        
     case "eliminar_detalle":
        //obtenemos los parametros del formulario:
        $codigoAlimento=$_REQUEST['COD_ALIMENTO'];
        $listaFacturaDet=unserialize($_SESSION['listaFacturaDet']);
        $listaFacturaDet=$facturaModel->eliminarDetalle($listaFacturaDet, $codigoAlimento);
        $_SESSION['listaFacturaDet']=serialize($listaFacturaDet);
        header('Location: ../view/factura.php');
        break;
        
        case "guardar_factura":
        //obtenemos los parametros del formulario:
        //$cedula=$_REQUEST['cedula'];
        if(isset($_SESSION['listaFacturaDet'])){
            $listaFacturaDet=unserialize($_SESSION['listaFacturaDet']);
            try {
                $facturaCab=$facturaModel->guardarFactura($listaFacturaDet);
                $_SESSION['facturaCab']=$facturaCab;
                header('Location: ../view/factura_reporte.php');
                break;
            } catch (Exception $e) {
                $mensajeError=$e->getMessage();
                $_SESSION['mensajeError']=$mensajeError;
            }
        }
        //actualizamos lista de facturas:
        //$listado = $gastosModel->getFacturas();
        //$_SESSION['listado'] = serialize($listado);
        header('Location: ../view/factura.php');
        break;
    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../view/index.php');
        
        
        
        
        
         
    //OPCIONES PARA LA PRODUCCION DE LECHE

case "adicionar_registro":
        //obtenemos los parametros del formulario:
        $codigoBovino=$_REQUEST['COD_BOVINO'];           
        $seccion=$_REQUEST['seccion'];
        $numLitros=$_REQUEST['numLitros'];
        $horaOrdeno=$_REQUEST['horaOrdeno'];
        if(!isset($_SESSION['listaProduccionDet'])){
            $listaProduccionDet=array();
        }else{
            $listaProduccionDet=unserialize($_SESSION['listaProduccionDet']);
        }
        try{    
            $listaProduccionDet=$produccionModel->adicionarRegistro($listaProduccionDet,$codigoBovino,$seccion,$numLitros,$horaOrdeno);
            $_SESSION['listaProduccionDet']=serialize($listaProduccionDet);
        }catch(Exception $e){
            $mensajeError=$e->getMessage();
            $_SESSION['mensajeError']=$mensajeError;
        }
        header('Location: ../view/produccionLeche1.php');
        break;
        
        
    case "eliminar_registro":
        //obtenemos los parametros del formulario:
        $codigoBovino=$_REQUEST['codigoBovino'];
        $listaProduccionDet=unserialize($_SESSION['listaProduccionDet']);
        $listaProduccionDet=$produccionModel->eliminarRegistro($listaProduccionDet, $codigoBovino);
        $_SESSION['listaProduccionDet']=serialize($listaProduccionDet);
        header('Location: ../view/produccionLeche1.php');
        break;

  case "listar_registros":
        //obtenemos la lista de facturas y subimos a sesion:
        $_SESSION['listaRegistros']=serialize($produccionModel->getRegistros());
        header('Location: ../view/listaProduccion.php');
        break;


case "nuevo_registro":
        unset($_SESSION['listaProduccionDet']);
        header('Location: ../view/produccionLeche1.php');
        break;

  case "guardar_registro":
        //obtenemos los parametros del formulario:
       
        if(isset($_SESSION['listaProduccionDet'])){
            $listaProduccionDet=unserialize($_SESSION['listaProduccionDet']);
            try {
                $produccionCab=$produccionModel->guardarRegistro($listaProduccionDet);
                $_SESSION['produccionCab']=$produccionCab;
                header('Location: ../view/reportePimprimir.php');
                break;
            } catch (Exception $e) {
                $mensajeError=$e->getMessage();
                $_SESSION['mensajeError']=$mensajeError;
            }
        }
        //actualizamos lista de facturas:
        //$listado = $gastosModel->getFacturas();
        //$_SESSION['listado'] = serialize($listado);
        header('Location: ../view/produccionLeche1.php');
        break;



case "guardar_registro2":
        //obtenemos los parametros del formulario:
        //$cedula=$_REQUEST['cedula'];
        if(isset($_SESSION['listaProduccionDet'])){
            $listaProduccionDet=unserialize($_SESSION['listaProduccionDet']);
            try {
                $produccionCab=$produccionModel->guardarRegistro($listaProduccionDet);
                $_SESSION['produccionCab']=$produccionCab;
                header('Location: ../view/reportePimprimir.php');
                break;
            } catch (Exception $e) {
                $mensajeError=$e->getMessage();
                $_SESSION['mensajeError']=$mensajeError;
            }
        }
        //actualizamos lista de facturas:
        //$listado = $gastosModel->getFacturas();
        //$_SESSION['listado'] = serialize($listado);
        header('Location: ../view/produccionLeche1.php');
        break;
    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../view/index.php');
        
}       