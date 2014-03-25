<?php 

/*
 * SCENEARIO.COM
 * Table des réponses au jeu de la couverture
 * @desc CLASSE : Core_Model_Tblreponsesjeucouv
 * @desc TABLE  : tbl_Reponses_Jeu_Couv
 * @file Tblreponsesjeucouv.php
 * @desc PK     : email
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblreponsesjeucouv
{

	/* 
	 * @var string - type SQL : varchar $_email
	 * @desc __A_SPECIFIER__
	 */ 
	private $_email ; 

	/* 
	 * @var string - type SQL : date $_date
	 * @desc __A_SPECIFIER__
	 */ 
	private $_date ; 

	/* 
	 * @var string - type SQL : varchar $_adrIP
	 * @desc __A_SPECIFIER__
	 */ 
	private $_adrIP ; 

	/* 
	 * @var string - type SQL : varchar $_isbn
	 * @desc __A_SPECIFIER__
	 */ 
	private $_isbn ; 

	/* 
	 * @var int - type SQL : tinyint $_gagne
	 * @desc __A_SPECIFIER__
	 */ 
	private $_gagne ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_email
	 * @var string $email
	 */ 
	public function setEmail($email)
	{
		$this->_email = $email ;
		return $this;

	}
	public function getEmail()
	{
		return $this->_email ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_date
	 * @var string $date
	 */ 
	public function setDate($date)
	{
		$this->_date = $date ;
		return $this;

	}
	public function getDate()
	{
		return $this->_date ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_adrIP
	 * @var string $adrIP
	 */ 
	public function setAdrIP($adrIP)
	{
		$this->_adrIP = $adrIP ;
		return $this;

	}
	public function getAdrIP()
	{
		return $this->_adrIP ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_isbn
	 * @var string $isbn
	 */ 
	public function setIsbn($isbn)
	{
		$this->_isbn = $isbn ;
		return $this;

	}
	public function getIsbn()
	{
		return $this->_isbn ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_gagne
	 * @var int $gagne
	 */ 
	public function setGagne($gagne)
	{
		$this->_gagne = $gagne ;
		return $this;

	}
	public function getGagne()
	{
		return $this->_gagne ;
	}
}
