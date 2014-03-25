<?php 

/*
 * SCENEARIO.COM
 * Table d''entête des concours
 * @desc CLASSE : Core_Model_Tblconcoursent
 * @desc TABLE  : tbl_Concours_Ent
 * @file Tblconcoursent.php
 * @desc PK     : nomConcours
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblconcoursent
{

	/* 
	 * @var string - type SQL : varchar $_nomConcours
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomConcours ; 

	/* 
	 * @var string - type SQL : varchar $_libelleConcours
	 * @desc __A_SPECIFIER__
	 */ 
	private $_libelleConcours ; 

	/* 
	 * @var string - type SQL : date $_dateDebut
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateDebut ; 

	/* 
	 * @var string - type SQL : date $_dateFin
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateFin ; 

	/* 
	 * @var string - type SQL : text $_urlminisite
	 * @desc __A_SPECIFIER__
	 */ 
	private $_urlminisite ; 

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var string - type SQL : text $_entete
	 * @desc __A_SPECIFIER__
	 */ 
	private $_entete ; 

	/* 
	 * @var string - type SQL : text $_commentaire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_commentaire ; 

	/* 
	 * @var string - type SQL : text $_reglement
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reglement ; 

	/* 
	 * @var string - type SQL : text $_resultats
	 * @desc __A_SPECIFIER__
	 */ 
	private $_resultats ; 

	/* 
	 * @var string - type SQL : char $_enligne
	 * @desc __A_SPECIFIER__
	 */ 
	private $_enligne ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_nomConcours
	 * @var string $nomConcours
	 */ 
	public function setNomConcours($nomConcours)
	{
		$this->_nomConcours = $nomConcours ;
		return $this;

	}
	public function getNomConcours()
	{
		return $this->_nomConcours ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_libelleConcours
	 * @var string $libelleConcours
	 */ 
	public function setLibelleConcours($libelleConcours)
	{
		$this->_libelleConcours = $libelleConcours ;
		return $this;

	}
	public function getLibelleConcours()
	{
		return $this->_libelleConcours ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateDebut
	 * @var string $dateDebut
	 */ 
	public function setDateDebut($dateDebut)
	{
		$this->_dateDebut = $dateDebut ;
		return $this;

	}
	public function getDateDebut()
	{
		return $this->_dateDebut ;
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
	 * @desc SETTER AND GETTER FOR $_urlminisite
	 * @var string $urlminisite
	 */ 
	public function setUrlminisite($urlminisite)
	{
		$this->_urlminisite = $urlminisite ;
		return $this;

	}
	public function getUrlminisite()
	{
		return $this->_urlminisite ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idAlbum
	 * @var int $idAlbum
	 */ 
	public function setIdAlbum($idAlbum)
	{
		$this->_idAlbum = $idAlbum ;
		return $this;

	}
	public function getIdAlbum()
	{
		return $this->_idAlbum ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_entete
	 * @var string $entete
	 */ 
	public function setEntete($entete)
	{
		$this->_entete = $entete ;
		return $this;

	}
	public function getEntete()
	{
		return $this->_entete ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_commentaire
	 * @var string $commentaire
	 */ 
	public function setCommentaire($commentaire)
	{
		$this->_commentaire = $commentaire ;
		return $this;

	}
	public function getCommentaire()
	{
		return $this->_commentaire ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reglement
	 * @var string $reglement
	 */ 
	public function setReglement($reglement)
	{
		$this->_reglement = $reglement ;
		return $this;

	}
	public function getReglement()
	{
		return $this->_reglement ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_resultats
	 * @var string $resultats
	 */ 
	public function setResultats($resultats)
	{
		$this->_resultats = $resultats ;
		return $this;

	}
	public function getResultats()
	{
		return $this->_resultats ;
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
}
