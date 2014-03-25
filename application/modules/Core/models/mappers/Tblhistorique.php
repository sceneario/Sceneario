<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblhistorique
 * @desc TABLE  : tbl_Historique
 * @file Tblhistorique.php
 * @desc PK     : idHisto
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblhistorique
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
            $this->setDbTable("Core_Model_DbTable_Tblhistorique");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblhistorique $tbl_Historique)
    {
	    
        $data = array(
		"idHisto"	=> $tbl_Historique->getIdHisto() ,
		"dateHisto"	=> $tbl_Historique->getDateHisto() ,
		"typeRech"	=> $tbl_Historique->getTypeRech() ,
		"valeurRech"	=> $tbl_Historique->getValeurRech() ,
		"adrIp"	=> $tbl_Historique->getAdrIp() ,
		"nomIp"	=> $tbl_Historique->getNomIp() ,
		"user_id"	=> $tbl_Historique->getUser_id() ,
		"session_id"	=> $tbl_Historique->getSession_id() ,
		"adrReferer"	=> $tbl_Historique->getAdrReferer() ,
        );
        $id = (int)$data["idHisto"];

        //if (null === ($id = $tbl_Historique->getIdHisto()  )) {
        if($id === 0){
            unset($data["idHisto"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idHisto = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblhistorique $tbl_Historique)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Historique->setIdHisto(self::unescape($row->idHisto));
	$tbl_Historique->setDateHisto(self::unescape($row->dateHisto));
	$tbl_Historique->setTypeRech(self::unescape($row->typeRech));
	$tbl_Historique->setValeurRech(self::unescape($row->valeurRech));
	$tbl_Historique->setAdrIp(self::unescape($row->adrIp));
	$tbl_Historique->setNomIp(self::unescape($row->nomIp));
	$tbl_Historique->setUser_id(self::unescape($row->user_id));
	$tbl_Historique->setSession_id(self::unescape($row->session_id));
	$tbl_Historique->setAdrReferer(self::unescape($row->adrReferer));
	return $tbl_Historique;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idHisto DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblhistorique(); 
	    $entry->setIdHisto(self::unescape($row->idHisto));
	    $entry->setDateHisto(self::unescape($row->dateHisto));
	    $entry->setTypeRech(self::unescape($row->typeRech));
	    $entry->setValeurRech(self::unescape($row->valeurRech));
	    $entry->setAdrIp(self::unescape($row->adrIp));
	    $entry->setNomIp(self::unescape($row->nomIp));
	    $entry->setUser_id(self::unescape($row->user_id));
	    $entry->setSession_id(self::unescape($row->session_id));
	    $entry->setAdrReferer(self::unescape($row->adrReferer));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idHisto = ?", $id);
        return $dbTable->delete($where);
    }
}