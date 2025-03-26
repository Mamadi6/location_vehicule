<?php

class ReservationModel extends ModelAbstract{

    function new($reservation){
        if(new DateTime($reservation->getDebut()) < new Datetime($reservation->getFin())){
            
            $query= "INSERT INTO reservation(debut, fin, total, client, vehicule) VALUES(:debut, :fin, :total, :client, :vehicule)";

            $stmt= $this->executerequete($query,[
                "debut"=>$reservation->getDebut(),
                "fin"=>$reservation->getFin(),
                "total"=>$reservation->getTotal(),
                "client"=>$reservation->getClient(),
                "vehicule"=>$reservation->getVehicule()
            ]);
            }else{
                return "erreur de date";
            }
    }

    public function reservationByClient($idClient){
        $query = "SELECT * FROM reservation WHERE client = :client";

        $stmt = $this->executerequete($query, ["client" => $idClient]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Reservation");

        return $stmt->fetchAll();
    }

    function update($objet){

    }

    function show($identifiant){

    }

    function delete($identifiant){

    }

}