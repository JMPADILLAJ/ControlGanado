<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Medicamento
 *
 * @author Mayra
 */
class Medicamento {

    private $codigoMedicamento;
    private $nombreMedicamento;
    private $fechaMedicamento;
    private $contradiccionesMedicamento;
    private $dosisMedicamento;
    private $precioMedicamento;
    private $descripcionMedicamento;

    function __construct($codigoMedicamento, $nombreMedicamento, $fechaMedicamento, $contradiccionesMedicamento, $dosisMedicamento, $precioMedicamento, $descripcionMedicamento) {
        $this->codigoMedicamento = $codigoMedicamento;
        $this->nombreMedicamento = $nombreMedicamento;
        $this->fechaMedicamento = $fechaMedicamento;
        $this->contradiccionesMedicamento = $contradiccionesMedicamento;
        $this->dosisMedicamento = $dosisMedicamento;
        $this->precioMedicamento = $precioMedicamento;
        $this->descripcionMedicamento = $descripcionMedicamento;
    }

    public function getCodigoMedicamento() {
        return $this->codigoMedicamento;
    }

    public function getNombreMedicamento() {
        return $this->nombreMedicamento;
    }

    public function getFechaMedicamento() {
        return $this->fechaMedicamento;
    }

    public function getContradiccionesMedicamento() {
        return $this->contradiccionesMedicamento;
    }

    public function getDosisMedicamento() {
        return $this->dosisMedicamento;
    }

    public function getPrecioMedicamento() {
        return $this->precioMedicamento;
    }

    public function getDescripcionMedicamento() {
        return $this->descripcionMedicamento;
    }

    public function setCodigoMedicamento($codigoMedicamento) {
        $this->codigoMedicamento = $codigoMedicamento;
    }

    public function setNombreMedicamento($nombreMedicamento) {
        $this->nombreMedicamento = $nombreMedicamento;
    }

    public function setFechaMedicamento($fechaMedicamento) {
        $this->fechaMedicamento = $fechaMedicamento;
    }

    public function setContradiccionesMedicamento($contradiccionesMedicamento) {
        $this->contradiccionesMedicamento = $contradiccionesMedicamento;
    }

    public function setDosisMedicamento($dosisMedicamento) {
        $this->dosisMedicamento = $dosisMedicamento;
    }

    public function setPrecioMedicamento($precioMedicamento) {
        $this->precioMedicamento = $precioMedicamento;
    }

    public function setDescripcionMedicamento($descripcionMedicamento) {
        $this->descripcionMedicamento = $descripcionMedicamento;
    }

}
