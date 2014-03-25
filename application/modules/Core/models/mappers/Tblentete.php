<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblentete
 * @desc TABLE  : tbl_Entete
 * @file Tblentete.php
 * @desc PK     : nomEntete
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblentete
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
            $this->setDbTable("Core_Model_DbTable_Tblentete");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblentete $tbl_Entete)
    {
	    
        $data = array(
		"nomEntete"	=> $tbl_Entete->getNomEntete() ,
		"texteEnt"	=> $tbl_Entete->getTexteEnt() ,
        );
        $id = (int)$data["nomEntete"];

        //if (null === ($id = $tbl_Entete->getNomEntete()  )) {
        if($id === 0){
            unset($data["nomEntete"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("nomEntete = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblentete $tbl_Entete)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Entete->setNomEntete(self::unescape($row->nomEntete));
	$tbl_Entete->setTexteEnt(self::unescape($row->texteEnt));
	return $tbl_Entete;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"nomEntete DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblentete(); 
	    $entry->setNomEntete(self::unescape($row->nomEntete));
	    $entry->setTexteEnt(self::unescape($row->texteEnt));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("nomEntete = ?", $id);
        return $dbTable->delete($where);
    }
}