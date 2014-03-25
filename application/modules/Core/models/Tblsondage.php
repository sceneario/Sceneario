<?php 

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Tblsondage
 * @desc TABLE  : tbl_Sondage
 * @file Tblsondage.php
 * @desc PK     : idSondage
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblsondage
{

	/* 
	 * @var int - type SQL : mediumint $_idSondage
	 * @desc __A_SPECIFIER__
	 */ 
	private $_idSondage ; 

	/* 
	 * @var string - type SQL : varchar $_question
	 * @desc __A_SPECIFIER__
	 */ 
	private $_question ; 

	/* 
	 * @var string - type SQL : varchar $_reponse1
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse1 ; 

	/* 
	 * @var string - type SQL : varchar $_reponse2
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse2 ; 

	/* 
	 * @var string - type SQL : varchar $_reponse3
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse3 ; 

	/* 
	 * @var string - type SQL : varchar $_reponse4
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse4 ; 

	/* 
	 * @var string - type SQL : varchar $_reponse5
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse5 ; 

	/* 
	 * @var string - type SQL : varchar $_reponse6
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse6 ; 

	/* 
	 * @var string - type SQL : varchar $_reponse7
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse7 ; 

	/* 
	 * @var string - type SQL : varchar $_reponse8
	 * @desc __A_SPECIFIER__
	 */ 
	private $_reponse8 ; 

	/* 
	 * @var int - type SQL : tinyint $_type_choix
	 * @desc __A_SPECIFIER__
	 */ 
	private $_type_choix ; 

	/* 
	 * @var string - type SQL : char $_enligne
	 * @desc __A_SPECIFIER__
	 */ 
	private $_enligne ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_idSondage
	 * @var int $idSondage
	 */ 
	public function setIdSondage($idSondage)
	{
		$this->_idSondage = $idSondage ;
		return $this;

	}
	public function getIdSondage()
	{
		return $this->_idSondage ;
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
	 * @desc SETTER AND GETTER FOR $_reponse1
	 * @var string $reponse1
	 */ 
	public function setReponse1($reponse1)
	{
		$this->_reponse1 = $reponse1 ;
		return $this;

	}
	public function getReponse1()
	{
		return $this->_reponse1 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse2
	 * @var string $reponse2
	 */ 
	public function setReponse2($reponse2)
	{
		$this->_reponse2 = $reponse2 ;
		return $this;

	}
	public function getReponse2()
	{
		return $this->_reponse2 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse3
	 * @var string $reponse3
	 */ 
	public function setReponse3($reponse3)
	{
		$this->_reponse3 = $reponse3 ;
		return $this;

	}
	public function getReponse3()
	{
		return $this->_reponse3 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse4
	 * @var string $reponse4
	 */ 
	public function setReponse4($reponse4)
	{
		$this->_reponse4 = $reponse4 ;
		return $this;

	}
	public function getReponse4()
	{
		return $this->_reponse4 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse5
	 * @var string $reponse5
	 */ 
	public function setReponse5($reponse5)
	{
		$this->_reponse5 = $reponse5 ;
		return $this;

	}
	public function getReponse5()
	{
		return $this->_reponse5 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse6
	 * @var string $reponse6
	 */ 
	public function setReponse6($reponse6)
	{
		$this->_reponse6 = $reponse6 ;
		return $this;

	}
	public function getReponse6()
	{
		return $this->_reponse6 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse7
	 * @var string $reponse7
	 */ 
	public function setReponse7($reponse7)
	{
		$this->_reponse7 = $reponse7 ;
		return $this;

	}
	public function getReponse7()
	{
		return $this->_reponse7 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_reponse8
	 * @var string $reponse8
	 */ 
	public function setReponse8($reponse8)
	{
		$this->_reponse8 = $reponse8 ;
		return $this;

	}
	public function getReponse8()
	{
		return $this->_reponse8 ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_type_choix
	 * @var int $type_choix
	 */ 
	public function setType_choix($type_choix)
	{
		$this->_type_choix = $type_choix ;
		return $this;

	}
	public function getType_choix()
	{
		return $this->_type_choix ;
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
}
