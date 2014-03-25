<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblcalendrier
 * @desc TABLE  : tbl_Calendrier
 * @file Tblcalendrier.php
 * @desc PK     : __A_SPECIFIER__
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblcalendrier
{

	/* 
	 * @var TABLE - type SQL : TABLE $_TE
	 * @desc __A_SPECIFIER__
	 */ 
	private $_TE ; 

	/* 
	 * @var string - type SQL : date $_dateDeb
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateDeb ; 

	/* 
	 * @var string - type SQL : date $_dateFin
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateFin ; 

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
	 * @var string - type SQL : time $_heure
	 * @desc __A_SPECIFIER__
	 */ 
	private $_heure ; 

	/* 
	 * @var int - type SQL : bigint $_categorie
	 * @desc __A_SPECIFIER__
	 */ 
	private $_categorie ; 

	/* 
	 * @var string - type SQL : text $_lien
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lien ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_TE
	 * @var TABLE $TE
	 */ 
	public function setTE($TE)
	{
		$this->_TE = $TE ;
		return $this;

	}
	public function getTE()
	{
		return $this->_TE ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateDeb
	 * @var string $dateDeb
	 */ 
	public function setDateDeb($dateDeb)
	{
		$this->_dateDeb = $dateDeb ;
		return $this;

	}
	public function getDateDeb()
	{
		return $this->_dateDeb ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateFin
	 * @var string $dateFin
	 */ 
	public function setDateFin($dateFin)
	{
		$this->_dateFin = $dateFin ;
		return $this;

	}
	public function getDateFin()
	{
		return $this->_dateFin ;
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
	 * @desc SETTER AND GETTER FOR $_categorie
	 * @var int $categorie
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
}
