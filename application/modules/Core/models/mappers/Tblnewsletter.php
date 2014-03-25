<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblnewsletter
 * @desc TABLE  : tbl_News_Letter
 * @file Tblnewsletter.php
 * @desc PK     : idNewsLetter
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblnewsletter
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
            $this->setDbTable("Core_Model_DbTable_Tblnewsletter");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblnewsletter $tbl_News_Letter)
    {
	    
        $data = array(
		"idNewsLetter"	=> $tbl_News_Letter->getIdNewsLetter() ,
		"numNewsLetter"	=> $tbl_News_Letter->getNumNewsLetter() ,
		"motpatron"	=> $tbl_News_Letter->getMotpatron() ,
		"texte"	=> $tbl_News_Letter->getTexte() ,
		"type"	=> $tbl_News_Letter->getType() ,
		"date_news"	=> $tbl_News_Letter->getDate_news() ,
		"theme"	=> $tbl_News_Letter->getTheme() ,
        );
        $id = (int)$data["idNewsLetter"];

        //if (null === ($id = $tbl_News_Letter->getIdNewsLetter()  )) {
        if($id === 0){
            unset($data["idNewsLetter"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idNewsLetter = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblnewsletter $tbl_News_Letter)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_News_Letter->setIdNewsLetter(self::unescape($row->idNewsLetter));
	$tbl_News_Letter->setNumNewsLetter(self::unescape($row->numNewsLetter));
	$tbl_News_Letter->setMotpatron(self::unescape($row->motpatron));
	$tbl_News_Letter->setTexte(self::unescape($row->texte));
	$tbl_News_Letter->setType(self::unescape($row->type));
	$tbl_News_Letter->setDate_news(self::unescape($row->date_news));
	$tbl_News_Letter->setTheme(self::unescape($row->theme));
	return $tbl_News_Letter;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idNewsLetter DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblnewsletter(); 
	    $entry->setIdNewsLetter(self::unescape($row->idNewsLetter));
	    $entry->setNumNewsLetter(self::unescape($row->numNewsLetter));
	    $entry->setMotpatron(self::unescape($row->motpatron));
	    $entry->setTexte(self::unescape($row->texte));
	    $entry->setType(self::unescape($row->type));
	    $entry->setDate_news(self::unescape($row->date_news));
	    $entry->setTheme(self::unescape($row->theme));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idNewsLetter = ?", $id);
        return $dbTable->delete($where);
    }
}