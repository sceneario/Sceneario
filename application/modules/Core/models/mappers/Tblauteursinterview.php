<?php

/*
 * SCENEARIO.COM
 * Table des liens auteurs interview
 * @desc CLASSE : Core_Model_Mapper_Tblauteursinterview
 * @desc TABLE  : tbl_Auteurs_Interview
 * @file Tblauteursinterview.php
 * @desc PK     : idInterview
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblauteursinterview
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
            $this->setDbTable("Core_Model_DbTable_Tblauteursinterview");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblauteursinterview $tbl_Auteurs_Interview)
    {
	    
        $data = array(
		"idInterview"	=> $tbl_Auteurs_Interview->getIdInterview() ,
		"idAuteur"	=> $tbl_Auteurs_Interview->getIdAuteur() ,
		"datecreation"	=> $tbl_Auteurs_Interview->getDatecreation() ,
        );
        $id = (int)$data["idInterview"];

        //if (null === ($id = $tbl_Auteurs_Interview->getIdInterview()  )) {
        if($id === 0){
            unset($data["idInterview"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idInterview = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblauteursinterview $tbl_Auteurs_Interview)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Auteurs_Interview->setIdInterview(self::unescape($row->idInterview));
	$tbl_Auteurs_Interview->setIdAuteur(self::unescape($row->idAuteur));
	$tbl_Auteurs_Interview->setDatecreation(self::unescape($row->datecreation));
	return $tbl_Auteurs_Interview;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idInterview DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblauteursinterview(); 
	    $entry->setIdInterview(self::unescape($row->idInterview));
	    $entry->setIdAuteur(self::unescape($row->idAuteur));
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
        $where   = $dbTable->getAdapter()->quoteInto("idInterview = ?", $id);
        return $dbTable->delete($where);
    }
}