<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblparametres
 * @desc TABLE  : tbl_Parametres
 * @file Tblparametres.php
 * @desc PK     : nom_param
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblparametres
{

	/* 
	 * @var string - type SQL : char $_nom_param
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nom_param ; 

	/* 
	 * @var string - type SQL : char $_valeur_param
	 * @desc __A_SPECIFIER__
	 */ 
	private $_valeur_param ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_nom_param
	 * @var string $nom_param
	 */ 
	public function setNom_param($nom_param)
	{
		$this->_nom_param = $nom_param ;
		return $this;

	}
	public function getNom_param()
	{
		return $this->_nom_param ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_valeur_param
	 * @var string $valeur_param
	 */ 
	public function setValeur_param($valeur_param)
	{
		$this->_valeur_param = $valeur_param ;
		return $this;

	}
	public function getValeur_param()
	{
		return $this->_valeur_param ;
	}
}
