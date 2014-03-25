<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblcritiqueprov
 * @desc TABLE  : tbl_Critique_Prov
 * @file Tblcritiqueprov.php
 * @desc PK     : idCritique
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblcritiqueprov
{

	/* 
	 * @var int - type SQL : int $_idCritique
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idCritique ; 

	/* 
	 * @var int - type SQL : int $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var string - type SQL : varchar $_pseudo
	 * @desc __A_SPECIFIER__
	 */ 
	private $_pseudo ; 

	/* 
	 * @var string - type SQL : text $_critique
	 * @desc __A_SPECIFIER__
	 */ 
	private $_critique ; 

	/* 
	 * @var string - type SQL : datetime $_datecreation
	 * @desc __A_SPECIFIER__
	 */ 
	private $_datecreation ; 

	/* 
	 * @var string - type SQL : varchar $_adrMail
	 * @desc __A_SPECIFIER__
	 */ 
	private $_adrMail ; 

	/* 
	 * @var string - type SQL : char $_T_Valide
	 * @desc __A_SPECIFIER__
	 */ 
	private $_T_Valide ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idCritique
	 * @var int $idCritique
	 */ 
	public function setIdCritique($idCritique)
	{
		$this->_idCritique = $idCritique ;
		return $this;

	}
	public function getIdCritique()
	{
		return $this->_idCritique ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idAlbum
	 * @var int $idAlbum
	 */ 
	public function setIdAlbum($idAlbum)
	{
		$this->_idAlbum = $idAlbum ;
		return $this;

	}
	public function getIdAlbum()
	{
		return $this->_idAlbum ;
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
	 * @desc SETTER AND GETTER FOR $_adrMail
	 * @var string $adrMail
	 */ 
	public function setAdrMail($adrMail)
	{
		$this->_adrMail = $adrMail ;
		return $this;

	}
	public function getAdrMail()
	{
		return $this->_adrMail ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_T_Valide
	 * @var string $T_Valide
	 */ 
	public function setT_Valide($T_Valide)
	{
		$this->_T_Valide = $T_Valide ;
		return $this;

	}
	public function getT_Valide()
	{
		return $this->_T_Valide ;
	}
}
