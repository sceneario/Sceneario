<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblcollections
 * @desc TABLE  : tbl_Collections
 * @file Tblcollections.php
 * @desc PK     : idCollection
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblcollections
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
            $this->setDbTable("Core_Model_DbTable_Tblcollections");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblcollections $tbl_Collections)
    {
	    
        $data = array(
		"idCollection"	=> $tbl_Collections->getIdCollection() ,
		"nomCollection"	=> $tbl_Collections->getNomCollection() ,
		"commentaire"	=> $tbl_Collections->getCommentaire() ,
		"idEditeur"	=> $tbl_Collections->getIdEditeur() ,
        );
        $id = (int)$data["idCollection"];

        //if (null === ($id = $tbl_Collections->getIdCollection()  )) {
        if($id === 0){
            unset($data["idCollection"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idCollection = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblcollections $tbl_Collections)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Collections->setIdCollection(self::unescape($row->idCollection));
	$tbl_Collections->setNomCollection(self::unescape($row->nomCollection));
	$tbl_Collections->setCommentaire(self::unescape($row->commentaire));
	$tbl_Collections->setIdEditeur(self::unescape($row->idEditeur));
	return $tbl_Collections;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idCollection DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblcollections(); 
	    $entry->setIdCollection(self::unescape($row->idCollection));
	    $entry->setNomCollection(self::unescape($row->nomCollection));
	    $entry->setCommentaire(self::unescape($row->commentaire));
	    $entry->setIdEditeur(self::unescape($row->idEditeur));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idCollection = ?", $id);
        return $dbTable->delete($where);
    }
}