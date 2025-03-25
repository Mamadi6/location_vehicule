<?php

namespace App\Model;

abstract class ModelAbstract{

    protected $pdo;

    public function __construct()
    {
        include "config.php";

        $dns = "mysql:host=".$serveur.";dbname=".$dbname.";".$port;
   
        $this->pdo = new \PDO($dns, $user, $mdp, [
            \PDO::ATTR_DEFAULT_FETCH_MODE  => \PDO::FETCH_ASSOC,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]);
    }

    /**
     * prend en param la requête et tableau de données optionnel
     */
    public function executerequete($query, $data = []){
        // préparation e larequête
        $stmt = $this->pdo->prepare($query);
        
        /**
         * Boucle pour échapper les caractères spéciaux avec 'htmlentities'
         * A chaque tour de boucle, on remet au même endroit la même valeur mais échappée
         */
        foreach($data as $cle => $value){
            $data[$cle] = htmlentities($value);
        }

        // execution la requête
        $stmt->execute($data);

        return $stmt;
    }

    /**
     * prend en param le nom de la table sur laquelle faire la requête
     */
    public function getAll($table){
        return $this->executerequete("SELECT *  FROM " . $table);
    }

    /**
     * prend en param le nom de la table et d'un ID sur laquelle faire la requête
     */
    public function getOne($table, $id){
        return $this->executerequete("SELECT *  FROM " . $table ." WHERE id = :id", ["id" => $id]);
    }

    // Methodes abstraites à redéfinir aux classes filles obligatoirement

    abstract function new($objet);
    abstract function update($objet);
    abstract function show($identifiant);
    abstract function delete($identifiant);

}