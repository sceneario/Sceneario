<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblgenres
 * @desc TABLE  : tbl_Genres
 * @file Tblgenres.php
 * @desc PK     : idGenre
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblgenres
{

	/* 
	 * @var int - type SQL : tinyint $_idGenre
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idGenre ; 

	/* 
	 * @var string - type SQL : varchar $_libelle
	 * @desc __A_SPECIFIER__
	 */ 
	private $_libelle ; 

	/* 
	 * @var string - type SQL : char $_T_recherche
	 * @desc __A_SPECIFIER__
	 */ 
	private $_T_recherche ; 

	/* 
	 * @var string - type SQL : text $_definition
	 * @desc __A_SPECIFIER__
	 */ 
	private $_definition ; 

	/* 
	 * @var string - type SQL : char $_T_visu_album
	 * @desc __A_SPECIFIER__
	 */ 
	private $_T_visu_album ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idGenre
	 * @var int $idGenre
	 */ 
	public function setIdGenre($idGenre)
	{
		$this->_idGenre = $idGenre ;
		return $this;

	}
	public function getIdGenre()
	{
		return $this->_idGenre ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_libelle
	 * @var string $libelle
	 */ 
	public function setLibelle($libelle)
	{
		$this->_libelle = $libelle ;
		return $this;

	}
	public function getLibelle()
	{
		return $this->_libelle ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_T_recherche
	 * @var string $T_recherche
	 */ 
	public function setT_recherche($T_recherche)
	{
		$this->_T_recherche = $T_recherche ;
		return $this;

	}
	public function getT_recherche()
	{
		return $this->_T_recherche ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_definition
	 * @var string $definition
	 */ 
	public function setDefinition($definition)
	{
		$this->_definition = $definition ;
		return $this;

	}
	public function getDefinition()
	{
		return $this->_definition ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_T_visu_album
	 * @var string $T_visu_album
	 */ 
	public function setT_visu_album($T_visu_album)
	{
		$this->_T_visu_album = $T_visu_album ;
		return $this;

	}
	public function getT_visu_album()
	{
		return $this->_T_visu_album ;
	}
}
