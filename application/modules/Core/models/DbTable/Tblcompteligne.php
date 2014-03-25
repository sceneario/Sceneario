<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblcompteligne
 * @desc TABLE  : tbl_Compte_Ligne
 * @file Tblcompteligne.php
 * @desc PK     : idligne
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblcompteligne extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Compte_Ligne",
			"primary" => "idligne"
		);
		parent::__construct($options);
	}	
}