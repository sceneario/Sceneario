<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblexpos
 * @desc TABLE  : tbl_Expos
 * @file Tblexpos.php
 * @desc PK     : _id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblexpos
{

	/* 
	 * @var int - type SQL : int $__id
	 * @desc __A_SPECIFIER__
	 */ 
	private $__id ; 

	/* 
	 * @var string - type SQL : varchar $_idexpo
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idexpo ; 

	/* 
	 * @var string - type SQL : varchar $_titre
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titre ; 

	/* 
	 * @var string - type SQL : text $_sousTitre
	 * @desc __A_SPECIFIER__
	 */ 
	private $_sousTitre ; 

	/* 
	 * @var int - type SQL : int $_annee
	 * @desc __A_SPECIFIER__
	 */ 
	private $_annee ; 

	/* 
	 * @var string - type SQL : varchar $_idAlbums
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbums ; 

	/* 
	 * @var string - type SQL : varchar $_idAuteurs
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAuteurs ; 

	/* 
	 * @var string - type SQL : varchar $_idStats
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idStats ; 

	/* 
	 * @var string - type SQL : varchar $_date
	 * @desc __A_SPECIFIER__
	 */ 
	private $_date ; 

	/* 
	 * @var string - type SQL : varchar $_image
	 * @desc __A_SPECIFIER__
	 */ 
	private $_image ; 

	/* 
	 * @var string - type SQL : char $_enligne
	 * @desc __A_SPECIFIER__
	 */ 
	private $_enligne ; 

	/* 
	 * @var string - type SQL : datetime $_dateajout
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateajout ; 


	/* 
	 * @desc SETTER AND GETTER FOR $__id
	 * @var int $_id
	 */ 
	public function set_id($_id)
	{
		$this->__id = $_id ;
		return $this;

	}
	public function get_id()
	{
		return $this->__id ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idexpo
	 * @var string $idexpo
	 */ 
	public function setIdexpo($idexpo)
	{
		$this->_idexpo = $idexpo ;
		return $this;

	}
	public function getIdexpo()
	{
		return $this->_idexpo ;
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
	 * @desc SETTER AND GETTER FOR $_sousTitre
	 * @var string $sousTitre
	 */ 
	public function setSousTitre($sousTitre)
	{
		$this->_sousTitre = $sousTitre ;
		return $this;

	}
	public function getSousTitre()
	{
		return $this->_sousTitre ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_annee
	 * @var int $annee
	 */ 
	public function setAnnee($annee)
	{
		$this->_annee = $annee ;
		return $this;

	}
	public function getAnnee()
	{
		return $this->_annee ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idAlbums
	 * @var string $idAlbums
	 */ 
	public function setIdAlbums($idAlbums)
	{
		$this->_idAlbums = $idAlbums ;
		return $this;

	}
	public function getIdAlbums()
	{
		return $this->_idAlbums ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idAuteurs
	 * @var string $idAuteurs
	 */ 
	public function setIdAuteurs($idAuteurs)
	{
		$this->_idAuteurs = $idAuteurs ;
		return $this;

	}
	public function getIdAuteurs()
	{
		return $this->_idAuteurs ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idStats
	 * @var string $idStats
	 */ 
	public function setIdStats($idStats)
	{
		$this->_idStats = $idStats ;
		return $this;

	}
	public function getIdStats()
	{
		return $this->_idStats ;
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
	 * @desc SETTER AND GETTER FOR $_image
	 * @var string $image
	 */ 
	public function setImage($image)
	{
		$this->_image = $image ;
		return $this;

	}
	public function getImage()
	{
		return $this->_image ;
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
	 * @desc SETTER AND GETTER FOR $_dateajout
	 * @var string $dateajout
	 */ 
	public function setDateajout($dateajout)
	{
		$this->_dateajout = $dateajout ;
		return $this;

	}
	public function getDateajout()
	{
		return $this->_dateajout ;
	}
}
