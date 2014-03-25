<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblediteur
 * @desc TABLE  : tbl_Editeur
 * @file Tblediteur.php
 * @desc PK     : idEditeur
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblediteur
{

	/* 
	 * @var int - type SQL : int $_idEditeur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idEditeur ; 

	/* 
	 * @var string - type SQL : varchar $_nomEditeur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomEditeur ; 

	/* 
	 * @var string - type SQL : varchar $_prenomEditeur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_prenomEditeur ; 

	/* 
	 * @var string - type SQL : varchar $_adrWebEditeur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_adrWebEditeur ; 

	/* 
	 * @var string - type SQL : varchar $_adrMailEditeur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_adrMailEditeur ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idEditeur
	 * @var int $idEditeur
	 */ 
	public function setIdEditeur($idEditeur)
	{
		$this->_idEditeur = $idEditeur ;
		return $this;

	}
	public function getIdEditeur()
	{
		return $this->_idEditeur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nomEditeur
	 * @var string $nomEditeur
	 */ 
	public function setNomEditeur($nomEditeur)
	{
		$this->_nomEditeur = $nomEditeur ;
		return $this;

	}
	public function getNomEditeur()
	{
		return $this->_nomEditeur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_prenomEditeur
	 * @var string $prenomEditeur
	 */ 
	public function setPrenomEditeur($prenomEditeur)
	{
		$this->_prenomEditeur = $prenomEditeur ;
		return $this;

	}
	public function getPrenomEditeur()
	{
		return $this->_prenomEditeur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_adrWebEditeur
	 * @var string $adrWebEditeur
	 */ 
	public function setAdrWebEditeur($adrWebEditeur)
	{
		$this->_adrWebEditeur = $adrWebEditeur ;
		return $this;

	}
	public function getAdrWebEditeur()
	{
		return $this->_adrWebEditeur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_adrMailEditeur
	 * @var string $adrMailEditeur
	 */ 
	public function setAdrMailEditeur($adrMailEditeur)
	{
		$this->_adrMailEditeur = $adrMailEditeur ;
		return $this;

	}
	public function getAdrMailEditeur()
	{
		return $this->_adrMailEditeur ;
	}
}
