<?php 

/*
 * SCENEARIO.COM
 * Table des réponses du sondage
 * @desc CLASSE : Core_Model_Tblsondagereponses
 * @desc TABLE  : tbl_Sondage_Reponses
 * @file Tblsondagereponses.php
 * @desc PK     : idSondage
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblsondagereponses
{

	/* 
	 * @var int - type SQL : mediumint $_idSondage
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idSondage ; 

	/* 
	 * @var int - type SQL : tinyint $_idReponse
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idReponse ; 

	/* 
	 * @var int - type SQL : mediumint $_reponses
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponses ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idSondage
	 * @var int $idSondage
	 */ 
	public function setIdSondage($idSondage)
	{
		$this->_idSondage = $idSondage ;
		return $this;

	}
	public function getIdSondage()
	{
		return $this->_idSondage ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idReponse
	 * @var int $idReponse
	 */ 
	public function setIdReponse($idReponse)
	{
		$this->_idReponse = $idReponse ;
		return $this;

	}
	public function getIdReponse()
	{
		return $this->_idReponse ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponses
	 * @var int $reponses
	 */ 
	public function setReponses($reponses)
	{
		$this->_reponses = $reponses ;
		return $this;

	}
	public function getReponses()
	{
		return $this->_reponses ;
	}
}
