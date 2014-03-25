<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblediteur
 * @desc TABLE  : tbl_Editeur
 * @file Tblediteur.php
 * @desc PK     : idEditeur
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblediteur
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
            $this->setDbTable("Core_Model_DbTable_Tblediteur");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblediteur $tbl_Editeur)
    {
	    
        $data = array(
		"idEditeur"	=> $tbl_Editeur->getIdEditeur() ,
		"nomEditeur"	=> $tbl_Editeur->getNomEditeur() ,
		"prenomEditeur"	=> $tbl_Editeur->getPrenomEditeur() ,
		"adrWebEditeur"	=> $tbl_Editeur->getAdrWebEditeur() ,
		"adrMailEditeur"	=> $tbl_Editeur->getAdrMailEditeur() ,
        );
        $id = (int)$data["idEditeur"];

        //if (null === ($id = $tbl_Editeur->getIdEditeur()  )) {
        if($id === 0){
            unset($data["idEditeur"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idEditeur = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblediteur $tbl_Editeur)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Editeur->setIdEditeur(self::unescape($row->idEditeur));
	$tbl_Editeur->setNomEditeur(self::unescape($row->nomEditeur));
	$tbl_Editeur->setPrenomEditeur(self::unescape($row->prenomEditeur));
	$tbl_Editeur->setAdrWebEditeur(self::unescape($row->adrWebEditeur));
	$tbl_Editeur->setAdrMailEditeur(self::unescape($row->adrMailEditeur));
	return $tbl_Editeur;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idEditeur DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblediteur(); 
	    $entry->setIdEditeur(self::unescape($row->idEditeur));
	    $entry->setNomEditeur(self::unescape($row->nomEditeur));
	    $entry->setPrenomEditeur(self::unescape($row->prenomEditeur));
	    $entry->setAdrWebEditeur(self::unescape($row->adrWebEditeur));
	    $entry->setAdrMailEditeur(self::unescape($row->adrMailEditeur));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idEditeur = ?", $id);
        return $dbTable->delete($where);
    }
}