<?php 

/*
 * SCENEARIO.COM
 * Table des liens auteurs interview
 * @desc CLASSE : Core_Model_Tblalbumsdossier
 * @desc TABLE  : tbl_Albums_Dossier
 * @file Tblalbumsdossier.php
 * @desc PK     : idDossier
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblalbumsdossier
{

	/* 
	 * @var string - type SQL : varchar $_idDossier
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idDossier ; 

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

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
	 * @desc SETTER AND GETTER FOR $_idAlbum
	 * @var int $idAlbum
	 */ 
	public function setIdAlbum($idAlbum)
	{
		$this->_idAlbum = $idAlbum ;
		return $this;

	}
	public function getIdAlbum()
	{
		return $this->_idAlbum ;
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
