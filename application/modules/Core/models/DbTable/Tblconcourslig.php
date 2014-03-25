<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblconcourslig
 * @desc TABLE  : tbl_Concours_Lig
 * @file Tblconcourslig.php
 * @desc PK     : nomConcours
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblconcourslig extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Concours_Lig",
			"primary" => "nomConcours"
		);
		parent::__construct($options);
	}	
}