<?php

/*
 * SCENEARIO.COM
 * Table d''entete des concours
 * @desc CLASSE : Core_Model_Mapper_Tblconcoursent
 * @desc TABLE  : tbl_Concours_Ent
 * @file Tblconcoursent.php
 * @desc PK     : nomConcours
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblconcoursent extends Core_Model_DbTable_Db
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
            $this->setDbTable("Core_Model_DbTable_Tblconcoursent");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblconcoursent $tbl_Concours_Ent)
    {
	    
        $data = array(
		"nomConcours"	=> $tbl_Concours_Ent->getNomConcours() ,
		"libelleConcours"	=> $tbl_Concours_Ent->getLibelleConcours() ,
		"dateDebut"	=> $tbl_Concours_Ent->getDateDebut() ,
		"dateFin"	=> $tbl_Concours_Ent->getDateFin() ,
		"urlminisite"	=> $tbl_Concours_Ent->getUrlminisite() ,
		"idAlbum"	=> $tbl_Concours_Ent->getIdAlbum() ,
		"entete"	=> $tbl_Concours_Ent->getEntete() ,
		"commentaire"	=> $tbl_Concours_Ent->getCommentaire() ,
		"reglement"	=> $tbl_Concours_Ent->getReglement() ,
		"resultats"	=> $tbl_Concours_Ent->getResultats() ,
		"enligne"	=> $tbl_Concours_Ent->getEnligne() ,
        );
        $id = (int)$data["nomConcours"];

        //if (null === ($id = $tbl_Concours_Ent->getNomConcours()  )) {
        if($id === 0){
            unset($data["nomConcours"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("nomConcours = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblconcoursent $tbl_Concours_Ent)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Concours_Ent->setNomConcours(self::unescape($row->nomConcours));
	$tbl_Concours_Ent->setLibelleConcours(self::unescape($row->libelleConcours));
	$tbl_Concours_Ent->setDateDebut(self::unescape($row->dateDebut));
	$tbl_Concours_Ent->setDateFin(self::unescape($row->dateFin));
	$tbl_Concours_Ent->setUrlminisite(self::unescape($row->urlminisite));
	$tbl_Concours_Ent->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Concours_Ent->setEntete(self::unescape($row->entete));
	$tbl_Concours_Ent->setCommentaire(self::unescape($row->commentaire));
	$tbl_Concours_Ent->setReglement(self::unescape($row->reglement));
	$tbl_Concours_Ent->setResultats(self::unescape($row->resultats));
	$tbl_Concours_Ent->setEnligne(self::unescape($row->enligne));
	return $tbl_Concours_Ent;
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
        	
            $entry = new Core_Model_Tblconcoursent(); 
		    $entry->setNomConcours(self::unescape($row->nomConcours));
		    $entry->setLibelleConcours(self::unescape($row->libelleConcours));
		    $entry->setDateDebut(self::unescape($row->dateDebut));
		    $entry->setDateFin(self::unescape($row->dateFin));
		    $entry->setUrlminisite(self::unescape($row->urlminisite));
		    $entry->setIdAlbum(self::unescape($row->idAlbum));
		    $entry->setEntete(self::unescape($row->entete));
		    $entry->setCommentaire(self::unescape($row->commentaire));
		    $entry->setReglement(self::unescape($row->reglement));
		    $entry->setResultats(self::unescape($row->resultats));
		    $entry->setEnligne(self::unescape($row->enligne));
            $entries[] = $entry;
        }
        return $entries;
    }

    public static function getCurrentConcours() {
      $c = new Core_Model_Mapper_Tblconcoursent();
      return $c->fetchAll(
	1,
	array(
	  'clause' => 'enligne = ? AND dateFin >= NOW()',
	  'params' => IS_PUBLISHED
	),
	'dateDebut DESC'
      );
    }

    /*
     * Retourne tous les concours 
     * VERSION OPTIMISÉE
     */
    public function getAllConcoursForIndex()
    {
        $sql = 'SELECT libelleConcours, nomConcours FROM tbl_Concours_Ent WHERE enligne = ? ; ';
        $results = $this->getSqlResults($sql, array(IS_PUBLISHED));
        return $results;
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