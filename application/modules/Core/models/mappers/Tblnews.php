<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblnews
 * @desc TABLE  : tbl_News
 * @file Tblnews.php
 * @desc PK     : idNews
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblnews
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
            $this->setDbTable("Core_Model_DbTable_Tblnews");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblnews $tbl_News)
    {
	    
        $data = array(
		"idNews"	=> $tbl_News->getIdNews() ,
		"texte"	=> $tbl_News->getTexte() ,
		"datecreation"	=> $tbl_News->getDatecreation() ,
		"enligne"	=> $tbl_News->getEnligne() ,
		"dateNews"	=> $tbl_News->getDateNews() ,
		"shortnews"	=> $tbl_News->getShortnews() ,
        );
        $id = (int)$data["idNews"];

        //if (null === ($id = $tbl_News->getIdNews()  )) {
        if($id === 0){
            unset($data["idNews"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idNews = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblnews $tbl_News)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_News->setIdNews(self::unescape($row->idNews));
	$tbl_News->setTexte(self::unescape($row->texte));
	$tbl_News->setDatecreation(self::unescape($row->datecreation));
	$tbl_News->setEnligne(self::unescape($row->enligne));
	$tbl_News->setDateNews(self::unescape($row->dateNews));
	$tbl_News->setShortnews(self::unescape($row->shortnews));
	return $tbl_News;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idNews DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblnews(); 
	    $entry->setIdNews(self::unescape($row->idNews));
	    $entry->setTexte(self::unescape($row->texte));
	    $entry->setDatecreation(self::unescape($row->datecreation));
	    $entry->setEnligne(self::unescape($row->enligne));
	    $entry->setDateNews(self::unescape($row->dateNews));
	    $entry->setShortnews(self::unescape($row->shortnews));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idNews = ?", $id);
        return $dbTable->delete($where);
    }
}