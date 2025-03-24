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

    function update($objet){

    }

    function show($identifiant){

    }

    function delete($identifiant){

    }

}