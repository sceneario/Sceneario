<?php

/*
 * SCENEARIO.COM
 * Table des brouillons de critiques
 * @desc CLASSE : Core_Model_DbTable_Tblcritiquebrouillo
 * @desc TABLE  : tbl_Critique_Brouillo
 * @file Tblcritiquebrouillo.php
 * @desc PK     : idInternaute
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblcritiquebrouillo extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Critique_Brouillo",
			"primary" => "idInternaute"
		);
		parent::__construct($options);
	}	
}