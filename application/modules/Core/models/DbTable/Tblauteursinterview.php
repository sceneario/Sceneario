<?php

/*
 * SCENEARIO.COM
 * Table des liens auteurs interview
 * @desc CLASSE : Core_Model_DbTable_Tblauteursinterview
 * @desc TABLE  : tbl_Auteurs_Interview
 * @file Tblauteursinterview.php
 * @desc PK     : idInterview
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblauteursinterview extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Auteurs_Interview",
			"primary" => "idInterview"
		);
		parent::__construct($options);
	}	
}