<?php

/*
 * SCENEARIO.COM
 * Table contenant les filtres sur les éditeurs
 * @desc CLASSE : Core_Model_Mapper_Tblmemberauteuralb
 * @desc TABLE  : tbl_Member_Auteur_Alb
 * @file Tblmemberauteuralb.php
 * @desc PK     : user_id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblmemberauteuralb
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
            $this->setDbTable("Core_Model_DbTable_Tblmemberauteuralb");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblmemberauteuralb $tbl_Member_Auteur_Alb)
    {
	    
        $data = array(
		"user_id"	=> $tbl_Member_Auteur_Alb->getUser_id() ,
		"idAuteur"	=> $tbl_Member_Auteur_Alb->getIdAuteur() ,
        );
        $id = (int)$data["user_id"];

        //if (null === ($id = $tbl_Member_Auteur_Alb->getUser_id()  )) {
        if($id === 0){
            unset($data["user_id"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("user_id = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblmemberauteuralb $tbl_Member_Auteur_Alb)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Member_Auteur_Alb->setUser_id(self::unescape($row->user_id));
	$tbl_Member_Auteur_Alb->setIdAuteur(self::unescape($row->idAuteur));
	return $tbl_Member_Auteur_Alb;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"user_id DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblmemberauteuralb(); 
	    $entry->setUser_id(self::unescape($row->user_id));
	    $entry->setIdAuteur(self::unescape($row->idAuteur));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("user_id = ?", $id);
        return $dbTable->delete($where);
    }
}