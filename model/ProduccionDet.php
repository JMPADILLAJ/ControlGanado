<?php

/**
 * Description of ProduccionLeche
 *
 * @author José
 */
class ProduccionDet {
    private $codigoDetalle;
    private $codigoBovino;
    private $nombreBovino;//campo solo informativo no costa en la tabla
    private $codigoRegistro;
    private $seccionOrdeno;
    private $numeroLitros;
    private $horaOrdeno;
   
    public function getCodigoDetalle() {
        return $this->codigoDetalle;
    }

    public function getCodigoBovino() {
        return $this->codigoBovino;
    }

    public function getNombreBovino() {
        return $this->nombreBovino;
    }

    public function getCodigoRegistro() {
        return $this->codigoRegistro;
    }

    public function getSeccionOrdeno() {
        return $this->seccionOrdeno;
    }

    public function getNumeroLitros() {
        return $this->numeroLitros;
    }

    public function getHoraOrdeno() {
        return $this->horaOrdeno;
    }

    public function setCodigoDetalle($codigoDetalle) {
        $this->codigoDetalle = $codigoDetalle;
    }

    public function setCodigoBovino($codigoBovino) {
        $this->codigoBovino = $codigoBovino;
    }

    public function setNombreBovino($nombreBovino) {
        $this->nombreBovino = $nombreBovino;
    }

    public function setCodigoRegistro($codigoRegistro) {
        $this->codigoRegistro = $codigoRegistro;
    }

    public function setSeccionOrdeno($seccionOrdeno) {
        $this->seccionOrdeno = $seccionOrdeno;
    }

    public function setNumeroLitros($numeroLitros) {
        $this->numeroLitros = $numeroLitros;
    }

    public function setHoraOrdeno($horaOrdeno) {
        $this->horaOrdeno = $horaOrdeno;
    }



}
