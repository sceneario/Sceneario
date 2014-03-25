<?php 

/*
 * SCENEARIO.COM
 * Table contenant les filtres sur les éditeurs
 * @desc CLASSE : Core_Model_Tblmemberauteuralb
 * @desc TABLE  : tbl_Member_Auteur_Alb
 * @file Tblmemberauteuralb.php
 * @desc PK     : user_id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblmemberauteuralb
{

	/* 
	 * @var int - type SQL : mediumint $_user_id
	 * @desc __A_SPECIFIER__
	 */ 
	private $_user_id ; 

	/* 
	 * @var int - type SQL : int $_idAuteur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAuteur ; 


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
}
