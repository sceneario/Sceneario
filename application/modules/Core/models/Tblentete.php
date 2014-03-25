<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblentete
 * @desc TABLE  : tbl_Entete
 * @file Tblentete.php
 * @desc PK     : nomEntete
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblentete
{

	/* 
	 * @var string - type SQL : varchar $_nomEntete
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomEntete ; 

	/* 
	 * @var string - type SQL : text $_texteEnt
	 * @desc __A_SPECIFIER__
	 */ 
	private $_texteEnt ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_nomEntete
	 * @var string $nomEntete
	 */ 
	public function setNomEntete($nomEntete)
	{
		$this->_nomEntete = $nomEntete ;
		return $this;

	}
	public function getNomEntete()
	{
		return $this->_nomEntete ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_texteEnt
	 * @var string $texteEnt
	 */ 
	public function setTexteEnt($texteEnt)
	{
		$this->_texteEnt = $texteEnt ;
		return $this;

	}
	public function getTexteEnt()
	{
		return $this->_texteEnt ;
	}
}
