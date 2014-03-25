<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblalbumsmap
 * @desc TABLE  : tbl_Albums_Map
 * @file Tblalbumsmap.php
 * @desc PK     : idLieu
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblalbumsmap
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
            $this->setDbTable("Core_Model_DbTable_Tblalbumsmap");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblalbumsmap $tbl_Albums_Map)
    {
	    
        $data = array(
		"idLieu"	=> $tbl_Albums_Map->getIdLieu() ,
		"idAlbum"	=> $tbl_Albums_Map->getIdAlbum() ,
		"adresse"	=> $tbl_Albums_Map->getAdresse() ,
		"pays"	=> $tbl_Albums_Map->getPays() ,
		"latitude"	=> $tbl_Albums_Map->getLatitude() ,
		"longitude"	=> $tbl_Albums_Map->getLongitude() ,
		"epoque"	=> $tbl_Albums_Map->getEpoque() ,
        );
        $id = (int)$data["idLieu"];

        //if (null === ($id = $tbl_Albums_Map->getIdLieu()  )) {
        if($id === 0){
            unset($data["idLieu"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idLieu = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblalbumsmap $tbl_Albums_Map)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Albums_Map->setIdLieu(self::unescape($row->idLieu));
	$tbl_Albums_Map->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Albums_Map->setAdresse(self::unescape($row->adresse));
	$tbl_Albums_Map->setPays(self::unescape($row->pays));
	$tbl_Albums_Map->setLatitude(self::unescape($row->latitude));
	$tbl_Albums_Map->setLongitude(self::unescape($row->longitude));
	$tbl_Albums_Map->setEpoque(self::unescape($row->epoque));
	return $tbl_Albums_Map;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idLieu DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblalbumsmap(); 
	    $entry->setIdLieu(self::unescape($row->idLieu));
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setAdresse(self::unescape($row->adresse));
	    $entry->setPays(self::unescape($row->pays));
	    $entry->setLatitude(self::unescape($row->latitude));
	    $entry->setLongitude(self::unescape($row->longitude));
	    $entry->setEpoque(self::unescape($row->epoque));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idLieu = ?", $id);
        return $dbTable->delete($where);
    }
}