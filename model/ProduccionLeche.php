<?php

/**
 * Description of ProduccionLeche
 *
 * @author José
 */
class ProduccionLeche {
    private $codigoProduccion;
    private $codigoBovino;
    private $fechaordeno;
    private $seccionOrdeno;
    private $numeroLitros;
    private $horaOrdeno;
    function __construct($codigoProduccion, $codigoBovino, $fechaordeno, $seccionOrdeno, $numeroLitros, $horaOrdeno) {
        $this->codigoProduccion = $codigoProduccion;
        $this->codigoBovino = $codigoBovino;
        $this->fechaordeno = $fechaordeno;
        $this->seccionOrdeno = $seccionOrdeno;
        $this->numeroLitros = $numeroLitros;
        $this->horaOrdeno = $horaOrdeno;
    }

    function getCodigoProduccion() {
        return $this->codigoProduccion;
    }

    function getCodigoBovino() {
        return $this->codigoBovino;
    }

    function getFechaordeno() {
        return $this->fechaordeno;
    }

    function getSeccionOrdeno() {
        return $this->seccionOrdeno;
    }

    function getNumeroLitros() {
        return $this->numeroLitros;
    }

    function getHoraOrdeno() {
        return $this->horaOrdeno;
    }

    function setCodigoProduccion($codigoProduccion) {
        $this->codigoProduccion = $codigoProduccion;
    }

    function setCodigoBovino($codigoBovino) {
        $this->codigoBovino = $codigoBovino;
    }

    function setFechaordeno($fechaordeno) {
        $this->fechaordeno = $fechaordeno;
    }

    function setSeccionOrdeno($seccionOrdeno) {
        $this->seccionOrdeno = $seccionOrdeno;
    }

    function setNumeroLitros($numeroLitros) {
        $this->numeroLitros = $numeroLitros;
    }

    function setHoraOrdeno($horaOrdeno) {
        $this->horaOrdeno = $horaOrdeno;
    }


}
