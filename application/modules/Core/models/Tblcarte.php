<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblcarte
 * @desc TABLE  : tbl_Carte
 * @file Tblcarte.php
 * @desc PK     : idCarte
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblcarte
{

	/* 
	 * @var int - type SQL : int $_idCarte
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idCarte ; 

	/* 
	 * @var string - type SQL : varchar $_monmail
	 * @desc __A_SPECIFIER__
	 */ 
	private $_monmail ; 

	/* 
	 * @var string - type SQL : varchar $_sonmail
	 * @desc __A_SPECIFIER__
	 */ 
	private $_sonmail ; 

	/* 
	 * @var string - type SQL : text $_texte
	 * @desc __A_SPECIFIER__
	 */ 
	private $_texte ; 

	/* 
	 * @var string - type SQL : varchar $_nom
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nom ; 

	/* 
	 * @var string - type SQL : char $_vuCarte
	 * @desc __A_SPECIFIER__
	 */ 
	private $_vuCarte ; 

	/* 
	 * @var string - type SQL : varchar $_clef
	 * @desc __A_SPECIFIER__
	 */ 
	private $_clef ; 

	/* 
	 * @var string - type SQL : varchar $_nomCarte
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomCarte ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idCarte
	 * @var int $idCarte
	 */ 
	public function setIdCarte($idCarte)
	{
		$this->_idCarte = $idCarte ;
		return $this;

	}
	public function getIdCarte()
	{
		return $this->_idCarte ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_monmail
	 * @var string $monmail
	 */ 
	public function setMonmail($monmail)
	{
		$this->_monmail = $monmail ;
		return $this;

	}
	public function getMonmail()
	{
		return $this->_monmail ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_sonmail
	 * @var string $sonmail
	 */ 
	public function setSonmail($sonmail)
	{
		$this->_sonmail = $sonmail ;
		return $this;

	}
	public function getSonmail()
	{
		return $this->_sonmail ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_texte
	 * @var string $texte
	 */ 
	public function setTexte($texte)
	{
		$this->_texte = $texte ;
		return $this;

	}
	public function getTexte()
	{
		return $this->_texte ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nom
	 * @var string $nom
	 */ 
	public function setNom($nom)
	{
		$this->_nom = $nom ;
		return $this;

	}
	public function getNom()
	{
		return $this->_nom ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_vuCarte
	 * @var string $vuCarte
	 */ 
	public function setVuCarte($vuCarte)
	{
		$this->_vuCarte = $vuCarte ;
		return $this;

	}
	public function getVuCarte()
	{
		return $this->_vuCarte ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_clef
	 * @var string $clef
	 */ 
	public function setClef($clef)
	{
		$this->_clef = $clef ;
		return $this;

	}
	public function getClef()
	{
		return $this->_clef ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nomCarte
	 * @var string $nomCarte
	 */ 
	public function setNomCarte($nomCarte)
	{
		$this->_nomCarte = $nomCarte ;
		return $this;

	}
	public function getNomCarte()
	{
		return $this->_nomCarte ;
	}
}
