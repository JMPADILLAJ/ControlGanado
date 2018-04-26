<?php
/**
 * 
 *
* @author José
 */
class Raza {
    private $codigoRaza;
    private $nombreRaza;
    private $descripcionRaza;
    
    function __construct($codigoRaza, $nombreRaza, $descripcionRaza) {
        $this->codigoRaza = $codigoRaza;
        $this->nombreRaza = $nombreRaza;
        $this->descripcionRaza = $descripcionRaza;
    }

    public function getCodigoRaza() {
        return $this->codigoRaza;
    }

    public function getNombreRaza() {
        return $this->nombreRaza;
    }

    public function getDescripcionRaza() {
        return $this->descripcionRaza;
    }

    public function setCodigoRaza($codigoRaza) {
        $this->codigoRaza = $codigoRaza;
    }

    public function setNombreRaza($nombreRaza) {
        $this->nombreRaza = $nombreRaza;
    }

    public function setDescripcionRaza($descripcionRaza) {
        $this->descripcionRaza = $descripcionRaza;
    }


   

}
