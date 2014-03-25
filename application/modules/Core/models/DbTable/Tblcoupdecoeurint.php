<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblcoupdecoeurint
 * @desc TABLE  : tbl_Coup_de_coeur_Int
 * @file Tblcoupdecoeurint.php
 * @desc PK     : idVote
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblcoupdecoeurint extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Coup_de_coeur_Internaute",
			"primary" => "idVote"
		);
		parent::__construct($options);
	}	
}