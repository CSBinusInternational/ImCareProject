<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userDao
 *
 * @author Feechan
 */

include_once 'User.php';

class UserDao {
    //put your code here
    public function get_user_row($row){
        $user = new User();
        $user ->setId($row['id']);
        $user ->setName($row['name']);
        $user ->setDob($row['dob']);
        $user ->setGender($row['gender']);
        $user ->setEmail($row['email']);
        $user ->setPassword($row['password']);
        return $user;
    }
    
    public function get_all_user()
    {
        $users = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from user";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $user = $this ->get_user_row($row);
                    $users->append($user);
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
        return $users;
    }
    
    public function get_login_user($email,$password){
        $user = null;
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from user
                       WHERE email = ? AND password = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindParam(1, $email);
            $stmt -> bindParam(2, $password);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $user = $this ->get_user_row($row);
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
        return $user;
    }
    
    public function get_one_user($id)
    {
        $user = null;
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from user
                       WHERE id = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindParam(1, $id);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $user = $this ->get_user_row($row);
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
        return $user;
    }
}
