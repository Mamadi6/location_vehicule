<?php

 class UserModel extends ModelAbstract{


    /**
     * Connexion user. retounrne un user sinon null 
     * @return User
     */
    public function login(string $login, string $mdpForm){
        
        $stmt = $this->executerequete("SELECT * FROM user WHERE login = :login", ["login" => $login]);


        // TEST si on a une ligne récupérée par le 'login'
        if( $stmt->rowCount() ){
            extract($stmt->fetch());

            // TEST si le mdp de la BD est égal qu mdpFormulaire
            if( password_verify($mdpForm, $mdp) ){
               
                //On retourne un 'USER'
                $user = $this->findById($id);
                return $user;
            }
        }

        // Si LOGIN et MDP pas correctes, on retourne NULL
        return null;
    }


    /**
     * Retourne la liste de tous les clients
     * @return list User
     */
    public function findAll(){
        $stmt = $this->getAll("user");

        $tab = [];

        while($res = $stmt->fetch()){
            extract($res);

            $tab[] = new User($id, $prenom, $login, $mdp, $role, $adresse, $cp, $ville, $dateInscription);
        }

        return $tab;
    }

    /**
     * retourne un client 
     * prend en paramètre un id
     * @return User
     */
    function findById(int $id){
        $stmt = $this->getOne("user", $id);

        // fetch retourne une ligne si pas de ligne, null
        $res = $stmt->fetch();
        extract($res);

        return new User($id, $prenom, $login, $mdp, $role, $adresse, $cp, $ville, $dateInscription);
    }

    public function isLogin(string $login) {
        return $this->executerequete("SELECT * FROM user WHERE login = :login", ["login" => $login]);
    }

    public function new($user){
        // VERIFIER SI LOGIN EXISTE EN BD
        if( $this->isLogin($user->getLogin())->rowCount() ){
            throw new Exception("Ce login '". $user->getLogin() ."' existe déjà");
        }

        $query = "INSERT INTO user (prenom, login, mdp, role, adresse, cp, ville) VALUES(:prenom, :login, :mdp, :role, :adrr, :cp, :ville)";

        $stmt = $this->executerequete($query, [
            "prenom"    => $user->getPrenom(),
            "login"     => $user->getLogin(),
            "mdp"       => password_hash($user->getMdp(), PASSWORD_DEFAULT),
            "role"      => $user->getRole(),
            "adrr"      => $user->getAdresse(),
            "cp"        => $user->getCp(),
            "ville"     => $user->getVille()
        ]);

        if($stmt->rowCount()){
            $_SESSION["success"] = "L'inscription a bien réussie";
        }
    }

    public function update($user) {
        $query = "UPDATE user SET prenom = :prenom, login = :login, role = :role, adresse = :adresse, cp = :cp, ville = :ville WHERE id = :id";

        $data = ["prenom" =>$user->getPrenom(),
                 "login" =>$user->getLogin(),
                 "role" =>$user->getRole(),
                 "adresse" =>$user->getAdresse(),
                 "cp" =>$user->getCp(),
                 "ville" =>$user->getVille(),
                 "id" =>$user->getId()];

        $stmt = $this->executerequete($query, $data);

        if($stmt->rowCount()){
            $_SESSION["success"] = "La mise à jour a bien réussie";
        }
    }

    public function show($identifiant){

        $stmt = $this->getOne("user", $identifiant);

        // Vérifie si le user existe avnt consultation
        if( $stmt->rowCount() == 0 ){
            throw new Exception(" ce client n'existe pas");
        }

        $res = $stmt->fetch();
        extract($res);
        
        return new User($id, $prenom, $login, $mdp, $role, $adresse, $cp, $ville, $dateInscription);
        
    }

    public function delete($identifiant){
        $stmt = $this->executerequete("DELETE FROM user WHERE id = :id", ["id" => $identifiant]);

        if($stmt->rowCount()){
            $_SESSION["success"] = "La suppression a bien réussie";
        }
    }

 }