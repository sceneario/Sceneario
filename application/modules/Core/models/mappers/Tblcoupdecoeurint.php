<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblcoupdecoeurint
 * @desc TABLE  : tbl_Coup_de_coeur_Int
 * @file Tblcoupdecoeurint.php
 * @desc PK     : idVote
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblcoupdecoeurint extends Core_Model_DbTable_Db
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
            $this->setDbTable("Core_Model_DbTable_Tblcoupdecoeurint");
        }
        return $this->_dbTable;
    }
    
    public function save(Core_Model_Tblcoupdecoeurint $tbl_Coup_de_coeur_Int)
    {
	    
        $data = array(
		//"idVote"	=> $tbl_Coup_de_coeur_Int->getIdVote() ,
		"dateVote"	=> $tbl_Coup_de_coeur_Int->getDateVote() ,
		"idAlbum"	=> $tbl_Coup_de_coeur_Int->getIdAlbum() ,
		"adrIp"	        => $tbl_Coup_de_coeur_Int->getAdrIp() ,
		"nomIp"	        => $tbl_Coup_de_coeur_Int->getNomIp() ,
		"semVote"	=> $tbl_Coup_de_coeur_Int->getSemVote() ,
		"user_id"	=> $tbl_Coup_de_coeur_Int->getUser_id() ,
        );
        #$id = (int)$data["idVote"];
        $id = 0 ;
        //if (null === ($id = $tbl_Coup_de_coeur_Int->getIdVote()  )) {
        if($id === 0){
            #unset($data["idVote"]);
            
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } #else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
           # return $this->getDbTable()->update($data, array("idVote = ?" => $id));
        #}
    } 

    public function find($id, Core_Model_Tblcoupdecoeurint $tbl_Coup_de_coeur_Int)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Coup_de_coeur_Int->setIdVote(self::unescape($row->idVote));
	$tbl_Coup_de_coeur_Int->setDateVote(self::unescape($row->dateVote));
	$tbl_Coup_de_coeur_Int->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Coup_de_coeur_Int->setAdrIp(self::unescape($row->adrIp));
	$tbl_Coup_de_coeur_Int->setNomIp(self::unescape($row->nomIp));
	$tbl_Coup_de_coeur_Int->setSemVote(self::unescape($row->semVote));
	$tbl_Coup_de_coeur_Int->setUser_id(self::unescape($row->user_id));
	return $tbl_Coup_de_coeur_Int;
    }
    
    public function findUserVote(Core_Model_Tblcoupdecoeurint $tbl_Coup_de_coeur_Int)
    {
        #$result = $this->getDbTable()->find($id);
        $ip  = $_SERVER['REMOTE_ADDR'];
        $sql = "SELECT * FROM tbl_Coup_de_coeur_Internaute 
                WHERE adrIp = ? ";
        
        $results = $this->getSqlResults($sql, array($ip));
        return $results;
       
    }
    
    public function checkIfUserLike($idAlbum, $currentWeek)
    {
        #$result = $this->getDbTable()->find($id);
        $ip  = $_SERVER['REMOTE_ADDR'];
        $sql = "SELECT count(*) as TOTAL FROM tbl_Coup_de_coeur_Internaute 
                WHERE adrIp = ? AND idAlbum = ? AND semVote = ?";
        
        $results = $this->getSqlResults($sql, array($ip , $idAlbum, $currentWeek));
        return $results[0]->TOTAL;
       
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idVote DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblcoupdecoeurint(); 
	    $entry->setIdVote(self::unescape($row->idVote));
	    $entry->setDateVote(self::unescape($row->dateVote));
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setAdrIp(self::unescape($row->adrIp));
	    $entry->setNomIp(self::unescape($row->nomIp));
	    $entry->setSemVote(self::unescape($row->semVote));
	    $entry->setUser_id(self::unescape($row->user_id));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idVote = ?", $id);
        return $dbTable->delete($where);
    }
}