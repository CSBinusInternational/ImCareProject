<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gejalaumumDao
 *
 * @author Feechan
 */

include_once 'gejalaumum.php';
include_once 'penyakitDao.php';

class GejalaumumDao {
    //put your code here
    public function get_gejalaumum_row($row)
    {
        $gejalaumum = new Gejalaumum();
        $gejalaumum ->setNogu($row['nogu']);
        $gejalaumum ->setDescgu($row['descgu']);
        
        $kdpenyakit = $row['kdpenyakit'];
        $gejalaumum ->setKdpenyakit($kdpenyakit);
        
        $penyakitdao = new penyakitDao();
        $penyakit = $penyakitdao->get_one_penyakit($kdpenyakit);
        $gejalaumum ->setPenyakit($penyakit);
        return $gejalakhusus;
    }
    
    public function get_all_gejalaumum()
    {
        $gejalaumums = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from gejalaumum";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $gejalaumum = $this ->get_gejalaumum_row($row);
                    $gejalaumums->append($gejalaumum);
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
        return $gejalaumums;
    }
    
    public function get_one_gejalaumum($id)
    {
        $gejalaumum = null;
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from gejalaumum
                       WHERE nogu = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindParam(1, $id);;
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $gejalaumum = $this ->get_gejalaumum_row($row);
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
        return $gejalaumum;
    }
}
?>