<?php 

/*
 * SCENEARIO.COM
 * Table des bibliothèques des membres
 * @desc CLASSE : Core_Model_Tblmemberbdtheque
 * @desc TABLE  : tbl_Member_Bdtheque
 * @file Tblmemberbdtheque.php
 * @desc PK     : user_id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblmemberbdtheque
{

	/* 
	 * @var int - type SQL : mediumint $_user_id
	 * @desc __A_SPECIFIER__
	 */ 
	private $_user_id ; 

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var int - type SQL : tinyint $_etat
	 * @desc __A_SPECIFIER__
	 */ 
	private $_etat ; 


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
	 * @desc SETTER AND GETTER FOR $_etat
	 * @var int $etat
	 */ 
	public function setEtat($etat)
	{
		$this->_etat = $etat ;
		return $this;

	}
	public function getEtat()
	{
		return $this->_etat ;
	}
}
