<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblinternaute
 * @desc TABLE  : tbl_Internaute
 * @file Tblinternaute.php
 * @desc PK     : idInternaute
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblinternaute
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
	 * @var string - type SQL : varchar $_adrWebInternaute
	 * @desc __A_SPECIFIER__
	 */ 
	private $_adrWebInternaute ; 

	/* 
	 * @var string - type SQL : varchar $_adrMailInternaute
	 * @desc __A_SPECIFIER__
	 */ 
	private $_adrMailInternaute ; 

	/* 
	 * @var string - type SQL : char $_envoilettre
	 * @desc __A_SPECIFIER__
	 */ 
	private $_envoilettre ; 

	/* 
	 * @var string - type SQL : date $_datecreation
	 * @desc __A_SPECIFIER__
	 */ 
	private $_datecreation ; 

	/* 
	 * @var string - type SQL : char $_T_Affectation
	 * @desc __A_SPECIFIER__
	 */ 
	private $_T_Affectation ; 

	/* 
	 * @var string - type SQL : text $_coordonnees
	 * @desc __A_SPECIFIER__
	 */ 
	private $_coordonnees ; 


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
	 * @desc SETTER AND GETTER FOR $_adrWebInternaute
	 * @var string $adrWebInternaute
	 */ 
	public function setAdrWebInternaute($adrWebInternaute)
	{
		$this->_adrWebInternaute = $adrWebInternaute ;
		return $this;

	}
	public function getAdrWebInternaute()
	{
		return $this->_adrWebInternaute ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_adrMailInternaute
	 * @var string $adrMailInternaute
	 */ 
	public function setAdrMailInternaute($adrMailInternaute)
	{
		$this->_adrMailInternaute = $adrMailInternaute ;
		return $this;

	}
	public function getAdrMailInternaute()
	{
		return $this->_adrMailInternaute ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_envoilettre
	 * @var string $envoilettre
	 */ 
	public function setEnvoilettre($envoilettre)
	{
		$this->_envoilettre = $envoilettre ;
		return $this;

	}
	public function getEnvoilettre()
	{
		return $this->_envoilettre ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_datecreation
	 * @var string $datecreation
	 */ 
	public function setDatecreation($datecreation)
	{
		$this->_datecreation = $datecreation ;
		return $this;

	}
	public function getDatecreation()
	{
		return $this->_datecreation ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_T_Affectation
	 * @var string $T_Affectation
	 */ 
	public function setT_Affectation($T_Affectation)
	{
		$this->_T_Affectation = $T_Affectation ;
		return $this;

	}
	public function getT_Affectation()
	{
		return $this->_T_Affectation ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_coordonnees
	 * @var string $coordonnees
	 */ 
	public function setCoordonnees($coordonnees)
	{
		$this->_coordonnees = $coordonnees ;
		return $this;

	}
	public function getCoordonnees()
	{
		return $this->_coordonnees ;
	}
}
