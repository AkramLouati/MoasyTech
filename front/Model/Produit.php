<?php
class Produit
{
	private $Id;
	private $Nom;

	function __construct($Nom)
	{
		$this->Nom = $Nom;
	}
	function getNom()
	{
		return $this->Nom;
	}
	function setId(int $Id)
	{
		$this->Id = $Id;
	}
	function setNom(string $Nom)
	{
		$this->Nom = $Nom;
	}
}
