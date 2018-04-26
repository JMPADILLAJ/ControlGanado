<?php
/**
 * 
 *
* @author José
 */
class Bovino {
    private $codigoBovino;
    private $codEstablo;
    private $codigoRaza;
    private $nombreBovino;
    private $fechaNacimiento;
    private $tipoAdquisicion;
    private $genero;
    private $bovinoActivo;
    private $colorBovino;
    
    function __construct($codigoBovino, $codEstablo, $codigoRaza, $nombreBovino, $fechaNacimiento, $tipoAdquisicion, $genero, $bovinoActivo, $colorBovino) {
        $this->codigoBovino = $codigoBovino;
        $this->codEstablo = $codEstablo;
        $this->codigoRaza = $codigoRaza;
        $this->nombreBovino = $nombreBovino;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->tipoAdquisicion = $tipoAdquisicion;
        $this->genero = $genero;
        $this->bovinoActivo = $bovinoActivo;
        $this->colorBovino = $colorBovino;
        
    }
    function getCodigoBovino() {
        return $this->codigoBovino;
    }

    function getCodEstablo() {
        return $this->codEstablo;
    }

    function getCodigoRaza() {
        return $this->codigoRaza;
    }

    function getNombreBovino() {
        return $this->nombreBovino;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getTipoAdquisicion() {
        return $this->tipoAdquisicion;
    }

    function getGenero() {
        return $this->genero;
    }

    function getBovinoActivo() {
        return $this->bovinoActivo;
    }

    function getColorBovino() {
        return $this->colorBovino;
    }

    function setCodigoBovino($codigoBovino) {
        $this->codigoBovino = $codigoBovino;
    }

    function setCodEstablo($codEstablo) {
        $this->codEstablo = $codEstablo;
    }

    function setCodigoRaza($codigoRaza) {
        $this->codigoRaza = $codigoRaza;
    }

    function setNombreBovino($nombreBovino) {
        $this->nombreBovino = $nombreBovino;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setTipoAdquisicion($tipoAdquisicion) {
        $this->tipoAdquisicion = $tipoAdquisicion;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setBovinoActivo($bovinoActivo) {
        $this->bovinoActivo = $bovinoActivo;
    }

    function setColorBovino($colorBovino) {
        $this->colorBovino = $colorBovino;
    }



}
