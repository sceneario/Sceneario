<?php

/*
 * SCENEARIO.COM
 * Table des scores des puzzles
 * @desc CLASSE : Core_Model_DbTable_Tblmemberjeupuzzle
 * @desc TABLE  : tbl_Member_Jeu_Puzzle
 * @file Tblmemberjeupuzzle.php
 * @desc PK     : isbn
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblmemberjeupuzzle extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Member_Jeu_Puzzle",
			"primary" => "isbn"
		);
		parent::__construct($options);
	}	
}