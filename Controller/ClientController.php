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

        $erreurs = [];

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
                    
                    if( isset($_POST['prenom']) ){
                        extract($_POST);
                        

                        // Validation données USER
                        $pattern =  '/^[A-Za-z]+([ \-][A-Za-z]+)*$/u';
                        if( (strlen( trim($prenom) ) < 2) || !preg_match($pattern, $prenom) ){
                            $erreurs["prenom"] = "le prénom doit avoir 2 carac mini de A-Z";
                        }

                        if( (strlen( trim($login) ) < 4) || strpos($login, ' ') ){
                            $erreurs["login"] = "mini 4 et pas d'espace";
                        }

                        if( (strlen( trim($mdp) ) < 4) || strpos($mdp, ' ') ){
                            $erreurs["mdp"] = "mini 4 et pas d'espace";
                        }

                        $user = new User(0, $prenom, $login, $mdp, "CLIENT", $adresse, $cp, $ville);

                        $msgErreurForm = "Veuillez remplir correctement le formulaire ! ";

                        // Si aucune erreur dans l'array 'erreurs'
                        if( count($erreurs)  == 0) {

                            $this->userMdl->new($user);

                            header("location: ?actionClient=login");
                            exit;
                        }
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