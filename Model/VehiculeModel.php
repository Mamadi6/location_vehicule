<?php

class VehiculeModel extends ModelAbstract{

    public function vehicules(){
        $stmt = $this->executerequete("SELECT * FROM vehicule");

        $tab = [];

        while($res = $stmt->fetch()){
            extract($res);
            $tab[] = new Vehicule($id, $marque, $couleur, $description, $prix_journalier, $photo);
        }

        return $tab;
    }

    public function new($objet){

    }


    public function update($objet){

    }

    public function show($identifiant){
        $stmt = $this->getOne("vehicule", $identifiant);

        if( $stmt->rowCount() == 0 ){
            throw new Exception("Ce véhicule n'a jamais existé sur terre");
        }

        extract($stmt->fetch());

        return new Vehicule($id, $marque, $couleur, $description, $prix_journalier, $photo);
    }

    public function delete($identifiant){

    }
}