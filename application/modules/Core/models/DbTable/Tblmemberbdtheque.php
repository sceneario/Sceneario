<?php

/*
 * SCENEARIO.COM
 * Table des bibliothèques des membres
 * @desc CLASSE : Core_Model_DbTable_Tblmemberbdtheque
 * @desc TABLE  : tbl_Member_Bdtheque
 * @file Tblmemberbdtheque.php
 * @desc PK     : user_id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblmemberbdtheque extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Member_Bdtheque",
			"primary" => "user_id"
		);
		parent::__construct($options);
	}	
}