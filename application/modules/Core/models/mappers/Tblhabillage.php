<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblhabillage
 * @desc TABLE  : tbl_Habillage
 * @file Tblhabillage.php
 * @desc PK     : idHabillage
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblhabillage
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
            $this->setDbTable("Core_Model_DbTable_Tblhabillage");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblhabillage $tbl_Habillage)
    {
	    
        $data = array(
		"idHabillage"	=> $tbl_Habillage->getIdHabillage() ,
		"nom"	=> $tbl_Habillage->getNom() ,
		"banniere"	=> $tbl_Habillage->getBanniere() ,
		"couleur"	=> $tbl_Habillage->getCouleur() ,
		"actif"	=> $tbl_Habillage->getActif() ,
		"actifDev"	=> $tbl_Habillage->getActifDev() ,
		"portee"	=> $tbl_Habillage->getPortee() ,
		"css"	=> $tbl_Habillage->getCss() ,
        );
        $id = (int)$data["idHabillage"];

        //if (null === ($id = $tbl_Habillage->getIdHabillage()  )) {
        if($id === 0){
            unset($data["idHabillage"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idHabillage = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblhabillage $tbl_Habillage)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Habillage->setIdHabillage(self::unescape($row->idHabillage));
	$tbl_Habillage->setNom(self::unescape($row->nom));
	$tbl_Habillage->setBanniere(self::unescape($row->banniere));
	$tbl_Habillage->setCouleur(self::unescape($row->couleur));
	$tbl_Habillage->setActif(self::unescape($row->actif));
	$tbl_Habillage->setActifDev(self::unescape($row->actifDev));
	$tbl_Habillage->setPortee(self::unescape($row->portee));
	$tbl_Habillage->setCss(self::unescape($row->css));
	return $tbl_Habillage;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idHabillage DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblhabillage(); 
	    $entry->setIdHabillage(self::unescape($row->idHabillage));
	    $entry->setNom(self::unescape($row->nom));
	    $entry->setBanniere(self::unescape($row->banniere));
	    $entry->setCouleur(self::unescape($row->couleur));
	    $entry->setActif(self::unescape($row->actif));
	    $entry->setActifDev(self::unescape($row->actifDev));
	    $entry->setPortee(self::unescape($row->portee));
	    $entry->setCss(self::unescape($row->css));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idHabillage = ?", $id);
        return $dbTable->delete($where);
    }
}