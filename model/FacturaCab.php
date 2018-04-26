<?php
/**
 * Description of FacturaCab
 *
 * @author mrea
 */
class FacturaCab {
    private $idFacturaCab;
    private $fecha;
    private $codigoBovino;
    private $estado;
    private $total;
    
    public function getIdFacturaCab() {
        return $this->idFacturaCab;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getCodigoBovino() {
        return $this->codigoBovino;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setIdFacturaCab($idFacturaCab) {
        $this->idFacturaCab = $idFacturaCab;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setCodigoBovino($codigoBovino) {
        $this->codigoBovino = $codigoBovino;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setTotal($total) {
        $this->total = $total;
    }


}
