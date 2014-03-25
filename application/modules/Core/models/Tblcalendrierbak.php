<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblcalendrierbak
 * @desc TABLE  : tbl_Calendrier_bak
 * @file Tblcalendrierbak.php
 * @desc PK     : idCalendrier
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblcalendrierbak
{

	/* 
	 * @var int - type SQL : int $_idCalendrier
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idCalendrier ; 

	/* 
	 * @var string - type SQL : varchar $_categorie
	 * @desc __A_SPECIFIER__
	 */ 
	private $_categorie ; 

	/* 
	 * @var string - type SQL : varchar $_actif
	 * @desc __A_SPECIFIER__
	 */ 
	private $_actif ; 

	/* 
	 * @var string - type SQL : varchar $_lieu
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lieu ; 

	/* 
	 * @var string - type SQL : date $_date
	 * @desc __A_SPECIFIER__
	 */ 
	private $_date ; 

	/* 
	 * @var string - type SQL : time $_heure
	 * @desc __A_SPECIFIER__
	 */ 
	private $_heure ; 

	/* 
	 * @var int - type SQL : int $_duree
	 * @desc __A_SPECIFIER__
	 */ 
	private $_duree ; 

	/* 
	 * @var string - type SQL : varchar $_lien
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lien ; 

	/* 
	 * @var string - type SQL : varchar $_titre
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titre ; 

	/* 
	 * @var string - type SQL : text $_description
	 * @desc __A_SPECIFIER__
	 */ 
	private $_description ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idCalendrier
	 * @var int $idCalendrier
	 */ 
	public function setIdCalendrier($idCalendrier)
	{
		$this->_idCalendrier = $idCalendrier ;
		return $this;

	}
	public function getIdCalendrier()
	{
		return $this->_idCalendrier ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_categorie
	 * @var string $categorie
	 */ 
	public function setCategorie($categorie)
	{
		$this->_categorie = $categorie ;
		return $this;

	}
	public function getCategorie()
	{
		return $this->_categorie ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_actif
	 * @var string $actif
	 */ 
	public function setActif($actif)
	{
		$this->_actif = $actif ;
		return $this;

	}
	public function getActif()
	{
		return $this->_actif ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lieu
	 * @var string $lieu
	 */ 
	public function setLieu($lieu)
	{
		$this->_lieu = $lieu ;
		return $this;

	}
	public function getLieu()
	{
		return $this->_lieu ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_date
	 * @var string $date
	 */ 
	public function setDate($date)
	{
		$this->_date = $date ;
		return $this;

	}
	public function getDate()
	{
		return $this->_date ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_heure
	 * @var string $heure
	 */ 
	public function setHeure($heure)
	{
		$this->_heure = $heure ;
		return $this;

	}
	public function getHeure()
	{
		return $this->_heure ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_duree
	 * @var int $duree
	 */ 
	public function setDuree($duree)
	{
		$this->_duree = $duree ;
		return $this;

	}
	public function getDuree()
	{
		return $this->_duree ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lien
	 * @var string $lien
	 */ 
	public function setLien($lien)
	{
		$this->_lien = $lien ;
		return $this;

	}
	public function getLien()
	{
		return $this->_lien ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_titre
	 * @var string $titre
	 */ 
	public function setTitre($titre)
	{
		$this->_titre = $titre ;
		return $this;

	}
	public function getTitre()
	{
		return $this->_titre ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_description
	 * @var string $description
	 */ 
	public function setDescription($description)
	{
		$this->_description = $description ;
		return $this;

	}
	public function getDescription()
	{
		return $this->_description ;
	}
}
