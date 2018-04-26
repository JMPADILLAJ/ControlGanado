<?php
/**
 * 
 *
 * @author Daniel
 */
class Establo {
    private $codigoEstablo;
    private $codHacienda;
    private $capMaxima;
    private $numAnimales;
   
    function __construct($codigoEstablo, $codHacienda, $capMaxima, $numAnimales) {
        $this->codigoEstablo = $codigoEstablo;
        $this->codHacienda = $codHacienda;
        $this->capMaxima = $capMaxima;
        $this->numAnimales = $numAnimales;
    }

    function getCodigoEstablo() {
        return $this->codigoEstablo;
    }

    function getCodHacienda() {
        return $this->codHacienda;
    }

    function getCapMaxima() {
        return $this->capMaxima;
    }

    function getNumAnimales() {
        return $this->numAnimales;
    }

    function setCodigoEstablo($codigoEstablo) {
        $this->codigoEstablo = $codigoEstablo;
    }

    function setCodHacienda($codHacienda) {
        $this->codHacienda = $codHacienda;
    }

    function setCapMaxima($capMaxima) {
        $this->capMaxima = $capMaxima;
    }

    function setNumAnimales($numAnimales) {
        $this->numAnimales = $numAnimales;
    }

}