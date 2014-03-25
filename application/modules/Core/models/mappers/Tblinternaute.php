<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblinternaute
 * @desc TABLE  : tbl_Internaute
 * @file Tblinternaute.php
 * @desc PK     : idInternaute
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblinternaute
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
            $this->setDbTable("Core_Model_DbTable_Tblinternaute");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblinternaute $tbl_Internaute)
    {
	    
        $data = array(
		"idInternaute"	=> $tbl_Internaute->getIdInternaute() ,
		"pseudo"	=> $tbl_Internaute->getPseudo() ,
		"adrWebInternaute"	=> $tbl_Internaute->getAdrWebInternaute() ,
		"adrMailInternaute"	=> $tbl_Internaute->getAdrMailInternaute() ,
		"envoilettre"	=> $tbl_Internaute->getEnvoilettre() ,
		"datecreation"	=> $tbl_Internaute->getDatecreation() ,
		"T_Affectation"	=> $tbl_Internaute->getT_Affectation() ,
		"coordonnees"	=> $tbl_Internaute->getCoordonnees() ,
        );
        $id = (int)$data["idInternaute"];

        //if (null === ($id = $tbl_Internaute->getIdInternaute()  )) {
        if($id === 0){
            unset($data["idInternaute"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idInternaute = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblinternaute $tbl_Internaute)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Internaute->setIdInternaute(self::unescape($row->idInternaute));
	$tbl_Internaute->setPseudo(self::unescape($row->pseudo));
	$tbl_Internaute->setAdrWebInternaute(self::unescape($row->adrWebInternaute));
	$tbl_Internaute->setAdrMailInternaute(self::unescape($row->adrMailInternaute));
	$tbl_Internaute->setEnvoilettre(self::unescape($row->envoilettre));
	$tbl_Internaute->setDatecreation(self::unescape($row->datecreation));
	$tbl_Internaute->setT_Affectation(self::unescape($row->T_Affectation));
	$tbl_Internaute->setCoordonnees(self::unescape($row->coordonnees));
	return $tbl_Internaute;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idInternaute DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblinternaute(); 
	    $entry->setIdInternaute(self::unescape($row->idInternaute));
	    $entry->setPseudo(self::unescape($row->pseudo));
	    $entry->setAdrWebInternaute(self::unescape($row->adrWebInternaute));
	    $entry->setAdrMailInternaute(self::unescape($row->adrMailInternaute));
	    $entry->setEnvoilettre(self::unescape($row->envoilettre));
	    $entry->setDatecreation(self::unescape($row->datecreation));
	    $entry->setT_Affectation(self::unescape($row->T_Affectation));
	    $entry->setCoordonnees(self::unescape($row->coordonnees));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idInternaute = ?", $id);
        return $dbTable->delete($where);
    }
}