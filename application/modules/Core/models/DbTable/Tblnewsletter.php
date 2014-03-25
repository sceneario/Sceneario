<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblnewsletter
 * @desc TABLE  : tbl_News_Letter
 * @file Tblnewsletter.php
 * @desc PK     : idNewsLetter
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblnewsletter extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_News_Letter",
			"primary" => "idNewsLetter"
		);
		parent::__construct($options);
	}	
}