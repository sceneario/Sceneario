<?php 

/*
 * SCENEARIO.COM
 * Table des scores des puzzles
 * @desc CLASSE : Core_Model_Tblmemberjeupuzzle
 * @desc TABLE  : tbl_Member_Jeu_Puzzle
 * @file Tblmemberjeupuzzle.php
 * @desc PK     : isbn
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Tblmemberjeupuzzle
{

	/* 
	 * @var int - type SQL : mediumint $_user_id
	 * @desc __A_SPECIFIER__
	 */ 
	private $_user_id ; 

	/* 
	 * @var string - type SQL : varchar $_isbn
	 * @desc __A_SPECIFIER__
	 */ 
	private $_isbn ; 

	/* 
	 * @var int - type SQL : tinyint $_nb_pieces_l
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nb_pieces_l ; 

	/* 
	 * @var int - type SQL : tinyint $_nb_pieces_h
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nb_pieces_h ; 

	/* 
	 * @var int - type SQL : smallint $_nb_coups
	 * @desc __A_SPECIFIER__
	 */ 
	private $_nb_coups ; 

	/* 
	 * @var string - type SQL : datetime $_date
	 * @desc __A_SPECIFIER__
	 */ 
	private $_date ; 


	/* 
	 * @desc SETTER AND GETTER FOR $_user_id
	 * @var int $user_id
	 */ 
	public function setUser_id($user_id)
	{
		$this->_user_id = $user_id ;
		return $this;

	}
	public function getUser_id()
	{
		return $this->_user_id ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_isbn
	 * @var string $isbn
	 */ 
	public function setIsbn($isbn)
	{
		$this->_isbn = $isbn ;
		return $this;

	}
	public function getIsbn()
	{
		return $this->_isbn ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nb_pieces_l
	 * @var int $nb_pieces_l
	 */ 
	public function setNb_pieces_l($nb_pieces_l)
	{
		$this->_nb_pieces_l = $nb_pieces_l ;
		return $this;

	}
	public function getNb_pieces_l()
	{
		return $this->_nb_pieces_l ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nb_pieces_h
	 * @var int $nb_pieces_h
	 */ 
	public function setNb_pieces_h($nb_pieces_h)
	{
		$this->_nb_pieces_h = $nb_pieces_h ;
		return $this;

	}
	public function getNb_pieces_h()
	{
		return $this->_nb_pieces_h ;
	}

	/* 
	 * @desc SETTER AND GETTER FOR $_nb_coups
	 * @var int $nb_coups
	 */ 
	public function setNb_coups($nb_coups)
	{
		$this->_nb_coups = $nb_coups ;
		return $this;

	}
	public function getNb_coups()
	{
		return $this->_nb_coups ;
	}

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
}
