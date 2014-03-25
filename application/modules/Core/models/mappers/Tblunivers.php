<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblunivers
 * @desc TABLE  : tbl_Univers
 * @file Tblunivers.php
 * @desc PK     : idUnivers
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblunivers
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
            $this->setDbTable("Core_Model_DbTable_Tblunivers");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblunivers $tbl_Univers)
    {
	    
        $data = array(
		"idUnivers"	=> $tbl_Univers->getIdUnivers() ,
		"nomUnivers"	=> $tbl_Univers->getNomUnivers() ,
		"commentaire"	=> $tbl_Univers->getCommentaire() ,
		"informations"	=> $tbl_Univers->getInformations() ,
        );
        $id = (int)$data["idUnivers"];

        //if (null === ($id = $tbl_Univers->getIdUnivers()  )) {
        if($id === 0){
            unset($data["idUnivers"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idUnivers = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblunivers $tbl_Univers)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Univers->setIdUnivers(self::unescape($row->idUnivers));
	$tbl_Univers->setNomUnivers(self::unescape($row->nomUnivers));
	$tbl_Univers->setCommentaire(self::unescape($row->commentaire));
	$tbl_Univers->setInformations(self::unescape($row->informations));
	return $tbl_Univers;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idUnivers DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblunivers(); 
	    $entry->setIdUnivers(self::unescape($row->idUnivers));
	    $entry->setNomUnivers(self::unescape($row->nomUnivers));
	    $entry->setCommentaire(self::unescape($row->commentaire));
	    $entry->setInformations(self::unescape($row->informations));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idUnivers = ?", $id);
        return $dbTable->delete($where);
    }
}