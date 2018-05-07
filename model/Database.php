<?php

/**
 * Clase utilitaria que maneja la conexion/desconexion a la base de datos
 * mediante las funciones PDO (PHP Data Objects).
 * Utiliza el patron de diseno singleton para el manejo de la conexion.
 * @author mrea
 */
class Database {

    //Propiedades estaticas con la informacion de la conexion (DSN):
    //Propiedad para control de la conexion:
    private static $dbName = 'hacienda';
    private static $dbHost = 'hacienda.postgres.database.azure.com';
    private static $dbUsername = 'jpadillaj@hacienda';
    private static $dbUserPassword = 'infantLobin081289';
    private static $dbPort = '5432';
    private static $conexion = null;

    /**
     * No se permite instanciar esta clase, se utilizan sus elementos
     * de tipo estatico.
     */
    public function __construct() {
        exit('No se permite instanciar esta clase.');
    }

    /**
     * Metodo estatico que crea una conexion a la base de datos.
     * @return type
     */
    public static function connect() {
        // Una sola conexion para toda la aplicacion (singleton):



        if (null == self::$conexion) {
            try {

                self::$conexion = new PDO("host=" . self::$dbHost . " " . "port=" . self::$dbPort . " " . "dbname=" . self::$dbName . " " . "user=" . self::$dbUsername . " " . "password=" . self::$dbUserPassword . " " . "sslmode=require");
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }

    /**
     * Metodo estatico para desconexion de la bdd.
     */
    public static function disconnect() {
        self::$conexion = null;
    }

}

?>
