<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArtikelDao
 *
 * @author Feechan
 */
include_once 'Artikel.php';
include_once 'PenyakitDao.php';

class ArtikelDao {
    //put your code here
    public function get_artikel_row($row)
    {
        $artikel = new Artikel();
        $artikel ->setNoartikel($row['noartikel']);
        $artikel ->setContentartikel($row['contentartikel']);
        $artikel ->setVideo($row['video']);

        
        $kdpenyakit = $row['kdpenyakit'];
        $artikel ->setKdpenyakit($kdpenyakit);
        
        $penyakitdao = new penyakitDao();
        $penyakit = $penyakitdao->get_one_penyakit($kdpenyakit);
        $artikel ->setPenyakit($penyakit);
        return $artikel;
    }
    
    public function get_artikel_by_kdpenyakit($kdpenyakit)
    {
        $artikels = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from artikel where kdpenyakit = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindParam(1, $kdpenyakit);;
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $artikel = $this ->get_artikel_row($row);
                    $artikels->append($artikel);
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
        return $artikels;
    }
    
    public function get_all_artikel(){
        $artikels = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from artikel";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $artikel = $this ->get_artikel_row($row);
                    $artikels->append($artikel);
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
        return $artikels;
    }
}
