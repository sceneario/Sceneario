<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblconcoursgagnants
 * @desc TABLE  : tbl_Concours_Gagnants
 * @file Tblconcoursgagnants.php
 * @desc PK     : nomConcours
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblconcoursgagnants
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
            $this->setDbTable("Core_Model_DbTable_Tblconcoursgagnants");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblconcoursgagnants $tbl_Concours_Gagnants)
    {
	    
        $data = array(
		"nomConcours"	=> $tbl_Concours_Gagnants->getNomConcours() ,
		"idGagnant"	=> $tbl_Concours_Gagnants->getIdGagnant() ,
		"classement"	=> $tbl_Concours_Gagnants->getClassement() ,
        );
        $id = (int)$data["nomConcours"];

        //if (null === ($id = $tbl_Concours_Gagnants->getNomConcours()  )) {
        if($id === 0){
            unset($data["nomConcours"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("nomConcours = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblconcoursgagnants $tbl_Concours_Gagnants)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Concours_Gagnants->setNomConcours(self::unescape($row->nomConcours));
	$tbl_Concours_Gagnants->setIdGagnant(self::unescape($row->idGagnant));
	$tbl_Concours_Gagnants->setClassement(self::unescape($row->classement));
	return $tbl_Concours_Gagnants;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"nomConcours DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblconcoursgagnants(); 
	    $entry->setNomConcours(self::unescape($row->nomConcours));
	    $entry->setIdGagnant(self::unescape($row->idGagnant));
	    $entry->setClassement(self::unescape($row->classement));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("nomConcours = ?", $id);
        return $dbTable->delete($where);
    }
}