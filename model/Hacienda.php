<?php

/**
 * Description of Hacienda
 *
 * @author José
 */
class Hacienda {
    private $codHacienda;
    private $nombreHacienda;
    private $provinciaHacienda;
    private $cantonHacienda;
    private $parroquiaHacienda;
    private $direccionHacienda;
    private $telefonoHacienda;
    
    function __construct($codHacienda, $nombreHacienda, $provinciaHacienda, $cantonHacienda, $parroquiaHacienda, $direccionHacienda, $telefonoHacienda) {
        $this->codHacienda = $codHacienda;
        $this->nombreHacienda = $nombreHacienda;
        $this->provinciaHacienda = $provinciaHacienda;
        $this->cantonHacienda = $cantonHacienda;
        $this->parroquiaHacienda = $parroquiaHacienda;
        $this->direccionHacienda = $direccionHacienda;
        $this->telefonoHacienda = $telefonoHacienda;
    }
    function getCodHacienda() {
        return $this->codHacienda;
    }

    function getNombreHacienda() {
        return $this->nombreHacienda;
    }

    function getProvinciaHacienda() {
        return $this->provinciaHacienda;
    }

    function getCantonHacienda() {
        return $this->cantonHacienda;
    }

    function getParroquiaHacienda() {
        return $this->parroquiaHacienda;
    }

    function getDireccionHacienda() {
        return $this->direccionHacienda;
    }

    function getTelefonoHacienda() {
        return $this->telefonoHacienda;
    }

    function setCodHacienda($codHacienda) {
        $this->codHacienda = $codHacienda;
    }

    function setNombreHacienda($nombreHacienda) {
        $this->nombreHacienda = $nombreHacienda;
    }

    function setProvinciaHacienda($provinciaHacienda) {
        $this->provinciaHacienda = $provinciaHacienda;
    }

    function setCantonHacienda($cantonHacienda) {
        $this->cantonHacienda = $cantonHacienda;
    }

    function setParroquiaHacienda($parroquiaHacienda) {
        $this->parroquiaHacienda = $parroquiaHacienda;
    }

    function setDireccionHacienda($direccionHacienda) {
        $this->direccionHacienda = $direccionHacienda;
    }

    function setTelefonoHacienda($telefonoHacienda) {
        $this->telefonoHacienda = $telefonoHacienda;
    }


}
