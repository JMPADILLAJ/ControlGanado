<?php

include_once 'Database.php';
include_once 'Bovino.php';
include_once 'Establo.php';
include_once 'Alimento.php';
include_once 'Medicamento.php';
include_once 'Hacienda.php';
include_once 'Raza.php';
include_once 'ProduccionLeche.php';

/**
 * @author Daniel
 */
class CrudModel {

    //////////////////////////
    //CLIENTES:
    //////////////////////////
    public function getBovinos() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from bovino";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $bovino = new Bovino($res['COD_BOVINO'],$res['COD_ESTABLO'],$res['COD_RAZA'], $res['NOMBRE_B'], $res['FECHA_NAC'], $res['TIPO_ADQ'], $res['GENERO_B'], $res['BOVINO_ACTIVO'], $res['COLOR_B']);
            array_push($listado, $bovino);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    public function getBovino($codigoBovino) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from bovino where COD_BOVINO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoBovino));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $bovino = new Bovino($res['COD_BOVINO'],$res['COD_ESTABLO'],$res['COD_RAZA'], $res['NOMBRE_B'], $res['FECHA_NAC'], $res['TIPO_ADQ'], $res['GENERO_B'], $res['BOVINO_ACTIVO'], $res['COLOR_B']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $bovino;
    }

    public function insertarBovino($codigoBovino, $codigoEstablo,$codigoRaza,$nombreBovino, $fechaNacimiento, $tipoAdquisicion, $genero, $bovinoActivo, $colorBovino) {
        $pdo = Database::connect();
        $sql = "insert into bovino(COD_BOVINO,COD_ESTABLO,COD_RAZA,NOMBRE_B,FECHA_NAC,TIPO_ADQ,GENERO_B,BOVINO_ACTIVO,COLOR_B) values(?,?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($codigoBovino, $codigoEstablo,$codigoRaza,$nombreBovino, $fechaNacimiento, $tipoAdquisicion, $genero, $bovinoActivo, $colorBovino));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarBovino($codigoBovino) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from bovino where COD_BOVINO=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($codigoBovino));
        Database::disconnect();
    }

    public function actualizarBovino($codigoBovino, $codigoEstablo,$codigoRaza,$nombreBovino, $fechaNacimiento, $tipoAdquisicion, $genero, $bovinoActivo, $colorBovino) {
        //Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update bovino set COD_ESTABLO=?,COD_RAZA=?,NOMBRE_B=?,FECHA_NAC=?,TIPO_ADQ=?,GENERO_B=?,BOVINO_ACTIVO=?,COLOR_B=? where COD_BOVINO=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($codigoBovino,$codigoEstablo,$codigoRaza, $nombreBovino, $fechaNacimiento, $tipoAdquisicion, $genero, $bovinoActivo, $colorBovino));
        Database::disconnect();
    }

    //////////////////////////
    //ALIMENTOS:
    //////////////////////////
    public function getAlimentos() {
        $pdo = Database::connect();
        $sql = "select * from alimento";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $alimento = new Alimento($res['COD_ALIMENTO'], $res['NOM_ALIMENTO'], $res['DESCRI_ALIMENTO'], $res['PREC_X_U_MEDIDA'], $res['UNIDAD_DE_MEDIDA']);
            array_push($listado, $alimento);
        }
        Database::disconnect();
        return $listado;
    }
    
     public function getPrecioUnidad($COD_ALIMENTO) {
        $pdo = Database::connect();
        $sql = "select * from alimento";
        $resultado = $pdo->query($sql);
        $listado = array();
        $p=0;
        foreach ($resultado as $res) {
            $alimento = new Alimento($res['COD_ALIMENTO'], $res['NOM_ALIMENTO'], $res['DESCRI_ALIMENTO'], $res['PREC_X_U_MEDIDA'], $res['UNIDAD_DE_MEDIDA']);
            array_push($listado, $alimento);
            if($COD_ALIMENTO==$res['COD_ALIMENTO']){
                $p=$res['PREC_X_U_MEDIDA'];
            }
                
        }
        Database::disconnect();
        return $p;
    }
    
