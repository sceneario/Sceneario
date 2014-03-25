<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblmailingpartenaires
 * @desc TABLE  : tbl_Mailing_Partenaires
 * @file Tblmailingpartenaires.php
 * @desc PK     : adrMail
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblmailingpartenaires
{

	/* 
	 * @var string - type SQL : varchar $_adrMail
	 * @desc __A_SPECIFIER__
	 */ 
	private $_adrMail ; 

	/* 
	 * @var string - type SQL : date $_dateCreation
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateCreation ; 

	/* 
	 * @var string - type SQL : char $_T_Valide
	 * @desc __A_SPECIFIER__
	 */ 
	private $_T_Valide ; 

	/* 
	 * @var string - type SQL : varchar $_clef
	 * @desc __A_SPECIFIER__
	 */ 
	private $_clef ; 

	/* 
	 * @var int - type SQL : tinyint $_nberreurs
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nberreurs ; 

	/* 
	 * @var int - type SQL : tinyint $_enerreur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_enerreur ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_adrMail
	 * @var string $adrMail
	 */ 
	public function setAdrMail($adrMail)
	{
		$this->_adrMail = $adrMail ;
		return $this;

	}
	public function getAdrMail()
	{
		return $this->_adrMail ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateCreation
	 * @var string $dateCreation
	 */ 
	public function setDateCreation($dateCreation)
	{
		$this->_dateCreation = $dateCreation ;
		return $this;

	}
	public function getDateCreation()
	{
		return $this->_dateCreation ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_T_Valide
	 * @var string $T_Valide
	 */ 
	public function setT_Valide($T_Valide)
	{
		$this->_T_Valide = $T_Valide ;
		return $this;

	}
	public function getT_Valide()
	{
		return $this->_T_Valide ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_clef
	 * @var string $clef
	 */ 
	public function setClef($clef)
	{
		$this->_clef = $clef ;
		return $this;

	}
	public function getClef()
	{
		return $this->_clef ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nberreurs
	 * @var int $nberreurs
	 */ 
	public function setNberreurs($nberreurs)
	{
		$this->_nberreurs = $nberreurs ;
		return $this;

	}
	public function getNberreurs()
	{
		return $this->_nberreurs ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_enerreur
	 * @var int $enerreur
	 */ 
	public function setEnerreur($enerreur)
	{
		$this->_enerreur = $enerreur ;
		return $this;

	}
	public function getEnerreur()
	{
		return $this->_enerreur ;
	}
}
