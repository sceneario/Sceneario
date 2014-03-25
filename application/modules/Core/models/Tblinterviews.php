<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblinterviews
 * @desc TABLE  : tbl_Interviews
 * @file Tblinterviews.php
 * @desc PK     : idInterview
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblinterviews
{

	/* 
	 * @var string - type SQL : varchar $_idInterview
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idInterview ; 

	/* 
	 * @var string - type SQL : varchar $_titreInterview
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titreInterview ; 

	/* 
	 * @var string - type SQL : text $_soustitreInterview
	 * @desc __A_SPECIFIER__
	 */ 
	private $_soustitreInterview ; 

	/* 
	 * @var longtext - type SQL : longtext $_textInterview
	 * @desc __A_SPECIFIER__
	 */ 
	private $_textInterview ; 

	/* 
	 * @var string - type SQL : date $_dateInterview
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateInterview ; 

	/* 
	 * @var string - type SQL : varchar $_lienInterview
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienInterview ; 

	/* 
	 * @var int - type SQL : tinyint $_lienJava
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienJava ; 

	/* 
	 * @var string - type SQL : text $_titreSommaire
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titreSommaire ; 

	/* 
	 * @var string - type SQL : varchar $_lienImage
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienImage ; 

	/* 
	 * @var string - type SQL : varchar $_Intervieweur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_Intervieweur ; 

	/* 
	 * @var string - type SQL : char $_enligne
	 * @desc __A_SPECIFIER__
	 */ 
	private $_enligne ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idInterview
	 * @var string $idInterview
	 */ 
	public function setIdInterview($idInterview)
	{
		$this->_idInterview = $idInterview ;
		return $this;

	}
	public function getIdInterview()
	{
		return $this->_idInterview ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_titreInterview
	 * @var string $titreInterview
	 */ 
	public function setTitreInterview($titreInterview)
	{
		$this->_titreInterview = $titreInterview ;
		return $this;

	}
	public function getTitreInterview()
	{
		return $this->_titreInterview ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_soustitreInterview
	 * @var string $soustitreInterview
	 */ 
	public function setSoustitreInterview($soustitreInterview)
	{
		$this->_soustitreInterview = $soustitreInterview ;
		return $this;

	}
	public function getSoustitreInterview()
	{
		return $this->_soustitreInterview ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_textInterview
	 * @var longtext $textInterview
	 */ 
	public function setTextInterview($textInterview)
	{
		$this->_textInterview = $textInterview ;
		return $this;

	}
	public function getTextInterview()
	{
		return $this->_textInterview ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateInterview
	 * @var string $dateInterview
	 */ 
	public function setDateInterview($dateInterview)
	{
		$this->_dateInterview = $dateInterview ;
		return $this;

	}
	public function getDateInterview()
	{
		return $this->_dateInterview ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienInterview
	 * @var string $lienInterview
	 */ 
	public function setLienInterview($lienInterview)
	{
		$this->_lienInterview = $lienInterview ;
		return $this;

	}
	public function getLienInterview()
	{
		return $this->_lienInterview ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienJava
	 * @var int $lienJava
	 */ 
	public function setLienJava($lienJava)
	{
		$this->_lienJava = $lienJava ;
		return $this;

	}
	public function getLienJava()
	{
		return $this->_lienJava ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_titreSommaire
	 * @var string $titreSommaire
	 */ 
	public function setTitreSommaire($titreSommaire)
	{
		$this->_titreSommaire = $titreSommaire ;
		return $this;

	}
	public function getTitreSommaire()
	{
		return $this->_titreSommaire ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienImage
	 * @var string $lienImage
	 */ 
	public function setLienImage($lienImage)
	{
		$this->_lienImage = $lienImage ;
		return $this;

	}
	public function getLienImage()
	{
		return $this->_lienImage ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_Intervieweur
	 * @var string $Intervieweur
	 */ 
	public function setIntervieweur($Intervieweur)
	{
		$this->_Intervieweur = $Intervieweur ;
		return $this;

	}
	public function getIntervieweur()
	{
		return $this->_Intervieweur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_enligne
	 * @var string $enligne
	 */ 
	public function setEnligne($enligne)
	{
		$this->_enligne = $enligne ;
		return $this;

	}
	public function getEnligne()
	{
		return $this->_enligne ;
	}
}
