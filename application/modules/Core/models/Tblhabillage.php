<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblhabillage
 * @desc TABLE  : tbl_Habillage
 * @file Tblhabillage.php
 * @desc PK     : idHabillage
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblhabillage
{

	/* 
	 * @var string - type SQL : varchar $_idHabillage
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idHabillage ; 

	/* 
	 * @var string - type SQL : varchar $_nom
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nom ; 

	/* 
	 * @var string - type SQL : text $_banniere
	 * @desc __A_SPECIFIER__
	 */ 
	private $_banniere ; 

	/* 
	 * @var string - type SQL : varchar $_couleur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_couleur ; 

	/* 
	 * @var string - type SQL : varchar $_actif
	 * @desc __A_SPECIFIER__
	 */ 
	private $_actif ; 

	/* 
	 * @var string - type SQL : varchar $_actifDev
	 * @desc __A_SPECIFIER__
	 */ 
	private $_actifDev ; 

	/* 
	 * @var int - type SQL : tinyint $_portee
	 * @desc __A_SPECIFIER__
	 */ 
	private $_portee ; 

	/* 
	 * @var string - type SQL : varchar $_css
	 * @desc __A_SPECIFIER__
	 */ 
	private $_css ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idHabillage
	 * @var string $idHabillage
	 */ 
	public function setIdHabillage($idHabillage)
	{
		$this->_idHabillage = $idHabillage ;
		return $this;

	}
	public function getIdHabillage()
	{
		return $this->_idHabillage ;
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
	 * @desc SETTER AND GETTER FOR $_banniere
	 * @var string $banniere
	 */ 
	public function setBanniere($banniere)
	{
		$this->_banniere = $banniere ;
		return $this;

	}
	public function getBanniere()
	{
		return $this->_banniere ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_couleur
	 * @var string $couleur
	 */ 
	public function setCouleur($couleur)
	{
		$this->_couleur = $couleur ;
		return $this;

	}
	public function getCouleur()
	{
		return $this->_couleur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_actif
	 * @var string $actif
	 */ 
	public function setActif($actif)
	{
		$this->_actif = $actif ;
		return $this;

	}
	public function getActif()
	{
		return $this->_actif ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_actifDev
	 * @var string $actifDev
	 */ 
	public function setActifDev($actifDev)
	{
		$this->_actifDev = $actifDev ;
		return $this;

	}
	public function getActifDev()
	{
		return $this->_actifDev ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_portee
	 * @var int $portee
	 */ 
	public function setPortee($portee)
	{
		$this->_portee = $portee ;
		return $this;

	}
	public function getPortee()
	{
		return $this->_portee ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_css
	 * @var string $css
	 */ 
	public function setCss($css)
	{
		$this->_css = $css ;
		return $this;

	}
	public function getCss()
	{
		return $this->_css ;
	}
}
