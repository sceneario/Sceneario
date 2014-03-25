<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblcoupdecoeur
 * @desc TABLE  : tbl_Coup_de_coeur
 * @file Tblcoupdecoeur.php
 * @desc PK     : idNumero
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblcoupdecoeur extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Coup_de_coeur",
			"primary" => "idNumero"
		);
		parent::__construct($options);
	}	
}