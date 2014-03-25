<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblcritique
 * @desc TABLE  : tbl_Critique
 * @file Tblcritique.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblcritique
{

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var string - type SQL : text $_critique
	 * @desc __A_SPECIFIER__
	 */ 
	private $_critique ; 

	/* 
	 * @var int - type SQL : int $_active
	 * @desc __A_SPECIFIER__
	 */ 
	private $_active ; 

	/* 
	 * @var int - type SQL : smallint $_idInternaute
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idInternaute ; 

	/* 
	 * @var int - type SQL : int $_FKidAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_FKidAlbum ; 

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
	 * @desc SETTER AND GETTER FOR $_critique
	 * @var string $critique
	 */ 
	public function setCritique($critique)
	{
		$this->_critique = $critique ;
		return $this;

	}
	public function getCritique()
	{
		return $this->_critique ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_active
	 * @var int $active
	 */ 
	public function setActive($active)
	{
		$this->_active = $active ;
		return $this;

	}
	public function getActive()
	{
		return $this->_active ;
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

	/* 
	 * @desc SETTER AND GETTER FOR $_FKidAlbum
	 * @var int $FKidAlbum
	 */ 
	public function setFKidAlbum($FKidAlbum)
	{
		$this->_FKidAlbum = $FKidAlbum ;
		return $this;

	}
	public function getFKidAlbum()
	{
		return $this->_FKidAlbum ;
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
