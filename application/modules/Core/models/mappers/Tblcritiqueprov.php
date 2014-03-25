<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblcritiqueprov
 * @desc TABLE  : tbl_Critique_Prov
 * @file Tblcritiqueprov.php
 * @desc PK     : idCritique
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblcritiqueprov
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
            $this->setDbTable("Core_Model_DbTable_Tblcritiqueprov");
        }
        return $this->_dbTable;
    }
 
    public function save(Core_Model_Tblcritiqueprov $tbl_Critique_Prov)
    {
	    
        $data = array(
		"idCritique"	=> $tbl_Critique_Prov->getIdCritique() ,
		"idAlbum"	=> $tbl_Critique_Prov->getIdAlbum() ,
		"pseudo"	=> $tbl_Critique_Prov->getPseudo() ,
		"critique"	=> $tbl_Critique_Prov->getCritique() ,
		"datecreation"	=> $tbl_Critique_Prov->getDatecreation() ,
		"adrMail"	=> $tbl_Critique_Prov->getAdrMail() ,
		"T_Valide"	=> $tbl_Critique_Prov->getT_Valide() ,
        );
        $id = (int)$data["idCritique"];

        //if (null === ($id = $tbl_Critique_Prov->getIdCritique()  )) {
        if($id === 0){
            unset($data["idCritique"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idCritique = ?" => $id));
        }
    } 
    
    public function find($id, Core_Model_Tblcritiqueprov $tbl_Critique_Prov)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Critique_Prov->setIdCritique(self::unescape($row->idCritique));
	$tbl_Critique_Prov->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Critique_Prov->setPseudo(self::unescape($row->pseudo));
	$tbl_Critique_Prov->setCritique(self::unescape($row->critique));
	$tbl_Critique_Prov->setDatecreation(self::unescape($row->datecreation));
	$tbl_Critique_Prov->setAdrMail(self::unescape($row->adrMail));
	$tbl_Critique_Prov->setT_Valide(self::unescape($row->T_Valide));
	return $tbl_Critique_Prov;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idCritique DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblcritiqueprov(); 
	    $entry->setIdCritique(self::unescape($row->idCritique));
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setPseudo(self::unescape($row->pseudo));
	    $entry->setCritique(self::unescape($row->critique));
	    $entry->setDatecreation(self::unescape($row->datecreation));
	    $entry->setAdrMail(self::unescape($row->adrMail));
	    $entry->setT_Valide(self::unescape($row->T_Valide));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idCritique = ?", $id);
        return $dbTable->delete($where);
    }
}