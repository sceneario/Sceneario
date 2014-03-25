<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblmailingsave
 * @desc TABLE  : tbl_Mailing_save
 * @file Tblmailingsave.php
 * @desc PK     : adrMail
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblmailingsave
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
            $this->setDbTable("Core_Model_DbTable_Tblmailingsave");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblmailingsave $tbl_Mailing_save)
    {
	    
        $data = array(
		"adrMail"	=> $tbl_Mailing_save->getAdrMail() ,
		"dateCreation"	=> $tbl_Mailing_save->getDateCreation() ,
		"T_Valide"	=> $tbl_Mailing_save->getT_Valide() ,
		"clef"	=> $tbl_Mailing_save->getClef() ,
		"nberreurs"	=> $tbl_Mailing_save->getNberreurs() ,
		"enerreur"	=> $tbl_Mailing_save->getEnerreur() ,
        );
        $id = (int)$data["adrMail"];

        //if (null === ($id = $tbl_Mailing_save->getAdrMail()  )) {
        if($id === 0){
            unset($data["adrMail"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("adrMail = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblmailingsave $tbl_Mailing_save)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Mailing_save->setAdrMail(self::unescape($row->adrMail));
	$tbl_Mailing_save->setDateCreation(self::unescape($row->dateCreation));
	$tbl_Mailing_save->setT_Valide(self::unescape($row->T_Valide));
	$tbl_Mailing_save->setClef(self::unescape($row->clef));
	$tbl_Mailing_save->setNberreurs(self::unescape($row->nberreurs));
	$tbl_Mailing_save->setEnerreur(self::unescape($row->enerreur));
	return $tbl_Mailing_save;
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
            $entry = new Core_Model_Tblmailingsave(); 
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