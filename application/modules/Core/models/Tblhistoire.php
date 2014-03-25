<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblhistoire
 * @desc TABLE  : tbl_Histoire
 * @file Tblhistoire.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblhistoire
{

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var string - type SQL : text $_histoire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_histoire ; 

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
	 * @var string - type SQL : text $_histoire2
	 * @desc __A_SPECIFIER__
	 */ 
	private $_histoire2 ; 

	/* 
	 * @var string - type SQL : date $_dateHistoire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateHistoire ; 


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
	 * @desc SETTER AND GETTER FOR $_histoire
	 * @var string $histoire
	 */ 
	public function setHistoire($histoire)
	{
		$this->_histoire = $histoire ;
		return $this;

	}
	public function getHistoire()
	{
		return $this->_histoire ;
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
	 * @desc SETTER AND GETTER FOR $_histoire2
	 * @var string $histoire2
	 */ 
	public function setHistoire2($histoire2)
	{
		$this->_histoire2 = $histoire2 ;
		return $this;

	}
	public function getHistoire2()
	{
		return $this->_histoire2 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateHistoire
	 * @var string $dateHistoire
	 */ 
	public function setDateHistoire($dateHistoire)
	{
		$this->_dateHistoire = $dateHistoire ;
		return $this;

	}
	public function getDateHistoire()
	{
		return $this->_dateHistoire ;
	}
}
