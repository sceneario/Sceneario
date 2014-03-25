<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_DbTable_Tblalbum
 * @desc TABLE  : tbl_Album
 * @file Tblalbum.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */
 
class Core_Model_DbTable_Tblalbum extends Zend_Db_Table_Abstract
{
	public function __construct()
	{
		$options = array(
			"db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
			"name" => "tbl_Album",
			"primary" => "idAlbum"
		);
		parent::__construct($options);
            
	}	
}