<?php

/*
 * SCENEARIO.COM
 * Table des réponses au jeu de la couverture
 * @desc CLASSE : Core_Model_Mapper_Tblreponsesjeucouv
 * @desc TABLE  : tbl_Reponses_Jeu_Couv
 * @file Tblreponsesjeucouv.php
 * @desc PK     : email
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblreponsesjeucouv
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
            $this->setDbTable("Core_Model_DbTable_Tblreponsesjeucouv");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblreponsesjeucouv $tbl_Reponses_Jeu_Couv)
    {
	    
        $data = array(
		"email"	=> $tbl_Reponses_Jeu_Couv->getEmail() ,
		"date"	=> $tbl_Reponses_Jeu_Couv->getDate() ,
		"adrIP"	=> $tbl_Reponses_Jeu_Couv->getAdrIP() ,
		"isbn"	=> $tbl_Reponses_Jeu_Couv->getIsbn() ,
		"gagne"	=> $tbl_Reponses_Jeu_Couv->getGagne() ,
        );
        $id = (int)$data["email"];

        //if (null === ($id = $tbl_Reponses_Jeu_Couv->getEmail()  )) {
        if($id === 0){
            unset($data["email"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("email = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblreponsesjeucouv $tbl_Reponses_Jeu_Couv)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Reponses_Jeu_Couv->setEmail(self::unescape($row->email));
	$tbl_Reponses_Jeu_Couv->setDate(self::unescape($row->date));
	$tbl_Reponses_Jeu_Couv->setAdrIP(self::unescape($row->adrIP));
	$tbl_Reponses_Jeu_Couv->setIsbn(self::unescape($row->isbn));
	$tbl_Reponses_Jeu_Couv->setGagne(self::unescape($row->gagne));
	return $tbl_Reponses_Jeu_Couv;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"email DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblreponsesjeucouv(); 
	    $entry->setEmail(self::unescape($row->email));
	    $entry->setDate(self::unescape($row->date));
	    $entry->setAdrIP(self::unescape($row->adrIP));
	    $entry->setIsbn(self::unescape($row->isbn));
	    $entry->setGagne(self::unescape($row->gagne));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("email = ?", $id);
        return $dbTable->delete($where);
    }
}