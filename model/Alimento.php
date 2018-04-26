<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mecanico
 *
 * @author Daniel
 */
class Alimento {
    private $codigoAlimento;
    private $nombreAlimento;
    private $descripcionAlimento;
//    private $cantidadAlimento;
    private $precioUnidad;
    private $unidadMedida;
    
    
    function __construct($codigoAlimento, $nombreAlimento, $descripcionAlimento, $precioUnidad, $unidadMedida) {
        $this->codigoAlimento = $codigoAlimento;
        $this->nombreAlimento = $nombreAlimento;
        $this->descripcionAlimento = $descripcionAlimento;
//        $this->cantidadAlimento = $cantidadAlimento;
        $this->precioUnidad = $precioUnidad;
        $this->unidadMedida = $unidadMedida;
    }
    public function getCodigoAlimento() {
        return $this->codigoAlimento;
    }

    public function getNombreAlimento() {
        return $this->nombreAlimento;
    }

    public function getDescripcionAlimento() {
        return $this->descripcionAlimento;
    }

//    public function getCantidadAlimento() {
//        return $this->cantidadAlimento;
//    }

    public function getPrecioUnidad() {
        return $this->precioUnidad;
    }

    public function getUnidadMedida() {
        return $this->unidadMedida;
    }

    public function setCodigoAlimento($codigoAlimento) {
        $this->codigoAlimento = $codigoAlimento;
    }

    public function setNombreAlimento($nombreAlimento) {
        $this->nombreAlimento = $nombreAlimento;
    }

    public function setDescripcionAlimento($descripcionAlimento) {
        $this->descripcionAlimento = $descripcionAlimento;
    }

//    public function setCantidadAlimento($cantidadAlimento) {
//        $this->cantidadAlimento = $cantidadAlimento;
//    }

    public function setPrecioUnidad($precioUnidad) {
        $this->precioUnidad = $precioUnidad;
    }

    public function setUnidadMedida($unidadMedida) {
        $this->unidadMedida = $unidadMedida;
    }


}
