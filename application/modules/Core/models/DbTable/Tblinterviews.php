<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblinterviews
 * @desc TABLE  : tbl_Interviews
 * @file Tblinterviews.php
 * @desc PK     : idInterview
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblinterviews extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Interviews",
			"primary" => "idInterview"
		);
		parent::__construct($options);
	}	
}