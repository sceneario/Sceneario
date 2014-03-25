<?php 

/*
 * SCENEARIO.COM
 * Table des liens auteurs interview
 * @desc CLASSE : Core_Model_Tblauteursdossier
 * @desc TABLE  : tbl_Auteurs_Dossier
 * @file Tblauteursdossier.php
 * @desc PK     : idDossier
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblauteursdossier
{

	/* 
	 * @var string - type SQL : varchar $_idDossier
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idDossier ; 

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
	 * @desc SETTER AND GETTER FOR $_idDossier
	 * @var string $idDossier
	 */ 
	public function setIdDossier($idDossier)
	{
		$this->_idDossier = $idDossier ;
		return $this;

	}
	public function getIdDossier()
	{
		return $this->_idDossier ;
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
