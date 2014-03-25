<?php

/*
 * SCENEARIO.COM
 * Table des prix gagnés par les albums
 * @desc CLASSE : Core_Model_DbTable_Tblalbumsprix
 * @desc TABLE  : tbl_Albums_Prix
 * @file Tblalbumsprix.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblalbumsprix extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Albums_Prix",
			"primary" => "idAlbum"
		);
		parent::__construct($options);
	}	
}