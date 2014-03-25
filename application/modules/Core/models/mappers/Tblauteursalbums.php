<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblauteursalbums
 * @desc TABLE  : tbl_Auteurs_Albums
 * @file Tblauteursalbums.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblauteursalbums
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
            $this->setDbTable("Core_Model_DbTable_Tblauteursalbums");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblauteursalbums $tbl_Auteurs_Albums)
    {
	    
        $data = array(
		"idAlbum"	=> $tbl_Auteurs_Albums->getIdAlbum() ,
		"idAuteur"	=> $tbl_Auteurs_Albums->getIdAuteur() ,
		"cdRole"	=> $tbl_Auteurs_Albums->getCdRole() ,
		"datecreation"	=> $tbl_Auteurs_Albums->getDatecreation() ,
        );
        $id = (int)$data["idAlbum"];

        //if (null === ($id = $tbl_Auteurs_Albums->getIdAlbum()  )) {
        if($id === 0){
            unset($data["idAlbum"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idAlbum = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblauteursalbums $tbl_Auteurs_Albums)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Auteurs_Albums->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Auteurs_Albums->setIdAuteur(self::unescape($row->idAuteur));
	$tbl_Auteurs_Albums->setCdRole(self::unescape($row->cdRole));
	$tbl_Auteurs_Albums->setDatecreation(self::unescape($row->datecreation));
	return $tbl_Auteurs_Albums;
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
            $entry = new Core_Model_Tblauteursalbums(); 
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setIdAuteur(self::unescape($row->idAuteur));
	    $entry->setCdRole(self::unescape($row->cdRole));
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
        $where   = $dbTable->getAdapter()->quoteInto("idAlbum = ?", $id);
        return $dbTable->delete($where);
    }
}