<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblusers
 * @desc TABLE  : tbl_Users
 * @file Tblusers.php
 * @desc PK     : __A_SPECIFIER__
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblusers
{

	/* 
	 * @var TABLE - type SQL : TABLE $_TE
	 * @desc __A_SPECIFIER__
	 */ 
	private $_TE ; 

	/* 
	 * @var int - type SQL : tinyint $_user_active
	 * @desc __A_SPECIFIER__
	 */ 
	private $_user_active ; 

	/* 
	 * @var string - type SQL : varchar $_username
	 * @desc __A_SPECIFIER__
	 */ 
	private $_username ; 

	/* 
	 * @var string - type SQL : varchar $_user_password
	 * @desc __A_SPECIFIER__
	 */ 
	private $_user_password ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_TE
	 * @var TABLE $TE
	 */ 
	public function setTE($TE)
	{
		$this->_TE = $TE ;
		return $this;

	}
	public function getTE()
	{
		return $this->_TE ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_user_active
	 * @var int $user_active
	 */ 
	public function setUser_active($user_active)
	{
		$this->_user_active = $user_active ;
		return $this;

	}
	public function getUser_active()
	{
		return $this->_user_active ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_username
	 * @var string $username
	 */ 
	public function setUsername($username)
	{
		$this->_username = $username ;
		return $this;

	}
	public function getUsername()
	{
		return $this->_username ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_user_password
	 * @var string $user_password
	 */ 
	public function setUser_password($user_password)
	{
		$this->_user_password = $user_password ;
		return $this;

	}
	public function getUser_password()
	{
		return $this->_user_password ;
	}
}
