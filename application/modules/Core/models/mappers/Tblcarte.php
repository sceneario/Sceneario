<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblcarte
 * @desc TABLE  : tbl_Carte
 * @file Tblcarte.php
 * @desc PK     : idCarte
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblcarte
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
            $this->setDbTable("Core_Model_DbTable_Tblcarte");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblcarte $tbl_Carte)
    {
	    
        $data = array(
		"idCarte"	=> $tbl_Carte->getIdCarte() ,
		"monmail"	=> $tbl_Carte->getMonmail() ,
		"sonmail"	=> $tbl_Carte->getSonmail() ,
		"texte"	=> $tbl_Carte->getTexte() ,
		"nom"	=> $tbl_Carte->getNom() ,
		"vuCarte"	=> $tbl_Carte->getVuCarte() ,
		"clef"	=> $tbl_Carte->getClef() ,
		"nomCarte"	=> $tbl_Carte->getNomCarte() ,
        );
        $id = (int)$data["idCarte"];

        //if (null === ($id = $tbl_Carte->getIdCarte()  )) {
        if($id === 0){
            unset($data["idCarte"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idCarte = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblcarte $tbl_Carte)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Carte->setIdCarte(self::unescape($row->idCarte));
	$tbl_Carte->setMonmail(self::unescape($row->monmail));
	$tbl_Carte->setSonmail(self::unescape($row->sonmail));
	$tbl_Carte->setTexte(self::unescape($row->texte));
	$tbl_Carte->setNom(self::unescape($row->nom));
	$tbl_Carte->setVuCarte(self::unescape($row->vuCarte));
	$tbl_Carte->setClef(self::unescape($row->clef));
	$tbl_Carte->setNomCarte(self::unescape($row->nomCarte));
	return $tbl_Carte;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idCarte DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblcarte(); 
	    $entry->setIdCarte(self::unescape($row->idCarte));
	    $entry->setMonmail(self::unescape($row->monmail));
	    $entry->setSonmail(self::unescape($row->sonmail));
	    $entry->setTexte(self::unescape($row->texte));
	    $entry->setNom(self::unescape($row->nom));
	    $entry->setVuCarte(self::unescape($row->vuCarte));
	    $entry->setClef(self::unescape($row->clef));
	    $entry->setNomCarte(self::unescape($row->nomCarte));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idCarte = ?", $id);
        return $dbTable->delete($where);
    }
}