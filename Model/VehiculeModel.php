<?php

class VehiculeModel extends ModelAbstract{

    public function findAll(){
        $stmt = $this->getAll("vehicule");

        $tab = [];

        while ($res = $stmt->fetch()) {
            extract($res);
            $tab []= new Vehicule($id, $marque, $couleur, $description, $prix_journalier, $photo);
        }
        return $tab;

    }

    function findById(int $id){
        $stmt = $this->getOne("vehicule", $id);

        $res = $stmt->fetch();
        extract($res);
    }

    public function vehicules(){
        $stmt = $this->executerequete("SELECT * FROM vehicule");

        $tab = [];

        while($res = $stmt->fetch()){
            extract($res);
            $tab[] = new Vehicule($id, $marque, $couleur, $description, $prix_journalier, $photo);
        }

        return $tab;
    }


    public function show($identifiant){
        $stmt = $this->getOne("vehicule", $identifiant);

        if( $stmt->rowCount() == 0 ){
            throw new Exception("Ce véhicule n'a jamais existé sur terre");
        }

        extract($stmt->fetch());

        return new Vehicule($id, $marque, $couleur, $description, $prix_journalier, $photo);
    }




    public function new($vehicule){
        $query = "INSERT INTO vehicule(marque, couleur, description, prix_journalier, photo) VALUES(:marque, :couleur, :description, :prix_journalier, :photo)";
        $stmt=$this->executerequete($query,[
            "marque" =>$vehicule->getMarque(),
            "couleur" =>$vehicule->getCouleur(),
            "description" =>$vehicule->getDescription(),
            "prix_journalier" =>$vehicule->getPrixJournalier(),
            "photo" =>$vehicule->getPhoto()
        ]);

        
        
    }

    public function update($vehicule){

        $query = "UPDATE vehicule SET marque = :marque, couleur = :couleur, description = :description, prix_journalier = :prix_journalier WHERE id = :id";

        $data = ["marque"   =>$vehicule->getMarque(),
                 "couleur"   =>$vehicule->getCouleur(),
                 "description"   =>$vehicule->getDescription(),
                 "prix_journalier"   =>$vehicule->getPrixJournalier(),
                 "id"   =>$vehicule->getId()
    ];
        $this->executerequete($query, $data);

    }

    public function delete($identifiant){
        $query= "DELETE FROM vehicule WHERE id = :id";
        $this->executerequete($query, ["id"=>$identifiant]);

    }

}
