<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tbltop30
 * @desc TABLE  : tbl_top30
 * @file Tbltop30.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tbltop30
{

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var int - type SQL : int $_visitesPrec
	 * @desc __A_SPECIFIER__
	 */ 
	private $_visitesPrec ; 

	/* 
	 * @var int - type SQL : int $_nbSemaines
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nbSemaines ; 

	/* 
	 * @var int - type SQL : int $_classement
	 * @desc __A_SPECIFIER__
	 */ 
	private $_classement ; 


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
	 * @desc SETTER AND GETTER FOR $_visitesPrec
	 * @var int $visitesPrec
	 */ 
	public function setVisitesPrec($visitesPrec)
	{
		$this->_visitesPrec = $visitesPrec ;
		return $this;

	}
	public function getVisitesPrec()
	{
		return $this->_visitesPrec ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nbSemaines
	 * @var int $nbSemaines
	 */ 
	public function setNbSemaines($nbSemaines)
	{
		$this->_nbSemaines = $nbSemaines ;
		return $this;

	}
	public function getNbSemaines()
	{
		return $this->_nbSemaines ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_classement
	 * @var int $classement
	 */ 
	public function setClassement($classement)
	{
		$this->_classement = $classement ;
		return $this;

	}
	public function getClassement()
	{
		return $this->_classement ;
	}
}
