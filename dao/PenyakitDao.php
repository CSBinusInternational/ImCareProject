<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of penyakitDao
 *
 * @author Feechan
 */

include_once 'Penyakit.php';

class PenyakitDao 
{
    //put your code here
    public function get_penyakit_row($row)
    {
        $penyakit = new Penyakit();
        $penyakit->setKdpenyakit($row['kdpenyakit']);
        $penyakit->setNmpenyakit($row['nmpenyakit']);
        $penyakit->setDespenyakit($row['despenyakit']);
        $penyakit->setFketurunan($row['fketurunan']);
        $penyakit->setMenular($row['menular']);
        $penyakit->setKronis($row['kronis']);
        $penyakit->setImage_url($row['image_url']);
        $penyakit->setVideo_url($row['video_url']);
        return $penyakit;
    }
    
    public function get_all_penyakit()
    {
        $penyakits = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from penyakit";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $penyakit = $this ->get_penyakit_row($row);
                    $penyakits->append($penyakit);
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
        return $penyakits;
    }
    
    public function get_one_penyakit($id)
    {
        $penyakit = null;
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from penyakit
                       WHERE kdpenyakit = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindParam(1, $id);;
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $penyakit = $this ->get_penyakit_row($row);
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
        return $penyakit;
    }
    
    public function insert_penyakit($penyakit)
    {
        $result = 0;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO penyakit(nmpenyakit,despenyakit,fketurunan,menular,kronis,image_url,video_url)  
                    VALUES(?,?,?,?,?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $penyakit ->getNmpenyakit());
            $stmt -> bindValue(2, $penyakit ->getDespenyakit());
            $stmt -> bindValue(3, $penyakit ->getFketurunan());
            $stmt -> bindValue(4, $penyakit ->getMenular());
            $stmt -> bindValue(5, $penyakit ->getKronis());
            $stmt -> bindValue(6, $penyakit ->getImage_url());
            $stmt -> bindValue(7, $penyakit ->getVideo_url());

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
    
    public function update_penyakit($penyakit){
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE penyakit  
                    SET 
                        nmpenyakit = ?,
                        despenyakit = ?,
                        fketurunan = ?,
                        menular = ?,
                        kronis = ?
                    WHERE kdpenyakit = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $penyakit->getNmpenyakit() );
            $stmt -> bindValue(2, $penyakit->getDespenyakit() );
            $stmt -> bindValue(3, $penyakit->getFketurunan() );
            $stmt -> bindValue(4, $penyakit->getMenular() );
            $stmt -> bindValue(5, $penyakit->getKronis() );
            $stmt -> bindValue(6, $penyakit->getKdpenyakit() );
            
            $result = $stmt -> execute();
            $conn -> commit();
        } catch (PDOException $e) {
            echo $e -> getMessage();
            $conn -> rollBack();
            die();
        }
        $conn = null;
        return $result;	
    }
    
    public function update_url($image_url,$kdpenyakit){
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE penyakit  
                    SET 
                        image_url = ?
                    WHERE kdpenyakit = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $image_url );
            $stmt -> bindValue(2, $kdpenyakit );
            
            $result = $stmt -> execute();
            $conn -> commit();
        } catch (PDOException $e) {
            echo $e -> getMessage();
            $conn -> rollBack();
            die();
        }
        $conn = null;
        return $result;	
    }
}

?>
