<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblconcours
 * @desc TABLE  : tbl_Concours
 * @file Tblconcours.php
 * @desc PK     : __A_SPECIFIER__
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblconcours
{

	/* 
	 * @var string - type SQL : date $_date
	 * @desc __A_SPECIFIER__
	 */ 
	private $_date ; 

	/* 
	 * @var string - type SQL : text $_question
	 * @desc __A_SPECIFIER__
	 */ 
	private $_question ; 

	/* 
	 * @var string - type SQL : varchar $_nomConcours
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nomConcours ; 


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
}
