<?php 

/*
 * SCENEARIO.COM
 * Table des dossiers ou carnet de croquis
 * @desc CLASSE : Core_Model_Tbldossiers
 * @desc TABLE  : tbl_Dossiers
 * @file Tbldossiers.php
 * @desc PK     : idDossier
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tbldossiers
{

	/* 
	 * @var string - type SQL : varchar $_idDossier
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idDossier ; 

	/* 
	 * @var string - type SQL : varchar $_lienDossier
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienDossier ; 

	/* 
	 * @var string - type SQL : varchar $_titreDossier
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titreDossier ; 

	/* 
	 * @var string - type SQL : date $_dateDossier
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateDossier ; 

	/* 
	 * @var string - type SQL : varchar $_typeDossier
	 * @desc __A_SPECIFIER__
	 */ 
	private $_typeDossier ; 

	/* 
	 * @var int - type SQL : tinyint $_lienJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienJava ; 

	/* 
	 * @var string - type SQL : char $_enligne
	 * @desc __A_SPECIFIER__
	 */ 
	private $_enligne ; 

	/* 
	 * @var string - type SQL : varchar $_lienImage
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienImage ; 

	/* 
	 * @var string - type SQL : text $_titreSommaire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titreSommaire ; 

	/* 
	 * @var string - type SQL : text $_texte
	 * @desc __A_SPECIFIER__
	 */ 
	private $_texte ; 

	/* 
	 * @var int - type SQL : int $_type
	 * @desc __A_SPECIFIER__
	 */ 
	private $_type ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idDossier
	 * @var string $idDossier
	 */ 
	public function setIdDossier($idDossier)
	{
		$this->_idDossier = $idDossier ;
		return $this;

	}
	public function getIdDossier()
	{
		return $this->_idDossier ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienDossier
	 * @var string $lienDossier
	 */ 
	public function setLienDossier($lienDossier)
	{
		$this->_lienDossier = $lienDossier ;
		return $this;

	}
	public function getLienDossier()
	{
		return $this->_lienDossier ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_titreDossier
	 * @var string $titreDossier
	 */ 
	public function setTitreDossier($titreDossier)
	{
		$this->_titreDossier = $titreDossier ;
		return $this;

	}
	public function getTitreDossier()
	{
		return $this->_titreDossier ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateDossier
	 * @var string $dateDossier
	 */ 
	public function setDateDossier($dateDossier)
	{
		$this->_dateDossier = $dateDossier ;
		return $this;

	}
	public function getDateDossier()
	{
		return $this->_dateDossier ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_typeDossier
	 * @var string $typeDossier
	 */ 
	public function setTypeDossier($typeDossier)
	{
		$this->_typeDossier = $typeDossier ;
		return $this;

	}
	public function getTypeDossier()
	{
		return $this->_typeDossier ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienJava
	 * @var int $lienJava
	 */ 
	public function setLienJava($lienJava)
	{
		$this->_lienJava = $lienJava ;
		return $this;

	}
	public function getLienJava()
	{
		return $this->_lienJava ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_enligne
	 * @var string $enligne
	 */ 
	public function setEnligne($enligne)
	{
		$this->_enligne = $enligne ;
		return $this;

	}
	public function getEnligne()
	{
		return $this->_enligne ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienImage
	 * @var string $lienImage
	 */ 
	public function setLienImage($lienImage)
	{
		$this->_lienImage = $lienImage ;
		return $this;

	}
	public function getLienImage()
	{
		return $this->_lienImage ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_titreSommaire
	 * @var string $titreSommaire
	 */ 
	public function setTitreSommaire($titreSommaire)
	{
		$this->_titreSommaire = $titreSommaire ;
		return $this;

	}
	public function getTitreSommaire()
	{
		return $this->_titreSommaire ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_texte
	 * @var string $texte
	 */ 
	public function setTexte($texte)
	{
		$this->_texte = $texte ;
		return $this;

	}
	public function getTexte()
	{
		return $this->_texte ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_type
	 * @var int $type
	 */ 
	public function setType($type)
	{
		$this->_type = $type ;
		return $this;

	}
	public function getType()
	{
		return $this->_type ;
	}
}
