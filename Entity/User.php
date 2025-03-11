<?php

class User{

    private $id;
    private $prenom;
    private $nom;
    private $login;
    private $mdp;
    private $role;
    private $adresse;
    private $cp;
    private $dateInscription;

    public function __construct( $id,  $prenom,  $nom,  $login,  $mdp,  $role,  $adresse,  $cp,  $dateInscription){$this->id = $id;$this->prenom = $prenom;$this->nom = $nom;$this->login = $login;$this->mdp = $mdp;$this->role = $role;$this->adresse = $adresse;$this->cp = $cp;$this->dateInscription = $dateInscription;}
	
    public function getId() {return $this->id;}

	public function getPrenom() {return $this->prenom;}

	public function getNom() {return $this->nom;}

	public function getLogin() {return $this->login;}

	public function getMdp() {return $this->mdp;}

	public function getRole() {return $this->role;}

	public function getAdresse() {return $this->adresse;}

	public function getCp() {return $this->cp;}

	public function getDateInscription() {return $this->dateInscription;}

	
    public function setId( $id): void {$this->id = $id;}

	public function setPrenom( $prenom): void {$this->prenom = $prenom;}

	public function setNom( $nom): void {$this->nom = $nom;}

	public function setLogin( $login): void {$this->login = $login;}

	public function setMdp( $mdp): void {$this->mdp = $mdp;}

	public function setRole( $role): void {$this->role = $role;}

	public function setAdresse( $adresse): void {$this->adresse = $adresse;}

	public function setCp( $cp): void {$this->cp = $cp;}

	public function setDateInscription( $dateInscription): void {$this->dateInscription = $dateInscription;}

	
}