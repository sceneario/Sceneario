<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblcritiqueprov
 * @desc TABLE  : tbl_Critique_Prov
 * @file Tblcritiqueprov.php
 * @desc PK     : idCritique
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblcritiqueprov extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Critique_Prov",
			"primary" => "idCritique"
		);
		parent::__construct($options);
	}	
}