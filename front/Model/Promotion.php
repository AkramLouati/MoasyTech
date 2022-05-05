<?php
class Promotion
{
	private $Id = null;
	private $nom = null;
	private $DateD = null;
	private $DateF = null;
	private $PrixA = null;
	private $Remise = null;
	private $PrixN = null;

	private $password = null;
	function __construct($Id, $nom, $DateD, $DateF, $PrixA, $Remise, $PrixN)
	{
		$this->Id = $Id;
		$this->nom = $nom;
		$this->DateD = $DateD;
		$this->DateF = $DateF;
		$this->PrixA = $PrixA;
		$this->Remise = $Remise;
		$this->PrixN = $PrixN;
	}
	function getId()
	{
		return $this->Id;
	}
	function getNom()
	{
		return $this->nom;
	}
	function getDateD()
	{
		return $this->DateD;
	}
	function getDateF()
	{
		return $this->DateF;
	}
	function getPrixA()
	{
		return $this->PrixA;
	}
	function getRemise()
	{
		return $this->Remise;
	}
	function getPrixN()
	{
		return $this->PrixN;
	}
	function setNom(string $nom)
	{
		$this->nom = $nom;
	}
	function setDateD(string $DateD)
	{
		$this->DateD = $DateD;
	}
	function setDateF(string $DateF)
	{
		$this->DateF = $DateF;
	}
	function setPrixA(string $PrixA)
	{
		$this->PrixA = $PrixA;
	}
	function setRemise(string $Remise)
	{
		$this->Remise = $Remise;
	}
	function setPrixN(string $PrixN)
	{
		$this->PrixN = $PrixN;
	}
}
