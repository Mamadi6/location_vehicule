<?php

class Vehicule
{

	private int $id;
	private string $marque;
	private string $couleur;
	private string $description;
	private float $prix_journalier;
	private string $photo;

	public function __construct(int $id, string $marque, string $couleur, string $description, float $prix_journalier, string $photo)
	{
		$this->id = $id;
		$this->marque = $marque;
		$this->couleur = $couleur;
		$this->description = $description;
		$this->prix_journalier = $prix_journalier;
		$this->photo = $photo;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getMarque(): string
	{
		return $this->marque;
	}

	public function getCouleur(): string
	{
		return $this->couleur;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function getPrixJournalier(): float
	{
		return $this->prix_journalier;
	}

	public function getPhoto(): string
	{
		return $this->photo;
	}

	public function setId(int $id): void
	{
		$this->id = $id;
	}

	public function setMarque(string $marque): void
	{
		$this->marque = $marque;
	}

	public function setCouleur(string $couleur): void
	{
		$this->couleur = $couleur;
	}

	public function setDescription(string $description): void
	{
		$this->description = $description;
	}

	public function setPrixJournalier(float $prix_journalier): void
	{
		$this->prix_journalier = $prix_journalier;
	}

	public function setPhoto(string $photo): void
	{
		$this->photo = $photo;
	}
}
