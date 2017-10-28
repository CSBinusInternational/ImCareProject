<?php
include_once 'Diagnosa.php';

class DiagnosaDao {
    //put your code here
    public function get_diagnosa_row($row)
    {
        $diagnosa = new Diagnosa();
        $diagnosa ->setDiagnosaid($row['diagnosaid']);
        $diagnosa ->setHasildiagnosa($row['hasildiagnosa']);
        
        return $diagnosa;
    }
    
    public function get_one_diagnosa($diagnosaid)
    {
        $diagnosa = null;
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from diagnosa
                       WHERE diagnosaid = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindParam(1, $diagnosaid);;
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $diagnosa = $this ->get_diagnosa_row($row);
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
        return $diagnosa;
    }
    
    public function get_all_diagnosa(){
        $diagnosas = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from diagnosa";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $diagnosa = $this ->get_diagnosa_row($row);
                    $diagnosas->append($diagnosa);
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
        return $diagnosas;
    }
    
    public function insert_diagnosa(Diagnosa $diagnosa){
        $result = 0;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO diagnosa(hasildiagnosa)  
                    VALUES(?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $diagnosa->getHasildiagnosa());
            
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
    
    public function delete_diagnosa($id){
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "DELETE FROM diagnosa
                    WHERE diagnosaid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $id);
            $result = $stmt -> execute();
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

?>