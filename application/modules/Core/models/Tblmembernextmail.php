<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblmembernextmail
 * @desc TABLE  : tbl_Member_Next_Mail
 * @file Tblmembernextmail.php
 * @desc PK     : idLigne
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblmembernextmail
{

	/* 
	 * @var int - type SQL : int $_idLigne
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idLigne ; 

	/* 
	 * @var int - type SQL : mediumint $_user_id
	 * @desc __A_SPECIFIER__
	 */ 
	private $_user_id ; 

	/* 
	 * @var string - type SQL : varchar $_type_info
	 * @desc __A_SPECIFIER__
	 */ 
	private $_type_info ; 

	/* 
	 * @var string - type SQL : varchar $_valeur_info
	 * @desc __A_SPECIFIER__
	 */ 
	private $_valeur_info ; 

	/* 
	 * @var string - type SQL : date $_date_info
	 * @desc __A_SPECIFIER__
	 */ 
	private $_date_info ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idLigne
	 * @var int $idLigne
	 */ 
	public function setIdLigne($idLigne)
	{
		$this->_idLigne = $idLigne ;
		return $this;

	}
	public function getIdLigne()
	{
		return $this->_idLigne ;
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
	 * @desc SETTER AND GETTER FOR $_type_info
	 * @var string $type_info
	 */ 
	public function setType_info($type_info)
	{
		$this->_type_info = $type_info ;
		return $this;

	}
	public function getType_info()
	{
		return $this->_type_info ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_valeur_info
	 * @var string $valeur_info
	 */ 
	public function setValeur_info($valeur_info)
	{
		$this->_valeur_info = $valeur_info ;
		return $this;

	}
	public function getValeur_info()
	{
		return $this->_valeur_info ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_date_info
	 * @var string $date_info
	 */ 
	public function setDate_info($date_info)
	{
		$this->_date_info = $date_info ;
		return $this;

	}
	public function getDate_info()
	{
		return $this->_date_info ;
	}
}
