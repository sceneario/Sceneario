<?php

/*
 * SCENEARIO.COM
 * Table des liens auteurs interview
 * @desc CLASSE : Core_Model_DbTable_Tblauteursdossier
 * @desc TABLE  : tbl_Auteurs_Dossier
 * @file Tblauteursdossier.php
 * @desc PK     : idDossier
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblauteursdossier extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Auteurs_Dossier",
			"primary" => "idDossier"
		);
		parent::__construct($options);
	}	
}