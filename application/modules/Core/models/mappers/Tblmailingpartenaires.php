<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblmailingpartenaires
 * @desc TABLE  : tbl_Mailing_Partenaires
 * @file Tblmailingpartenaires.php
 * @desc PK     : adrMail
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblmailingpartenaires
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
            $this->setDbTable("Core_Model_DbTable_Tblmailingpartenaires");
        }
        return $this->_dbTable;
    }

    public function save(Core_Model_Tblmailingpartenaires $tbl_Mailing_Partenair)
    {
        $data = array(
		"adrMail"	=> $tbl_Mailing_Partenair->getAdrMail() ,
		"dateCreation"	=> $tbl_Mailing_Partenair->getDateCreation() ,
		"T_Valide"	=> $tbl_Mailing_Partenair->getT_Valide() ,
		"clef"	=> $tbl_Mailing_Partenair->getClef() ,
		"nberreurs"	=> $tbl_Mailing_Partenair->getNberreurs() ,
		"enerreur"	=> $tbl_Mailing_Partenair->getEnerreur() ,
        );
        return $this->getDbTable()->insert($data);

        $id = (int)$data["adrMail"];

        //if (null === ($id = $tbl_Mailing_Partenair->getAdrMail()  )) {
        if($id === 0){
            unset($data["adrMail"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("adrMail = ?" => $id));
        }
    }

    public function find($id, Core_Model_Tblmailingpartenaires $tbl_Mailing_Partenair)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Mailing_Partenair->setAdrMail(self::unescape($row->adrMail));
	$tbl_Mailing_Partenair->setDateCreation(self::unescape($row->dateCreation));
	$tbl_Mailing_Partenair->setT_Valide(self::unescape($row->T_Valide));
	$tbl_Mailing_Partenair->setClef(self::unescape($row->clef));
	$tbl_Mailing_Partenair->setNberreurs(self::unescape($row->nberreurs));
	$tbl_Mailing_Partenair->setEnerreur(self::unescape($row->enerreur));
	return $tbl_Mailing_Partenair;
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
            $entry = new Core_Model_Tblmailingpartenaires(); 
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