<?php

namespace App\Entity;

class Vehicule{

    private $id;
    private $marque;
    private $couleur;
    private $description;
    private $prix_journalier;
    private $photo;

    public function __construct($data = [])
    {
        foreach ($data as $cle => $valeur) {
            $methode = "set" . ucfirst($cle);

            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }
	
    public function getId() {return $this->id;}

	public function getMarque() {return $this->marque;}

	public function getCouleur() {return $this->couleur;}

	public function getDescription() {return $this->description;}

	public function getPrixJournalier() {return $this->prix_journalier;}

	public function getPhoto() {return $this->photo;}

	
    public function setId( $id): void {$this->id = $id;}

	public function setMarque( $marque): void {$this->marque = $marque;}

	public function setCouleur( $couleur): void {$this->couleur = $couleur;}

	public function setDescription( $description): void {$this->description = $description;}

	public function setPrixJournalier( $prix_journalier): void {$this->prix_journalier = $prix_journalier;}

	public function setPhoto( $photo): void {$this->photo = $photo;}

	
}