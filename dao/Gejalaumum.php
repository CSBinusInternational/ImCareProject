<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gejalaumum
 *
 * @author Feechan
 */
class Gejalaumum implements JsonSerializable{
    //put your code here
    private $nogu;
    private $descgu;
    private $kdpenyakit;
    private $penyakit;
    
    function getNogu() {
        return $this->nogu;
    }

    function getDescgu() {
        return $this->descgu;
    }

    function getKdpenyakit() {
        return $this->kdpenyakit;
    }

    function getPenyakit() {
        return $this->penyakit;
    }

    function setNogu($nogu) {
        $this->nogu = $nogu;
    }

    function setDescgu($descgu) {
        $this->descgu = $descgu;
    }

    function setKdpenyakit($kdpenyakit) {
        $this->kdpenyakit = $kdpenyakit;
    }

    function setPenyakit($penyakit) {
        $this->penyakit = $penyakit;
    }    
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
?>