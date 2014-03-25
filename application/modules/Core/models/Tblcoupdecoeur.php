<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblcoupdecoeur
 * @desc TABLE  : tbl_Coup_de_coeur
 * @file Tblcoupdecoeur.php
 * @desc PK     : idNumero
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblcoupdecoeur
{

	/* 
	 * @var int - type SQL : int $_idNumero
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idNumero ; 

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var string - type SQL : date $_dateCreation
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateCreation ; 

	/* 
	 * @var int - type SQL : smallint $_idInternaute
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idInternaute ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idNumero
	 * @var int $idNumero
	 */ 
	public function setIdNumero($idNumero)
	{
		$this->_idNumero = $idNumero ;
		return $this;

	}
	public function getIdNumero()
	{
		return $this->_idNumero ;
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
	 * @desc SETTER AND GETTER FOR $_dateCreation
	 * @var string $dateCreation
	 */ 
	public function setDateCreation($dateCreation)
	{
		$this->_dateCreation = $dateCreation ;
		return $this;

	}
	public function getDateCreation()
	{
		return $this->_dateCreation ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idInternaute
	 * @var int $idInternaute
	 */ 
	public function setIdInternaute($idInternaute)
	{
		$this->_idInternaute = $idInternaute ;
		return $this;

	}
	public function getIdInternaute()
	{
		return $this->_idInternaute ;
	}
}
