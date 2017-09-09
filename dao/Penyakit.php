<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of penyakit
 *
 * @author Feechan
 */
class Penyakit implements JsonSerializable{
    //put your code here
    private $kdpenyakit;
    private $nmpenyakit;
    private $despenyakit;
    private $fketurunan;
    private $menular;
    private $kronis;
    private $image_url;
    private $video_url;
    
    function getKdpenyakit() {
        return $this->kdpenyakit;
    }

    function getNmpenyakit() {
        return $this->nmpenyakit;
    }

    function getDespenyakit() {
        return $this->despenyakit;
    }

    function getFketurunan() {
        return $this->fketurunan;
    }

    function getMenular() {
        return $this->menular;
    }

    function getKronis() {
        return $this->kronis;
    }

    function getImage_url() {
        return $this->image_url;
    }

    function getVideo_url() {
        return $this->video_url;
    }

    function setKdpenyakit($kdpenyakit) {
        $this->kdpenyakit = $kdpenyakit;
    }

    function setNmpenyakit($nmpenyakit) {
        $this->nmpenyakit = $nmpenyakit;
    }

    function setDespenyakit($despenyakit) {
        $this->despenyakit = $despenyakit;
    }

    function setFketurunan($fketurunan) {
        $this->fketurunan = $fketurunan;
    }

    function setMenular($menular) {
        $this->menular = $menular;
    }

    function setKronis($kronis) {
        $this->kronis = $kronis;
    }

    function setImage_url($image_url) {
        $this->image_url = $image_url;
    }

    function setVideo_url($video_url) {
        $this->video_url = $video_url;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
?>