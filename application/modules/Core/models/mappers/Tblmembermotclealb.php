<?php

/*
 * SCENEARIO.COM
 * Table contenant les filtres sur les éditeurs
 * @desc CLASSE : Core_Model_Mapper_Tblmembermotclealb
 * @desc TABLE  : tbl_Member_Motcle_Alb
 * @file Tblmembermotclealb.php
 * @desc PK     : user_id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblmembermotclealb
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
            $this->setDbTable("Core_Model_DbTable_Tblmembermotclealb");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblmembermotclealb $tbl_Member_Motcle_Alb)
    {
	    
        $data = array(
		"user_id"	=> $tbl_Member_Motcle_Alb->getUser_id() ,
		"motcle"	=> $tbl_Member_Motcle_Alb->getMotcle() ,
		"typeRech"	=> $tbl_Member_Motcle_Alb->getTypeRech() ,
        );
        $id = (int)$data["user_id"];

        //if (null === ($id = $tbl_Member_Motcle_Alb->getUser_id()  )) {
        if($id === 0){
            unset($data["user_id"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("user_id = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblmembermotclealb $tbl_Member_Motcle_Alb)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Member_Motcle_Alb->setUser_id(self::unescape($row->user_id));
	$tbl_Member_Motcle_Alb->setMotcle(self::unescape($row->motcle));
	$tbl_Member_Motcle_Alb->setTypeRech(self::unescape($row->typeRech));
	return $tbl_Member_Motcle_Alb;
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
            $entry = new Core_Model_Tblmembermotclealb(); 
	    $entry->setUser_id(self::unescape($row->user_id));
	    $entry->setMotcle(self::unescape($row->motcle));
	    $entry->setTypeRech(self::unescape($row->typeRech));
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