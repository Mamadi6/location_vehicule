<?php

namespace App\Controller;

use App\Entity\User;
use App\Model\UserModel;

class UserController extends AbstractController{
    
    private $userMdl;

    public function __construct(){
        $this->userMdl = new UserModel();
    }

    public function actionUser(){


        if( isset($_GET['actionClient']) ){
            extract($_GET);

            switch( $actionClient ){
                case "logon":
                    
                    if( isset($_POST['login']) ){
                    }
                    
                    $this->render("user/logon", ["user" => new User()]);
                    break;

                case "login":

                    if( isset($_POST['login']) ){
                        $user = $this->userMdl->login($_POST['login'], $_POST['mdp']);

                        if( $user ){
                            $_SESSION['user'] = serialize($user);
                            $_SESSION['ADMIN'] = $user->getRole() == "ADMIN" ? 1 : 0;

                            header("location: .");
                            exit;
                        }
                    }

                    $this->render("user/login");
                    break;

                case "logout":
                    session_destroy();
                    
                    header("location: .");
                    exit;
                
                default:
                    throw new \Exception("Page '$actionClient' n'existe pas");
            }
        }
    }
    
}