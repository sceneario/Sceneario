<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblmailingliste
 * @desc TABLE  : tbl_Mailing_Liste
 * @file Tblmailingliste.php
 * @desc PK     : idListe
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblmailingliste
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
            $this->setDbTable("Core_Model_DbTable_Tblmailingliste");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblmailingliste $tbl_Mailing_Liste)
    {
	    
        $data = array(
		"idListe"	=> $tbl_Mailing_Liste->getIdListe() ,
		"NomListe"	=> $tbl_Mailing_Liste->getNomListe() ,
		"comment"	=> $tbl_Mailing_Liste->getComment() ,
        );
        $id = (int)$data["idListe"];

        //if (null === ($id = $tbl_Mailing_Liste->getIdListe()  )) {
        if($id === 0){
            unset($data["idListe"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idListe = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblmailingliste $tbl_Mailing_Liste)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Mailing_Liste->setIdListe(self::unescape($row->idListe));
	$tbl_Mailing_Liste->setNomListe(self::unescape($row->NomListe));
	$tbl_Mailing_Liste->setComment(self::unescape($row->comment));
	return $tbl_Mailing_Liste;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idListe DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblmailingliste(); 
	    $entry->setIdListe(self::unescape($row->idListe));
	    $entry->setNomListe(self::unescape($row->NomListe));
	    $entry->setComment(self::unescape($row->comment));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idListe = ?", $id);
        return $dbTable->delete($where);
    }
}