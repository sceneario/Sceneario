<?php

/*
 * SCENEARIO.COM
 * Table des pages du dossier
 * @desc CLASSE : Core_Model_Mapper_Tbldossierspages
 * @desc TABLE  : tbl_Dossiers_Pages
 * @file Tbldossierspages.php
 * @desc PK     : idDossier
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tbldossierspages
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
            $this->setDbTable("Core_Model_DbTable_Tbldossierspages");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tbldossierspages $tbl_Dossiers_Pages)
    {
	    
        $data = array(
		"idDossier"	=> $tbl_Dossiers_Pages->getIdDossier() ,
		"idPage"	=> $tbl_Dossiers_Pages->getIdPage() ,
		"commentaire"	=> $tbl_Dossiers_Pages->getCommentaire() ,
        );
        $id = (int)$data["idDossier"];

        //if (null === ($id = $tbl_Dossiers_Pages->getIdDossier()  )) {
        if($id === 0){
            unset($data["idDossier"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idDossier = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tbldossierspages $tbl_Dossiers_Pages)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Dossiers_Pages->setIdDossier(self::unescape($row->idDossier));
	$tbl_Dossiers_Pages->setIdPage(self::unescape($row->idPage));
	$tbl_Dossiers_Pages->setCommentaire(self::unescape($row->commentaire));
	return $tbl_Dossiers_Pages;
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
            $entry = new Core_Model_Tbldossierspages(); 
	    $entry->setIdDossier(self::unescape($row->idDossier));
	    $entry->setIdPage(self::unescape($row->idPage));
	    $entry->setCommentaire(self::unescape($row->commentaire));
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