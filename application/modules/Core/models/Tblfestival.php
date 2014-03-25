<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblfestival
 * @desc TABLE  : tbl_Festival
 * @file Tblfestival.php
 * @desc PK     : idFestival
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblfestival
{

	/* 
	 * @var int - type SQL : smallint $_idFestival
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idFestival ; 

	/* 
	 * @var string - type SQL : varchar $_nomFestival
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomFestival ; 

	/* 
	 * @var string - type SQL : varchar $_villeFestival
	 * @desc __A_SPECIFIER__
	 */ 
	private $_villeFestival ; 

	/* 
	 * @var string - type SQL : varchar $_lienOpale
	 * @desc __A_SPECIFIER__
	 */ 
	private $_lienOpale ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idFestival
	 * @var int $idFestival
	 */ 
	public function setIdFestival($idFestival)
	{
		$this->_idFestival = $idFestival ;
		return $this;

	}
	public function getIdFestival()
	{
		return $this->_idFestival ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nomFestival
	 * @var string $nomFestival
	 */ 
	public function setNomFestival($nomFestival)
	{
		$this->_nomFestival = $nomFestival ;
		return $this;

	}
	public function getNomFestival()
	{
		return $this->_nomFestival ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_villeFestival
	 * @var string $villeFestival
	 */ 
	public function setVilleFestival($villeFestival)
	{
		$this->_villeFestival = $villeFestival ;
		return $this;

	}
	public function getVilleFestival()
	{
		return $this->_villeFestival ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_lienOpale
	 * @var string $lienOpale
	 */ 
	public function setLienOpale($lienOpale)
	{
		$this->_lienOpale = $lienOpale ;
		return $this;

	}
	public function getLienOpale()
	{
		return $this->_lienOpale ;
	}
}
