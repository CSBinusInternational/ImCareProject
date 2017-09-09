<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rsDao
 *
 * @author Feechan
 */

include_once 'Rs.php';
include_once 'PenyakitDao.php';

class RsDao {
    //put your code here
    public function get_rs_row($row){
        $rs = new Rs();
        $rs ->setKdrs($row['kdrs']);
        $rs ->setNmrs($row['nmrs']);
        $rs ->setAlmt($row['almt']);
        $rs ->setKotars($row['kotars']);
        $rs ->setKdposrs($row['kdposrs']);
        $rs ->setKelurahanrs($row['kelurahanrs']);
        $rs ->setKecamatanrs($row['kecamatanrs']);
        $rs ->setTelprs($row['telprs']);
        $rs ->setFaxrs($row['faxrs']);
        $rs ->setWebrs($row['webrs']);
        $rs ->setHumasrs($row['humasrs']);
        $rs ->setLongitude($row['longitude']);
        $rs ->setLatitude($row['latitude']);
        $kdpenyakit = $row['kdpenyakit'];
        $rs ->setKdpenyakit($kdpenyakit);
        
        $penyakitdao = new penyakitDao();
        $penyakit = $penyakitdao->get_one_penyakit($kdpenyakit);
        $rs ->setPenyakit($penyakit);
        return $rs;
    }
    
    public function get_all_rs()
    {
        $rss = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from rs";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $rs = $this ->get_rs_row($row);
                    $rss->append($rs);
                }
            }
        } 
        catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        try {
            if (!empty($conn) || $conn != null) {
                $conn = null;
            }
        } catch (PDOException $e) {
            echo $e -> getMessage();
        }
        return $rss;
    }
    
    public function get_one_rs($id)
    {
        $rs = null;
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from rs
                       WHERE kdrs = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindParam(1, $id);;
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $rs = $this ->get_rs_row($row);
                }
            }
        } 
        catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        try {
            if (!empty($conn) || $conn != null) {
                $conn = null;
            }
        } catch (PDOException $e) {
            echo $e -> getMessage();
        }
        return $rs;
    }
}
