<?php

/*
 * SCENEARIO.COM
 * Table des liens auteurs interview
 * @desc CLASSE : Core_Model_DbTable_Tblalbumsdossier
 * @desc TABLE  : tbl_Albums_Dossier
 * @file Tblalbumsdossier.php
 * @desc PK     : idDossier
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblalbumsdossier extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Albums_Dossier",
			"primary" => "idDossier"
		);
		parent::__construct($options);
	}	
}