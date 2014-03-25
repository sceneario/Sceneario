<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblmemberjeuparam
 * @desc TABLE  : tbl_Member_Jeu_Param
 * @file Tblmemberjeuparam.php
 * @desc PK     : date
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblmemberjeuparam
{

	/* 
	 * @var string - type SQL : date $_date
	 * @desc __A_SPECIFIER__
	 */ 
	private $_date ; 

	/* 
	 * @var string - type SQL : varchar $_idjeu
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idjeu ; 

	/* 
	 * @var string - type SQL : varchar $_idAlbum
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idAlbum ; 

	/* 
	 * @var int - type SQL : smallint $_points
	 * @desc __A_SPECIFIER__
	 */ 
	private $_points ; 


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
	 * @desc SETTER AND GETTER FOR $_idjeu
	 * @var string $idjeu
	 */ 
	public function setIdjeu($idjeu)
	{
		$this->_idjeu = $idjeu ;
		return $this;

	}
	public function getIdjeu()
	{
		return $this->_idjeu ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idAlbum
	 * @var string $idAlbum
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
	 * @desc SETTER AND GETTER FOR $_points
	 * @var int $points
	 */ 
	public function setPoints($points)
	{
		$this->_points = $points ;
		return $this;

	}
	public function getPoints()
	{
		return $this->_points ;
	}
}
