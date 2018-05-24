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
    private static $dbHost = 'hacienda.mysql.database.azure.com';
    private static $dbUsername = 'wdsierra@hacienda';
    private static $dbUserPassword = 'Universidad2018';
    private static $dbPort = '3306';
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
//$con=mysqli_init(); mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL); mysqli_real_connect($con, "{host_name}", "{your_username}", {your_password}, {your_database}, 3306);
                //self::$conexion = new PDO("host=" . self::$dbHost . " " . "port=" . self::$dbPort . " " . "dbname=" . self::$dbName . " " . "user=" . self::$dbUsername . " " . "password=" . self::$dbUserPassword . " " . "sslmode=require");
                self::$conexion = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword, 3306);
                
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
