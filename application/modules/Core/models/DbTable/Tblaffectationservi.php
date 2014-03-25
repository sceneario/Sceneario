<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblaffectationservi
 * @desc TABLE  : tbl_Affectation_Servi
 * @file Tblaffectationservi.php
 * @desc PK     : idInternaute
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblaffectationservi extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Affectation_Servi",
			"primary" => "idInternaute"
		);
		parent::__construct($options);
	}	
}