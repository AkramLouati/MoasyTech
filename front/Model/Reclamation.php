<?php
class Reclamation
{
	private $Id = null;
	private $Nom = null;
	private $PreNom = null;
	private $TexteR = null;
	private $Email = null;
	private $DateR = null;

	private $password = null;
	function __construct($Id, $Nom, $PreNom, $TexteR, $Email, $DateR)
	{
		$this->Id = $Id;
		$this->Nom = $Nom;
		$this->PreNom = $PreNom;
		$this->TexteR = $TexteR;
		$this->Email = $Email;
		$this->DateR = $DateR;
	}
	function getId()
	{
		return $this->Id;
	}
	function getNom()
	{
		return $this->Nom;
	}
	function getPreNom()
	{
		return $this->PreNom;
	}
	function getTexteR()
	{
		return $this->TexteR;
	}
	function getEmail()
	{
		return $this->Email;
	}
	function getDateR()
	{
		return $this->DateR;
	}
	function setNom(string $Nom)
	{
		$this->Nom = $Nom;
	}
	function setPreNom(string $PreNom)
	{
		$this->PreNom = $PreNom;
	}
	function setTexteR(string $TexteR)
	{
		$this->TexteR = $TexteR;
	}
	function setEmail(string $Email)
	{
		$this->Email = $Email;
	}
	function setDateR(string $DateR)
	{
		$this->DateR = $DateR;
	}
}
