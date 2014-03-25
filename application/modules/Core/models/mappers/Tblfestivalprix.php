<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblfestivalprix
 * @desc TABLE  : tbl_Festival_Prix
 * @file Tblfestivalprix.php
 * @desc PK     : idPrix
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblfestivalprix
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
            $this->setDbTable("Core_Model_DbTable_Tblfestivalprix");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblfestivalprix $tbl_Festival_Prix)
    {
	    
        $data = array(
		"idPrix"	=> $tbl_Festival_Prix->getIdPrix() ,
		"idFestival"	=> $tbl_Festival_Prix->getIdFestival() ,
		"nomPrix"	=> $tbl_Festival_Prix->getNomPrix() ,
		"commentaire"	=> $tbl_Festival_Prix->getCommentaire() ,
        );
        $id = (int)$data["idPrix"];

        //if (null === ($id = $tbl_Festival_Prix->getIdPrix()  )) {
        if($id === 0){
            unset($data["idPrix"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idPrix = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblfestivalprix $tbl_Festival_Prix)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Festival_Prix->setIdPrix(self::unescape($row->idPrix));
	$tbl_Festival_Prix->setIdFestival(self::unescape($row->idFestival));
	$tbl_Festival_Prix->setNomPrix(self::unescape($row->nomPrix));
	$tbl_Festival_Prix->setCommentaire(self::unescape($row->commentaire));
	return $tbl_Festival_Prix;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idPrix DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblfestivalprix(); 
	    $entry->setIdPrix(self::unescape($row->idPrix));
	    $entry->setIdFestival(self::unescape($row->idFestival));
	    $entry->setNomPrix(self::unescape($row->nomPrix));
	    $entry->setCommentaire(self::unescape($row->commentaire));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idPrix = ?", $id);
        return $dbTable->delete($where);
    }
}