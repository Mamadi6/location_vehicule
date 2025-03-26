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

                    // test si date fin > date debut
                    if( $fin > $debut && $debut >= date("Y-m-d") ){

                        // CALCUL : NOMBRE DE JOUR
                        $d1 = new DateTime($debut);
                        $d2 = new DateTime($fin);

                        $int = $d1->diff($d2);

                        $nbJours = $int->days;
                        $_POST['total'] = $prix*$nbJours;
                        $reservation= new Reservation($_POST);

                        $this->reservationMdl->new($reservation);
                    }
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