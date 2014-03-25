<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblconcourslig
 * @desc TABLE  : tbl_Concours_Lig
 * @file Tblconcourslig.php
 * @desc PK     : nomConcours
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblconcourslig
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
            $this->setDbTable("Core_Model_DbTable_Tblconcourslig");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblconcourslig $tbl_Concours_Lig)
    {
	    
        $data = array(
		"nomConcours"	=> $tbl_Concours_Lig->getNomConcours() ,
		"numQuestion"	=> $tbl_Concours_Lig->getNumQuestion() ,
		"dateQuestion"	=> $tbl_Concours_Lig->getDateQuestion() ,
		"question"	=> $tbl_Concours_Lig->getQuestion() ,
		"t_alldays"	=> $tbl_Concours_Lig->getT_alldays() ,
        );
        $id = (int)$data["nomConcours"];

        //if (null === ($id = $tbl_Concours_Lig->getNomConcours()  )) {
        if($id === 0){
            unset($data["nomConcours"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("nomConcours = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblconcourslig $tbl_Concours_Lig)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Concours_Lig->setNomConcours(self::unescape($row->nomConcours));
	$tbl_Concours_Lig->setNumQuestion(self::unescape($row->numQuestion));
	$tbl_Concours_Lig->setDateQuestion(self::unescape($row->dateQuestion));
	$tbl_Concours_Lig->setQuestion(self::unescape($row->question));
	$tbl_Concours_Lig->setT_alldays(self::unescape($row->t_alldays));
	return $tbl_Concours_Lig;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"nomConcours DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblconcourslig(); 
	    $entry->setNomConcours(self::unescape($row->nomConcours));
	    $entry->setNumQuestion(self::unescape($row->numQuestion));
	    $entry->setDateQuestion(self::unescape($row->dateQuestion));
	    $entry->setQuestion(self::unescape($row->question));
	    $entry->setT_alldays(self::unescape($row->t_alldays));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("nomConcours = ?", $id);
        return $dbTable->delete($where);
    }
}