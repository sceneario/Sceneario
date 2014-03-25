<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblnews
 * @desc TABLE  : tbl_News
 * @file Tblnews.php
 * @desc PK     : idNews
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblnews
{

	/* 
	 * @var int - type SQL : int $_idNews
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idNews ; 

	/* 
	 * @var string - type SQL : text $_texte
	 * @desc __A_SPECIFIER__
	 */ 
	private $_texte ; 

	/* 
	 * @var string - type SQL : date $_datecreation
	 * @desc __A_SPECIFIER__
	 */ 
	private $_datecreation ; 

	/* 
	 * @var string - type SQL : char $_enligne
	 * @desc __A_SPECIFIER__
	 */ 
	private $_enligne ; 

	/* 
	 * @var string - type SQL : varchar $_dateNews
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateNews ; 

	/* 
	 * @var string - type SQL : char $_shortnews
	 * @desc __A_SPECIFIER__
	 */ 
	private $_shortnews ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idNews
	 * @var int $idNews
	 */ 
	public function setIdNews($idNews)
	{
		$this->_idNews = $idNews ;
		return $this;

	}
	public function getIdNews()
	{
		return $this->_idNews ;
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

	/* 
	 * @desc SETTER AND GETTER FOR $_dateNews
	 * @var string $dateNews
	 */ 
	public function setDateNews($dateNews)
	{
		$this->_dateNews = $dateNews ;
		return $this;

	}
	public function getDateNews()
	{
		return $this->_dateNews ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_shortnews
	 * @var string $shortnews
	 */ 
	public function setShortnews($shortnews)
	{
		$this->_shortnews = $shortnews ;
		return $this;

	}
	public function getShortnews()
	{
		return $this->_shortnews ;
	}
}
