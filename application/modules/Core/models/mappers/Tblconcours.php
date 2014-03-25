<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblconcours
 * @desc TABLE  : tbl_Concours
 * @file Tblconcours.php
 * @desc PK     : __A_SPECIFIER__
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblconcours
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
            $this->setDbTable("Core_Model_DbTable_Tblconcours");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblconcours $tbl_Concours)
    {
	    
        $data = array(
		"date"	=> $tbl_Concours->getDate() ,
		"question"	=> $tbl_Concours->getQuestion() ,
		"nomConcours"	=> $tbl_Concours->getNomConcours() ,
        );
        $id = (int)$data["__A_SPECIFIER__"];

        //if (null === ($id = $tbl_Concours->get__A_SPECIFIER__()  )) {
        if($id === 0){
            unset($data["__A_SPECIFIER__"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("__A_SPECIFIER__ = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblconcours $tbl_Concours)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Concours->setDate(self::unescape($row->date));
	$tbl_Concours->setQuestion(self::unescape($row->question));
	$tbl_Concours->setNomConcours(self::unescape($row->nomConcours));
	return $tbl_Concours;
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
            $entry = new Core_Model_Tblconcours(); 
	    $entry->setDate(self::unescape($row->date));
	    $entry->setQuestion(self::unescape($row->question));
	    $entry->setNomConcours(self::unescape($row->nomConcours));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("nomConcours = ?", $id);
        return $dbTable->delete($where);
    }
}