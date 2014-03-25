<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblcollections
 * @desc TABLE  : tbl_Collections
 * @file Tblcollections.php
 * @desc PK     : idCollection
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblcollections
{

	/* 
	 * @var int - type SQL : int $_idCollection
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idCollection ; 

	/* 
	 * @var string - type SQL : varchar $_nomCollection
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomCollection ; 

	/* 
	 * @var string - type SQL : text $_commentaire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_commentaire ; 

	/* 
	 * @var int - type SQL : int $_idEditeur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idEditeur ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idCollection
	 * @var int $idCollection
	 */ 
	public function setIdCollection($idCollection)
	{
		$this->_idCollection = $idCollection ;
		return $this;

	}
	public function getIdCollection()
	{
		return $this->_idCollection ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nomCollection
	 * @var string $nomCollection
	 */ 
	public function setNomCollection($nomCollection)
	{
		$this->_nomCollection = $nomCollection ;
		return $this;

	}
	public function getNomCollection()
	{
		return $this->_nomCollection ;
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
}
