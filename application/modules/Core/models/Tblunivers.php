<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblunivers
 * @desc TABLE  : tbl_Univers
 * @file Tblunivers.php
 * @desc PK     : idUnivers
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblunivers
{

	/* 
	 * @var int - type SQL : int $_idUnivers
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idUnivers ; 

	/* 
	 * @var string - type SQL : varchar $_nomUnivers
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomUnivers ; 

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

	/* 
	 * @desc SETTER AND GETTER FOR $_nomUnivers
	 * @var string $nomUnivers
	 */ 
	public function setNomUnivers($nomUnivers)
	{
		$this->_nomUnivers = $nomUnivers ;
		return $this;

	}
	public function getNomUnivers()
	{
		return $this->_nomUnivers ;
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
}
