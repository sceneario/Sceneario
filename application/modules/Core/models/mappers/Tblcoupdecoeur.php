<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblcoupdecoeur
 * @desc TABLE  : tbl_Coup_de_coeur
 * @file Tblcoupdecoeur.php
 * @desc PK     : idNumero
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblcoupdecoeur
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
            $this->setDbTable("Core_Model_DbTable_Tblcoupdecoeur");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblcoupdecoeur $tbl_Coup_de_coeur)
    {
	    
        $data = array(
		"idNumero"	=> $tbl_Coup_de_coeur->getIdNumero() ,
		"idAlbum"	=> $tbl_Coup_de_coeur->getIdAlbum() ,
		"dateCreation"	=> $tbl_Coup_de_coeur->getDateCreation() ,
		"idInternaute"	=> $tbl_Coup_de_coeur->getIdInternaute() ,
        );
        $id = (int)$data["idNumero"];

        //if (null === ($id = $tbl_Coup_de_coeur->getIdNumero()  )) {
        if($id === 0){
            unset($data["idNumero"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idNumero = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblcoupdecoeur $tbl_Coup_de_coeur)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Coup_de_coeur->setIdNumero(self::unescape($row->idNumero));
	$tbl_Coup_de_coeur->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Coup_de_coeur->setDateCreation(self::unescape($row->dateCreation));
	$tbl_Coup_de_coeur->setIdInternaute(self::unescape($row->idInternaute));
	return $tbl_Coup_de_coeur;
    }
    
  

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idNumero DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblcoupdecoeur(); 
	    $entry->setIdNumero(self::unescape($row->idNumero));
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setDateCreation(self::unescape($row->dateCreation));
	    $entry->setIdInternaute(self::unescape($row->idInternaute));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idNumero = ?", $id);
        return $dbTable->delete($where);
    }
}