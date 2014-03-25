<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblcritiquesave
 * @desc TABLE  : tbl_Critique_save
 * @file Tblcritiquesave.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblcritiquesave
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
            $this->setDbTable("Core_Model_DbTable_Tblcritiquesave");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblcritiquesave $tbl_Critique_save)
    {
	    
        $data = array(
		"idAlbum"	=> $tbl_Critique_save->getIdAlbum() ,
		"critique"	=> $tbl_Critique_save->getCritique() ,
		"active"	=> $tbl_Critique_save->getActive() ,
		"idInternaute"	=> $tbl_Critique_save->getIdInternaute() ,
		"FKidAlbum"	=> $tbl_Critique_save->getFKidAlbum() ,
		"datecreation"	=> $tbl_Critique_save->getDatecreation() ,
        );
        $id = (int)$data["idAlbum"];

        //if (null === ($id = $tbl_Critique_save->getIdAlbum()  )) {
        if($id === 0){
            unset($data["idAlbum"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idAlbum = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblcritiquesave $tbl_Critique_save)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Critique_save->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Critique_save->setCritique(self::unescape($row->critique));
	$tbl_Critique_save->setActive(self::unescape($row->active));
	$tbl_Critique_save->setIdInternaute(self::unescape($row->idInternaute));
	$tbl_Critique_save->setFKidAlbum(self::unescape($row->FKidAlbum));
	$tbl_Critique_save->setDatecreation(self::unescape($row->datecreation));
	return $tbl_Critique_save;
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
            $entry = new Core_Model_Tblcritiquesave(); 
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setCritique(self::unescape($row->critique));
	    $entry->setActive(self::unescape($row->active));
	    $entry->setIdInternaute(self::unescape($row->idInternaute));
	    $entry->setFKidAlbum(self::unescape($row->FKidAlbum));
	    $entry->setDatecreation(self::unescape($row->datecreation));
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