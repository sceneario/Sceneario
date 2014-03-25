<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblconcoursreponses
 * @desc TABLE  : tbl_Concours_Reponses
 * @file Tblconcoursreponses.php
 * @desc PK     : nomConcours
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblconcoursreponses
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
            $this->setDbTable("Core_Model_DbTable_Tblconcoursreponses");
        }
        return $this->_dbTable;
    }
    
    public function save(Core_Model_Tblconcoursreponses $tbl_Concours_Reponses)
    {
	    
        $data = array(
		"nomConcours"	=> $tbl_Concours_Reponses->getNomConcours() ,
		"emailReponse"	=> $tbl_Concours_Reponses->getEmailReponse() ,
		"dateReponse"	=> $tbl_Concours_Reponses->getDateReponse() ,
		"reponse1"	=> $tbl_Concours_Reponses->getReponse1() ,
		"reponse2"	=> $tbl_Concours_Reponses->getReponse2() ,
		"reponse3"	=> $tbl_Concours_Reponses->getReponse3() ,
		"reponse4"	=> $tbl_Concours_Reponses->getReponse4() ,
		"reponse5"	=> $tbl_Concours_Reponses->getReponse5() ,
		"reponse6"	=> $tbl_Concours_Reponses->getReponse6() ,
		"reponse7"	=> $tbl_Concours_Reponses->getReponse7() ,
		"reponse8"	=> $tbl_Concours_Reponses->getReponse8() ,
		"AdrIp"	        => $tbl_Concours_Reponses->getAdrIp() ,
        );
       # $id = (int)$data["nomConcours"];

        //if (null === ($id = $tbl_Concours_Reponses->getNomConcours()  )) {
       # if($id === 0){
       #     unset($data["nomConcours"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        #} else {
       #     //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
        #    return $this->getDbTable()->update($data, array("nomConcours = ?" => $id));
        #}
    } 

    public function find($id, Core_Model_Tblconcoursreponses $tbl_Concours_Reponses)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Concours_Reponses->setNomConcours(self::unescape($row->nomConcours));
	$tbl_Concours_Reponses->setEmailReponse(self::unescape($row->emailReponse));
	$tbl_Concours_Reponses->setDateReponse(self::unescape($row->dateReponse));
	$tbl_Concours_Reponses->setReponse1(self::unescape($row->reponse1));
	$tbl_Concours_Reponses->setReponse2(self::unescape($row->reponse2));
	$tbl_Concours_Reponses->setReponse3(self::unescape($row->reponse3));
	$tbl_Concours_Reponses->setReponse4(self::unescape($row->reponse4));
	$tbl_Concours_Reponses->setReponse5(self::unescape($row->reponse5));
	$tbl_Concours_Reponses->setReponse6(self::unescape($row->reponse6));
	$tbl_Concours_Reponses->setReponse7(self::unescape($row->reponse7));
	$tbl_Concours_Reponses->setReponse8(self::unescape($row->reponse8));
	$tbl_Concours_Reponses->setAdrIp(self::unescape($row->AdrIp));
	return $tbl_Concours_Reponses;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"nomConcours DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblconcoursreponses(); 
	    $entry->setNomConcours(self::unescape($row->nomConcours));
	    $entry->setEmailReponse(self::unescape($row->emailReponse));
	    $entry->setDateReponse(self::unescape($row->dateReponse));
	    $entry->setReponse1(self::unescape($row->reponse1));
	    $entry->setReponse2(self::unescape($row->reponse2));
	    $entry->setReponse3(self::unescape($row->reponse3));
	    $entry->setReponse4(self::unescape($row->reponse4));
	    $entry->setReponse5(self::unescape($row->reponse5));
	    $entry->setReponse6(self::unescape($row->reponse6));
	    $entry->setReponse7(self::unescape($row->reponse7));
	    $entry->setReponse8(self::unescape($row->reponse8));
	    $entry->setAdrIp(self::unescape($row->AdrIp));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("nomConcours = ?", $id);
        return $dbTable->delete($where);
    }
}