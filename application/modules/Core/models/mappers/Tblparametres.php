<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblparametres
 * @desc TABLE  : tbl_Parametres
 * @file Tblparametres.php
 * @desc PK     : nom_param
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblparametres
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
            $this->setDbTable("Core_Model_DbTable_Tblparametres");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblparametres $tbl_Parametres)
    {
	    
        $data = array(
		"nom_param"	=> $tbl_Parametres->getNom_param() ,
		"valeur_param"	=> $tbl_Parametres->getValeur_param() ,
        );
        $id = (int)$data["nom_param"];

        //if (null === ($id = $tbl_Parametres->getNom_param()  )) {
        if($id === 0){
            unset($data["nom_param"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("nom_param = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblparametres $tbl_Parametres)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Parametres->setNom_param(self::unescape($row->nom_param));
	$tbl_Parametres->setValeur_param(self::unescape($row->valeur_param));
	return $tbl_Parametres;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"nom_param DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblparametres(); 
	    $entry->setNom_param(self::unescape($row->nom_param));
	    $entry->setValeur_param(self::unescape($row->valeur_param));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("nom_param = ?", $id);
        return $dbTable->delete($where);
    }
}