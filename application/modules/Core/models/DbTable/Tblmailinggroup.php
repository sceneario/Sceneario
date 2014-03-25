<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblmailinggroup
 * @desc TABLE  : tbl_Mailing_Group
 * @file Tblmailinggroup.php
 * @desc PK     : idListe
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblmailinggroup extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Mailing_Group",
			"primary" => "idListe"
		);
		parent::__construct($options);
	}	
}