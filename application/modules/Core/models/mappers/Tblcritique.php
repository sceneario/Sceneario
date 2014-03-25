<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblcritique
 * @desc TABLE  : tbl_Critique
 * @file Tblcritique.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblcritique extends Core_Model_DbTable_Db
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
            $this->setDbTable("Core_Model_DbTable_Tblcritique");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblcritique $tbl_Critique)
    {
	    
        $data = array(
		"idAlbum"	=> $tbl_Critique->getIdAlbum() ,
		"critique"	=> $tbl_Critique->getCritique() ,
		"active"	=> $tbl_Critique->getActive() ,
		"idInternaute"	=> $tbl_Critique->getIdInternaute() ,
		"FKidAlbum"	=> $tbl_Critique->getFKidAlbum() ,
		"datecreation"	=> $tbl_Critique->getDatecreation() ,
        );
        $id = (int)$data["idAlbum"];

        //if (null === ($id = $tbl_Critique->getIdAlbum()  )) {
        if($id === 0){
            unset($data["idAlbum"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idAlbum = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblcritique $tbl_Critique)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Critique->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Critique->setCritique(self::unescape($row->critique));
	$tbl_Critique->setActive(self::unescape($row->active));
	$tbl_Critique->setIdInternaute(self::unescape($row->idInternaute));
	$tbl_Critique->setFKidAlbum(self::unescape($row->FKidAlbum));
	$tbl_Critique->setDatecreation(self::unescape($row->datecreation));
	return $tbl_Critique;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idAlbum DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblcritique(); 
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setCritique(self::unescape($row->critique));
	    $entry->setActive(self::unescape($row->active));
	    $entry->setIdInternaute(self::unescape($row->idInternaute));
	    $entry->setFKidAlbum(self::unescape($row->FKidAlbum));
	    $entry->setDatecreation(self::unescape($row->datecreation));
            $entries[] = $entry;
        }
        return $entries;
    }

    static public function getCritiquesNumberByRedacteur($r)
    {
        if (empty($r))
            return 0;

        $c = new Core_Model_Mapper_Tblcritique();

        $sql =  'SELECT count(c.idAlbum) AS somme '.
                'FROM tbl_Critique AS c, tbl_Internaute AS i '.
                'WHERE c.idInternaute = i.idInternaute AND i.pseudo = \''.$r.'\'';
        
        $results = $c->getSqlResults($sql, array());
        return $results[0]->somme;
    }
    

    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idAlbum = ?", $id);
        return $dbTable->delete($where);
    }
}