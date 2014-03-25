<?php

/*
 * SCENEARIO.COM
 * Table des dossiers ou carnet de croquis
 * @desc CLASSE : Core_Model_Mapper_Tbldossiers
 * @desc TABLE  : tbl_Dossiers
 * @file Tbldossiers.php
 * @desc PK     : idDossier
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tbldossiers extends Core_Model_DbTable_Db
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
            $this->setDbTable("Core_Model_DbTable_Tbldossiers");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tbldossiers $tbl_Dossiers)
    {
	    
        $data = array(
		"idDossier"	=> $tbl_Dossiers->getIdDossier() ,
		"lienDossier"	=> $tbl_Dossiers->getLienDossier() ,
		"titreDossier"	=> $tbl_Dossiers->getTitreDossier() ,
		"dateDossier"	=> $tbl_Dossiers->getDateDossier() ,
		"typeDossier"	=> $tbl_Dossiers->getTypeDossier() ,
		"lienJava"	=> $tbl_Dossiers->getLienJava() ,
		"enligne"	=> $tbl_Dossiers->getEnligne() ,
		"lienImage"	=> $tbl_Dossiers->getLienImage() ,
		"titreSommaire"	=> $tbl_Dossiers->getTitreSommaire() ,
		"texte"	=> $tbl_Dossiers->getTexte() ,
		"type"	=> $tbl_Dossiers->getType() ,
        );
        $id = (int)$data["idDossier"];

        //if (null === ($id = $tbl_Dossiers->getIdDossier()  )) {
        if($id === 0){
            unset($data["idDossier"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idDossier = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tbldossiers $tbl_Dossiers)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Dossiers->setIdDossier(self::unescape($row->idDossier));
	$tbl_Dossiers->setLienDossier(self::unescape($row->lienDossier));
	$tbl_Dossiers->setTitreDossier(self::unescape($row->titreDossier));
	$tbl_Dossiers->setDateDossier(self::unescape($row->dateDossier));
	$tbl_Dossiers->setTypeDossier(self::unescape($row->typeDossier));
	$tbl_Dossiers->setLienJava(self::unescape($row->lienJava));
	$tbl_Dossiers->setEnligne(self::unescape($row->enligne));
	$tbl_Dossiers->setLienImage(self::unescape($row->lienImage));
	$tbl_Dossiers->setTitreSommaire(self::unescape($row->titreSommaire));
	$tbl_Dossiers->setTexte(self::unescape($row->texte));
	$tbl_Dossiers->setType(self::unescape($row->type));
	return $tbl_Dossiers;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idDossier DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tbldossiers(); 
	    $entry->setIdDossier(self::unescape($row->idDossier));
	    $entry->setLienDossier(self::unescape($row->lienDossier));
	    $entry->setTitreDossier(self::unescape($row->titreDossier));
	    $entry->setDateDossier(self::unescape($row->dateDossier));
	    $entry->setTypeDossier(self::unescape($row->typeDossier));
	    $entry->setLienJava(self::unescape($row->lienJava));
	    $entry->setEnligne(self::unescape($row->enligne));
	    $entry->setLienImage(self::unescape($row->lienImage));
	    $entry->setTitreSommaire(self::unescape($row->titreSommaire));
	    $entry->setTexte(self::unescape($row->texte));
	    $entry->setType(self::unescape($row->type));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    /*
     * Retourne tous les dossiers
     * VERSION OPTIMISÉE
     */
    public function getAllDossiersForIndex()
    {
        $sql = 'SELECT idDossier FROM tbl_Dossiers WHERE enligne = ? ';
        $results = $this->getSqlResults($sql, array(IS_PUBLISHED));
        return $results;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idDossier = ?", $id);
        return $dbTable->delete($where);
    }
}