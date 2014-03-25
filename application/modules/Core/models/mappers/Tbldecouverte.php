<?php

/*
 * SCENEARIO.COM
 * Table des dossiers découverte
 * @desc CLASSE : Core_Model_Mapper_Tbldecouverte
 * @desc TABLE  : tbl_Decouverte
 * @file Tbldecouverte.php
 * @desc PK     : idDecouverte
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tbldecouverte
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
            $this->setDbTable("Core_Model_DbTable_Tbldecouverte");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tbldecouverte $tbl_Decouverte)
    {
	    
        $data = array(
		"idDecouverte"	=> $tbl_Decouverte->getIdDecouverte() ,
		"titreDecouverte"	=> $tbl_Decouverte->getTitreDecouverte() ,
		"titreSommaire"	=> $tbl_Decouverte->getTitreSommaire() ,
		"dateDecouverte"	=> $tbl_Decouverte->getDateDecouverte() ,
		"resumeSommaire"	=> $tbl_Decouverte->getResumeSommaire() ,
		"idAlbum"	=> $tbl_Decouverte->getIdAlbum() ,
		"idAuteurs"	=> $tbl_Decouverte->getIdAuteurs() ,
		"idConcours"	=> $tbl_Decouverte->getIdConcours() ,
		"idInterviews"	=> $tbl_Decouverte->getIdInterviews() ,
		"idPreviews"	=> $tbl_Decouverte->getIdPreviews() ,
		"idWorks"	=> $tbl_Decouverte->getIdWorks() ,
		"idGaleries"	=> $tbl_Decouverte->getIdGaleries() ,
		"idExpos"	=> $tbl_Decouverte->getIdExpos() ,
		"enligne"	=> $tbl_Decouverte->getEnligne() ,
		"type"	=> $tbl_Decouverte->getType() ,
		"typeDecouverte"	=> $tbl_Decouverte->getTypeDecouverte() ,
        );
        $id = (int)$data["idDecouverte"];

        //if (null === ($id = $tbl_Decouverte->getIdDecouverte()  )) {
        if($id === 0){
            unset($data["idDecouverte"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idDecouverte = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tbldecouverte $tbl_Decouverte)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Decouverte->setIdDecouverte(self::unescape($row->idDecouverte));
	$tbl_Decouverte->setTitreDecouverte(self::unescape($row->titreDecouverte));
	$tbl_Decouverte->setTitreSommaire(self::unescape($row->titreSommaire));
	$tbl_Decouverte->setDateDecouverte(self::unescape($row->dateDecouverte));
	$tbl_Decouverte->setResumeSommaire(self::unescape($row->resumeSommaire));
	$tbl_Decouverte->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Decouverte->setIdAuteurs(self::unescape($row->idAuteurs));
	$tbl_Decouverte->setIdConcours(self::unescape($row->idConcours));
	$tbl_Decouverte->setIdInterviews(self::unescape($row->idInterviews));
	$tbl_Decouverte->setIdPreviews(self::unescape($row->idPreviews));
	$tbl_Decouverte->setIdWorks(self::unescape($row->idWorks));
	$tbl_Decouverte->setIdGaleries(self::unescape($row->idGaleries));
	$tbl_Decouverte->setIdExpos(self::unescape($row->idExpos));
	$tbl_Decouverte->setEnligne(self::unescape($row->enligne));
	$tbl_Decouverte->setType(self::unescape($row->type));
	$tbl_Decouverte->setTypeDecouverte(self::unescape($row->typeDecouverte));
	return $tbl_Decouverte;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idDecouverte DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tbldecouverte(); 
	    $entry->setIdDecouverte(self::unescape($row->idDecouverte));
	    $entry->setTitreDecouverte(self::unescape($row->titreDecouverte));
	    $entry->setTitreSommaire(self::unescape($row->titreSommaire));
	    $entry->setDateDecouverte(self::unescape($row->dateDecouverte));
	    $entry->setResumeSommaire(self::unescape($row->resumeSommaire));
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setIdAuteurs(self::unescape($row->idAuteurs));
	    $entry->setIdConcours(self::unescape($row->idConcours));
	    $entry->setIdInterviews(self::unescape($row->idInterviews));
	    $entry->setIdPreviews(self::unescape($row->idPreviews));
	    $entry->setIdWorks(self::unescape($row->idWorks));
	    $entry->setIdGaleries(self::unescape($row->idGaleries));
	    $entry->setIdExpos(self::unescape($row->idExpos));
	    $entry->setEnligne(self::unescape($row->enligne));
	    $entry->setType(self::unescape($row->type));
	    $entry->setTypeDecouverte(self::unescape($row->typeDecouverte));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idDecouverte = ?", $id);
        return $dbTable->delete($where);
    }
}