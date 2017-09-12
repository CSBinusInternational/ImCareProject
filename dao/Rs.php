<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rs
 *
 * @author Feechan
 */
class Rs implements JsonSerializable {
    //put your code 
    private $idrs;
    private $kdrs;
    private $nmrs;
    private $almt;
    private $kotars;
    private $kdposrs;
    private $kelurahanrs;
    private $kecamatanrs;
    private $telprs;
    private $faxrs;
    private $webrs;
    private $humasrs;
    private $longitude;
    private $latitude;
    private $kdpenyakit;
    private $penyakit;
    
    function getIdrs() {
        return $this->idrs;
    }

    function getKdrs() {
        return $this->kdrs;
    }

    function getNmrs() {
        return $this->nmrs;
    }

    function getAlmt() {
        return $this->almt;
    }

    function getKotars() {
        return $this->kotars;
    }

    function getKdposrs() {
        return $this->kdposrs;
    }

    function getKelurahanrs() {
        return $this->kelurahanrs;
    }

    function getKecamatanrs() {
        return $this->kecamatanrs;
    }

    function getTelprs() {
        return $this->telprs;
    }

    function getFaxrs() {
        return $this->faxrs;
    }

    function getWebrs() {
        return $this->webrs;
    }

    function getHumasrs() {
        return $this->humasrs;
    }

    function getLongitude() {
        return $this->longitude;
    }

    function getLatitude() {
        return $this->latitude;
    }

    function getKdpenyakit() {
        return $this->kdpenyakit;
    }

    function getPenyakit() {
        return $this->penyakit;
    }

    function setIdrs($idrs) {
        $this->idrs = $idrs;
    }

    function setKdrs($kdrs) {
        $this->kdrs = $kdrs;
    }

    function setNmrs($nmrs) {
        $this->nmrs = $nmrs;
    }

    function setAlmt($almt) {
        $this->almt = $almt;
    }

    function setKotars($kotars) {
        $this->kotars = $kotars;
    }

    function setKdposrs($kdposrs) {
        $this->kdposrs = $kdposrs;
    }

    function setKelurahanrs($kelurahanrs) {
        $this->kelurahanrs = $kelurahanrs;
    }

    function setKecamatanrs($kecamatanrs) {
        $this->kecamatanrs = $kecamatanrs;
    }

    function setTelprs($telprs) {
        $this->telprs = $telprs;
    }

    function setFaxrs($faxrs) {
        $this->faxrs = $faxrs;
    }

    function setWebrs($webrs) {
        $this->webrs = $webrs;
    }

    function setHumasrs($humasrs) {
        $this->humasrs = $humasrs;
    }

    function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
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