<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblinterviews
 * @desc TABLE  : tbl_Interviews
 * @file Tblinterviews.php
 * @desc PK     : idInterview
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblinterviews extends Core_Model_DbTable_Db
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
            $this->setDbTable("Core_Model_DbTable_Tblinterviews");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblinterviews $tbl_Interviews)
    {
	    
        $data = array(
		"idInterview"	=> $tbl_Interviews->getIdInterview() ,
		"titreInterview"	=> $tbl_Interviews->getTitreInterview() ,
		"soustitreInterview"	=> $tbl_Interviews->getSoustitreInterview() ,
		"textInterview"	=> $tbl_Interviews->getTextInterview() ,
		"dateInterview"	=> $tbl_Interviews->getDateInterview() ,
		"lienInterview"	=> $tbl_Interviews->getLienInterview() ,
		"lienJava"	=> $tbl_Interviews->getLienJava() ,
		"titreSommaire"	=> $tbl_Interviews->getTitreSommaire() ,
		"lienImage"	=> $tbl_Interviews->getLienImage() ,
		"Intervieweur"	=> $tbl_Interviews->getIntervieweur() ,
		"enligne"	=> $tbl_Interviews->getEnligne() ,
        );
        $id = (int)$data["idInterview"];

        //if (null === ($id = $tbl_Interviews->getIdInterview()  )) {
        if($id === 0){
            unset($data["idInterview"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idInterview = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblinterviews $tbl_Interviews)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Interviews->setIdInterview(self::unescape($row->idInterview));
	$tbl_Interviews->setTitreInterview(self::unescape($row->titreInterview));
	$tbl_Interviews->setSoustitreInterview(self::unescape($row->soustitreInterview));
	$tbl_Interviews->setTextInterview(self::unescape($row->textInterview));
	$tbl_Interviews->setDateInterview(self::unescape($row->dateInterview));
	$tbl_Interviews->setLienInterview(self::unescape($row->lienInterview));
	$tbl_Interviews->setLienJava(self::unescape($row->lienJava));
	$tbl_Interviews->setTitreSommaire(self::unescape($row->titreSommaire));
	$tbl_Interviews->setLienImage(self::unescape($row->lienImage));
	$tbl_Interviews->setIntervieweur(self::unescape($row->Intervieweur));
	$tbl_Interviews->setEnligne(self::unescape($row->enligne));
	return $tbl_Interviews;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idInterview DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblinterviews(); 
	    $entry->setIdInterview(self::unescape($row->idInterview));
	    $entry->setTitreInterview(self::unescape($row->titreInterview));
	    $entry->setSoustitreInterview(self::unescape($row->soustitreInterview));
	    $entry->setTextInterview(self::unescape($row->textInterview));
	    $entry->setDateInterview(self::unescape($row->dateInterview));
	    $entry->setLienInterview(self::unescape($row->lienInterview));
	    $entry->setLienJava(self::unescape($row->lienJava));
	    $entry->setTitreSommaire(self::unescape($row->titreSommaire));
	    $entry->setLienImage(self::unescape($row->lienImage));
	    $entry->setIntervieweur(self::unescape($row->Intervieweur));
	    $entry->setEnligne(self::unescape($row->enligne));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    /*
     * Retourne le nombre d'interview publié
     * 
     * @return stdclass
     */
    public function getCountInterview()
    {
        $sql = "SELECT count(*) as TOTAL 
                FROM tbl_Interviews 
                WHERE enligne = ?"  ;
        
        $results = $this->getSqlResults($sql, array(IS_PUBLISHED));
        return $results[0]->TOTAL;
    }

    /*
     * Retourne tous les interviews
     * VERSION OPTIMISÉE
     */
    public function getAllInterviewsForIndex()
    {
        $sql = 'SELECT idInterview
                FROM tbl_Interviews 
                WHERE enligne = ? ; ';

        $results = $this->getSqlResults($sql, array(IS_PUBLISHED));
        return $results;
    }    

    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idInterview = ?", $id);
        return $dbTable->delete($where);
    }
}