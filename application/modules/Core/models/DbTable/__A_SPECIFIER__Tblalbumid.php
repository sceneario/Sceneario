<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblalbumid
 * @desc TABLE  : tbl_Album_id
 * @file Tblalbumid.php
 * @desc PK     : __A_SPECIFIER__
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblalbumid extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Album_id",
			"primary" => "__A_SPECIFIER__"
		);
		parent::__construct($options);
	}	
}