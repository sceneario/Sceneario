<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblexposcont
 * @desc TABLE  : tbl_Expos_Cont
 * @file Tblexposcont.php
 * @desc PK     : __A_SPECIFIER__
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblexposcont
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
            $this->setDbTable("Core_Model_DbTable_Tblexposcont");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblexposcont $tbl_Expos_Cont)
    {
	    
        $data = array(
		"id"	=> $tbl_Expos_Cont->getId() ,
		"url"	=> $tbl_Expos_Cont->getUrl() ,
		"idexpo"	=> $tbl_Expos_Cont->getIdexpo() ,
		"titre"	=> $tbl_Expos_Cont->getTitre() ,
		"com"	=> $tbl_Expos_Cont->getCom() ,
		"dateajout"	=> $tbl_Expos_Cont->getDateajout() ,
        );
        $id = (int)$data["__A_SPECIFIER__"];

        //if (null === ($id = $tbl_Expos_Cont->get__A_SPECIFIER__()  )) {
        if($id === 0){
            unset($data["__A_SPECIFIER__"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("__A_SPECIFIER__ = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblexposcont $tbl_Expos_Cont)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Expos_Cont->setId(self::unescape($row->id));
	$tbl_Expos_Cont->setUrl(self::unescape($row->url));
	$tbl_Expos_Cont->setIdexpo(self::unescape($row->idexpo));
	$tbl_Expos_Cont->setTitre(self::unescape($row->titre));
	$tbl_Expos_Cont->setCom(self::unescape($row->com));
	$tbl_Expos_Cont->setDateajout(self::unescape($row->dateajout));
	return $tbl_Expos_Cont;
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
            $entry = new Core_Model_Tblexposcont(); 
	    $entry->setId(self::unescape($row->id));
	    $entry->setUrl(self::unescape($row->url));
	    $entry->setIdexpo(self::unescape($row->idexpo));
	    $entry->setTitre(self::unescape($row->titre));
	    $entry->setCom(self::unescape($row->com));
	    $entry->setDateajout(self::unescape($row->dateajout));
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