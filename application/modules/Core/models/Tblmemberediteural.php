<?php 

/*
 * SCENEARIO.COM
 * Table contenant les filtres sur les éditeurs
 * @desc CLASSE : Core_Model_Tblmemberediteural
 * @desc TABLE  : tbl_Member_Editeur_Al
 * @file Tblmemberediteural.php
 * @desc PK     : user_id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblmemberediteural
{

	/* 
	 * @var int - type SQL : mediumint $_user_id
	 * @desc __A_SPECIFIER__
	 */ 
	private $_user_id ; 

	/* 
	 * @var int - type SQL : int $_idEditeur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idEditeur ; 


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
	 * @desc SETTER AND GETTER FOR $_idEditeur
	 * @var int $idEditeur
	 */ 
	public function setIdEditeur($idEditeur)
	{
		$this->_idEditeur = $idEditeur ;
		return $this;

	}
	public function getIdEditeur()
	{
		return $this->_idEditeur ;
	}
}
