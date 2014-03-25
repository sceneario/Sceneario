<?php

/*
 * SCENEARIO.COM
 * Table contenant les filtres sur les �diteurs
 * @desc CLASSE : Core_Model_DbTable_Tblmemberauteuralb
 * @desc TABLE  : tbl_Member_Auteur_Alb
 * @file Tblmemberauteuralb.php
 * @desc PK     : user_id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblmemberauteuralb extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Member_Auteur_Alb",
			"primary" => "user_id"
		);
		parent::__construct($options);
	}	
}