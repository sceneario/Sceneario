<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblmemberjeuparam
 * @desc TABLE  : tbl_Member_Jeu_Param
 * @file Tblmemberjeuparam.php
 * @desc PK     : date
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblmemberjeuparam
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
            $this->setDbTable("Core_Model_DbTable_Tblmemberjeuparam");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblmemberjeuparam $tbl_Member_Jeu_Param)
    {
	    
        $data = array(
		"date"	=> $tbl_Member_Jeu_Param->getDate() ,
		"idjeu"	=> $tbl_Member_Jeu_Param->getIdjeu() ,
		"idAlbum"	=> $tbl_Member_Jeu_Param->getIdAlbum() ,
		"points"	=> $tbl_Member_Jeu_Param->getPoints() ,
        );
        $id = (int)$data["date"];

        //if (null === ($id = $tbl_Member_Jeu_Param->getDate()  )) {
        if($id === 0){
            unset($data["date"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("date = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblmemberjeuparam $tbl_Member_Jeu_Param)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Member_Jeu_Param->setDate(self::unescape($row->date));
	$tbl_Member_Jeu_Param->setIdjeu(self::unescape($row->idjeu));
	$tbl_Member_Jeu_Param->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Member_Jeu_Param->setPoints(self::unescape($row->points));
	return $tbl_Member_Jeu_Param;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"date DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblmemberjeuparam(); 
	    $entry->setDate(self::unescape($row->date));
	    $entry->setIdjeu(self::unescape($row->idjeu));
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setPoints(self::unescape($row->points));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("date = ?", $id);
        return $dbTable->delete($where);
    }
}