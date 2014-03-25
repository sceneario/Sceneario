<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblgenres
 * @desc TABLE  : tbl_Genres
 * @file Tblgenres.php
 * @desc PK     : idGenre
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblgenres
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
            $this->setDbTable("Core_Model_DbTable_Tblgenres");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblgenres $tbl_Genres)
    {
	    
        $data = array(
		"idGenre"	=> $tbl_Genres->getIdGenre() ,
		"libelle"	=> $tbl_Genres->getLibelle() ,
		"T_recherche"	=> $tbl_Genres->getT_recherche() ,
		"definition"	=> $tbl_Genres->getDefinition() ,
		"T_visu_album"	=> $tbl_Genres->getT_visu_album() ,
        );
        $id = (int)$data["idGenre"];

        //if (null === ($id = $tbl_Genres->getIdGenre()  )) {
        if($id === 0){
            unset($data["idGenre"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idGenre = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblgenres $tbl_Genres)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Genres->setIdGenre(self::unescape($row->idGenre));
	$tbl_Genres->setLibelle(self::unescape($row->libelle));
	$tbl_Genres->setT_recherche(self::unescape($row->T_recherche));
	$tbl_Genres->setDefinition(self::unescape($row->definition));
	$tbl_Genres->setT_visu_album(self::unescape($row->T_visu_album));
	return $tbl_Genres;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        
        /*
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idGenre DESC"
           					->limit($limit,0)
                   			);
        */ 
        
        $resultSet = $table->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblgenres(); 
	    $entry->setIdGenre(self::unescape($row->idGenre));
	    $entry->setLibelle(self::unescape($row->libelle));
	    $entry->setT_recherche(self::unescape($row->T_recherche));
	    $entry->setDefinition(self::unescape($row->definition));
	    $entry->setT_visu_album(self::unescape($row->T_visu_album));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idGenre = ?", $id);
        return $dbTable->delete($where);
    }
}