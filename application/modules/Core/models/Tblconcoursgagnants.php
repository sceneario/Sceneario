<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblconcoursgagnants
 * @desc TABLE  : tbl_Concours_Gagnants
 * @file Tblconcoursgagnants.php
 * @desc PK     : nomConcours
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblconcoursgagnants
{

	/* 
	 * @var string - type SQL : varchar $_nomConcours
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomConcours ; 

	/* 
	 * @var int - type SQL : int $_idGagnant
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idGagnant ; 

	/* 
	 * @var int - type SQL : int $_classement
	 * @desc __A_SPECIFIER__
	 */ 
	private $_classement ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_nomConcours
	 * @var string $nomConcours
	 */ 
	public function setNomConcours($nomConcours)
	{
		$this->_nomConcours = $nomConcours ;
		return $this;

	}
	public function getNomConcours()
	{
		return $this->_nomConcours ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idGagnant
	 * @var int $idGagnant
	 */ 
	public function setIdGagnant($idGagnant)
	{
		$this->_idGagnant = $idGagnant ;
		return $this;

	}
	public function getIdGagnant()
	{
		return $this->_idGagnant ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_classement
	 * @var int $classement
	 */ 
	public function setClassement($classement)
	{
		$this->_classement = $classement ;
		return $this;

	}
	public function getClassement()
	{
		return $this->_classement ;
	}
}
