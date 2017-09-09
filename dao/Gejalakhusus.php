<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gejalakhusus
 *
 * @author Feechan
 */
class Gejalakhusus implements JsonSerializable{
    //put your code here
    private $nogk;
    private $descgk;
    private $kdpenyakit;
    private $penyakit;
    
    function getNogk() {
        return $this->nogk;
    }

    function getDescgk() {
        return $this->descgk;
    }

    function getKdpenyakit() {
        return $this->kdpenyakit;
    }

    function getPenyakit() {
        return $this->penyakit;
    }

    function setNogk($nogk) {
        $this->nogk = $nogk;
    }

    function setDescgk($descgk) {
        $this->descgk = $descgk;
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