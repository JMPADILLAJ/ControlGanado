<?php
/**
 * Description of FacturaDet
 *
 * @author mrea
 */
class FacturaDet {
    private $idFacturaDet;
    private $idFacturaCab;
    private $codigoAlimento;
    private $nombreAlimento;//campo solo informativo, no consta en la tabla.
    private $codigoBovino;
    private $nombreBovino;//campo solo informativo, no consta en la tabla.   
    private $cantidad;
    private $precioUnidad;//campo solo informativo
     private $subtotal;
     

     public function getSubtotal() {
         return $this->subtotal;
     }

     public function setSubtotal($subtotal) {
         $this->subtotal = $subtotal;
     }

        
    public function getIdFacturaDet() {
        return $this->idFacturaDet;
    }

    public function getIdFacturaCab() {
        return $this->idFacturaCab;
    }

    public function getCodigoAlimento() {
        return $this->codigoAlimento;
    }

    public function getNombreAlimento() {
        return $this->nombreAlimento;
    }

    public function getCodigoBovino() {
        return $this->codigoBovino;
    }

    public function getNombreBovino() {
        return $this->nombreBovino;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getPrecioUnidad() {
        return $this->precioUnidad;
    }

    public function setIdFacturaDet($idFacturaDet) {
        $this->idFacturaDet = $idFacturaDet;
    }

    public function setIdFacturaCab($idFacturaCab) {
        $this->idFacturaCab = $idFacturaCab;
    }

    public function setCodigoAlimento($codigoAlimento) {
        $this->codigoAlimento = $codigoAlimento;
    }

    public function setNombreAlimento($nombreAlimento) {
        $this->nombreAlimento = $nombreAlimento;
    }

    public function setCodigoBovino($codigoBovino) {
        $this->codigoBovino = $codigoBovino;
    }

    public function setNombreBovino($nombreBovino) {
        $this->nombreBovino = $nombreBovino;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setPrecioUnidad($precioUnidad) {
        $this->precioUnidad = $precioUnidad;
    }



}
