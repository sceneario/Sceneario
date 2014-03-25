<?php 

/*
 * SCENEARIO.COM
 * Table des pages du dossier
 * @desc CLASSE : Core_Model_Tbldossierspages
 * @desc TABLE  : tbl_Dossiers_Pages
 * @file Tbldossierspages.php
 * @desc PK     : idDossier
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tbldossierspages
{

	/* 
	 * @var string - type SQL : varchar $_idDossier
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idDossier ; 

	/* 
	 * @var int - type SQL : smallint $_idPage
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idPage ; 

	/* 
	 * @var string - type SQL : text $_commentaire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_commentaire ; 


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
	 * @desc SETTER AND GETTER FOR $_idPage
	 * @var int $idPage
	 */ 
	public function setIdPage($idPage)
	{
		$this->_idPage = $idPage ;
		return $this;

	}
	public function getIdPage()
	{
		return $this->_idPage ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_commentaire
	 * @var string $commentaire
	 */ 
	public function setCommentaire($commentaire)
	{
		$this->_commentaire = $commentaire ;
		return $this;

	}
	public function getCommentaire()
	{
		return $this->_commentaire ;
	}
}
