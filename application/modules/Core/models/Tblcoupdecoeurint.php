<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblcoupdecoeurint
 * @desc TABLE  : tbl_Coup_de_coeur_Int
 * @file Tblcoupdecoeurint.php
 * @desc PK     : idVote
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblcoupdecoeurint
{

	/* 
	 * @var int - type SQL : int $_idVote
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idVote ; 

	/* 
	 * @var string - type SQL : datetime $_dateVote
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateVote ; 

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var string - type SQL : varchar $_adrIp
	 * @desc __A_SPECIFIER__
	 */ 
	private $_adrIp ; 

	/* 
	 * @var string - type SQL : varchar $_nomIp
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomIp ; 

	/* 
	 * @var string - type SQL : varchar $_semVote
	 * @desc __A_SPECIFIER__
	 */ 
	private $_semVote ; 

	/* 
	 * @var int - type SQL : mediumint $_user_id
	 * @desc __A_SPECIFIER__
	 */ 
	private $_user_id ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idVote
	 * @var int $idVote
	 */ 
	public function setIdVote($idVote)
	{
		$this->_idVote = $idVote ;
		return $this;

	}
	public function getIdVote()
	{
		return $this->_idVote ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateVote
	 * @var string $dateVote
	 */ 
	public function setDateVote($dateVote)
	{
		$this->_dateVote = $dateVote ;
		return $this;

	}
	public function getDateVote()
	{
		return $this->_dateVote ;
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
	 * @desc SETTER AND GETTER FOR $_adrIp
	 * @var string $adrIp
	 */ 
	public function setAdrIp($adrIp)
	{
		$this->_adrIp = $adrIp ;
		return $this;

	}
	public function getAdrIp()
	{
		return $this->_adrIp ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nomIp
	 * @var string $nomIp
	 */ 
	public function setNomIp($nomIp)
	{
		$this->_nomIp = $nomIp ;
		return $this;

	}
	public function getNomIp()
	{
		return $this->_nomIp ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_semVote
	 * @var string $semVote
	 */ 
	public function setSemVote($semVote)
	{
		$this->_semVote = $semVote ;
		return $this;

	}
	public function getSemVote()
	{
		return $this->_semVote ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_user_id
	 * @var int $user_id
	 */ 
	public function setUser_id($user_id)
	{
		$this->_user_id = $user_id ;
		return $this;

	}
	public function getUser_id()
	{
		return $this->_user_id ;
	}
}
