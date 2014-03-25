<?php 

/*
 * SCENEARIO.COM
 * Table des brouillons de critiques
 * @desc CLASSE : Core_Model_Tblcritiquebrouillo
 * @desc TABLE  : tbl_Critique_Brouillo
 * @file Tblcritiquebrouillo.php
 * @desc PK     : idInternaute
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblcritiquebrouillo
{

	/* 
	 * @var int - type SQL : smallint $_idInternaute
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idInternaute ; 

	/* 
	 * @var string - type SQL : text $_critique
	 * @desc __A_SPECIFIER__
	 */ 
	private $_critique ; 


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
	 * @desc SETTER AND GETTER FOR $_critique
	 * @var string $critique
	 */ 
	public function setCritique($critique)
	{
		$this->_critique = $critique ;
		return $this;

	}
	public function getCritique()
	{
		return $this->_critique ;
	}
}
