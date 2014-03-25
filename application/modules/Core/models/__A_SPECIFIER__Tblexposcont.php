<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblexposcont
 * @desc TABLE  : tbl_Expos_Cont
 * @file Tblexposcont.php
 * @desc PK     : __A_SPECIFIER__
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblexposcont
{

	/* 
	 * @var int - type SQL : int $_id
	 * @desc __A_SPECIFIER__
	 */ 
	private $_id ; 

	/* 
	 * @var string - type SQL : text $_url
	 * @desc __A_SPECIFIER__
	 */ 
	private $_url ; 

	/* 
	 * @var string - type SQL : text $_idexpo
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idexpo ; 

	/* 
	 * @var string - type SQL : text $_titre
	 * @desc __A_SPECIFIER__
	 */ 
	private $_titre ; 

	/* 
	 * @var string - type SQL : text $_com
	 * @desc __A_SPECIFIER__
	 */ 
	private $_com ; 

	/* 
	 * @var string - type SQL : datetime $_dateajout
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateajout ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_id
	 * @var int $id
	 */ 
	public function setId($id)
	{
		$this->_id = $id ;
		return $this;

	}
	public function getId()
	{
		return $this->_id ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_url
	 * @var string $url
	 */ 
	public function setUrl($url)
	{
		$this->_url = $url ;
		return $this;

	}
	public function getUrl()
	{
		return $this->_url ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_idexpo
	 * @var string $idexpo
	 */ 
	public function setIdexpo($idexpo)
	{
		$this->_idexpo = $idexpo ;
		return $this;

	}
	public function getIdexpo()
	{
		return $this->_idexpo ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_titre
	 * @var string $titre
	 */ 
	public function setTitre($titre)
	{
		$this->_titre = $titre ;
		return $this;

	}
	public function getTitre()
	{
		return $this->_titre ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_com
	 * @var string $com
	 */ 
	public function setCom($com)
	{
		$this->_com = $com ;
		return $this;

	}
	public function getCom()
	{
		return $this->_com ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateajout
	 * @var string $dateajout
	 */ 
	public function setDateajout($dateajout)
	{
		$this->_dateajout = $dateajout ;
		return $this;

	}
	public function getDateajout()
	{
		return $this->_dateajout ;
	}
}
