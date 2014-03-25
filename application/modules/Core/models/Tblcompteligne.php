<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblcompteligne
 * @desc TABLE  : tbl_Compte_Ligne
 * @file Tblcompteligne.php
 * @desc PK     : idligne
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblcompteligne
{

	/* 
	 * @var int - type SQL : int $_idligne
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idligne ; 

	/* 
	 * @var string - type SQL : date $_date
	 * @desc __A_SPECIFIER__
	 */ 
	private $_date ; 

	/* 
	 * @var string - type SQL : varchar $_libelle
	 * @desc __A_SPECIFIER__
	 */ 
	private $_libelle ; 

	/* 
	 * @var decimal - type SQL : decimal $_credit
	 * @desc __A_SPECIFIER__
	 */ 
	private $_credit ; 

	/* 
	 * @var decimal - type SQL : decimal $_debit
	 * @desc __A_SPECIFIER__
	 */ 
	private $_debit ; 

	/* 
	 * @var string - type SQL : text $_commentaire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_commentaire ; 

	/* 
	 * @var string - type SQL : varchar $_type
	 * @desc __A_SPECIFIER__
	 */ 
	private $_type ; 

	/* 
	 * @var int - type SQL : tinyint $_status
	 * @desc __A_SPECIFIER__
	 */ 
	private $_status ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idligne
	 * @var int $idligne
	 */ 
	public function setIdligne($idligne)
	{
		$this->_idligne = $idligne ;
		return $this;

	}
	public function getIdligne()
	{
		return $this->_idligne ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_date
	 * @var string $date
	 */ 
	public function setDate($date)
	{
		$this->_date = $date ;
		return $this;

	}
	public function getDate()
	{
		return $this->_date ;
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
	 * @desc SETTER AND GETTER FOR $_credit
	 * @var decimal $credit
	 */ 
	public function setCredit($credit)
	{
		$this->_credit = $credit ;
		return $this;

	}
	public function getCredit()
	{
		return $this->_credit ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_debit
	 * @var decimal $debit
	 */ 
	public function setDebit($debit)
	{
		$this->_debit = $debit ;
		return $this;

	}
	public function getDebit()
	{
		return $this->_debit ;
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
	 * @desc SETTER AND GETTER FOR $_type
	 * @var string $type
	 */ 
	public function setType($type)
	{
		$this->_type = $type ;
		return $this;

	}
	public function getType()
	{
		return $this->_type ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_status
	 * @var int $status
	 */ 
	public function setStatus($status)
	{
		$this->_status = $status ;
		return $this;

	}
	public function getStatus()
	{
		return $this->_status ;
	}
}
