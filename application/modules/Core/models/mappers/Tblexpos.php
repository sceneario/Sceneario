<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblexpos
 * @desc TABLE  : tbl_Expos
 * @file Tblexpos.php
 * @desc PK     : _id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblexpos extends Core_Model_DbTable_Db
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
            $this->setDbTable("Core_Model_DbTable_Tblexpos");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblexpos $tbl_Expos)
    {
	    
        $data = array(
		"_id"	=> $tbl_Expos->get_id() ,
		"idexpo"	=> $tbl_Expos->getIdexpo() ,
		"titre"	=> $tbl_Expos->getTitre() ,
		"sousTitre"	=> $tbl_Expos->getSousTitre() ,
		"annee"	=> $tbl_Expos->getAnnee() ,
		"idAlbums"	=> $tbl_Expos->getIdAlbums() ,
		"idAuteurs"	=> $tbl_Expos->getIdAuteurs() ,
		"idStats"	=> $tbl_Expos->getIdStats() ,
		"date"	=> $tbl_Expos->getDate() ,
		"image"	=> $tbl_Expos->getImage() ,
		"enligne"	=> $tbl_Expos->getEnligne() ,
		"dateajout"	=> $tbl_Expos->getDateajout() ,
        );
        $id = (int)$data["_id"];

        //if (null === ($id = $tbl_Expos->get_id()  )) {
        if($id === 0){
            unset($data["_id"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("_id = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblexpos $tbl_Expos)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Expos->set_id(self::unescape($row->_id));
	$tbl_Expos->setIdexpo(self::unescape($row->idexpo));
	$tbl_Expos->setTitre(self::unescape($row->titre));
	$tbl_Expos->setSousTitre(self::unescape($row->sousTitre));
	$tbl_Expos->setAnnee(self::unescape($row->annee));
	$tbl_Expos->setIdAlbums(self::unescape($row->idAlbums));
	$tbl_Expos->setIdAuteurs(self::unescape($row->idAuteurs));
	$tbl_Expos->setIdStats(self::unescape($row->idStats));
	$tbl_Expos->setDate(self::unescape($row->date));
	$tbl_Expos->setImage(self::unescape($row->image));
	$tbl_Expos->setEnligne(self::unescape($row->enligne));
	$tbl_Expos->setDateajout(self::unescape($row->dateajout));
	return $tbl_Expos;
    }
    

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"_id DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblexpos(); 
	    $entry->set_id(self::unescape($row->_id));
	    $entry->setIdexpo(self::unescape($row->idexpo));
	    $entry->setTitre(self::unescape($row->titre));
	    $entry->setSousTitre(self::unescape($row->sousTitre));
	    $entry->setAnnee(self::unescape($row->annee));
	    $entry->setIdAlbums(self::unescape($row->idAlbums));
	    $entry->setIdAuteurs(self::unescape($row->idAuteurs));
	    $entry->setIdStats(self::unescape($row->idStats));
	    $entry->setDate(self::unescape($row->date));
	    $entry->setImage(self::unescape($row->image));
	    $entry->setEnligne(self::unescape($row->enligne));
	    $entry->setDateajout(self::unescape($row->dateajout));
            $entries[] = $entry;
        }
        return $entries;
    }

    /*
     * Retourne toutes les expos
     * VERSION OPTIMISÉE
     */
    public function getAllExposForIndex()
    {
        $sql = 'SELECT idExpo, annee FROM tbl_Expos WHERE enligne = ? ';
        $results = $this->getSqlResults($sql, array(IS_PUBLISHED));
        return $results;
    }

     public function findExpoByIdExpoAndAnnee($annee, $id)
    {
        $sql = "SELECT * 
                FROM tbl_Expos 
                WHERE enligne = ? AND idexpo = '$id' AND annee = '$annee' "  ;
        
        $results = $this->getSqlResults($sql, array(IS_PUBLISHED));

        return $results ;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("_id = ?", $id);
        return $dbTable->delete($where);
    }
}