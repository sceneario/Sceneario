<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblsondage
 * @desc TABLE  : tbl_Sondage
 * @file Tblsondage.php
 * @desc PK     : idSondage
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblsondage
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
            $this->setDbTable("Core_Model_DbTable_Tblsondage");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblsondage $tbl_Sondage)
    {
	    
        $data = array(
		"idSondage"	=> $tbl_Sondage->getIdSondage() ,
		"question"	=> $tbl_Sondage->getQuestion() ,
		"reponse1"	=> $tbl_Sondage->getReponse1() ,
		"reponse2"	=> $tbl_Sondage->getReponse2() ,
		"reponse3"	=> $tbl_Sondage->getReponse3() ,
		"reponse4"	=> $tbl_Sondage->getReponse4() ,
		"reponse5"	=> $tbl_Sondage->getReponse5() ,
		"reponse6"	=> $tbl_Sondage->getReponse6() ,
		"reponse7"	=> $tbl_Sondage->getReponse7() ,
		"reponse8"	=> $tbl_Sondage->getReponse8() ,
		"type_choix"	=> $tbl_Sondage->getType_choix() ,
		"enligne"	=> $tbl_Sondage->getEnligne() ,
        );
        $id = (int)$data["idSondage"];

        //if (null === ($id = $tbl_Sondage->getIdSondage()  )) {
        if($id === 0){
            unset($data["idSondage"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idSondage = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblsondage $tbl_Sondage)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Sondage->setIdSondage(self::unescape($row->idSondage));
	$tbl_Sondage->setQuestion(self::unescape($row->question));
	$tbl_Sondage->setReponse1(self::unescape($row->reponse1));
	$tbl_Sondage->setReponse2(self::unescape($row->reponse2));
	$tbl_Sondage->setReponse3(self::unescape($row->reponse3));
	$tbl_Sondage->setReponse4(self::unescape($row->reponse4));
	$tbl_Sondage->setReponse5(self::unescape($row->reponse5));
	$tbl_Sondage->setReponse6(self::unescape($row->reponse6));
	$tbl_Sondage->setReponse7(self::unescape($row->reponse7));
	$tbl_Sondage->setReponse8(self::unescape($row->reponse8));
	$tbl_Sondage->setType_choix(self::unescape($row->type_choix));
	$tbl_Sondage->setEnligne(self::unescape($row->enligne));
	return $tbl_Sondage;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idSondage DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblsondage(); 
	    $entry->setIdSondage(self::unescape($row->idSondage));
	    $entry->setQuestion(self::unescape($row->question));
	    $entry->setReponse1(self::unescape($row->reponse1));
	    $entry->setReponse2(self::unescape($row->reponse2));
	    $entry->setReponse3(self::unescape($row->reponse3));
	    $entry->setReponse4(self::unescape($row->reponse4));
	    $entry->setReponse5(self::unescape($row->reponse5));
	    $entry->setReponse6(self::unescape($row->reponse6));
	    $entry->setReponse7(self::unescape($row->reponse7));
	    $entry->setReponse8(self::unescape($row->reponse8));
	    $entry->setType_choix(self::unescape($row->type_choix));
	    $entry->setEnligne(self::unescape($row->enligne));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idSondage = ?", $id);
        return $dbTable->delete($where);
    }
}