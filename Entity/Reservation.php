<?php

class Reservation
{

	private int $id;
	private string $debut;
	private string $fin;
	private string $dateReservation;
	private User $client;
	private Vehicule $vehicule;

	public function __construct(int $id, string $debut, string $fin, string $dateReservation, User $client, Vehicule $vehicule)
	{
		$this->id = $id;
		$this->debut = $debut;
		$this->fin = $fin;
		$this->dateReservation = $dateReservation;
		$this->client = $client;
		$this->vehicule = $vehicule;
	}


	public function getId(): int
	{
		return $this->id;
	}

	public function getDebut(): string
	{
		return $this->debut;
	}

	public function getFin(): string
	{
		return $this->fin;
	}

	public function getDateReservation(): string
	{
		return $this->dateReservation;
	}

	public function getClient(): User
	{
		return $this->client;
	}

	public function getVehicule(): Vehicule
	{
		return $this->vehicule;
	}

	public function setId(int $id): void
	{
		$this->id = $id;
	}

	public function setDebut(string $debut): void
	{
		$this->debut = $debut;
	}

	public function setFin(string $fin): void
	{
		$this->fin = $fin;
	}

	public function setDateReservation(string $dateReservation): void
	{
		$this->dateReservation = $dateReservation;
	}

	public function setClient(User $client): void
	{
		$this->client = $client;
	}

	public function setVehicule(Vehicule $vehicule): void
	{
		$this->vehicule = $vehicule;
	}
}
