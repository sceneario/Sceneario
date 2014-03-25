<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblfestival
 * @desc TABLE  : tbl_Festival
 * @file Tblfestival.php
 * @desc PK     : idFestival
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblfestival
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
            $this->setDbTable("Core_Model_DbTable_Tblfestival");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblfestival $tbl_Festival)
    {
	    
        $data = array(
		"idFestival"	=> $tbl_Festival->getIdFestival() ,
		"nomFestival"	=> $tbl_Festival->getNomFestival() ,
		"villeFestival"	=> $tbl_Festival->getVilleFestival() ,
		"lienOpale"	=> $tbl_Festival->getLienOpale() ,
        );
        $id = (int)$data["idFestival"];

        //if (null === ($id = $tbl_Festival->getIdFestival()  )) {
        if($id === 0){
            unset($data["idFestival"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idFestival = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblfestival $tbl_Festival)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Festival->setIdFestival(self::unescape($row->idFestival));
	$tbl_Festival->setNomFestival(self::unescape($row->nomFestival));
	$tbl_Festival->setVilleFestival(self::unescape($row->villeFestival));
	$tbl_Festival->setLienOpale(self::unescape($row->lienOpale));
	return $tbl_Festival;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idFestival DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblfestival(); 
	    $entry->setIdFestival(self::unescape($row->idFestival));
	    $entry->setNomFestival(self::unescape($row->nomFestival));
	    $entry->setVilleFestival(self::unescape($row->villeFestival));
	    $entry->setLienOpale(self::unescape($row->lienOpale));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idFestival = ?", $id);
        return $dbTable->delete($where);
    }
}