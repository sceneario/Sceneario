<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblcalendrier
 * @desc TABLE  : tbl_Calendrier
 * @file Tblcalendrier.php
 * @desc PK     : __A_SPECIFIER__
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblcalendrier
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
            $this->setDbTable("Core_Model_DbTable_Tblcalendrier");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblcalendrier $tbl_Calendrier)
    {
	    
        $data = array(
		"TE"	=> $tbl_Calendrier->getTE() ,
		"dateDeb"	=> $tbl_Calendrier->getDateDeb() ,
		"dateFin"	=> $tbl_Calendrier->getDateFin() ,
		"titre"	=> $tbl_Calendrier->getTitre() ,
		"description"	=> $tbl_Calendrier->getDescription() ,
		"heure"	=> $tbl_Calendrier->getHeure() ,
		"categorie"	=> $tbl_Calendrier->getCategorie() ,
		"lien"	=> $tbl_Calendrier->getLien() ,
        );
        $id = (int)$data["__A_SPECIFIER__"];

        //if (null === ($id = $tbl_Calendrier->get__A_SPECIFIER__()  )) {
        if($id === 0){
            unset($data["__A_SPECIFIER__"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("__A_SPECIFIER__ = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblcalendrier $tbl_Calendrier)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Calendrier->setTE(self::unescape($row->TE));
	$tbl_Calendrier->setDateDeb(self::unescape($row->dateDeb));
	$tbl_Calendrier->setDateFin(self::unescape($row->dateFin));
	$tbl_Calendrier->setTitre(self::unescape($row->titre));
	$tbl_Calendrier->setDescription(self::unescape($row->description));
	$tbl_Calendrier->setHeure(self::unescape($row->heure));
	$tbl_Calendrier->setCategorie(self::unescape($row->categorie));
	$tbl_Calendrier->setLien(self::unescape($row->lien));
	return $tbl_Calendrier;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"__A_SPECIFIER__ DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblcalendrier(); 
	    $entry->setTE(self::unescape($row->TE));
	    $entry->setDateDeb(self::unescape($row->dateDeb));
	    $entry->setDateFin(self::unescape($row->dateFin));
	    $entry->setTitre(self::unescape($row->titre));
	    $entry->setDescription(self::unescape($row->description));
	    $entry->setHeure(self::unescape($row->heure));
	    $entry->setCategorie(self::unescape($row->categorie));
	    $entry->setLien(self::unescape($row->lien));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("__A_SPECIFIER__ = ?", $id);
        return $dbTable->delete($where);
    }
}