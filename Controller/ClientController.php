<?php

class ClientController extends ControllerAbstract{

    private $userMdl;
    // autre model
    
    public function __construct(){
        $this->userMdl = new UserModel;
        //this autremodel = new Autremodel
    }
	

    // fonction pour lire les actions/requêtes utilisateur
    public function userAction(){
        $user = new User(0,"", "", "","", "", "","","");  

         // TEST SI le 'user' est un 'ADMIN'
        //  if( !$this->isAdmin() ){
        //     $this->throwException("Il faut être connecté et avoir le rôle ADMIN");
        // }

        // test si l'action utilisateur(navigateur) est égale à "actionUser"
        if(isset($_GET["actionClient"])){
            extract($_GET);
            
            // tester le nom de l'action
            // selon 'actionUser'
            switch($actionClient){

                case 'login':

                    if( isset($_POST['login']) ){
                        // user = un user si login et mdp OK, sinon NULL
                        $user = $this->userMdl->login($_POST['login'], $_POST['mdp']);

                        // TEST si $user != null
                        if( $user ){
                            // Création de la session
                            $_SESSION['user'] = serialize($user);
                            $_SESSION['ADMIN'] = $user->getRole() == "ADMIN" ? true : false;

                            header("location: .");
                            exit;
                        }
                    }
                
                    include "Vue/user/login.phtml";
                    break;

                case "logon":
                    
                    if( isset($_POST['login']) ){
                        extract($_POST);

                        $user = new User(0, $prenom, $login, $mdp, "CLIENT", $adresse, $cp, $ville);

                        $this->userMdl->new($user);

                        header("location: ?actionUser=login");
                        exit;
                    }

                    include "Vue/user/logon.phtml";
                    break;
                
                case "logout":
                    session_destroy();

                    header("location: .");
                    exit;

                default:
                    throw new Exception("Page demandée n'existe pas!");
            }
        }

    }
    
}