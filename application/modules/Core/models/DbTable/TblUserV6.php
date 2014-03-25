<?php

/**
 * @package TblUserV6
 * @category DbTable
 */

/**
 * 
 */

class Core_Model_DbTable_TblUserV6  extends Zend_Db_Table_Abstract
{
    public function __construct()
    {
        $options = array(
                "db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
                "name" => "tbl_users_V6",
                "primary" => "user_id"
        );
        parent::__construct($options);
    }	
}