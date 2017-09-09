<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gejalakhususDao
 *
 * @author Feechan
 */

include_once 'Gejalakhusus.php';
include_once 'PenyakitDao.php';

class GejalakhususDao {
    //put your code here
    public function get_gejalakhusus_row($row)
    {
        $gejalakhusus = new Gejalakhusus();
        $gejalakhusus ->setNogk($row['nogk']);
        $gejalakhusus ->setDescgk($row['descgk']);
        
        $kdpenyakit = $row['kdpenyakit'];
        $gejalakhusus ->setKdpenyakit($kdpenyakit);
        
        $penyakitdao = new penyakitDao();
        $penyakit = $penyakitdao->get_one_penyakit($kdpenyakit);
        $gejalakhusus ->setPenyakit($penyakit);
        return $gejalakhusus;
    }
    
    public function get_all_gejalakhusus()
    {
        $gejalakhususs = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from gejalakhusus";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $gejalakhusus = $this ->get_gejalakhusus_row($row);
                    $gejalakhususs->append($gejalakhusus);
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
        return $gejalakhususs;
    }
    
    public function get_one_gejalakhusus($id){
        $gejalakhusus = null;
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from gejalakhusus
                       WHERE nogk = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindParam(1, $id);;
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $gejalakhusus = $this ->get_gejalakhusus_row($row);
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
        return $gejalakhusus;
    }
}
?>