<?php 

/*
 * SCENEARIO.COM
 * Table des liens auteurs interview
 * @desc CLASSE : Core_Model_Tblauteursinterview
 * @desc TABLE  : tbl_Auteurs_Interview
 * @file Tblauteursinterview.php
 * @desc PK     : idInterview
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblauteursinterview
{

	/* 
	 * @var string - type SQL : varchar $_idInterview
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idInterview ; 

	/* 
	 * @var int - type SQL : int $_idAuteur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAuteur ; 

	/* 
	 * @var string - type SQL : date $_datecreation
	 * @desc __A_SPECIFIER__
	 */ 
	private $_datecreation ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idInterview
	 * @var string $idInterview
	 */ 
	public function setIdInterview($idInterview)
	{
		$this->_idInterview = $idInterview ;
		return $this;

	}
	public function getIdInterview()
	{
		return $this->_idInterview ;
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

	/* 
	 * @desc SETTER AND GETTER FOR $_datecreation
	 * @var string $datecreation
	 */ 
	public function setDatecreation($datecreation)
	{
		$this->_datecreation = $datecreation ;
		return $this;

	}
	public function getDatecreation()
	{
		return $this->_datecreation ;
	}
}
