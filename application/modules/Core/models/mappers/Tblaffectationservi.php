<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblaffectationservi
 * @desc TABLE  : tbl_Affectation_Servi
 * @file Tblaffectationservi.php
 * @desc PK     : idInternaute
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblaffectationservi
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
            $this->setDbTable("Core_Model_DbTable_Tblaffectationservi");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblaffectationservi $tbl_Affectation_Servi)
    {
	    
        $data = array(
		"idInternaute"	=> $tbl_Affectation_Servi->getIdInternaute() ,
		"pseudo"	=> $tbl_Affectation_Servi->getPseudo() ,
		"idService"	=> $tbl_Affectation_Servi->getIdService() ,
        );
        $id = (int)$data["idInternaute"];

        //if (null === ($id = $tbl_Affectation_Servi->getIdInternaute()  )) {
        if($id === 0){
            unset($data["idInternaute"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idInternaute = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblaffectationservi $tbl_Affectation_Servi)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Affectation_Servi->setIdInternaute(self::unescape($row->idInternaute));
	$tbl_Affectation_Servi->setPseudo(self::unescape($row->pseudo));
	$tbl_Affectation_Servi->setIdService(self::unescape($row->idService));
	return $tbl_Affectation_Servi;
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
            $entry = new Core_Model_Tblaffectationservi(); 
	    $entry->setIdInternaute(self::unescape($row->idInternaute));
	    $entry->setPseudo(self::unescape($row->pseudo));
	    $entry->setIdService(self::unescape($row->idService));
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