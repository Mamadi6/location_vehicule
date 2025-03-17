<?php

 class UserModel extends ModelAbstract{

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

    public function new($user){

/**
 * 
$query = "INSERT INTO user VALUES(NULL, :prenom, :login, :mdp, :role, :adrr, :cp, :ville, now())";
    */
        $query = "INSERT INTO user (prenom, login, mdp, role, adresse, cp, ville) VALUES(:prenom, :login, :mdp, :role, :adrr, :cp, :ville)";

        $this->executerequete($query, [
            "prenom"    => $user->getPrenom(),
            "login"     => $user->getLogin(),
            "mdp"       => password_hash($user->getMdp(), PASSWORD_DEFAULT),
            "role"      => $user->getRole(),
            "adrr"      => $user->getAdresse(),
            "cp"        => $user->getCp(),
            "ville"     => $user->getVille()
        ]);
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
    }

    public function show($identifiant){

        $stmt = $this->getOne("user", $identifiant);

        $res = $stmt->fetch();
        extract($res);
        
        return new User($id, $prenom, $login, $mdp, $role, $adresse, $cp, $ville, $dateInscription);
        
    }

    public function delete($identifiant){
        $this->executerequete("DELETE FROM user WHERE id = :id", ["id" => $identifiant]);
    }

 }