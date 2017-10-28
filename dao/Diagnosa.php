<?php

class Diagnosa implements JsonSerializable{
    //put your code here
    private $diagnosaid;
    private $hasildiagnosa;

    function getDiagnosaid() {
        return $this->diagnosaid;
    }

    function getHasildiagnosa() {
        return $this->hasildiagnosa;
    }

    function setDiagnosaid($diagnosaid) {
        $this->diagnosaid = $diagnosaid;
    }

    function setHasildiagnosa($hasildiagnosa) {
        $this->hasildiagnosa = $hasildiagnosa;
    }
        
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
?>