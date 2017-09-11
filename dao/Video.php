<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Video
 *
 * @author Feechan
 */
class Video implements JsonSerializable{
    //put your code here
    private $novideo;
    private $judulvideo;
    private $urlvideo;
    private $kdpenyakit;
    private $penyakit;
    
    function getNovideo() {
        return $this->novideo;
    }

    function getJudulvideo() {
        return $this->judulvideo;
    }

    function getUrlvideo() {
        return $this->urlvideo;
    }

    function getKdpenyakit() {
        return $this->kdpenyakit;
    }

    function getPenyakit() {
        return $this->penyakit;
    }

    function setNovideo($novideo) {
        $this->novideo = $novideo;
    }

    function setJudulvideo($judulvideo) {
        $this->judulvideo = $judulvideo;
    }

    function setUrlvideo($urlvideo) {
        $this->urlvideo = $urlvideo;
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
