<?php 

/*
 * SCENEARIO.COM
 * Table des prix gagnés par les albums
 * @desc CLASSE : Core_Model_Tblalbumsprix
 * @desc TABLE  : tbl_Albums_Prix
 * @file Tblalbumsprix.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblalbumsprix
{

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var int - type SQL : smallint $_idPrix
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idPrix ; 

	/* 
	 * @var int - type SQL : smallint $_annee
	 * @desc __A_SPECIFIER__
	 */ 
	private $_annee ; 

	/* 
	 * @var string - type SQL : datetime $_date
	 * @desc __A_SPECIFIER__
	 */ 
	private $_date ; 


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
	 * @desc SETTER AND GETTER FOR $_idPrix
	 * @var int $idPrix
	 */ 
	public function setIdPrix($idPrix)
	{
		$this->_idPrix = $idPrix ;
		return $this;

	}
	public function getIdPrix()
	{
		return $this->_idPrix ;
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
}
