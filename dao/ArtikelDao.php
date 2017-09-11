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
        $artikel ->setJudulartikel($row['judulartikel']);
        $artikel ->setContentartikel($row['contentartikel']);
        

        
        $kdpenyakit = $row['kdpenyakit'];
        $artikel ->setKdpenyakit($kdpenyakit);
        
        $penyakitdao = new penyakitDao();
        $penyakit = $penyakitdao->get_one_penyakit($kdpenyakit);
        $artikel ->setPenyakit($penyakit);
        return $artikel;
    }
    
    public function get_one_artikel($id)
    {
        $artikel = null;
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from artikel
                       WHERE noartikel = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindParam(1, $id);;
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $artikel = $this ->get_artikel_row($row);
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
    
    public function insert_artikel(Artikel $artikel){
        $result = 0;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO artikel(judulartikel,contentartikel,kdpenyakit)  
                    VALUES(?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $artikel->getJudulartikel());
            $stmt -> bindValue(2, $artikel->getContentartikel());
            $stmt -> bindValue(3, $artikel->getKdpenyakit());
            
            $stmt -> execute();
            $result = $conn ->lastInsertId();
            $conn -> commit();
            
            
        }
        catch (PDOException $e)
        {
            echo $e -> getMessage();
            $stmt -> rollBacxk();
            die();
        }
        try
        {
            if(!empty($conn) || $conn != null)
            {
                $conn = null;
            }
        }
        catch (PDOException $e)
        {
            echo $e -> getMessage();
        }
        return $result;	
    }
}
