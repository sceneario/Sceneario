<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblstatistiques
 * @desc TABLE  : tbl_statistiques
 * @file Tblstatistiques.php
 * @desc PK     : __A_SPECIFIER__
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblstatistiques
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
            $this->setDbTable("Core_Model_DbTable_Tblstatistiques");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblstatistiques $tbl_statistiques)
    {
	    
        $data = array(
		"date"	=> $tbl_statistiques->getDate() ,
		"pageIn"	=> $tbl_statistiques->getPageIn() ,
		"pageOut"	=> $tbl_statistiques->getPageOut() ,
		"session"	=> $tbl_statistiques->getSession() ,
		"client"	=> $tbl_statistiques->getClient() ,
        );
        $id = (int)$data["__A_SPECIFIER__"];

        //if (null === ($id = $tbl_statistiques->get__A_SPECIFIER__()  )) {
        if($id === 0){
            unset($data["__A_SPECIFIER__"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("__A_SPECIFIER__ = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblstatistiques $tbl_statistiques)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_statistiques->setDate(self::unescape($row->date));
	$tbl_statistiques->setPageIn(self::unescape($row->pageIn));
	$tbl_statistiques->setPageOut(self::unescape($row->pageOut));
	$tbl_statistiques->setSession(self::unescape($row->session));
	$tbl_statistiques->setClient(self::unescape($row->client));
	return $tbl_statistiques;
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
            $entry = new Core_Model_Tblstatistiques(); 
	    $entry->setDate(self::unescape($row->date));
	    $entry->setPageIn(self::unescape($row->pageIn));
	    $entry->setPageOut(self::unescape($row->pageOut));
	    $entry->setSession(self::unescape($row->session));
	    $entry->setClient(self::unescape($row->client));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("__A_SPECIFIER__ = ?", $id);
        return $dbTable->delete($where);
    }
}