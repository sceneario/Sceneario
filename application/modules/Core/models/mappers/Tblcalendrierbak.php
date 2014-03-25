<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblcalendrierbak
 * @desc TABLE  : tbl_Calendrier_bak
 * @file Tblcalendrierbak.php
 * @desc PK     : idCalendrier
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblcalendrierbak
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
            $this->setDbTable("Core_Model_DbTable_Tblcalendrierbak");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblcalendrierbak $tbl_Calendrier_bak)
    {
	    
        $data = array(
		"idCalendrier"	=> $tbl_Calendrier_bak->getIdCalendrier() ,
		"categorie"	=> $tbl_Calendrier_bak->getCategorie() ,
		"actif"	=> $tbl_Calendrier_bak->getActif() ,
		"lieu"	=> $tbl_Calendrier_bak->getLieu() ,
		"date"	=> $tbl_Calendrier_bak->getDate() ,
		"heure"	=> $tbl_Calendrier_bak->getHeure() ,
		"duree"	=> $tbl_Calendrier_bak->getDuree() ,
		"lien"	=> $tbl_Calendrier_bak->getLien() ,
		"titre"	=> $tbl_Calendrier_bak->getTitre() ,
		"description"	=> $tbl_Calendrier_bak->getDescription() ,
        );
        $id = (int)$data["idCalendrier"];

        //if (null === ($id = $tbl_Calendrier_bak->getIdCalendrier()  )) {
        if($id === 0){
            unset($data["idCalendrier"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idCalendrier = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblcalendrierbak $tbl_Calendrier_bak)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Calendrier_bak->setIdCalendrier(self::unescape($row->idCalendrier));
	$tbl_Calendrier_bak->setCategorie(self::unescape($row->categorie));
	$tbl_Calendrier_bak->setActif(self::unescape($row->actif));
	$tbl_Calendrier_bak->setLieu(self::unescape($row->lieu));
	$tbl_Calendrier_bak->setDate(self::unescape($row->date));
	$tbl_Calendrier_bak->setHeure(self::unescape($row->heure));
	$tbl_Calendrier_bak->setDuree(self::unescape($row->duree));
	$tbl_Calendrier_bak->setLien(self::unescape($row->lien));
	$tbl_Calendrier_bak->setTitre(self::unescape($row->titre));
	$tbl_Calendrier_bak->setDescription(self::unescape($row->description));
	return $tbl_Calendrier_bak;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idCalendrier DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblcalendrierbak(); 
	    $entry->setIdCalendrier(self::unescape($row->idCalendrier));
	    $entry->setCategorie(self::unescape($row->categorie));
	    $entry->setActif(self::unescape($row->actif));
	    $entry->setLieu(self::unescape($row->lieu));
	    $entry->setDate(self::unescape($row->date));
	    $entry->setHeure(self::unescape($row->heure));
	    $entry->setDuree(self::unescape($row->duree));
	    $entry->setLien(self::unescape($row->lien));
	    $entry->setTitre(self::unescape($row->titre));
	    $entry->setDescription(self::unescape($row->description));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idCalendrier = ?", $id);
        return $dbTable->delete($where);
    }
}