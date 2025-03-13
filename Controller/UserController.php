<?php

class UserController{

    private $userMdl;
    
    public function __construct(){
        $this->userMdl = new UserModel;
    }
	

    public function userAction(){


        if(isset($_GET["actionUser"])){
            extract($_GET);

            switch($actionUser){

                case 'user' :

                    $users = $this->userMdl->findAll();

                    include "Vue/user/index.phtml";
                    break;

                case "new":
                    
                    if( isset($_POST['login']) ){
                        extract($_POST);

                        $user = new User(0, $prenom, $login, $mdp, $role, $adresse, $cp, $ville);
                        
                        $this->userMdl->new($user);

                        header("location:?actionUser=user");
                        exit;
                    }

                    include "Vue/user/new.phtml";
                    break;

                case "update":
                    include "Vue/user/new.phtml";
                    break;

                case "show":
                    
                    $user = $this->userMdl->findById(1);
      
                    include "Vue/user/show.phtml";
                    break;

                case "delete":

                    header("location:?actionUser=user");
                    exit;
            }
        }

    }
    
}