<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblmailing
 * @desc TABLE  : tbl_Mailing
 * @file Tblmailing.php
 * @desc PK     : adrMail
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblmailing
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
            $this->setDbTable("Core_Model_DbTable_Tblmailing");
        }
        return $this->_dbTable;
    }
   
    public function save(Core_Model_Tblmailing $tbl_Mailing)
    {
	    
        $data = array(
		"adrMail"	    => $tbl_Mailing->getAdrMail() ,
		"dateCreation"	=> $tbl_Mailing->getDateCreation() ,
		"T_Valide"	    => $tbl_Mailing->getT_Valide() ,
		"clef"	        => $tbl_Mailing->getClef() ,
		"nberreurs"	    => $tbl_Mailing->getNberreurs() ,
		"enerreur"	    => $tbl_Mailing->getEnerreur() ,
        );
      
        //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
        return $this->getDbTable()->insert($data);
       
    } 

    public function find($id, Core_Model_Tblmailing $tbl_Mailing)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Mailing->setAdrMail(self::unescape($row->adrMail));
	$tbl_Mailing->setDateCreation(self::unescape($row->dateCreation));
	$tbl_Mailing->setT_Valide(self::unescape($row->T_Valide));
	$tbl_Mailing->setClef(self::unescape($row->clef));
	$tbl_Mailing->setNberreurs(self::unescape($row->nberreurs));
	$tbl_Mailing->setEnerreur(self::unescape($row->enerreur));
	return $tbl_Mailing;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"adrMail DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblmailing(); 
	    $entry->setAdrMail(self::unescape($row->adrMail));
	    $entry->setDateCreation(self::unescape($row->dateCreation));
	    $entry->setT_Valide(self::unescape($row->T_Valide));
	    $entry->setClef(self::unescape($row->clef));
	    $entry->setNberreurs(self::unescape($row->nberreurs));
	    $entry->setEnerreur(self::unescape($row->enerreur));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("adrMail = ?", $id);
        return $dbTable->delete($where);
    }
}