<?php

/*
 * SCENEARIO.COM
 * Table des prix gagnés par les albums
 * @desc CLASSE : Core_Model_Mapper_Tblalbumsprix
 * @desc TABLE  : tbl_Albums_Prix
 * @file Tblalbumsprix.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblalbumsprix
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
            $this->setDbTable("Core_Model_DbTable_Tblalbumsprix");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblalbumsprix $tbl_Albums_Prix)
    {
	    
        $data = array(
		"idAlbum"	=> $tbl_Albums_Prix->getIdAlbum() ,
		"idPrix"	=> $tbl_Albums_Prix->getIdPrix() ,
		"annee"	=> $tbl_Albums_Prix->getAnnee() ,
		"date"	=> $tbl_Albums_Prix->getDate() ,
        );
        $id = (int)$data["idAlbum"];

        //if (null === ($id = $tbl_Albums_Prix->getIdAlbum()  )) {
        if($id === 0){
            unset($data["idAlbum"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idAlbum = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblalbumsprix $tbl_Albums_Prix)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Albums_Prix->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Albums_Prix->setIdPrix(self::unescape($row->idPrix));
	$tbl_Albums_Prix->setAnnee(self::unescape($row->annee));
	$tbl_Albums_Prix->setDate(self::unescape($row->date));
	return $tbl_Albums_Prix;
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
            $entry = new Core_Model_Tblalbumsprix(); 
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setIdPrix(self::unescape($row->idPrix));
	    $entry->setAnnee(self::unescape($row->annee));
	    $entry->setDate(self::unescape($row->date));
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