<?php
include_once 'Database.php';
include_once 'Bovino.php';
include_once 'ProduccionCab.php';
include_once 'ProduccionDet.php';
include_once 'Alimento.php';
include_once 'CrudModel.php';
/**
 * Clase que implementa la logica de facturacion.
 *
 * @author Jose
 */
class ProduccionModel {    
    public function getRegistros(){
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from produccion_cab order by COD_REGISTRO";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $registro = new ProduccionCab();
            $registro->setCodigoRegistro($res['COD_REGISTRO']);
            $registro->setEstado($res['ESTADO']);
            $registro->setFecha($res['FECHA']);
            $registro->setTotal($res['TOTAL_PROD']);
            $registro->setTotalIngresos($res['TOTAL_INGRESO']);
            array_push($listado, $registro);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
    /**
     * Funcion que adiciona un nuevo producto en los detalles de una factura. La lista
     * de detalles se encuentra en memoria.
     * @param type $listaFacturaDet Lista de detalles de factura.
     * @param type $idProducto Codigo del producto.
     * @param type $cantidad La cantidad de compra.
     * @throws Exception
     * @return array
     */
    public function adicionarRegistro($listaProduccionDet,$codigoBovino,$seccion,$numLitros,$horaOrdeno){
         if($numLitros<=0){
            throw new Exception ("La cantidad debe ser mayor a cero.");
        }
        //buscamos el producto:
        $crudModel=new CrudModel();
        $bovino=$crudModel->getBovino($codigoBovino);
        //creamos un nuevo detalle FacturaDet:
        $ProduccionDet=new ProduccionDet();
        $ProduccionDet->setCodigoBovino($bovino->getCodigoBovino());
        $ProduccionDet->setNombreBovino($bovino->getNombreBovino());
        $ProduccionDet->setSeccionOrdeno($seccion);
        $ProduccionDet->setNumeroLitros($numLitros);
        $ProduccionDet->setHoraOrdeno($horaOrdeno);
        
        //adicionamos el nuevo detalle al array en memoria:
        if(!isset($listaProduccionDet)){
            $listaProduccionDet=array();
        }
        array_push($listaProduccionDet,$ProduccionDet);
        return $listaProduccionDet;
    }
    
    public function eliminarRegistro($listaProduccionDet,$codigoBovino){
        //buscamos el producto:
        $cont=0;
        foreach ($listaProduccionDet as $det) {
            if($det->getCodigoBovino()==$codigoBovino){
                unset($listaProduccionDet[$cont]);
                //reindexamos el array para eliminar el lugar vacio:
                $listaProduccionDet=  array_values($listaProduccionDet);
                break;
            }
            $cont++;
        } 
        return $listaProduccionDet;
    }
    
    public function ultimoNumeroFactura(){
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select max(COD_REGISTRO) numero from produccion_cab";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        //obtenemos el registro especifico:
        $res=$consulta->fetch(PDO::FETCH_ASSOC);
        $numero=$res['numero'];
        Database::disconnect();
        //retornamos el numero encontrado:
        if(!isset($numero))
            return 0;
        return $numero;
    }
      
    public function calcularTotal($listaProduccionDet){
        if(!isset($listaProduccionDet)){
            return 0;
        }
        $total=0;
        foreach ($listaProduccionDet as $produccionDet) {
         
                $total+=$produccionDet->getNumeroLitros();
            
        }
        return $total;
    }
    
    
     public function calcularTotalngresos($listaProduccionDet){
         
         $precioLeche=0.40;
        if(!isset($listaProduccionDet)){
            return 0;
        }
        $totalIn=0;
        foreach ($listaProduccionDet as $produccionDet) {
         
                $totalIn+=$produccionDet->getNumeroLitros()*$precioLeche;
            
        }
        return $totalIn;
    }
 
    
    public function guardarRegistro($listaProduccionDet){
        if(!isset($listaProduccionDet)){
            throw new Exception("Debe por lo menos registrar un registro.");
        }
        if(count($listaProduccionDet)==0){
            throw new Exception("Debe por lo menos registrar un registro.");
        }       
        //obtenemos los datos completos del cliente:
        //$crudModel=new CrudModel();
        //$cliente=$crudModel->getCliente($cedula);
        //creamos la nueva factura:
        $produccionCab = new ProduccionCab();
        $produccionCab->setEstado("S");
        $produccionCab->setFecha(date('Y-m-d'));
        $produccionCab->setTotal($this->calcularTotal($listaProduccionDet));
        $produccionCab->setTotalIngresos($this->calcularTotalngresos($listaProduccionDet));
        //obtenemos el siguiente numero de factura:
        $produccionCab->setCodigoRegistro($this->ultimoNumeroFactura()+1);
        //guardar la cabecera:
        $pdo = Database::connect();
        $sql = "insert into produccion_cab(COD_REGISTRO,FECHA,ESTADO,TOTAL_PROD,TOTAL_INGRESO) values(?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($produccionCab->getCodigoRegistro(),                                    
                                     $produccionCab->getFecha(),                    
                                     $produccionCab->getEstado(),                                    
                                     $produccionCab->getTotal(),
                                     $produccionCab->getTotalIngresos()));
            //guardamos los detalles:
            foreach ($listaProduccionDet as $det){
                $sql = "insert into produccion_det(COD_BOVINO,COD_REGISTRO,SECC_ORDENO,NUM_LITROS,HORA_ORDENO) values(?,?,?,?,?)";
                $consulta = $pdo->prepare($sql);
                //en cada detalle asignamos el numero de factura padre:
                $consulta->execute(array($produccionCab->getCodigoRegistro(),
                                     $det->getCodigoBovino(),
                                     $det->getSeccionOrdeno(),
                                     $det->getNumeroLitros(),
                                     $det->getHoraOrdeno()));
            }
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
        return $produccionCab;
    }
    
}
