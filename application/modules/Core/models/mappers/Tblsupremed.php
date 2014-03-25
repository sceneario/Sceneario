<?php

/*
 * SCENEARIO.COM
 * Table des scenar Supreme Dimension
 * @desc CLASSE : Core_Model_Mapper_Tblsupremed
 * @desc TABLE  : tbl_SupremeD
 * @file Tblsupremed.php
 * @desc PK     : idSupremeD
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblsupremed
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
            $this->setDbTable("Core_Model_DbTable_Tblsupremed");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblsupremed $tbl_SupremeD)
    {
	    
        $data = array(
		"idSupremeD"	=> $tbl_SupremeD->getIdSupremeD() ,
		"titreSupremeD"	=> $tbl_SupremeD->getTitreSupremeD() ,
		"titreSommaire"	=> $tbl_SupremeD->getTitreSommaire() ,
		"dateSupremeD"	=> $tbl_SupremeD->getDateSupremeD() ,
		"idAlbum"	=> $tbl_SupremeD->getIdAlbum() ,
		"idAuteurs"	=> $tbl_SupremeD->getIdAuteurs() ,
		"idConcours"	=> $tbl_SupremeD->getIdConcours() ,
		"idInterviews"	=> $tbl_SupremeD->getIdInterviews() ,
		"idPreviews"	=> $tbl_SupremeD->getIdPreviews() ,
		"idWorks"	=> $tbl_SupremeD->getIdWorks() ,
		"idGaleries"	=> $tbl_SupremeD->getIdGaleries() ,
		"idExpos"	=> $tbl_SupremeD->getIdExpos() ,
		"enligne"	=> $tbl_SupremeD->getEnligne() ,
		"textAuteur"	=> $tbl_SupremeD->getTextAuteur() ,
		"logoSoleil"	=> $tbl_SupremeD->getLogoSoleil() ,
		"resumeSommaire"	=> $tbl_SupremeD->getResumeSommaire() ,
		"lienAlbum"	=> $tbl_SupremeD->getLienAlbum() ,
		"lienAlbumJava"	=> $tbl_SupremeD->getLienAlbumJava() ,
		"lienAuteur"	=> $tbl_SupremeD->getLienAuteur() ,
		"lienAuteurJava"	=> $tbl_SupremeD->getLienAuteurJava() ,
		"lienConcours"	=> $tbl_SupremeD->getLienConcours() ,
		"lienConcoursJava"	=> $tbl_SupremeD->getLienConcoursJava() ,
		"lienInterview"	=> $tbl_SupremeD->getLienInterview() ,
		"lienInterviewJava"	=> $tbl_SupremeD->getLienInterviewJava() ,
		"lienCroquis"	=> $tbl_SupremeD->getLienCroquis() ,
		"lienCroquisJava"	=> $tbl_SupremeD->getLienCroquisJava() ,
		"lienWork"	=> $tbl_SupremeD->getLienWork() ,
		"lienWorkJava"	=> $tbl_SupremeD->getLienWorkJava() ,
		"lienPreview"	=> $tbl_SupremeD->getLienPreview() ,
		"lienPreviewJava"	=> $tbl_SupremeD->getLienPreviewJava() ,
        );
        $id = (int)$data["idSupremeD"];

        //if (null === ($id = $tbl_SupremeD->getIdSupremeD()  )) {
        if($id === 0){
            unset($data["idSupremeD"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idSupremeD = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblsupremed $tbl_SupremeD)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_SupremeD->setIdSupremeD(self::unescape($row->idSupremeD));
	$tbl_SupremeD->setTitreSupremeD(self::unescape($row->titreSupremeD));
	$tbl_SupremeD->setTitreSommaire(self::unescape($row->titreSommaire));
	$tbl_SupremeD->setDateSupremeD(self::unescape($row->dateSupremeD));
	$tbl_SupremeD->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_SupremeD->setIdAuteurs(self::unescape($row->idAuteurs));
	$tbl_SupremeD->setIdConcours(self::unescape($row->idConcours));
	$tbl_SupremeD->setIdInterviews(self::unescape($row->idInterviews));
	$tbl_SupremeD->setIdPreviews(self::unescape($row->idPreviews));
	$tbl_SupremeD->setIdWorks(self::unescape($row->idWorks));
	$tbl_SupremeD->setIdGaleries(self::unescape($row->idGaleries));
	$tbl_SupremeD->setIdExpos(self::unescape($row->idExpos));
	$tbl_SupremeD->setEnligne(self::unescape($row->enligne));
	$tbl_SupremeD->setTextAuteur(self::unescape($row->textAuteur));
	$tbl_SupremeD->setLogoSoleil(self::unescape($row->logoSoleil));
	$tbl_SupremeD->setResumeSommaire(self::unescape($row->resumeSommaire));
	$tbl_SupremeD->setLienAlbum(self::unescape($row->lienAlbum));
	$tbl_SupremeD->setLienAlbumJava(self::unescape($row->lienAlbumJava));
	$tbl_SupremeD->setLienAuteur(self::unescape($row->lienAuteur));
	$tbl_SupremeD->setLienAuteurJava(self::unescape($row->lienAuteurJava));
	$tbl_SupremeD->setLienConcours(self::unescape($row->lienConcours));
	$tbl_SupremeD->setLienConcoursJava(self::unescape($row->lienConcoursJava));
	$tbl_SupremeD->setLienInterview(self::unescape($row->lienInterview));
	$tbl_SupremeD->setLienInterviewJava(self::unescape($row->lienInterviewJava));
	$tbl_SupremeD->setLienCroquis(self::unescape($row->lienCroquis));
	$tbl_SupremeD->setLienCroquisJava(self::unescape($row->lienCroquisJava));
	$tbl_SupremeD->setLienWork(self::unescape($row->lienWork));
	$tbl_SupremeD->setLienWorkJava(self::unescape($row->lienWorkJava));
	$tbl_SupremeD->setLienPreview(self::unescape($row->lienPreview));
	$tbl_SupremeD->setLienPreviewJava(self::unescape($row->lienPreviewJava));
	return $tbl_SupremeD;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"idSupremeD DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblsupremed(); 
	    $entry->setIdSupremeD(self::unescape($row->idSupremeD));
	    $entry->setTitreSupremeD(self::unescape($row->titreSupremeD));
	    $entry->setTitreSommaire(self::unescape($row->titreSommaire));
	    $entry->setDateSupremeD(self::unescape($row->dateSupremeD));
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setIdAuteurs(self::unescape($row->idAuteurs));
	    $entry->setIdConcours(self::unescape($row->idConcours));
	    $entry->setIdInterviews(self::unescape($row->idInterviews));
	    $entry->setIdPreviews(self::unescape($row->idPreviews));
	    $entry->setIdWorks(self::unescape($row->idWorks));
	    $entry->setIdGaleries(self::unescape($row->idGaleries));
	    $entry->setIdExpos(self::unescape($row->idExpos));
	    $entry->setEnligne(self::unescape($row->enligne));
	    $entry->setTextAuteur(self::unescape($row->textAuteur));
	    $entry->setLogoSoleil(self::unescape($row->logoSoleil));
	    $entry->setResumeSommaire(self::unescape($row->resumeSommaire));
	    $entry->setLienAlbum(self::unescape($row->lienAlbum));
	    $entry->setLienAlbumJava(self::unescape($row->lienAlbumJava));
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
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idSupremeD = ?", $id);
        return $dbTable->delete($where);
    }
}