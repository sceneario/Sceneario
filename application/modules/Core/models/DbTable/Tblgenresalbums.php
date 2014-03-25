<?php

/*
 * SCENEARIO.COM
 * Table des liens genre album
 * @desc CLASSE : Core_Model_DbTable_Tblgenresalbums
 * @desc TABLE  : tbl_Genres_Albums
 * @file Tblgenresalbums.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblgenresalbums extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Genres_Albums",
			"primary" => "idAlbum"
		);
		parent::__construct($options);
	}	
}