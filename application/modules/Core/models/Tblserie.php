<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblserie
 * @desc TABLE  : tbl_Serie
 * @file Tblserie.php
 * @desc PK     : idSerie
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblserie
{

	/* 
	 * @var int - type SQL : int $_idSerie
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idSerie ; 

	/* 
	 * @var string - type SQL : varchar $_nomSerie
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomSerie ; 

	/* 
	 * @var string - type SQL : char $_complete
	 * @desc __A_SPECIFIER__
	 */ 
	private $_complete ; 

	/* 
	 * @var int - type SQL : tinyint $_nbtomes
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nbtomes ; 

	/* 
	 * @var string - type SQL : varchar $_commentaire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_commentaire ; 

	/* 
	 * @var string - type SQL : text $_informations
	 * @desc __A_SPECIFIER__
	 */ 
	private $_informations ; 

	/* 
	 * @var int - type SQL : int $_idUnivers
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idUnivers ; 

	public $albums;
	public $coloristes;
	public $scenaristes;
	public $dessinateurs;

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
		return $this;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idSerie
	 * @var int $idSerie
	 */ 
	public function setIdSerie($idSerie)
	{
		$this->_idSerie = $idSerie ;
		return $this;

	}
	public function getIdSerie()
	{
		return $this->_idSerie ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nomSerie
	 * @var string $nomSerie
	 */ 
	public function setNomSerie($nomSerie)
	{
		$this->_nomSerie = $nomSerie ;
		return $this;

	}
	public function getNomSerie()
	{
		return $this->_nomSerie ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_complete
	 * @var string $complete
	 */ 
	public function setComplete($complete)
	{
		$this->_complete = $complete ;
		return $this;

	}
	public function getComplete()
	{
		return $this->_complete ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nbtomes
	 * @var int $nbtomes
	 */ 
	public function setNbtomes($nbtomes)
	{
		$this->_nbtomes = $nbtomes ;
		return $this;

	}
	public function getNbtomes()
	{
		return $this->_nbtomes ;
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
	 * @desc SETTER AND GETTER FOR $_informations
	 * @var string $informations
	 */ 
	public function setInformations($informations)
	{
		$this->_informations = $informations ;
		return $this;

	}
	public function getInformations()
	{
		return $this->_informations ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idUnivers
	 * @var int $idUnivers
	 */ 
	public function setIdUnivers($idUnivers)
	{
		$this->_idUnivers = $idUnivers ;
		return $this;

	}
	public function getIdUnivers()
	{
		return $this->_idUnivers ;
	}
}
