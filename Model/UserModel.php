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

    public function update($objet) {
        
        
    }

    public function show($identifiant){
        
    }

    public function delete($identifiant){
        $this->executerequete("DELETE FROM user WHERE id = :id", ["id" => $identifiant]);
    }

 }