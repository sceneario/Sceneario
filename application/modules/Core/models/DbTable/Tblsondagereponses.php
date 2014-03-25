<?php

/*
 * SCENEARIO.COM
 * Table des réponses du sondage
 * @desc CLASSE : Core_Model_DbTable_Tblsondagereponses
 * @desc TABLE  : tbl_Sondage_Reponses
 * @file Tblsondagereponses.php
 * @desc PK     : idSondage
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblsondagereponses extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Sondage_Reponses",
			"primary" => "idSondage"
		);
		parent::__construct($options);
	}	
}