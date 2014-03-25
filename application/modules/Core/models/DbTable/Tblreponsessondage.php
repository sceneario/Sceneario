<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblreponsessondage
 * @desc TABLE  : tbl_Reponses_Sondage
 * @file Tblreponsessondage.php
 * @desc PK     : idReponse
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblreponsessondage extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Reponses_Sondage",
			"primary" => "idReponse"
		);
		parent::__construct($options);
	}	
}