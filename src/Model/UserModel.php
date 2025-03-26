<?php

namespace App\Model;

class UserModel extends ModelAbstract{


    public function login($login, $mdp){
        $query = "SELECT * FROM user WHERE login = :login";

        $stmt = $this->executerequete($query, ["login" => $login]);

        if( $stmt->rowCount() == 1 ){
            $stmt->setFetchMode(\PDO::FETCH_CLASS, "App\Entity\User");

            $user = $stmt->fetch();

            if( password_verify($mdp, $user->getMdp()) ){
                return $user;
            }
            
        }

        return null;
    }


    public function show($identifiant){
        
    }
    
    public function new($objet){
        
    }
    
    public function update($objet){
        
    }
    
    public function delete($identifiant){
        
    }
    
}