<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblserie
 * @desc TABLE  : tbl_Serie
 * @file Tblserie.php
 * @desc PK     : idSerie
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblserie
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
            $this->setDbTable("Core_Model_DbTable_Tblserie");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblserie $tbl_Serie)
    {
	    
        $data = array(
		"idSerie"	=> $tbl_Serie->getIdSerie() ,
		"nomSerie"	=> $tbl_Serie->getNomSerie() ,
		"complete"	=> $tbl_Serie->getComplete() ,
		"nbtomes"	=> $tbl_Serie->getNbtomes() ,
		"commentaire"	=> $tbl_Serie->getCommentaire() ,
		"informations"	=> $tbl_Serie->getInformations() ,
		"idUnivers"	=> $tbl_Serie->getIdUnivers() ,
        );
        $id = (int)$data["idSerie"];

        //if (null === ($id = $tbl_Serie->getIdSerie()  )) {
        if($id === 0){
            unset($data["idSerie"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idSerie = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblserie $tbl_Serie)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Serie->setIdSerie(self::unescape($row->idSerie));
	$tbl_Serie->setNomSerie(self::unescape($row->nomSerie));
	$tbl_Serie->setComplete(self::unescape($row->complete));
	$tbl_Serie->setNbtomes(self::unescape($row->nbtomes));
	$tbl_Serie->setCommentaire(self::unescape($row->commentaire));
	$tbl_Serie->setInformations(self::unescape($row->informations));
	$tbl_Serie->setIdUnivers(self::unescape($row->idUnivers));
	return $tbl_Serie;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idSerie DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblserie(); 
	    $entry->setIdSerie(self::unescape($row->idSerie));
	    $entry->setNomSerie(self::unescape($row->nomSerie));
	    $entry->setComplete(self::unescape($row->complete));
	    $entry->setNbtomes(self::unescape($row->nbtomes));
	    $entry->setCommentaire(self::unescape($row->commentaire));
	    $entry->setInformations(self::unescape($row->informations));
	    $entry->setIdUnivers(self::unescape($row->idUnivers));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idSerie = ?", $id);
        return $dbTable->delete($where);
    }
}