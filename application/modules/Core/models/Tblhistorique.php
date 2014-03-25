<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblhistorique
 * @desc TABLE  : tbl_Historique
 * @file Tblhistorique.php
 * @desc PK     : idHisto
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblhistorique
{

	/* 
	 * @var int - type SQL : int $_idHisto
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idHisto ; 

	/* 
	 * @var string - type SQL : datetime $_dateHisto
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateHisto ; 

	/* 
	 * @var string - type SQL : varchar $_typeRech
	 * @desc __A_SPECIFIER__
	 */ 
	private $_typeRech ; 

	/* 
	 * @var string - type SQL : varchar $_valeurRech
	 * @desc __A_SPECIFIER__
	 */ 
	private $_valeurRech ; 

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
	 * @var int - type SQL : mediumint $_user_id
	 * @desc __A_SPECIFIER__
	 */ 
	private $_user_id ; 

	/* 
	 * @var string - type SQL : varchar $_session_id
	 * @desc __A_SPECIFIER__
	 */ 
	private $_session_id ; 

	/* 
	 * @var string - type SQL : varchar $_adrReferer
	 * @desc __A_SPECIFIER__
	 */ 
	private $_adrReferer ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idHisto
	 * @var int $idHisto
	 */ 
	public function setIdHisto($idHisto)
	{
		$this->_idHisto = $idHisto ;
		return $this;

	}
	public function getIdHisto()
	{
		return $this->_idHisto ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateHisto
	 * @var string $dateHisto
	 */ 
	public function setDateHisto($dateHisto)
	{
		$this->_dateHisto = $dateHisto ;
		return $this;

	}
	public function getDateHisto()
	{
		return $this->_dateHisto ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_typeRech
	 * @var string $typeRech
	 */ 
	public function setTypeRech($typeRech)
	{
		$this->_typeRech = $typeRech ;
		return $this;

	}
	public function getTypeRech()
	{
		return $this->_typeRech ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_valeurRech
	 * @var string $valeurRech
	 */ 
	public function setValeurRech($valeurRech)
	{
		$this->_valeurRech = $valeurRech ;
		return $this;

	}
	public function getValeurRech()
	{
		return $this->_valeurRech ;
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

	/* 
	 * @desc SETTER AND GETTER FOR $_session_id
	 * @var string $session_id
	 */ 
	public function setSession_id($session_id)
	{
		$this->_session_id = $session_id ;
		return $this;

	}
	public function getSession_id()
	{
		return $this->_session_id ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_adrReferer
	 * @var string $adrReferer
	 */ 
	public function setAdrReferer($adrReferer)
	{
		$this->_adrReferer = $adrReferer ;
		return $this;

	}
	public function getAdrReferer()
	{
		return $this->_adrReferer ;
	}
}
