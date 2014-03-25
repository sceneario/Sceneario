<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblcompteligne
 * @desc TABLE  : tbl_Compte_Ligne
 * @file Tblcompteligne.php
 * @desc PK     : idligne
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblcompteligne
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
            $this->setDbTable("Core_Model_DbTable_Tblcompteligne");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblcompteligne $tbl_Compte_Ligne)
    {
	    
        $data = array(
		"idligne"	=> $tbl_Compte_Ligne->getIdligne() ,
		"date"	=> $tbl_Compte_Ligne->getDate() ,
		"libelle"	=> $tbl_Compte_Ligne->getLibelle() ,
		"credit"	=> $tbl_Compte_Ligne->getCredit() ,
		"debit"	=> $tbl_Compte_Ligne->getDebit() ,
		"commentaire"	=> $tbl_Compte_Ligne->getCommentaire() ,
		"type"	=> $tbl_Compte_Ligne->getType() ,
		"status"	=> $tbl_Compte_Ligne->getStatus() ,
        );
        $id = (int)$data["idligne"];

        //if (null === ($id = $tbl_Compte_Ligne->getIdligne()  )) {
        if($id === 0){
            unset($data["idligne"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idligne = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblcompteligne $tbl_Compte_Ligne)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Compte_Ligne->setIdligne(self::unescape($row->idligne));
	$tbl_Compte_Ligne->setDate(self::unescape($row->date));
	$tbl_Compte_Ligne->setLibelle(self::unescape($row->libelle));
	$tbl_Compte_Ligne->setCredit(self::unescape($row->credit));
	$tbl_Compte_Ligne->setDebit(self::unescape($row->debit));
	$tbl_Compte_Ligne->setCommentaire(self::unescape($row->commentaire));
	$tbl_Compte_Ligne->setType(self::unescape($row->type));
	$tbl_Compte_Ligne->setStatus(self::unescape($row->status));
	return $tbl_Compte_Ligne;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idligne DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblcompteligne(); 
	    $entry->setIdligne(self::unescape($row->idligne));
	    $entry->setDate(self::unescape($row->date));
	    $entry->setLibelle(self::unescape($row->libelle));
	    $entry->setCredit(self::unescape($row->credit));
	    $entry->setDebit(self::unescape($row->debit));
	    $entry->setCommentaire(self::unescape($row->commentaire));
	    $entry->setType(self::unescape($row->type));
	    $entry->setStatus(self::unescape($row->status));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idligne = ?", $id);
        return $dbTable->delete($where);
    }
}