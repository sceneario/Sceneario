<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblservicespress
 * @desc TABLE  : tbl_Services_Press
 * @file Tblservicespress.php
 * @desc PK     : idService
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblservicespress
{

	/* 
	 * @var int - type SQL : int $_idService
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idService ; 

	/* 
	 * @var int - type SQL : int $_idEditeur
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idEditeur ; 

	/* 
	 * @var string - type SQL : date $_dateParution
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateParution ; 

	/* 
	 * @var string - type SQL : text $_nomService
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomService ; 

	/* 
	 * @var string - type SQL : char $_bloque
	 * @desc __A_SPECIFIER__
	 */ 
	private $_bloque ; 

	/* 
	 * @var string - type SQL : char $_T_Recu
	 * @desc __A_SPECIFIER__
	 */ 
	private $_T_Recu ; 

	/* 
	 * @var string - type SQL : text $_ListeAuteurs
	 * @desc __A_SPECIFIER__
	 */ 
	private $_ListeAuteurs ; 

	/* 
	 * @var string - type SQL : datetime $_datecreation
	 * @desc __A_SPECIFIER__
	 */ 
	private $_datecreation ; 


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

	/* 
	 * @desc SETTER AND GETTER FOR $_idEditeur
	 * @var int $idEditeur
	 */ 
	public function setIdEditeur($idEditeur)
	{
		$this->_idEditeur = $idEditeur ;
		return $this;

	}
	public function getIdEditeur()
	{
		return $this->_idEditeur ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateParution
	 * @var string $dateParution
	 */ 
	public function setDateParution($dateParution)
	{
		$this->_dateParution = $dateParution ;
		return $this;

	}
	public function getDateParution()
	{
		return $this->_dateParution ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nomService
	 * @var string $nomService
	 */ 
	public function setNomService($nomService)
	{
		$this->_nomService = $nomService ;
		return $this;

	}
	public function getNomService()
	{
		return $this->_nomService ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_bloque
	 * @var string $bloque
	 */ 
	public function setBloque($bloque)
	{
		$this->_bloque = $bloque ;
		return $this;

	}
	public function getBloque()
	{
		return $this->_bloque ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_T_Recu
	 * @var string $T_Recu
	 */ 
	public function setT_Recu($T_Recu)
	{
		$this->_T_Recu = $T_Recu ;
		return $this;

	}
	public function getT_Recu()
	{
		return $this->_T_Recu ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_ListeAuteurs
	 * @var string $ListeAuteurs
	 */ 
	public function setListeAuteurs($ListeAuteurs)
	{
		$this->_ListeAuteurs = $ListeAuteurs ;
		return $this;

	}
	public function getListeAuteurs()
	{
		return $this->_ListeAuteurs ;
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
}
