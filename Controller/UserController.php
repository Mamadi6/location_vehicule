<?php

class UserController{

    private $userMdl;
    // autre model
    
    public function __construct(){
        $this->userMdl = new UserModel;
        //this autremodel = new Autremodel
    }
	

    // fonction pour lire les actions/requêtes utilisateur
    public function userAction(){
        $user = new User(0,"", "", "","", "", "","","");  

        // test si l'action utilisateur(navigateur) est égale à "actionUser"
        if(isset($_GET["actionUser"])){
            extract($_GET);
            
            // tester le nom de l'action
            // selon 'actionUser'
            switch($actionUser){

                // cas pour récupérer tous les users
                case 'user' :
                    // demande au model pour la liste
                    $users = $this->userMdl->findAll();

                    // page html pour l'affichage
                    include "Vue/user/index.phtml"; 
                    break;

                case "new":
                    
                    // test si formulaire est soumit
                    if( !empty($_POST['login']) ){
                        /**
                         *  produire des variables à partir des 'name' des input du form
                         * $_POST = ["prenom" => "Toto", "login" => "ilci", "age" => 20]
                         */
                        extract($_POST);
                        /**
                         * $prenom = "toto"
                         * $login = "ilci"
                         * $age  = 20
                         */

                         // pour éviter : $_POST['prenom'] ...

                         // le id = 0 : création d'un nouvel user. la SGBD va incrémenter l'ID
                        $user = new User(0, $prenom, $login, $mdp, $role, $adresse, $cp, $ville);
                        
                        $this->userMdl->new($user);

                        header("location:?actionUser=user");
                        exit;
                    }

                    include "Vue/user/new.phtml";
                    break;

                case "update":

                    if(isset($_POST['login'])){
                        extract($_POST);
                        $user = new User($id, $prenom, $login, $mdp, $role, $adresse, $cp, $ville);
                        $this->userMdl->update($user);

                        header("location: ?actionUser=user");
                        exit;
                    }

                    $user = $this->userMdl->show($id);
                    include "Vue/user/new.phtml";
                    break;

                case "show":
                    
                    $user = $this->userMdl->findById(1);
      
                    include "Vue/user/show.phtml";
                    break;

                case "delete":
                    $this->userMdl->delete($id);
                    
                    header("location:?actionUser=user");
                    exit;
                
                default:
                    // a modifier
                    echo "acion user incorrect";
            }
        }

    }
    
}