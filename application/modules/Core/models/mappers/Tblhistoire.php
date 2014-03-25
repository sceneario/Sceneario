<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblhistoire
 * @desc TABLE  : tbl_Histoire
 * @file Tblhistoire.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblhistoire
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
            $this->setDbTable("Core_Model_DbTable_Tblhistoire");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblhistoire $tbl_Histoire)
    {
	    
        $data = array(
		"idAlbum"	=> $tbl_Histoire->getIdAlbum() ,
		"histoire"	=> $tbl_Histoire->getHistoire() ,
		"idInternaute"	=> $tbl_Histoire->getIdInternaute() ,
		"FKidAlbum"	=> $tbl_Histoire->getFKidAlbum() ,
		"histoire2"	=> $tbl_Histoire->getHistoire2() ,
		"dateHistoire"	=> $tbl_Histoire->getDateHistoire() ,
        );
        $id = (int)$data["idAlbum"];

        //if (null === ($id = $tbl_Histoire->getIdAlbum()  )) {
        if($id === 0){
            unset($data["idAlbum"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idAlbum = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblhistoire $tbl_Histoire)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Histoire->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Histoire->setHistoire(self::unescape($row->histoire));
	$tbl_Histoire->setIdInternaute(self::unescape($row->idInternaute));
	$tbl_Histoire->setFKidAlbum(self::unescape($row->FKidAlbum));
	$tbl_Histoire->setHistoire2(self::unescape($row->histoire2));
	$tbl_Histoire->setDateHistoire(self::unescape($row->dateHistoire));
	return $tbl_Histoire;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idAlbum DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblhistoire(); 
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setHistoire(self::unescape($row->histoire));
	    $entry->setIdInternaute(self::unescape($row->idInternaute));
	    $entry->setFKidAlbum(self::unescape($row->FKidAlbum));
	    $entry->setHistoire2(self::unescape($row->histoire2));
	    $entry->setDateHistoire(self::unescape($row->dateHistoire));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idAlbum = ?", $id);
        return $dbTable->delete($where);
    }
}