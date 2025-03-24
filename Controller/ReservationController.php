<?php

class ReservationController extends ControllerAbstract{

    private $reservationMdl;

    function __construct(){
        $this->reservationMdl= new ReservationModel;
 
    }

    public function reservationAction(){
        $reservation = new Reservation(0,"", "", "","", "", "");  


    if(isset($_GET['actionReservation'])){
        extract($_GET);

        switch ($actionReservation) {
            case 'new':
                
                if(isset($_POST['debut'])){
                    extract($_POST);
                    $reservation= new Reservation(0, $debut, $fin,"", $total, $client, $vehicule);
                    $this->reservationMdl->new($reservation);
                }

                include "Vue/reservation/new.phtml";
                exit;
                break;
            
            case 'show':
                # code...
                break;
            
            case 'update':
                # code...
                break;
            
            case 'delete':
                # code...
                break;
            
            default:
                # code...
                break;
        }
    }

    }



}