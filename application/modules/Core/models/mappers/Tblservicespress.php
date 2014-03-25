<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblservicespress
 * @desc TABLE  : tbl_Services_Press
 * @file Tblservicespress.php
 * @desc PK     : idService
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblservicespress
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
            $this->setDbTable("Core_Model_DbTable_Tblservicespress");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblservicespress $tbl_Services_Press)
    {
	    
        $data = array(
		"idService"	=> $tbl_Services_Press->getIdService() ,
		"idEditeur"	=> $tbl_Services_Press->getIdEditeur() ,
		"dateParution"	=> $tbl_Services_Press->getDateParution() ,
		"nomService"	=> $tbl_Services_Press->getNomService() ,
		"bloque"	=> $tbl_Services_Press->getBloque() ,
		"T_Recu"	=> $tbl_Services_Press->getT_Recu() ,
		"ListeAuteurs"	=> $tbl_Services_Press->getListeAuteurs() ,
		"datecreation"	=> $tbl_Services_Press->getDatecreation() ,
        );
        $id = (int)$data["idService"];

        //if (null === ($id = $tbl_Services_Press->getIdService()  )) {
        if($id === 0){
            unset($data["idService"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idService = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblservicespress $tbl_Services_Press)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Services_Press->setIdService(self::unescape($row->idService));
	$tbl_Services_Press->setIdEditeur(self::unescape($row->idEditeur));
	$tbl_Services_Press->setDateParution(self::unescape($row->dateParution));
	$tbl_Services_Press->setNomService(self::unescape($row->nomService));
	$tbl_Services_Press->setBloque(self::unescape($row->bloque));
	$tbl_Services_Press->setT_Recu(self::unescape($row->T_Recu));
	$tbl_Services_Press->setListeAuteurs(self::unescape($row->ListeAuteurs));
	$tbl_Services_Press->setDatecreation(self::unescape($row->datecreation));
	return $tbl_Services_Press;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idService DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblservicespress(); 
	    $entry->setIdService(self::unescape($row->idService));
	    $entry->setIdEditeur(self::unescape($row->idEditeur));
	    $entry->setDateParution(self::unescape($row->dateParution));
	    $entry->setNomService(self::unescape($row->nomService));
	    $entry->setBloque(self::unescape($row->bloque));
	    $entry->setT_Recu(self::unescape($row->T_Recu));
	    $entry->setListeAuteurs(self::unescape($row->ListeAuteurs));
	    $entry->setDatecreation(self::unescape($row->datecreation));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idService = ?", $id);
        return $dbTable->delete($where);
    }
}