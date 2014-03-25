<?php

/*
 * SCENEARIO.COM
 * Table des liens auteurs interview
 * @desc CLASSE : Core_Model_Mapper_Tblauteursdossier
 * @desc TABLE  : tbl_Auteurs_Dossier
 * @file Tblauteursdossier.php
 * @desc PK     : idDossier
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblauteursdossier
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
            $this->setDbTable("Core_Model_DbTable_Tblauteursdossier");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblauteursdossier $tbl_Auteurs_Dossier)
    {
	    
        $data = array(
		"idDossier"	=> $tbl_Auteurs_Dossier->getIdDossier() ,
		"idAuteur"	=> $tbl_Auteurs_Dossier->getIdAuteur() ,
		"datecreation"	=> $tbl_Auteurs_Dossier->getDatecreation() ,
        );
        $id = (int)$data["idDossier"];

        //if (null === ($id = $tbl_Auteurs_Dossier->getIdDossier()  )) {
        if($id === 0){
            unset($data["idDossier"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idDossier = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblauteursdossier $tbl_Auteurs_Dossier)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Auteurs_Dossier->setIdDossier(self::unescape($row->idDossier));
	$tbl_Auteurs_Dossier->setIdAuteur(self::unescape($row->idAuteur));
	$tbl_Auteurs_Dossier->setDatecreation(self::unescape($row->datecreation));
	return $tbl_Auteurs_Dossier;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idDossier DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblauteursdossier(); 
	    $entry->setIdDossier(self::unescape($row->idDossier));
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
        $where   = $dbTable->getAdapter()->quoteInto("idDossier = ?", $id);
        return $dbTable->delete($where);
    }
}