<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblalbumprov
 * @desc TABLE  : tbl_Album_Prov
 * @file Tblalbumprov.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblalbumprov
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
            $this->setDbTable("Core_Model_DbTable_Tblalbumprov");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblalbumprov $tbl_Album_Prov)
    {
	    
        $data = array(
		"idAlbum"	=> $tbl_Album_Prov->getIdAlbum() ,
		"titre"	=> $tbl_Album_Prov->getTitre() ,
		"collection"	=> $tbl_Album_Prov->getCollection() ,
		"tome"	=> $tbl_Album_Prov->getTome() ,
		"couverture"	=> $tbl_Album_Prov->getCouverture() ,
		"droits"	=> $tbl_Album_Prov->getDroits() ,
		"datecreation"	=> $tbl_Album_Prov->getDatecreation() ,
		"histoire"	=> $tbl_Album_Prov->getHistoire() ,
		"histoire2"	=> $tbl_Album_Prov->getHistoire2() ,
		"critique"	=> $tbl_Album_Prov->getCritique() ,
		"pseudo"	=> $tbl_Album_Prov->getPseudo() ,
		"dessinateur"	=> $tbl_Album_Prov->getDessinateur() ,
		"scenariste"	=> $tbl_Album_Prov->getScenariste() ,
		"coloriste"	=> $tbl_Album_Prov->getColoriste() ,
		"coupdecoeur"	=> $tbl_Album_Prov->getCoupdecoeur() ,
		"valide"	=> $tbl_Album_Prov->getValide() ,
		"editeur"	=> $tbl_Album_Prov->getEditeur() ,
		"collection_ed"	=> $tbl_Album_Prov->getCollection_ed() ,
		"lienBDNet"	=> $tbl_Album_Prov->getLienBDNet() ,
		"lienAmazon"	=> $tbl_Album_Prov->getLienAmazon() ,
		"idCouv"	=> $tbl_Album_Prov->getIdCouv() ,
		"isbn"	=> $tbl_Album_Prov->getIsbn() ,
		"extrait"	=> $tbl_Album_Prov->getExtrait() ,
		"idInternaute"	=> $tbl_Album_Prov->getIdInternaute() ,
		"idSerie"	=> $tbl_Album_Prov->getIdSerie() ,
		"idType"	=> $tbl_Album_Prov->getIdType() ,
		"idCollection"	=> $tbl_Album_Prov->getIdCollection() ,
		"motsclef"	=> $tbl_Album_Prov->getMotsclef() ,
		"idUnivers"	=> $tbl_Album_Prov->getIdUnivers() ,
		"univers"	=> $tbl_Album_Prov->getUnivers() ,
		"presse"	=> $tbl_Album_Prov->getPresse() ,
		"bandeAnnonce"	=> $tbl_Album_Prov->getBandeAnnonce() ,
        );
        $id = (int)$data["idAlbum"];

        //if (null === ($id = $tbl_Album_Prov->getIdAlbum()  )) {
        if($id === 0){
            unset($data["idAlbum"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("idAlbum = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblalbumprov $tbl_Album_Prov)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Album_Prov->setIdAlbum(self::unescape($row->idAlbum));
	$tbl_Album_Prov->setTitre(self::unescape($row->titre));
	$tbl_Album_Prov->setCollection(self::unescape($row->collection));
	$tbl_Album_Prov->setTome(self::unescape($row->tome));
	$tbl_Album_Prov->setCouverture(self::unescape($row->couverture));
	$tbl_Album_Prov->setDroits(self::unescape($row->droits));
	$tbl_Album_Prov->setDatecreation(self::unescape($row->datecreation));
	$tbl_Album_Prov->setHistoire(self::unescape($row->histoire));
	$tbl_Album_Prov->setHistoire2(self::unescape($row->histoire2));
	$tbl_Album_Prov->setCritique(self::unescape($row->critique));
	$tbl_Album_Prov->setPseudo(self::unescape($row->pseudo));
	$tbl_Album_Prov->setDessinateur(self::unescape($row->dessinateur));
	$tbl_Album_Prov->setScenariste(self::unescape($row->scenariste));
	$tbl_Album_Prov->setColoriste(self::unescape($row->coloriste));
	$tbl_Album_Prov->setCoupdecoeur(self::unescape($row->coupdecoeur));
	$tbl_Album_Prov->setValide(self::unescape($row->valide));
	$tbl_Album_Prov->setEditeur(self::unescape($row->editeur));
	$tbl_Album_Prov->setCollection_ed(self::unescape($row->collection_ed));
	$tbl_Album_Prov->setLienBDNet(self::unescape($row->lienBDNet));
	$tbl_Album_Prov->setLienAmazon(self::unescape($row->lienAmazon));
	$tbl_Album_Prov->setIdCouv(self::unescape($row->idCouv));
	$tbl_Album_Prov->setIsbn(self::unescape($row->isbn));
	$tbl_Album_Prov->setExtrait(self::unescape($row->extrait));
	$tbl_Album_Prov->setIdInternaute(self::unescape($row->idInternaute));
	$tbl_Album_Prov->setIdSerie(self::unescape($row->idSerie));
	$tbl_Album_Prov->setIdType(self::unescape($row->idType));
	$tbl_Album_Prov->setIdCollection(self::unescape($row->idCollection));
	$tbl_Album_Prov->setMotsclef(self::unescape($row->motsclef));
	$tbl_Album_Prov->setIdUnivers(self::unescape($row->idUnivers));
	$tbl_Album_Prov->setUnivers(self::unescape($row->univers));
	$tbl_Album_Prov->setPresse(self::unescape($row->presse));
	$tbl_Album_Prov->setBandeAnnonce(self::unescape($row->bandeAnnonce));
	return $tbl_Album_Prov;
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
            $entry = new Core_Model_Tblalbumprov(); 
	    $entry->setIdAlbum(self::unescape($row->idAlbum));
	    $entry->setTitre(self::unescape($row->titre));
	    $entry->setCollection(self::unescape($row->collection));
	    $entry->setTome(self::unescape($row->tome));
	    $entry->setCouverture(self::unescape($row->couverture));
	    $entry->setDroits(self::unescape($row->droits));
	    $entry->setDatecreation(self::unescape($row->datecreation));
	    $entry->setHistoire(self::unescape($row->histoire));
	    $entry->setHistoire2(self::unescape($row->histoire2));
	    $entry->setCritique(self::unescape($row->critique));
	    $entry->setPseudo(self::unescape($row->pseudo));
	    $entry->setDessinateur(self::unescape($row->dessinateur));
	    $entry->setScenariste(self::unescape($row->scenariste));
	    $entry->setColoriste(self::unescape($row->coloriste));
	    $entry->setCoupdecoeur(self::unescape($row->coupdecoeur));
	    $entry->setValide(self::unescape($row->valide));
	    $entry->setEditeur(self::unescape($row->editeur));
	    $entry->setCollection_ed(self::unescape($row->collection_ed));
	    $entry->setLienBDNet(self::unescape($row->lienBDNet));
	    $entry->setLienAmazon(self::unescape($row->lienAmazon));
	    $entry->setIdCouv(self::unescape($row->idCouv));
	    $entry->setIsbn(self::unescape($row->isbn));
	    $entry->setExtrait(self::unescape($row->extrait));
	    $entry->setIdInternaute(self::unescape($row->idInternaute));
	    $entry->setIdSerie(self::unescape($row->idSerie));
	    $entry->setIdType(self::unescape($row->idType));
	    $entry->setIdCollection(self::unescape($row->idCollection));
	    $entry->setMotsclef(self::unescape($row->motsclef));
	    $entry->setIdUnivers(self::unescape($row->idUnivers));
	    $entry->setUnivers(self::unescape($row->univers));
	    $entry->setPresse(self::unescape($row->presse));
	    $entry->setBandeAnnonce(self::unescape($row->bandeAnnonce));
            $entries[] = $entry;
        }
        return $entries;
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