//    public function getPrecioUnidad($COD_ALIMENTO) {
//        $pdo = Database::connect();
//        $sql = "select PREC_X_U_MEDIDA as PREC from alimento where COD_ALIMENTO=?";
//        $resultado = $pdo->prepare($sql);
//        $resultado->execute();
//        
//        $res=$resultado->fetch(PDO::FETCH_ASSOC);
//   
//        
//        Database::disconnect();
//        return $res['PREC']+5;
//        //return 5;
//    }

    public function getAlimento($codigoAlimento) {
        $pdo = Database::connect();
        $sql = "select * from alimento where COD_ALIMENTO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoAlimento));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $alimento = new Alimento($res['COD_ALIMENTO'], $res['NOM_ALIMENTO'], $res['DESCRI_ALIMENTO'], $res['PRECIO_X_U_MEDIDA'], $res['UNIDAD_DE_MEDIDA']);
        Database::disconnect();
        return $alimento;
    }

    public function insertarAlimento($codigoAlimento, $nombreAlimento, $descripcionAlimento, $precioUnidad, $unidadMedida) {
        $pdo = Database::connect();
        $sql = "insert into alimento(COD_ALIMENTO,NOM_ALIMENTO,DESCRI_ALIMENTO,PREC_X_U_MEDIDA,UNIDAD_DE_MEDIDA) values(?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($codigoAlimento, $nombreAlimento, $descripcionAlimento, $precioUnidad, $unidadMedida));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarAlimento($codigoAlimento) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from alimento where COD_ALIMENTO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoAlimento));
        Database::disconnect();
    }

    public function actualizarAlimento($codigoAlimento, $nombreAlimento, $descripcionAlimento, $precioUnidad
    , $unidadMedida) {
        $pdo = Database::connect();
        $sql = "update alimento set NOM_ALIMENTO=?,DESCRI_ALIMENTO=?,PREC_X_U_MEDIDA=?,UNIDAD_DE_MEDIDA=? where COD_ALIMENTO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoAlimento, $nombreAlimento, $descripcionAlimento, $precioUnidad
            , $unidadMedida));
        Database::disconnect();
    }

    //////////////////////////
    //RAZAS:
    //////////////////////////
    public function getRazas() {
        $pdo = Database::connect();
        $sql = "select * from raza";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $raza = new Raza($res['COD_RAZA'], $res['NOMBRE_RAZA'], $res['DESCRP_RAZA']);
            array_push($listado, $raza);
        }
        Database::disconnect();
        return $listado;
    }

    public function getRaza($codigoRaza) {
        $pdo = Database::connect();
        $sql = "select * from raza where COD_RAZA=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoRaza));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $raza = new Raza($res['COD_RAZA'], $res['NOMBRE_RAZA'], $res['DESCRP_RAZA']);
        Database::disconnect();
        return $raza;
    }

    public function insertarRaza($codigoRaza, $nombreRaza, $descripcionRaza) {
        $pdo = Database::connect();
        $sql = "insert into raza(COD_RAZA,NOMBRE_RAZA,DESCRP_RAZA) values(?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($codigoRaza, $nombreRaza, $descripcionRaza));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarRaza($codigoRaza) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from raza where COD_RAZA=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoRaza));
        Database::disconnect();
    }

    public function actualizarRaza($codigoRaza, $nombreRaza, $descripcionRaza) {
        $pdo = Database::connect();
        $sql = "update alimento set NOMBRE_RAZA=?,DESCRP_RAZA=? where COD_RAZA=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoRaza, $nombreRaza, $descripcionRaza));
        Database::disconnect();
    }

    //////////////////////////
    //ESTABLOS:
    //////////////////////////
    public function getEstablos() {
        $pdo = Database::connect();
        $sql = "select * from establo";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $establo = new Establo($res['COD_ESTABLO'], $res['COD_HACIENDA'], $res['CAP_MAXIMA'], $res['NUM_ANIMALES']);
            array_push($listado, $establo);
        }
        Database::disconnect();
        return $listado;
    }

    public function getEstablo($codigoEstablo) {
        $pdo = Database::connect();
        $sql = "select * from establo where COD_ESTABLO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoEstablo));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $establo = new Establo($res['COD_ESTABLO'], $res['COD_HACIENDA'], $res['CAP_MAXIMA'], $res['NUM_ANIMALES']);
        Database::disconnect();
        return $establo;
    }

    public function insertarEstablo($codigoEstablo, $codHacienda, $capMaxima, $numAnimales) {
        $pdo = Database::connect();
        $sql = "insert into establo(COD_ESTABLO,COD_HACIENDA,CAP_MAXIMA,NUM_ANIMALES) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($codigoEstablo, $codHacienda, $capMaxima, $numAnimales));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarEstablo($codigoEstablo) {
        try{
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from establo where COD_ESTABLO=? ";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoEstablo));
        Database::disconnect();
    }
 catch (Exception $e){
     //echo 'Exception capturada: ', $e->getMessage(), "";
     throw new Exception ("LA CLAVE PRIMARIA SE ENCUENTRA ENLAZADA EN OTRA TABLA ");
     }
    }

    public function actualizarEstablo($codigoEstablo, $codHacienda, $capMaxima, $numAnimales) {
        $pdo = Database::connect();
        $sql = "update establo set COD_ESTABLO=?,COD_HACIENDA=?,CAP_MAXIMA=?,NUM_ANIMALES=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoEstablo, $codHacienda, $capMaxima, $numAnimales));
        Database::disconnect();
    }
    
    
    //////////////////////////
    //MEDICAMENTOS:
    //////////////////////////
    
    /**
     * Retorna la lista de medicamentos de la bdd.
     * @return array
     */
     public function getMedicamentos() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from medicamento";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $medicamento = new Medicamento($res['COD_MED'], $res['NOMBRE_MED'], $res['FECHA_MED'], $res['CONTRADICCIONES_MED'], $res['DOSIS_MED'], $res['PRECIO_MED'], $res['DESCRIPCION_DEL_MEDICAMENTO']);
            array_push($listado, $medicamento);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
    public function getMedicamento($codigoMedicamento) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from medicamento where COD_MED=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoMedicamento));
        //obtenemos el registro especifico:
        $res=$consulta->fetch(PDO::FETCH_ASSOC);
        $medicamento = new Medicamento($res['COD_MED'], $res['NOMBRE_MED'], $res['FECHA_MED'], $res['CONTRADICCIONES_MED'], $res['DOSIS_MED'], $res['PRECIO_MED'], $res['DESCRIPCION_DEL_MEDICAMENTO']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $medicamento;
    }
     public function insertarMedicamento($codigoMedicamento, $nombreMedicamento, $fechaMedicamentoo, $contradiccionesMedicamento,
                $dosisMedicamento,$precioMedicamento,$descripcionMedicamento) {
        $pdo = Database::connect();
        $sql = "insert into medicamento(COD_MED,NOMBRE_MED,FECHA_MED,CONTRADICCIONES_MED,DOSIS_MED,PRECIO_MED,DESCRIPCION_DEL_MEDICAMENTO) values(?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array ($codigoMedicamento, $nombreMedicamento, $fechaMedicamentoo, $contradiccionesMedicamento,
                $dosisMedicamento,$precioMedicamento,$descripcionMedicamento));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
        public function eliminarMedicamento($codigoMedicamento) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from medicamento where COD_MED=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($codigoMedicamento));
        Database::disconnect();
    }
     public function actualizarMedicamento ($codigoMedicamento, $nombreMedicamento, $fechaMedicamentoo, $contradiccionesMedicamento,
                $dosisMedicamento,$precioMedicamento,$descripcionMedicamento){
        //Preparamos la conexión a la bdd:
        $pdo=Database::connect();
        $sql="update medicamento set NOMBRE_MED=?,FECHA_MED=?,CONTRADICCIONES_MED=?,DOSIS_MED=?,PRECIO_MED=?,DESCRIPCION_DEL_MEDICAMENTO=? where COD_MED=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($codigoMedicamento, $nombreMedicamento, $fechaMedicamentoo, $contradiccionesMedicamento,
                $dosisMedicamento,$precioMedicamento,$descripcionMedicamento));
        Database::disconnect();
    } 

    //////////////////////////
    //HACIENDAS:
    //////////////////////////  
    public function getHaciendas() {
        $pdo = Database::connect();
        $sql = "select * from hacienda";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $hacienda = new Hacienda($res['COD_HACIENDA'], $res['NOM_HACIENDA'], $res['PROV_HACIENDA'], $res['CANT_HACIENDA'], $res['PARR_HACIENDA'], $res['DIREC_HACIENDA'], $res['TELEF_HACIENDA']);
            array_push($listado, $hacienda);
        }
        Database::disconnect();
        return $listado;
    }

    public function getHacienda($codigoHacienda) {
        $pdo = Database::connect();
        $sql = "select * from hacienda where COD_HACIENDA=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoHacienda));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $hacienda = new Hacienda($res['COD_HACIENDA'], $res['NOM_HACIENDA'], $res['PROV_HACIENDA'], $res['CANT_HACIENDA'], $res['PARR_HACIENDA'], $res['DIREC_HACIENDA'], $res['TELEF_HACIENDA']);
        Database::disconnect();
        return $hacienda;
    }

    public function insertarHacienda($codigoHacienda, $nombreHacienda, $provinciaHacienda, $cantonHacienda, $parroquiaHacienda, $direccionHacienda, $telefonoHacienda) {
        $pdo = Database::connect();
        $sql = "insert into hacienda(COD_HACIENDA, NOM_HACIENDA, PROV_HACIENDA, CANT_HACIENDA, PARR_HACIENDA, DIREC_HACIENDA,TELEF_HACIENDA) values(?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($codigoHacienda, $nombreHacienda, $provinciaHacienda, $cantonHacienda, $parroquiaHacienda, $direccionHacienda, $telefonoHacienda));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarHacienda($codigoHacienda) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from hacienda where COD_HACIENDA=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoHacienda));
        Database::disconnect();
    }

    public function actualizarHacienda($codHacienda,$nombreHacienda, $provinciaHacienda, $cantonHacienda, $parroquiaHacienda, $direccionHacienda, $telefonoHacienda) {
        $pdo = Database::connect();
        $sql = "update hacienda set NOM_HACIENDA=?,PROV_HACIENDA=?,CANT_HACIENDA=?,PARR_HACIENDA=?,DIREC_HACIENDA=?,TELEF_HACIENDA=?  where COD_HACIENDA=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($nombreHacienda, $provinciaHacienda, $cantonHacienda, $parroquiaHacienda, $direccionHacienda, $telefonoHacienda,$codHacienda));
        Database::disconnect();
    }

    //////////////////////////
    //PRODUCCION DE LECHE:
    //////////////////////////
    public function getProducciones() {
        $pdo = Database::connect();
        $sql = "select * from produccion_leche";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $produccion_leche = new Bovino($res['COD_LECHE'], $res['COD_BOVINO'], $res['FECHA_ORDENO'], $res['SECC_ORDENO'], $res['NUM_LITROS'], $res['HORA_ORDENO']);
            array_push($listado, $produccion_leche);
        }
        Database::disconnect();
        return $listado;
    }

    public function getProduccion($codigoBovino) {
        $pdo = Database::connect();
        $sql = "select * from produccion_leche where COD_BOVINO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoBovino));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $produccion_leche = new Establo($res['COD_LECHE'], $res['COD_BOVINO'], $res['FECHA_ORDENO'], $res['SECC_ORDENO'], $res['NUM_LITROS'], $res['HORA_ORDENO']);
        Database::disconnect();
        return $produccion_leche;
    }

    public function insertarProduccion($codigoProduccion, $codigoBovino, $fechaordeno, $seccionOrdeno, $numeroLitros, $horaOrdeno) {
        $pdo = Database::connect();
        $sql = "insert into produccion_leche(COD_LECHE,COD_BOVINO,FECHA_ORDENO,SECC_ORDENO,NUM_LITROS, HORA_ORDENO) values(?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($codigoProduccion, $codigoBovino, $fechaordeno, $seccionOrdeno, $numeroLitros, $horaOrdeno));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarProduccion($codigoProduccion) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from produccion_leche where COD_LECHE=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoProduccion));
        Database::disconnect();
    }

    public function actualizarProduccion($codigoProduccion, $codigoBovino, $fechaordeno, $seccionOrdeno, $numeroLitros, $horaOrdeno) {
        $pdo = Database::connect();
        $sql = "update produccion_leche set COD_BOVINO=?,FECHA_ORDENO=?,SECC_ORDENO=?,NUM_LITROS=?,HORA_ORDENO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigoProduccion, $codigoBovino, $fechaordeno, $seccionOrdeno, $numeroLitros, $horaOrdeno));
        Database::disconnect();
    }

}
