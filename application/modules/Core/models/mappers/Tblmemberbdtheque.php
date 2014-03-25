<?php

/*
 * SCENEARIO.COM
 * Table des bibliothèques des membres
 * @desc CLASSE : Core_Model_Mapper_Tblmemberbdtheque
 * @desc TABLE  : tbl_Member_Bdtheque
 * @file Tblmemberbdtheque.php
 * @desc PK     : user_id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblmemberbdtheque
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
            $this->setDbTable("Core_Model_DbTable_Tblmemberbdtheque");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblmemberbdtheque $tbl_Member_Bdtheque)
    {
	    
        $data = array(
		"user_id"	=> $tbl_Member_Bdtheque->getUser_id() ,
		"idAlbum"	=> $tbl_Member_Bdtheque->getIdAlbum() ,
		"etat"	=> $tbl_Member_Bdtheque->getEtat() ,
        );
        $id = (int)$data["user_id"];

        //if (null === ($id = $tbl_Member_Bdtheque->getUser_id()  )) {
        if($id === 0){
            unset($data["user_id"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("user_id = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblmemberbdtheque $tbl_Member_Bdtheque)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Member_Bdtheque->setUser_id(self::unescape($row->user_id));
	$tbl_Member_Bdtheque->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Member_Bdtheque->setEtat(self::unescape($row->etat));
	return $tbl_Member_Bdtheque;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"user_id DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblmemberbdtheque(); 
	    $entry->setUser_id(self::unescape($row->user_id));
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setEtat(self::unescape($row->etat));
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