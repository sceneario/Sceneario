<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblconcoursreponses
 * @desc TABLE  : tbl_Concours_Reponses
 * @file Tblconcoursreponses.php
 * @desc PK     : nomConcours
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblconcoursreponses
{

	/* 
	 * @var string - type SQL : varchar $_nomConcours
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomConcours ; 

	/* 
	 * @var string - type SQL : varchar $_emailReponse
	 * @desc __A_SPECIFIER__
	 */ 
	private $_emailReponse ; 

	/* 
	 * @var string - type SQL : datetime $_dateReponse
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateReponse ; 

	/* 
	 * @var string - type SQL : text $_reponse1
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse1 ; 

	/* 
	 * @var string - type SQL : text $_reponse2
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse2 ; 

	/* 
	 * @var string - type SQL : text $_reponse3
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse3 ; 

	/* 
	 * @var string - type SQL : text $_reponse4
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse4 ; 

	/* 
	 * @var string - type SQL : text $_reponse5
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse5 ; 

	/* 
	 * @var string - type SQL : text $_reponse6
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse6 ; 

	/* 
	 * @var string - type SQL : text $_reponse7
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse7 ; 

	/* 
	 * @var string - type SQL : text $_reponse8
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse8 ; 

	/* 
	 * @var string - type SQL : varchar $_AdrIp
	 * @desc __A_SPECIFIER__
	 */ 
	private $_AdrIp ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_nomConcours
	 * @var string $nomConcours
	 */ 
	public function setNomConcours($nomConcours)
	{
		$this->_nomConcours = $nomConcours ;
		return $this;

	}
	public function getNomConcours()
	{
		return $this->_nomConcours ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_emailReponse
	 * @var string $emailReponse
	 */ 
	public function setEmailReponse($emailReponse)
	{
		$this->_emailReponse = $emailReponse ;
		return $this;

	}
	public function getEmailReponse()
	{
		return $this->_emailReponse ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateReponse
	 * @var string $dateReponse
	 */ 
	public function setDateReponse($dateReponse)
	{
		$this->_dateReponse = $dateReponse ;
		return $this;

	}
	public function getDateReponse()
	{
		return $this->_dateReponse ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse1
	 * @var string $reponse1
	 */ 
	public function setReponse1($reponse1)
	{
		$this->_reponse1 = $reponse1 ;
		return $this;

	}
	public function getReponse1()
	{
		return $this->_reponse1 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse2
	 * @var string $reponse2
	 */ 
	public function setReponse2($reponse2)
	{
		$this->_reponse2 = $reponse2 ;
		return $this;

	}
	public function getReponse2()
	{
		return $this->_reponse2 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse3
	 * @var string $reponse3
	 */ 
	public function setReponse3($reponse3)
	{
		$this->_reponse3 = $reponse3 ;
		return $this;

	}
	public function getReponse3()
	{
		return $this->_reponse3 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse4
	 * @var string $reponse4
	 */ 
	public function setReponse4($reponse4)
	{
		$this->_reponse4 = $reponse4 ;
		return $this;

	}
	public function getReponse4()
	{
		return $this->_reponse4 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse5
	 * @var string $reponse5
	 */ 
	public function setReponse5($reponse5)
	{
		$this->_reponse5 = $reponse5 ;
		return $this;

	}
	public function getReponse5()
	{
		return $this->_reponse5 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse6
	 * @var string $reponse6
	 */ 
	public function setReponse6($reponse6)
	{
		$this->_reponse6 = $reponse6 ;
		return $this;

	}
	public function getReponse6()
	{
		return $this->_reponse6 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse7
	 * @var string $reponse7
	 */ 
	public function setReponse7($reponse7)
	{
		$this->_reponse7 = $reponse7 ;
		return $this;

	}
	public function getReponse7()
	{
		return $this->_reponse7 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse8
	 * @var string $reponse8
	 */ 
	public function setReponse8($reponse8)
	{
		$this->_reponse8 = $reponse8 ;
		return $this;

	}
	public function getReponse8()
	{
		return $this->_reponse8 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_AdrIp
	 * @var string $AdrIp
	 */ 
	public function setAdrIp($AdrIp)
	{
		$this->_AdrIp = $AdrIp ;
		return $this;

	}
	public function getAdrIp()
	{
		return $this->_AdrIp ;
	}
}
