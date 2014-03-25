<?php

/*
 * SCENEARIO.COM
 * Table des pages du dossier
 * @desc CLASSE : Core_Model_DbTable_Tbldossierspages
 * @desc TABLE  : tbl_Dossiers_Pages
 * @file Tbldossierspages.php
 * @desc PK     : idDossier
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tbldossierspages extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Dossiers_Pages",
			"primary" => "idDossier"
		);
		parent::__construct($options);
	}	
}