<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblmembernextmail
 * @desc TABLE  : tbl_Member_Next_Mail
 * @file Tblmembernextmail.php
 * @desc PK     : idLigne
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblmembernextmail
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
            $this->setDbTable("Core_Model_DbTable_Tblmembernextmail");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblmembernextmail $tbl_Member_Next_Mail)
    {
	    
        $data = array(
		"idLigne"	=> $tbl_Member_Next_Mail->getIdLigne() ,
		"user_id"	=> $tbl_Member_Next_Mail->getUser_id() ,
		"type_info"	=> $tbl_Member_Next_Mail->getType_info() ,
		"valeur_info"	=> $tbl_Member_Next_Mail->getValeur_info() ,
		"date_info"	=> $tbl_Member_Next_Mail->getDate_info() ,
        );
        $id = (int)$data["idLigne"];

        //if (null === ($id = $tbl_Member_Next_Mail->getIdLigne()  )) {
        if($id === 0){
            unset($data["idLigne"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idLigne = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblmembernextmail $tbl_Member_Next_Mail)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Member_Next_Mail->setIdLigne(self::unescape($row->idLigne));
	$tbl_Member_Next_Mail->setUser_id(self::unescape($row->user_id));
	$tbl_Member_Next_Mail->setType_info(self::unescape($row->type_info));
	$tbl_Member_Next_Mail->setValeur_info(self::unescape($row->valeur_info));
	$tbl_Member_Next_Mail->setDate_info(self::unescape($row->date_info));
	return $tbl_Member_Next_Mail;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idLigne DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblmembernextmail(); 
	    $entry->setIdLigne(self::unescape($row->idLigne));
	    $entry->setUser_id(self::unescape($row->user_id));
	    $entry->setType_info(self::unescape($row->type_info));
	    $entry->setValeur_info(self::unescape($row->valeur_info));
	    $entry->setDate_info(self::unescape($row->date_info));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idLigne = ?", $id);
        return $dbTable->delete($where);
    }
}