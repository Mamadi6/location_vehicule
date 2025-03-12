<?php

class UserController{

    public function userAction(){

        if(isset($_GET["actionUser"])){
            extract($_GET);

            switch($actionUser){

                case 'lire' :
                    return "lire";
                break;
            }
        }

    }
    
}