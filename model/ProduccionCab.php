<?php

/**
 * Description of ProduccionLeche
 *
 * @author José
 */
class ProduccionCab {
    private $codigoRegistro;
    private $fecha;
    private $estado;
    private $total;
    private $totalIngresos;
   
   
    function getCodigoRegistro() {
        return $this->codigoRegistro;
    }
    function getTotalIngresos() {
        return $this->totalIngresos;
    }

    function setTotalIngresos($totalIngresos) {
        $this->totalIngresos = $totalIngresos;
    }

        function getFecha() {
        return $this->fecha;
    }

    function getEstado() {
        return $this->estado;
    }

    function getTotal() {
        return $this->total;
    }

    function setCodigoRegistro($codigoRegistro) {
        $this->codigoRegistro = $codigoRegistro;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setTotal($total) {
        $this->total = $total;
    }


}
