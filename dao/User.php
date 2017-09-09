<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Feechan
 */
class User implements JsonSerializable {
    //put your code here
    private $id;
    private $name;
    private $dob;
    private $gender;
    private $email;
    private $password;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDob() {
        return $this->dob;
    }

    function getGender() {
        return $this->gender;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDob($dob) {
        $this->dob = $dob;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
