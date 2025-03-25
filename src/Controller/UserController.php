<?php

namespace App\Controller;

use App\Entity\User;

class UserController extends AbstractController{

    public function actionUser(){

        $user = new User();

        if( isset($_GET['actionClient']) ){
            extract($_GET);

            switch( $actionClient ){
                case "logon":
                    
                    if( isset($_POST['login']) ){
                        $user = new User($_POST);
                    }
                    
                    $this->render("user/logon", ["user" => $user]);
                    break;

                case "login":
                    $this->render("user/login");
                    break;
            }
        }
    }
    
}