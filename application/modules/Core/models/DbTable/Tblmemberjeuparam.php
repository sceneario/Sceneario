<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblmemberjeuparam
 * @desc TABLE  : tbl_Member_Jeu_Param
 * @file Tblmemberjeuparam.php
 * @desc PK     : date
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblmemberjeuparam extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Member_Jeu_Param",
			"primary" => "date"
		);
		parent::__construct($options);
	}	
}