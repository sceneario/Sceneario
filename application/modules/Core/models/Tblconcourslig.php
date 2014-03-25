<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblconcourslig
 * @desc TABLE  : tbl_Concours_Lig
 * @file Tblconcourslig.php
 * @desc PK     : nomConcours
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblconcourslig
{

	/* 
	 * @var string - type SQL : varchar $_nomConcours
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomConcours ; 

	/* 
	 * @var int - type SQL : int $_numQuestion
	 * @desc __A_SPECIFIER__
	 */ 
	private $_numQuestion ; 

	/* 
	 * @var string - type SQL : date $_dateQuestion
	 * @desc __A_SPECIFIER__
	 */ 
	private $_dateQuestion ; 

	/* 
	 * @var string - type SQL : text $_question
	 * @desc __A_SPECIFIER__
	 */ 
	private $_question ; 

	/* 
	 * @var int - type SQL : tinyint $_t_alldays
	 * @desc __A_SPECIFIER__
	 */ 
	private $_t_alldays ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_nomConcours
	 * @var string $nomConcours
	 */ 
	public function setNomConcours($nomConcours)
	{
		$this->_nomConcours = $nomConcours ;
		return $this;

	}
	public function getNomConcours()
	{
		return $this->_nomConcours ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_numQuestion
	 * @var int $numQuestion
	 */ 
	public function setNumQuestion($numQuestion)
	{
		$this->_numQuestion = $numQuestion ;
		return $this;

	}
	public function getNumQuestion()
	{
		return $this->_numQuestion ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_dateQuestion
	 * @var string $dateQuestion
	 */ 
	public function setDateQuestion($dateQuestion)
	{
		$this->_dateQuestion = $dateQuestion ;
		return $this;

	}
	public function getDateQuestion()
	{
		return $this->_dateQuestion ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_question
	 * @var string $question
	 */ 
	public function setQuestion($question)
	{
		$this->_question = $question ;
		return $this;

	}
	public function getQuestion()
	{
		return $this->_question ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_t_alldays
	 * @var int $t_alldays
	 */ 
	public function setT_alldays($t_alldays)
	{
		$this->_t_alldays = $t_alldays ;
		return $this;

	}
	public function getT_alldays()
	{
		return $this->_t_alldays ;
	}
}
