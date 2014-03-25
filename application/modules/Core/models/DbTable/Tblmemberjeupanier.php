<?php

/*
 * SCENEARIO.COM
 * Table du panier des gains
 * @desc CLASSE : Core_Model_DbTable_Tblmemberjeupanier
 * @desc TABLE  : tbl_Member_Jeu_Panier
 * @file Tblmemberjeupanier.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblmemberjeupanier extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Member_Jeu_Panier",
			"primary" => "idAlbum"
		);
		parent::__construct($options);
	}	
}