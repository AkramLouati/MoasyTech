<?php
class Promotion
{
	private $Id = null;
	private $IMG = null;
	private $Nom = null;
	private $DateD = null;
	private $DateF = null;
	private $PrixA = null;
	private $Remise = null;
	private $PrixN = null;

	private $password = null;
	function __construct($Id, $IMG, $Nom, $DateD, $DateF, $PrixA, $Remise, $PrixN)
	{
		$this->Id = $Id;
		$this->IMG = $IMG;
		$this->Nom = $Nom;
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
	function getIMG()
	{
		return $this->IMG;
	}
	function getNom()
	{
		return $this->Nom;
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
	function setIMG(string $IMG)
	{
		$this->IMG = $IMG;
	}
	function setNom(string $Nom)
	{
		$this->Nom = $Nom;
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
