<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Artikel
 *
 * @author Feechan
 */
class Artikel implements JsonSerializable{
    //put your code here
    private $noartikel;
    private $contentartikel;
    private $video;
    private $kdpenyakit;
    private $penyakit;
    
    function getNoartikel() {
        return $this->noartikel;
    }

    function getContentartikel() {
        return $this->contentartikel;
    }

    function getVideo() {
        return $this->video;
    }

    function getKdpenyakit() {
        return $this->kdpenyakit;
    }

    function getPenyakit() {
        return $this->penyakit;
    }

    function setNoartikel($noartikel) {
        $this->noartikel = $noartikel;
    }

    function setContentartikel($contentartikel) {
        $this->contentartikel = $contentartikel;
    }

    function setVideo($video) {
        $this->video = $video;
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
