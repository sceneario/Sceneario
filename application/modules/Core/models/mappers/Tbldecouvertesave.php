<?php

/*
 * SCENEARIO.COM
 * Table des dossiers découverte
 * @desc CLASSE : Core_Model_Mapper_Tbldecouvertesave
 * @desc TABLE  : tbl_Decouverte_save
 * @file Tbldecouvertesave.php
 * @desc PK     : idDecouverte
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tbldecouvertesave
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
            $this->setDbTable("Core_Model_DbTable_Tbldecouvertesave");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tbldecouvertesave $tbl_Decouverte_save)
    {
	    
        $data = array(
		"idDecouverte"	=> $tbl_Decouverte_save->getIdDecouverte() ,
		"titreDecouverte"	=> $tbl_Decouverte_save->getTitreDecouverte() ,
		"titreSommaire"	=> $tbl_Decouverte_save->getTitreSommaire() ,
		"dateDecouverte"	=> $tbl_Decouverte_save->getDateDecouverte() ,
		"resumeSommaire"	=> $tbl_Decouverte_save->getResumeSommaire() ,
		"lienAlbum"	=> $tbl_Decouverte_save->getLienAlbum() ,
		"lienAlbumJava"	=> $tbl_Decouverte_save->getLienAlbumJava() ,
		"idAlbum"	=> $tbl_Decouverte_save->getIdAlbum() ,
		"idAuteurs"	=> $tbl_Decouverte_save->getIdAuteurs() ,
		"idConcours"	=> $tbl_Decouverte_save->getIdConcours() ,
		"idInterviews"	=> $tbl_Decouverte_save->getIdInterviews() ,
		"idPreviews"	=> $tbl_Decouverte_save->getIdPreviews() ,
		"idWorks"	=> $tbl_Decouverte_save->getIdWorks() ,
		"idGaleries"	=> $tbl_Decouverte_save->getIdGaleries() ,
		"idExpos"	=> $tbl_Decouverte_save->getIdExpos() ,
		"lienAuteur"	=> $tbl_Decouverte_save->getLienAuteur() ,
		"lienAuteurJava"	=> $tbl_Decouverte_save->getLienAuteurJava() ,
		"lienConcours"	=> $tbl_Decouverte_save->getLienConcours() ,
		"lienConcoursJava"	=> $tbl_Decouverte_save->getLienConcoursJava() ,
		"lienInterview"	=> $tbl_Decouverte_save->getLienInterview() ,
		"lienInterviewJava"	=> $tbl_Decouverte_save->getLienInterviewJava() ,
		"lienCroquis"	=> $tbl_Decouverte_save->getLienCroquis() ,
		"lienCroquisJava"	=> $tbl_Decouverte_save->getLienCroquisJava() ,
		"lienWork"	=> $tbl_Decouverte_save->getLienWork() ,
		"lienWorkJava"	=> $tbl_Decouverte_save->getLienWorkJava() ,
		"lienPreview"	=> $tbl_Decouverte_save->getLienPreview() ,
		"lienPreviewJava"	=> $tbl_Decouverte_save->getLienPreviewJava() ,
		"enligne"	=> $tbl_Decouverte_save->getEnligne() ,
		"textAuteur"	=> $tbl_Decouverte_save->getTextAuteur() ,
		"logoSoleil"	=> $tbl_Decouverte_save->getLogoSoleil() ,
		"type"	=> $tbl_Decouverte_save->getType() ,
        );
        $id = (int)$data["idDecouverte"];

        //if (null === ($id = $tbl_Decouverte_save->getIdDecouverte()  )) {
        if($id === 0){
            unset($data["idDecouverte"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idDecouverte = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tbldecouvertesave $tbl_Decouverte_save)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Decouverte_save->setIdDecouverte(self::unescape($row->idDecouverte));
	$tbl_Decouverte_save->setTitreDecouverte(self::unescape($row->titreDecouverte));
	$tbl_Decouverte_save->setTitreSommaire(self::unescape($row->titreSommaire));
	$tbl_Decouverte_save->setDateDecouverte(self::unescape($row->dateDecouverte));
	$tbl_Decouverte_save->setResumeSommaire(self::unescape($row->resumeSommaire));
	$tbl_Decouverte_save->setLienAlbum(self::unescape($row->lienAlbum));
	$tbl_Decouverte_save->setLienAlbumJava(self::unescape($row->lienAlbumJava));
	$tbl_Decouverte_save->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Decouverte_save->setIdAuteurs(self::unescape($row->idAuteurs));
	$tbl_Decouverte_save->setIdConcours(self::unescape($row->idConcours));
	$tbl_Decouverte_save->setIdInterviews(self::unescape($row->idInterviews));
	$tbl_Decouverte_save->setIdPreviews(self::unescape($row->idPreviews));
	$tbl_Decouverte_save->setIdWorks(self::unescape($row->idWorks));
	$tbl_Decouverte_save->setIdGaleries(self::unescape($row->idGaleries));
	$tbl_Decouverte_save->setIdExpos(self::unescape($row->idExpos));
	$tbl_Decouverte_save->setLienAuteur(self::unescape($row->lienAuteur));
	$tbl_Decouverte_save->setLienAuteurJava(self::unescape($row->lienAuteurJava));
	$tbl_Decouverte_save->setLienConcours(self::unescape($row->lienConcours));
	$tbl_Decouverte_save->setLienConcoursJava(self::unescape($row->lienConcoursJava));
	$tbl_Decouverte_save->setLienInterview(self::unescape($row->lienInterview));
	$tbl_Decouverte_save->setLienInterviewJava(self::unescape($row->lienInterviewJava));
	$tbl_Decouverte_save->setLienCroquis(self::unescape($row->lienCroquis));
	$tbl_Decouverte_save->setLienCroquisJava(self::unescape($row->lienCroquisJava));
	$tbl_Decouverte_save->setLienWork(self::unescape($row->lienWork));
	$tbl_Decouverte_save->setLienWorkJava(self::unescape($row->lienWorkJava));
	$tbl_Decouverte_save->setLienPreview(self::unescape($row->lienPreview));
	$tbl_Decouverte_save->setLienPreviewJava(self::unescape($row->lienPreviewJava));
	$tbl_Decouverte_save->setEnligne(self::unescape($row->enligne));
	$tbl_Decouverte_save->setTextAuteur(self::unescape($row->textAuteur));
	$tbl_Decouverte_save->setLogoSoleil(self::unescape($row->logoSoleil));
	$tbl_Decouverte_save->setType(self::unescape($row->type));
	return $tbl_Decouverte_save;
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
            $entry = new Core_Model_Tbldecouvertesave(); 
	    $entry->setIdDecouverte(self::unescape($row->idDecouverte));
	    $entry->setTitreDecouverte(self::unescape($row->titreDecouverte));
	    $entry->setTitreSommaire(self::unescape($row->titreSommaire));
	    $entry->setDateDecouverte(self::unescape($row->dateDecouverte));
	    $entry->setResumeSommaire(self::unescape($row->resumeSommaire));
	    $entry->setLienAlbum(self::unescape($row->lienAlbum));
	    $entry->setLienAlbumJava(self::unescape($row->lienAlbumJava));
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setIdAuteurs(self::unescape($row->idAuteurs));
	    $entry->setIdConcours(self::unescape($row->idConcours));
	    $entry->setIdInterviews(self::unescape($row->idInterviews));
	    $entry->setIdPreviews(self::unescape($row->idPreviews));
	    $entry->setIdWorks(self::unescape($row->idWorks));
	    $entry->setIdGaleries(self::unescape($row->idGaleries));
	    $entry->setIdExpos(self::unescape($row->idExpos));
	    $entry->setLienAuteur(self::unescape($row->lienAuteur));
	    $entry->setLienAuteurJava(self::unescape($row->lienAuteurJava));
	    $entry->setLienConcours(self::unescape($row->lienConcours));
	    $entry->setLienConcoursJava(self::unescape($row->lienConcoursJava));
	    $entry->setLienInterview(self::unescape($row->lienInterview));
	    $entry->setLienInterviewJava(self::unescape($row->lienInterviewJava));
	    $entry->setLienCroquis(self::unescape($row->lienCroquis));
	    $entry->setLienCroquisJava(self::unescape($row->lienCroquisJava));
	    $entry->setLienWork(self::unescape($row->lienWork));
	    $entry->setLienWorkJava(self::unescape($row->lienWorkJava));
	    $entry->setLienPreview(self::unescape($row->lienPreview));
	    $entry->setLienPreviewJava(self::unescape($row->lienPreviewJava));
	    $entry->setEnligne(self::unescape($row->enligne));
	    $entry->setTextAuteur(self::unescape($row->textAuteur));
	    $entry->setLogoSoleil(self::unescape($row->logoSoleil));
	    $entry->setType(self::unescape($row->type));
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