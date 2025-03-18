<?php

class ControllerAbstract{


    public function isConnected(){
        return isset( $_SESSION['user'] );
    }

    public function isAdmin(){
        return  $this->isConnected() and $_SESSION['ADMIN'];
     //   return  $this->isConnected() and $this->getUser()->getRole == "ADMIN";
    }

    public function getUser(){
        return  unserialize($_SESSION['user']);
    }


    public function throwException(string $msg){
        throw new Exception($msg);
    }

}