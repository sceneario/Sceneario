<?php

/*
 * SCENEARIO.COM
 * Table des réponses au jeu de la couverture
 * @desc CLASSE : Core_Model_DbTable_Tblreponsesjeucouv
 * @desc TABLE  : tbl_Reponses_Jeu_Couv
 * @file Tblreponsesjeucouv.php
 * @desc PK     : email
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblreponsesjeucouv extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Reponses_Jeu_Couv",
			"primary" => "email"
		);
		parent::__construct($options);
	}	
}