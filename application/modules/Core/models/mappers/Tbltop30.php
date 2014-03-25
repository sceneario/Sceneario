<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tbltop30
 * @desc TABLE  : tbl_top30
 * @file Tbltop30.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tbltop30
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
            $this->setDbTable("Core_Model_DbTable_Tbltop30");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tbltop30 $tbl_top30)
    {
	    
        $data = array(
		"idAlbum"	=> $tbl_top30->getIdAlbum() ,
		"visitesPrec"	=> $tbl_top30->getVisitesPrec() ,
		"nbSemaines"	=> $tbl_top30->getNbSemaines() ,
		"classement"	=> $tbl_top30->getClassement() ,
        );
        $id = (int)$data["idAlbum"];

        //if (null === ($id = $tbl_top30->getIdAlbum()  )) {
        if($id === 0){
            unset($data["idAlbum"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idAlbum = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tbltop30 $tbl_top30)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_top30->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_top30->setVisitesPrec(self::unescape($row->visitesPrec));
	$tbl_top30->setNbSemaines(self::unescape($row->nbSemaines));
	$tbl_top30->setClassement(self::unescape($row->classement));
	return $tbl_top30;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idAlbum DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tbltop30(); 
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setVisitesPrec(self::unescape($row->visitesPrec));
	    $entry->setNbSemaines(self::unescape($row->nbSemaines));
	    $entry->setClassement(self::unescape($row->classement));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idAlbum = ?", $id);
        return $dbTable->delete($where);
    }
}