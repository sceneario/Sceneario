<?php

/*
 * SCENEARIO.COM
 * Table d''entête des concours
 * @desc CLASSE : Core_Model_DbTable_Tblconcoursent
 * @desc TABLE  : tbl_Concours_Ent
 * @file Tblconcoursent.php
 * @desc PK     : nomConcours
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblconcoursent extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Concours_Ent",
			"primary" => "nomConcours"
		);
		parent::__construct($options);
	}	
}