<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblmailingsave
 * @desc TABLE  : tbl_Mailing_save
 * @file Tblmailingsave.php
 * @desc PK     : adrMail
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblmailingsave extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Mailing_save",
			"primary" => "adrMail"
		);
		parent::__construct($options);
	}	
}