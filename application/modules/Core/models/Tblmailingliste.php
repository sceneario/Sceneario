<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblmailingliste
 * @desc TABLE  : tbl_Mailing_Liste
 * @file Tblmailingliste.php
 * @desc PK     : idListe
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblmailingliste
{

	/* 
	 * @var int - type SQL : int $_idListe
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idListe ; 

	/* 
	 * @var string - type SQL : varchar $_NomListe
	 * @desc __A_SPECIFIER__
	 */ 
	private $_NomListe ; 

	/* 
	 * @var string - type SQL : text $_comment
	 * @desc __A_SPECIFIER__
	 */ 
	private $_comment ; 


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
	 * @desc SETTER AND GETTER FOR $_NomListe
	 * @var string $NomListe
	 */ 
	public function setNomListe($NomListe)
	{
		$this->_NomListe = $NomListe ;
		return $this;

	}
	public function getNomListe()
	{
		return $this->_NomListe ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_comment
	 * @var string $comment
	 */ 
	public function setComment($comment)
	{
		$this->_comment = $comment ;
		return $this;

	}
	public function getComment()
	{
		return $this->_comment ;
	}
}
