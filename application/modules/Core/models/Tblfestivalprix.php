<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblfestivalprix
 * @desc TABLE  : tbl_Festival_Prix
 * @file Tblfestivalprix.php
 * @desc PK     : idPrix
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblfestivalprix
{

	/* 
	 * @var int - type SQL : smallint $_idPrix
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idPrix ; 

	/* 
	 * @var int - type SQL : smallint $_idFestival
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idFestival ; 

	/* 
	 * @var string - type SQL : varchar $_nomPrix
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomPrix ; 

	/* 
	 * @var string - type SQL : text $_commentaire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_commentaire ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idPrix
	 * @var int $idPrix
	 */ 
	public function setIdPrix($idPrix)
	{
		$this->_idPrix = $idPrix ;
		return $this;

	}
	public function getIdPrix()
	{
		return $this->_idPrix ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idFestival
	 * @var int $idFestival
	 */ 
	public function setIdFestival($idFestival)
	{
		$this->_idFestival = $idFestival ;
		return $this;

	}
	public function getIdFestival()
	{
		return $this->_idFestival ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nomPrix
	 * @var string $nomPrix
	 */ 
	public function setNomPrix($nomPrix)
	{
		$this->_nomPrix = $nomPrix ;
		return $this;

	}
	public function getNomPrix()
	{
		return $this->_nomPrix ;
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
