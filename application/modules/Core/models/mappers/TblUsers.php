<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblusers
 * @desc TABLE  : tbl_Users
 * @file Tblusers.php
 * @desc PK     : __A_SPECIFIER__
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_TblUsers
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception("Invalid table data gateway provided");
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable("Core_Model_DbTable_TblUsers");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblusers $tbl_Users)
    {
	    
        $data = array(
		"TE"	=> $tbl_Users->getTE() ,
		"user_active"	=> $tbl_Users->getUser_active() ,
		"username"	=> $tbl_Users->getUsername() ,
		"user_password"	=> $tbl_Users->getUser_password() ,
        );
        $id = (int)$data["__A_SPECIFIER__"];

        //if (null === ($id = $tbl_Users->get__A_SPECIFIER__()  )) {
        if($id === 0){
            unset($data["__A_SPECIFIER__"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("__A_SPECIFIER__ = ?" => $id));
        }
    } */

    public function find($id, Core_Model_TblUsers $tbl_Users)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Users->setUserId(self::unescape($row->user_id));
	$tbl_Users->setUser_active(self::unescape($row->user_active));
	$tbl_Users->setUsername(self::unescape($row->username));
	$tbl_Users->setUser_password(self::unescape($row->user_password));
	return $tbl_Users;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"__A_SPECIFIER__ DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_TblUsers(); 
	    $entry->setUserId(self::unescape($row->user_id));
	    $entry->setUser_active(self::unescape($row->user_active));
	    $entry->setUsername(self::unescape($row->username));
	    $entry->setUser_password(self::unescape($row->user_password));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("user_id = ?", $id);
        return $dbTable->delete($where);
    }
}