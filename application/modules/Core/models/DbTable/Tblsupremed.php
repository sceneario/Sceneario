<?php

/*
 * SCENEARIO.COM
 * Table des scenar Supreme Dimension
 * @desc CLASSE : Core_Model_DbTable_Tblsupremed
 * @desc TABLE  : tbl_SupremeD
 * @file Tblsupremed.php
 * @desc PK     : idSupremeD
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblsupremed extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_SupremeD",
			"primary" => "idSupremeD"
		);
		parent::__construct($options);
	}	
}