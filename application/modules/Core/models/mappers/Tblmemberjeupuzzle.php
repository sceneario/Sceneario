<?php

/*
 * SCENEARIO.COM
 * Table des scores des puzzles
 * @desc CLASSE : Core_Model_Mapper_Tblmemberjeupuzzle
 * @desc TABLE  : tbl_Member_Jeu_Puzzle
 * @file Tblmemberjeupuzzle.php
 * @desc PK     : isbn
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblmemberjeupuzzle
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
            $this->setDbTable("Core_Model_DbTable_Tblmemberjeupuzzle");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblmemberjeupuzzle $tbl_Member_Jeu_Puzzle)
    {
	    
        $data = array(
		"user_id"	=> $tbl_Member_Jeu_Puzzle->getUser_id() ,
		"isbn"	=> $tbl_Member_Jeu_Puzzle->getIsbn() ,
		"nb_pieces_l"	=> $tbl_Member_Jeu_Puzzle->getNb_pieces_l() ,
		"nb_pieces_h"	=> $tbl_Member_Jeu_Puzzle->getNb_pieces_h() ,
		"nb_coups"	=> $tbl_Member_Jeu_Puzzle->getNb_coups() ,
		"date"	=> $tbl_Member_Jeu_Puzzle->getDate() ,
        );
        $id = (int)$data["isbn"];

        //if (null === ($id = $tbl_Member_Jeu_Puzzle->getIsbn()  )) {
        if($id === 0){
            unset($data["isbn"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("isbn = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblmemberjeupuzzle $tbl_Member_Jeu_Puzzle)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Member_Jeu_Puzzle->setUser_id(self::unescape($row->user_id));
	$tbl_Member_Jeu_Puzzle->setIsbn(self::unescape($row->isbn));
	$tbl_Member_Jeu_Puzzle->setNb_pieces_l(self::unescape($row->nb_pieces_l));
	$tbl_Member_Jeu_Puzzle->setNb_pieces_h(self::unescape($row->nb_pieces_h));
	$tbl_Member_Jeu_Puzzle->setNb_coups(self::unescape($row->nb_coups));
	$tbl_Member_Jeu_Puzzle->setDate(self::unescape($row->date));
	return $tbl_Member_Jeu_Puzzle;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"isbn DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblmemberjeupuzzle(); 
	    $entry->setUser_id(self::unescape($row->user_id));
	    $entry->setIsbn(self::unescape($row->isbn));
	    $entry->setNb_pieces_l(self::unescape($row->nb_pieces_l));
	    $entry->setNb_pieces_h(self::unescape($row->nb_pieces_h));
	    $entry->setNb_coups(self::unescape($row->nb_coups));
	    $entry->setDate(self::unescape($row->date));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("isbn = ?", $id);
        return $dbTable->delete($where);
    }
}