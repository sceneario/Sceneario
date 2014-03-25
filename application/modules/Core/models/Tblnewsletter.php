<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblnewsletter
 * @desc TABLE  : tbl_News_Letter
 * @file Tblnewsletter.php
 * @desc PK     : idNewsLetter
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblnewsletter
{

	/* 
	 * @var int - type SQL : int $_idNewsLetter
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idNewsLetter ; 

	/* 
	 * @var int - type SQL : int $_numNewsLetter
	 * @desc __A_SPECIFIER__
	 */ 
	private $_numNewsLetter ; 

	/* 
	 * @var string - type SQL : text $_motpatron
	 * @desc __A_SPECIFIER__
	 */ 
	private $_motpatron ; 

	/* 
	 * @var string - type SQL : text $_texte
	 * @desc __A_SPECIFIER__
	 */ 
	private $_texte ; 

	/* 
	 * @var string - type SQL : varchar $_type
	 * @desc __A_SPECIFIER__
	 */ 
	private $_type ; 

	/* 
	 * @var string - type SQL : date $_date_news
	 * @desc __A_SPECIFIER__
	 */ 
	private $_date_news ; 

	/* 
	 * @var string - type SQL : varchar $_theme
	 * @desc __A_SPECIFIER__
	 */ 
	private $_theme ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idNewsLetter
	 * @var int $idNewsLetter
	 */ 
	public function setIdNewsLetter($idNewsLetter)
	{
		$this->_idNewsLetter = $idNewsLetter ;
		return $this;

	}
	public function getIdNewsLetter()
	{
		return $this->_idNewsLetter ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_numNewsLetter
	 * @var int $numNewsLetter
	 */ 
	public function setNumNewsLetter($numNewsLetter)
	{
		$this->_numNewsLetter = $numNewsLetter ;
		return $this;

	}
	public function getNumNewsLetter()
	{
		return $this->_numNewsLetter ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_motpatron
	 * @var string $motpatron
	 */ 
	public function setMotpatron($motpatron)
	{
		$this->_motpatron = $motpatron ;
		return $this;

	}
	public function getMotpatron()
	{
		return $this->_motpatron ;
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
	 * @desc SETTER AND GETTER FOR $_type
	 * @var string $type
	 */ 
	public function setType($type)
	{
		$this->_type = $type ;
		return $this;

	}
	public function getType()
	{
		return $this->_type ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_date_news
	 * @var string $date_news
	 */ 
	public function setDate_news($date_news)
	{
		$this->_date_news = $date_news ;
		return $this;

	}
	public function getDate_news()
	{
		return $this->_date_news ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_theme
	 * @var string $theme
	 */ 
	public function setTheme($theme)
	{
		$this->_theme = $theme ;
		return $this;

	}
	public function getTheme()
	{
		return $this->_theme ;
	}
}
