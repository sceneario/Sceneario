<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblaffectationservi
 * @desc TABLE  : tbl_Affectation_Servi
 * @file Tblaffectationservi.php
 * @desc PK     : idInternaute
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblaffectationservi
{

	/* 
	 * @var int - type SQL : smallint $_idInternaute
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idInternaute ; 

	/* 
	 * @var string - type SQL : varchar $_pseudo
	 * @desc __A_SPECIFIER__
	 */ 
	private $_pseudo ; 

	/* 
	 * @var int - type SQL : int $_idService
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idService ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idInternaute
	 * @var int $idInternaute
	 */ 
	public function setIdInternaute($idInternaute)
	{
		$this->_idInternaute = $idInternaute ;
		return $this;

	}
	public function getIdInternaute()
	{
		return $this->_idInternaute ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_pseudo
	 * @var string $pseudo
	 */ 
	public function setPseudo($pseudo)
	{
		$this->_pseudo = $pseudo ;
		return $this;

	}
	public function getPseudo()
	{
		return $this->_pseudo ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idService
	 * @var int $idService
	 */ 
	public function setIdService($idService)
	{
		$this->_idService = $idService ;
		return $this;

	}
	public function getIdService()
	{
		return $this->_idService ;
	}
}
