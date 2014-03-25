<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblmailinggroup
 * @desc TABLE  : tbl_Mailing_Group
 * @file Tblmailinggroup.php
 * @desc PK     : idListe
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblmailinggroup
{

	/* 
	 * @var int - type SQL : int $_idListe
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idListe ; 

	/* 
	 * @var string - type SQL : varchar $_adrMail
	 * @desc __A_SPECIFIER__
	 */ 
	private $_adrMail ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idListe
	 * @var int $idListe
	 */ 
	public function setIdListe($idListe)
	{
		$this->_idListe = $idListe ;
		return $this;

	}
	public function getIdListe()
	{
		return $this->_idListe ;
	}

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
}
