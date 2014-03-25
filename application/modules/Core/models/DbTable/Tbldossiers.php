<?php

/*
 * SCENEARIO.COM
 * Table des dossiers ou carnet de croquis
 * @desc CLASSE : Core_Model_DbTable_Tbldossiers
 * @desc TABLE  : tbl_Dossiers
 * @file Tbldossiers.php
 * @desc PK     : idDossier
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tbldossiers extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Dossiers",
			"primary" => "idDossier"
		);
		parent::__construct($options);
	}	
}