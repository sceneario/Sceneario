<?php

/*
 * SCENEARIO.COM
 * Table des brouillons de critiques
 * @desc CLASSE : Core_Model_Mapper_Tblcritiquebrouillo
 * @desc TABLE  : tbl_Critique_Brouillo
 * @file Tblcritiquebrouillo.php
 * @desc PK     : idInternaute
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblcritiquebrouillo
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
            $this->setDbTable("Core_Model_DbTable_Tblcritiquebrouillo");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblcritiquebrouillo $tbl_Critique_Brouillo)
    {
	    
        $data = array(
		"idInternaute"	=> $tbl_Critique_Brouillo->getIdInternaute() ,
		"critique"	=> $tbl_Critique_Brouillo->getCritique() ,
        );
        $id = (int)$data["idInternaute"];

        //if (null === ($id = $tbl_Critique_Brouillo->getIdInternaute()  )) {
        if($id === 0){
            unset($data["idInternaute"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idInternaute = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblcritiquebrouillo $tbl_Critique_Brouillo)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Critique_Brouillo->setIdInternaute(self::unescape($row->idInternaute));
	$tbl_Critique_Brouillo->setCritique(self::unescape($row->critique));
	return $tbl_Critique_Brouillo;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idInternaute DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblcritiquebrouillo(); 
	    $entry->setIdInternaute(self::unescape($row->idInternaute));
	    $entry->setCritique(self::unescape($row->critique));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idInternaute = ?", $id);
        return $dbTable->delete($where);
    }
}