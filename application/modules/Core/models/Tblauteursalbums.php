<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblauteursalbums
 * @desc TABLE  : tbl_Auteurs_Albums
 * @file Tblauteursalbums.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblauteursalbums
{

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var int - type SQL : int $_idAuteur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAuteur ; 

	/* 
	 * @var string - type SQL : char $_cdRole
	 * @desc __A_SPECIFIER__
	 */ 
	private $_cdRole ; 

	/* 
	 * @var string - type SQL : date $_datecreation
	 * @desc __A_SPECIFIER__
	 */ 
	private $_datecreation ; 


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
	 * @desc SETTER AND GETTER FOR $_cdRole
	 * @var string $cdRole
	 */ 
	public function setCdRole($cdRole)
	{
		$this->_cdRole = $cdRole ;
		return $this;

	}
	public function getCdRole()
	{
		return $this->_cdRole ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_datecreation
	 * @var string $datecreation
	 */ 
	public function setDatecreation($datecreation)
	{
		$this->_datecreation = $datecreation ;
		return $this;

	}
	public function getDatecreation()
	{
		return $this->_datecreation ;
	}
}
