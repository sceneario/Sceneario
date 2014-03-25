<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblauteurs
 * @desc TABLE  : tbl_Auteurs
 * @file Tblauteurs.php
 * @desc PK     : idAuteur
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblauteurs
{

	/* 
	 * @var int - type SQL : int $_idAuteur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAuteur ; 

	/* 
	 * @var string - type SQL : varchar $_nomAuteur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomAuteur ; 

	/* 
	 * @var string - type SQL : varchar $_prenomAuteur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_prenomAuteur ; 

	/* 
	 * @var string - type SQL : varchar $_adrWebAuteur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_adrWebAuteur ; 

	/* 
	 * @var string - type SQL : varchar $_adrMailAuteur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_adrMailAuteur ; 

	/* 
	 * @var string - type SQL : text $_biographie
	 * @desc __A_SPECIFIER__
	 */ 
	private $_biographie ; 

	/* 
	 * @var string - type SQL : text $_bibliographie
	 * @desc __A_SPECIFIER__
	 */ 
	private $_bibliographie ; 

	/* 
	 * @var string - type SQL : char $_scenariste
	 * @desc __A_SPECIFIER__
	 */ 
	private $_scenariste ; 

	/* 
	 * @var string - type SQL : char $_coloriste
	 * @desc __A_SPECIFIER__
	 */ 
	private $_coloriste ; 

	/* 
	 * @var string - type SQL : char $_dessinateur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dessinateur ; 

	/* 
	 * @var string - type SQL : date $_dateNaissance
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateNaissance ; 

	/* 
	 * @var string - type SQL : text $_coordonnees
	 * @desc __A_SPECIFIER__
	 */ 
	private $_coordonnees ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idAuteur
	 * @var int $idAuteur
	 */ 
	public function setIdAuteur($idAuteur)
	{
		$this->_idAuteur = $idAuteur ;
		return $this;

	}
	public function getIdAuteur()
	{
		return $this->_idAuteur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nomAuteur
	 * @var string $nomAuteur
	 */ 
	public function setNomAuteur($nomAuteur)
	{
		$this->_nomAuteur = $nomAuteur ;
		return $this;

	}
	public function getNomAuteur()
	{
		return $this->_nomAuteur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_prenomAuteur
	 * @var string $prenomAuteur
	 */ 
	public function setPrenomAuteur($prenomAuteur)
	{
		$this->_prenomAuteur = $prenomAuteur ;
		return $this;

	}
	public function getPrenomAuteur()
	{
		return $this->_prenomAuteur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_adrWebAuteur
	 * @var string $adrWebAuteur
	 */ 
	public function setAdrWebAuteur($adrWebAuteur)
	{
		$this->_adrWebAuteur = $adrWebAuteur ;
		return $this;

	}
	public function getAdrWebAuteur()
	{
		return $this->_adrWebAuteur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_adrMailAuteur
	 * @var string $adrMailAuteur
	 */ 
	public function setAdrMailAuteur($adrMailAuteur)
	{
		$this->_adrMailAuteur = $adrMailAuteur ;
		return $this;

	}
	public function getAdrMailAuteur()
	{
		return $this->_adrMailAuteur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_biographie
	 * @var string $biographie
	 */ 
	public function setBiographie($biographie)
	{
		$this->_biographie = $biographie ;
		return $this;

	}
	public function getBiographie()
	{
		return $this->_biographie ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_bibliographie
	 * @var string $bibliographie
	 */ 
	public function setBibliographie($bibliographie)
	{
		$this->_bibliographie = $bibliographie ;
		return $this;

	}
	public function getBibliographie()
	{
		return $this->_bibliographie ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_scenariste
	 * @var string $scenariste
	 */ 
	public function setScenariste($scenariste)
	{
		$this->_scenariste = $scenariste ;
		return $this;

	}
	public function getScenariste()
	{
		return $this->_scenariste ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_coloriste
	 * @var string $coloriste
	 */ 
	public function setColoriste($coloriste)
	{
		$this->_coloriste = $coloriste ;
		return $this;

	}
	public function getColoriste()
	{
		return $this->_coloriste ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dessinateur
	 * @var string $dessinateur
	 */ 
	public function setDessinateur($dessinateur)
	{
		$this->_dessinateur = $dessinateur ;
		return $this;

	}
	public function getDessinateur()
	{
		return $this->_dessinateur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateNaissance
	 * @var string $dateNaissance
	 */ 
	public function setDateNaissance($dateNaissance)
	{
		$this->_dateNaissance = $dateNaissance ;
		return $this;

	}
	public function getDateNaissance()
	{
		return $this->_dateNaissance ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_coordonnees
	 * @var string $coordonnees
	 */ 
	public function setCoordonnees($coordonnees)
	{
		$this->_coordonnees = $coordonnees ;
		return $this;

	}
	public function getCoordonnees()
	{
		return $this->_coordonnees ;
	}
}
