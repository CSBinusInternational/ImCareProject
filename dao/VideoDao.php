<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VideoDao
 *
 * @author Feechan
 */
include_once 'Video.php';
include_once 'PenyakitDao.php';

class VideoDao {
    //put your code here
    public function get_video_row($row){
        $video = new Video();
        $video->setNovideo($row['novideo']);
        $video->setJudulvideo($row['judulvideo']);
        $video->setUrlvideo($row['urlvideo']);
        $kdpenyakit = $row['kdpenyakit'];
        
        $penyakitdao = new PenyakitDao();
        $penyakit = $penyakitdao->get_one_penyakit($kdpenyakit);
        
        $video->setKdpenyakit($kdpenyakit);
        $video->setPenyakit($penyakit);
        
        return $video;
    }
    
    public function get_video_by_kdpenyakit($kdpenyakit){
        $videos = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from video where kdpenyakit = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $kdpenyakit );
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $video = $this ->get_video_row($row);
                    $videos->append($video);
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
        return $videos;
    }
    
    public function insert_video($video){
        $result = 0;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO video(judulvideo,urlvideo,kdpenyakit)  
                    VALUES(?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $video->getJudulvideo());
            $stmt -> bindValue(2, $video->getUrlvideo());
            $stmt -> bindValue(3, $video->getKdpenyakit());
            
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
    
    public function update_url($urlvideo,$novideo){
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE video  
                    SET 
                        urlvideo = ?
                    WHERE novideo = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $urlvideo );
            $stmt -> bindValue(2, $novideo );
            
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
