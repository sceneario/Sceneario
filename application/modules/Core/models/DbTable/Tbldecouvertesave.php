<?php

/*
 * SCENEARIO.COM
 * Table des dossiers découverte
 * @desc CLASSE : Core_Model_DbTable_Tbldecouvertesave
 * @desc TABLE  : tbl_Decouverte_save
 * @file Tbldecouvertesave.php
 * @desc PK     : idDecouverte
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tbldecouvertesave extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Decouverte_save",
			"primary" => "idDecouverte"
		);
		parent::__construct($options);
	}	
}