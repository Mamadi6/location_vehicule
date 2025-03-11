<?php

class Reservation{

    private $id;
    private $debut;
    private $fin;
    private $dateReservation;
    private $client;
    private $vehicule;

    public function __construct( $id,  $debut,  $fin,  $dateReservation,  $client,  $vehicule){$this->id = $id;$this->debut = $debut;$this->fin = $fin;$this->dateReservation = $dateReservation;$this->client = $client;$this->vehicule = $vehicule;}
	

    public function getId() {return $this->id;}

	public function getDebut() {return $this->debut;}

	public function getFin() {return $this->fin;}

	public function getDateReservation() {return $this->dateReservation;}

	public function getClient() {return $this->client;}

	public function getVehicule() {return $this->vehicule;}

	

    public function setId( $id): void {$this->id = $id;}

	public function setDebut( $debut): void {$this->debut = $debut;}

	public function setFin( $fin): void {$this->fin = $fin;}

	public function setDateReservation( $dateReservation): void {$this->dateReservation = $dateReservation;}

	public function setClient( $client): void {$this->client = $client;}

	public function setVehicule( $vehicule): void {$this->vehicule = $vehicule;}

	

    
}