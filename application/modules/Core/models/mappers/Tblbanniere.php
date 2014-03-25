<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblbanniere
 * @desc TABLE  : tbl_Banniere
 * @file Tblbanniere.php
 * @desc PK     : nomBanniere
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblbanniere
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
            $this->setDbTable("Core_Model_DbTable_Tblbanniere");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblbanniere $tbl_Banniere)
    {
	    
        $data = array(
		"nomBanniere"	=> $tbl_Banniere->getNomBanniere() ,
		"commentaire"	=> $tbl_Banniere->getCommentaire() ,
		"codeBanniere"	=> $tbl_Banniere->getCodeBanniere() ,
		"T_actif"	=> $tbl_Banniere->getT_actif() ,
		"plage_min"	=> $tbl_Banniere->getPlage_min() ,
		"plage_max"	=> $tbl_Banniere->getPlage_max() ,
		"nb_affichages_site"	=> $tbl_Banniere->getNb_affichages_site() ,
		"nb_affichages_forum"	=> $tbl_Banniere->getNb_affichages_forum() ,
		"nb_affichages_jeu"	=> $tbl_Banniere->getNb_affichages_jeu() ,
		"type_affichage"	=> $tbl_Banniere->getType_affichage() ,
		"T_Stat_Clic"	=> $tbl_Banniere->getT_Stat_Clic() ,
		"nb_clics"	=> $tbl_Banniere->getNb_clics() ,
		"url_redirect"	=> $tbl_Banniere->getUrl_redirect() ,
		"format"	=> $tbl_Banniere->getFormat() ,
        );
        $id = (int)$data["nomBanniere"];

        //if (null === ($id = $tbl_Banniere->getNomBanniere()  )) {
        if($id === 0){
            unset($data["nomBanniere"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("nomBanniere = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblbanniere $tbl_Banniere)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Banniere->setNomBanniere(self::unescape($row->nomBanniere));
	$tbl_Banniere->setCommentaire(self::unescape($row->commentaire));
	$tbl_Banniere->setCodeBanniere(self::unescape($row->codeBanniere));
	$tbl_Banniere->setT_actif(self::unescape($row->T_actif));
	$tbl_Banniere->setPlage_min(self::unescape($row->plage_min));
	$tbl_Banniere->setPlage_max(self::unescape($row->plage_max));
	$tbl_Banniere->setNb_affichages_site(self::unescape($row->nb_affichages_site));
	$tbl_Banniere->setNb_affichages_forum(self::unescape($row->nb_affichages_forum));
	$tbl_Banniere->setNb_affichages_jeu(self::unescape($row->nb_affichages_jeu));
	$tbl_Banniere->setType_affichage(self::unescape($row->type_affichage));
	$tbl_Banniere->setT_Stat_Clic(self::unescape($row->T_Stat_Clic));
	$tbl_Banniere->setNb_clics(self::unescape($row->nb_clics));
	$tbl_Banniere->setUrl_redirect(self::unescape($row->url_redirect));
	$tbl_Banniere->setFormat(self::unescape($row->format));
	return $tbl_Banniere;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"nomBanniere DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblbanniere(); 
	    $entry->setNomBanniere(self::unescape($row->nomBanniere));
	    $entry->setCommentaire(self::unescape($row->commentaire));
	    $entry->setCodeBanniere(self::unescape($row->codeBanniere));
	    $entry->setT_actif(self::unescape($row->T_actif));
	    $entry->setPlage_min(self::unescape($row->plage_min));
	    $entry->setPlage_max(self::unescape($row->plage_max));
	    $entry->setNb_affichages_site(self::unescape($row->nb_affichages_site));
	    $entry->setNb_affichages_forum(self::unescape($row->nb_affichages_forum));
	    $entry->setNb_affichages_jeu(self::unescape($row->nb_affichages_jeu));
	    $entry->setType_affichage(self::unescape($row->type_affichage));
	    $entry->setT_Stat_Clic(self::unescape($row->T_Stat_Clic));
	    $entry->setNb_clics(self::unescape($row->nb_clics));
	    $entry->setUrl_redirect(self::unescape($row->url_redirect));
	    $entry->setFormat(self::unescape($row->format));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("nomBanniere = ?", $id);
        return $dbTable->delete($where);
    }
}