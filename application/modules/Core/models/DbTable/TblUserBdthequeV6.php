<?php

/**
 * @package TblUserV6
 * @category DbTable
 */

/**
 * 
 */

class Core_Model_DbTable_TblUserBdthequeV6  extends Zend_Db_Table_Abstract
{
    public function __construct()
    {
        $options = array(
                "db" => Zend_Controller_Front::getInstance()->getParam("bootstrap")->getResource("multiDb")->getDb("dbcore"),
                "name" => "tbl_users_bdtheque_v6",
                "primary" => "id"
        );
        parent::__construct($options);
    }	
}