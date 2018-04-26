<?php
include_once 'Database.php';
include_once 'Bovino.php';
include_once 'Alimento.php';
include_once 'FacturaCab.php';
include_once 'FacturaDet.php';
include_once 'CrudModel.php';
/**
 * Clase que implementa la logica de facturacion.
 *
 * @author mrea
 */
class FacturaModel {
    public function getFacturas(){
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from factura_cab order by id_factura_cab desc";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $factura = new FacturaCab();
            $factura->setIdFacturaCab($res['id_factura_cab']);
            $factura->setFecha($res['fecha']);
//            $factura->setCedula($res['cedula']);
            $factura->setEstado($res['estado']);
//            $factura->setBaseImponible($res['base_imponible']);
//            $factura->setBaseNoImponible($res['base_no_imponible']);
//            $factura->setValorIva($res['valor_iva']);
            $factura->setTotal($res['total']);
            array_push($listado, $factura);
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
    public function adicionarDetalle($listaFacturaDet,$codigoBovino,$codigoAlimento,$cantidad){
        if($cantidad<=0){
            throw new Exception ("La cantidad debe ser mayor a cero.");
        }
        //buscamos el producto:
        $crudModel=new CrudModel();
        $aliment=$crudModel->getAlimento($codigoAlimento);
        $bovino=$crudModel->getBovino($codigoBovino);
        $precio=$crudModel->getPrecioUnidad($codigoAlimento);
        //creamos un nuevo detalle FacturaDet:
        $facturaDet=new FacturaDet();
        $facturaDet->setCodigoBovino($bovino->getCodigoBovino());
        $facturaDet->setNombreBovino($bovino->getNombreBovino());
        //$facturaDet->setCodigoBovino($alimento->getCodigoBovino());
        $facturaDet->setNombreAlimento($aliment->getNombreAlimento());        
        $facturaDet->setCantidad($cantidad);
        $facturaDet->setPrecioUnidad($cantidad*$crudModel->getPrecioUnidad($codigoAlimento));
        
        //adicionamos el nuevo detalle al array en memoria:
        if(!isset($listaFacturaDet)){
            $listaFacturaDet=array();
        }
        array_push($listaFacturaDet,$facturaDet);
        return $listaFacturaDet;
    }
    
    public function eliminarDetalle($listaFacturaDet,$codigoAlimento){
        //buscamos el producto:
        $cont=0;
        foreach ($listaFacturaDet as $det) {
            if($det->getCodigoAlimento()==$codigoAlimento){
                unset($listaFacturaDet[$cont]);
                //reindexamos el array para eliminar el lugar vacio:
                $listaFacturaDet=  array_values($listaFacturaDet);
                break;
            }
            $cont++;
        }
        return $listaFacturaDet;
    }
   
  
    public function calcularTotal($listaFacturaDet){
        if(!isset($listaFacturaDet)){
            return 0;
        }
        $total=0;
        foreach ($listaFacturaDet as $facturaDet) {
         
                $total+=$facturaDet->getPrecioUnidad();
            
        }
        return $total;
    } 
    
    public function ultimoNumeroFactura(){
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select max(id_factura_cab) numero from factura_cab";
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
    
    public function guardarFactura($listaFacturaDet){
        if(!isset($listaFacturaDet)){
            throw new Exception("Debe por lo menos registrar un registro.");
        }
        if(count($listaFacturaDet)==0){
            throw new Exception("Debe por lo menos registrar un registro.");
        }       
        //obtenemos los datos completos del cliente:
        //$crudModel=new CrudModel();
        //$cliente=$crudModel->getCliente($cedula);
        //creamos la nueva factura:
        $facturaCab = new FacturaCab();
        $facturaCab->setEstado("S");
        $facturaCab->setFecha(date('Y-m-d'));
        $facturaCab->setTotal($this->calcularTotal($listaFacturaDet));
        //$facturaCab->setTotalIngresos($this->calcularTotalngresos($listaFacturaDet));
        //obtenemos el siguiente numero de factura:
        $facturaCab->setIdFacturaCab($this->ultimoNumeroFactura()+1);
        //guardar la cabecera:
        $pdo = Database::connect();
        $sql = "insert into factura_cab(id_factura_cab,fecha,estado,total) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($facturaCab->getIdFacturaCab(),
                                     $facturaCab->getFecha(),                   
                                     $facturaCab->getEstado(),                                    
                                     $facturaCab->getTotal()));
            //guardamos los detalles:
            foreach ($listaFacturaDet as $det){
                $sql = "insert into factura_det(COD_BOVINO,NOMBRE_B,NOM_ALIMENTO,cantidad,subtotal) values(?,?,?,?,?)";
                $consulta = $pdo->prepare($sql);
                //en cada detalle asignamos el numero de factura padre:
                $consulta->execute(array($facturaCab->getIdFacturaCab(),
                                     $det->getCodigoBovino(),
                                     $det->getNombreBovino(),
                                     $det->getNombreAlimento(),
                                     $det->getCantidad(),
                                     $det->getSubtotal()));
            }
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
        return $facturaCab;
    }
    
}
