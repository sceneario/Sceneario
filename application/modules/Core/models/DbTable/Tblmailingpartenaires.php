<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblmailingpartenaires
 * @desc TABLE  : tbl_Mailing_Partenaires
 * @file Tblmailingpartenaires.php
 * @desc PK     : adrMail
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblmailingpartenaires extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Mailing_Partenaires",
			"primary" => "adrMail"
		);
		parent::__construct($options);
	}	
}