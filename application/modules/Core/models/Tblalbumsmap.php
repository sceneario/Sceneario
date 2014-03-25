<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblalbumsmap
 * @desc TABLE  : tbl_Albums_Map
 * @file Tblalbumsmap.php
 * @desc PK     : idLieu
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblalbumsmap
{

	/* 
	 * @var int - type SQL : int $_idLieu
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idLieu ; 

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var string - type SQL : varchar $_adresse
	 * @desc __A_SPECIFIER__
	 */ 
	private $_adresse ; 

	/* 
	 * @var string - type SQL : varchar $_pays
	 * @desc __A_SPECIFIER__
	 */ 
	private $_pays ; 

	/* 
	 * @var string - type SQL : varchar $_latitude
	 * @desc __A_SPECIFIER__
	 */ 
	private $_latitude ; 

	/* 
	 * @var string - type SQL : varchar $_longitude
	 * @desc __A_SPECIFIER__
	 */ 
	private $_longitude ; 

	/* 
	 * @var string - type SQL : char $_epoque
	 * @desc __A_SPECIFIER__
	 */ 
	private $_epoque ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idLieu
	 * @var int $idLieu
	 */ 
	public function setIdLieu($idLieu)
	{
		$this->_idLieu = $idLieu ;
		return $this;

	}
	public function getIdLieu()
	{
		return $this->_idLieu ;
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
	 * @desc SETTER AND GETTER FOR $_adresse
	 * @var string $adresse
	 */ 
	public function setAdresse($adresse)
	{
		$this->_adresse = $adresse ;
		return $this;

	}
	public function getAdresse()
	{
		return $this->_adresse ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_pays
	 * @var string $pays
	 */ 
	public function setPays($pays)
	{
		$this->_pays = $pays ;
		return $this;

	}
	public function getPays()
	{
		return $this->_pays ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_latitude
	 * @var string $latitude
	 */ 
	public function setLatitude($latitude)
	{
		$this->_latitude = $latitude ;
		return $this;

	}
	public function getLatitude()
	{
		return $this->_latitude ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_longitude
	 * @var string $longitude
	 */ 
	public function setLongitude($longitude)
	{
		$this->_longitude = $longitude ;
		return $this;

	}
	public function getLongitude()
	{
		return $this->_longitude ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_epoque
	 * @var string $epoque
	 */ 
	public function setEpoque($epoque)
	{
		$this->_epoque = $epoque ;
		return $this;

	}
	public function getEpoque()
	{
		return $this->_epoque ;
	}
}
