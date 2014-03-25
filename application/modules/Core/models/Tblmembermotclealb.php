<?php 

/*
 * SCENEARIO.COM
 * Table contenant les filtres sur les éditeurs
 * @desc CLASSE : Core_Model_Tblmembermotclealb
 * @desc TABLE  : tbl_Member_Motcle_Alb
 * @file Tblmembermotclealb.php
 * @desc PK     : user_id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblmembermotclealb
{

	/* 
	 * @var int - type SQL : mediumint $_user_id
	 * @desc __A_SPECIFIER__
	 */ 
	private $_user_id ; 

	/* 
	 * @var string - type SQL : varchar $_motcle
	 * @desc __A_SPECIFIER__
	 */ 
	private $_motcle ; 

	/* 
	 * @var int - type SQL : tinyint $_typeRech
	 * @desc __A_SPECIFIER__
	 */ 
	private $_typeRech ; 


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
	 * @desc SETTER AND GETTER FOR $_motcle
	 * @var string $motcle
	 */ 
	public function setMotcle($motcle)
	{
		$this->_motcle = $motcle ;
		return $this;

	}
	public function getMotcle()
	{
		return $this->_motcle ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_typeRech
	 * @var int $typeRech
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
}
