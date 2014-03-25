<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblmemberjeurepons
 * @desc TABLE  : tbl_Member_Jeu_Repons
 * @file Tblmemberjeurepons.php
 * @desc PK     : user_id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblmemberjeurepons
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
            $this->setDbTable("Core_Model_DbTable_Tblmemberjeurepons");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblmemberjeurepons $tbl_Member_Jeu_Repons)
    {
	    
        $data = array(
		"user_id"	=> $tbl_Member_Jeu_Repons->getUser_id() ,
		"date"	=> $tbl_Member_Jeu_Repons->getDate() ,
		"idjeu"	=> $tbl_Member_Jeu_Repons->getIdjeu() ,
		"idAlbum"	=> $tbl_Member_Jeu_Repons->getIdAlbum() ,
		"date_reponse"	=> $tbl_Member_Jeu_Repons->getDate_reponse() ,
		"points"	=> $tbl_Member_Jeu_Repons->getPoints() ,
        );
        $id = (int)$data["user_id"];

        //if (null === ($id = $tbl_Member_Jeu_Repons->getUser_id()  )) {
        if($id === 0){
            unset($data["user_id"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("user_id = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblmemberjeurepons $tbl_Member_Jeu_Repons)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Member_Jeu_Repons->setUser_id(self::unescape($row->user_id));
	$tbl_Member_Jeu_Repons->setDate(self::unescape($row->date));
	$tbl_Member_Jeu_Repons->setIdjeu(self::unescape($row->idjeu));
	$tbl_Member_Jeu_Repons->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Member_Jeu_Repons->setDate_reponse(self::unescape($row->date_reponse));
	$tbl_Member_Jeu_Repons->setPoints(self::unescape($row->points));
	return $tbl_Member_Jeu_Repons;
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
            $entry = new Core_Model_Tblmemberjeurepons(); 
	    $entry->setUser_id(self::unescape($row->user_id));
	    $entry->setDate(self::unescape($row->date));
	    $entry->setIdjeu(self::unescape($row->idjeu));
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setDate_reponse(self::unescape($row->date_reponse));
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
        $where   = $dbTable->getAdapter()->quoteInto("user_id = ?", $id);
        return $dbTable->delete($where);
    }
}