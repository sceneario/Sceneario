<?php

/*
 * SCENEARIO.COM
 * Table des réponses du sondage
 * @desc CLASSE : Core_Model_Mapper_Tblsondagereponses
 * @desc TABLE  : tbl_Sondage_Reponses
 * @file Tblsondagereponses.php
 * @desc PK     : idSondage
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblsondagereponses
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
            $this->setDbTable("Core_Model_DbTable_Tblsondagereponses");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblsondagereponses $tbl_Sondage_Reponses)
    {
	    
        $data = array(
		"idSondage"	=> $tbl_Sondage_Reponses->getIdSondage() ,
		"idReponse"	=> $tbl_Sondage_Reponses->getIdReponse() ,
		"reponses"	=> $tbl_Sondage_Reponses->getReponses() ,
        );
        $id = (int)$data["idSondage"];

        //if (null === ($id = $tbl_Sondage_Reponses->getIdSondage()  )) {
        if($id === 0){
            unset($data["idSondage"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idSondage = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblsondagereponses $tbl_Sondage_Reponses)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Sondage_Reponses->setIdSondage(self::unescape($row->idSondage));
	$tbl_Sondage_Reponses->setIdReponse(self::unescape($row->idReponse));
	$tbl_Sondage_Reponses->setReponses(self::unescape($row->reponses));
	return $tbl_Sondage_Reponses;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idSondage DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblsondagereponses(); 
	    $entry->setIdSondage(self::unescape($row->idSondage));
	    $entry->setIdReponse(self::unescape($row->idReponse));
	    $entry->setReponses(self::unescape($row->reponses));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idSondage = ?", $id);
        return $dbTable->delete($where);
    }
}