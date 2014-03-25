<?php 

/*
 * SCENEARIO.COM
 * Table des genres des albums temporaires
 * @desc CLASSE : Core_Model_Tblgenresalbumspro
 * @desc TABLE  : tbl_Genres_Albums_Pro
 * @file Tblgenresalbumspro.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblgenresalbumspro
{

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var int - type SQL : tinyint $_idGenre
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idGenre ; 


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
	 * @desc SETTER AND GETTER FOR $_idGenre
	 * @var int $idGenre
	 */ 
	public function setIdGenre($idGenre)
	{
		$this->_idGenre = $idGenre ;
		return $this;

	}
	public function getIdGenre()
	{
		return $this->_idGenre ;
	}
}
