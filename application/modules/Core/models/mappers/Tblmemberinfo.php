<?php

/*
 * SCENEARIO.COM
 * Table des infos membres
 * @desc CLASSE : Core_Model_Mapper_Tblmemberinfo
 * @desc TABLE  : tbl_Member_Info
 * @file Tblmemberinfo.php
 * @desc PK     : user_id
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblmemberinfo
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
            $this->setDbTable("Core_Model_DbTable_Tblmemberinfo");
        }
        return $this->_dbTable;
    }
    /*
    public function save(Core_Model_Tblmemberinfo $tbl_Member_Info)
    {
	    
        $data = array(
		"user_id"	=> $tbl_Member_Info->getUser_id() ,
		"mail_info"	=> $tbl_Member_Info->getMail_info() ,
		"titre_mail"	=> $tbl_Member_Info->getTitre_mail() ,
		"periodicite"	=> $tbl_Member_Info->getPeriodicite() ,
		"info_parution"	=> $tbl_Member_Info->getInfo_parution() ,
		"info_ligne"	=> $tbl_Member_Info->getInfo_ligne() ,
		"info_news"	=> $tbl_Member_Info->getInfo_news() ,
		"next_mail"	=> $tbl_Member_Info->getNext_mail() ,
		"last_mail"	=> $tbl_Member_Info->getLast_mail() ,
		"info_ligne_editeur"	=> $tbl_Member_Info->getInfo_ligne_editeur() ,
		"info_ligne_auteur"	=> $tbl_Member_Info->getInfo_ligne_auteur() ,
		"info_paru_motcle"	=> $tbl_Member_Info->getInfo_paru_motcle() ,
		"info_ligne_motcle"	=> $tbl_Member_Info->getInfo_ligne_motcle() ,
		"info_paru_editeur"	=> $tbl_Member_Info->getInfo_paru_editeur() ,
		"espace_ludique"	=> $tbl_Member_Info->getEspace_ludique() ,
		"nb_auteurs_visus"	=> $tbl_Member_Info->getNb_auteurs_visus() ,
		"bd_publique"	=> $tbl_Member_Info->getBd_publique() ,
		"nb_couv_visus"	=> $tbl_Member_Info->getNb_couv_visus() ,
		"type_page"	=> $tbl_Member_Info->getType_page() ,
		"theme"	=> $tbl_Member_Info->getTheme() ,
        );
        $id = (int)$data["user_id"];

        //if (null === ($id = $tbl_Member_Info->getUser_id()  )) {
        if($id === 0){
            unset($data["user_id"]);
           
            //$data = $data + array("news_creation_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->insert($data);
        } else {
            //$data = $data + array("news_modification_date" => date("Y-m-d H:i:s"));
            return $this->getDbTable()->update($data, array("user_id = ?" => $id));
        }
    } */

    public function find($id, Core_Model_Tblmemberinfo $tbl_Member_Info)
    {
        $result = $this->getDbTable()->find($id);
       
        if (0 == count($result)) {
            return;
        }
        $row = $result->current(); 
	$tbl_Member_Info->setUser_id(self::unescape($row->user_id));
	$tbl_Member_Info->setMail_info(self::unescape($row->mail_info));
	$tbl_Member_Info->setTitre_mail(self::unescape($row->titre_mail));
	$tbl_Member_Info->setPeriodicite(self::unescape($row->periodicite));
	$tbl_Member_Info->setInfo_parution(self::unescape($row->info_parution));
	$tbl_Member_Info->setInfo_ligne(self::unescape($row->info_ligne));
	$tbl_Member_Info->setInfo_news(self::unescape($row->info_news));
	$tbl_Member_Info->setNext_mail(self::unescape($row->next_mail));
	$tbl_Member_Info->setLast_mail(self::unescape($row->last_mail));
	$tbl_Member_Info->setInfo_ligne_editeur(self::unescape($row->info_ligne_editeur));
	$tbl_Member_Info->setInfo_ligne_auteur(self::unescape($row->info_ligne_auteur));
	$tbl_Member_Info->setInfo_paru_motcle(self::unescape($row->info_paru_motcle));
	$tbl_Member_Info->setInfo_ligne_motcle(self::unescape($row->info_ligne_motcle));
	$tbl_Member_Info->setInfo_paru_editeur(self::unescape($row->info_paru_editeur));
	$tbl_Member_Info->setEspace_ludique(self::unescape($row->espace_ludique));
	$tbl_Member_Info->setNb_auteurs_visus(self::unescape($row->nb_auteurs_visus));
	$tbl_Member_Info->setBd_publique(self::unescape($row->bd_publique));
	$tbl_Member_Info->setNb_couv_visus(self::unescape($row->nb_couv_visus));
	$tbl_Member_Info->setType_page(self::unescape($row->type_page));
	$tbl_Member_Info->setTheme(self::unescape($row->theme));
	return $tbl_Member_Info;
    }

    public function fetchAll($limit = null, $where = null, $order = null)
    {	
    
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll($table->select()
           					->where($where["clause"], $where["params"])
           					->order($order) //"user_id DESC"
           					->limit($limit,0)
                   			);
        
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblmemberinfo(); 
	    $entry->setUser_id(self::unescape($row->user_id));
	    $entry->setMail_info(self::unescape($row->mail_info));
	    $entry->setTitre_mail(self::unescape($row->titre_mail));
	    $entry->setPeriodicite(self::unescape($row->periodicite));
	    $entry->setInfo_parution(self::unescape($row->info_parution));
	    $entry->setInfo_ligne(self::unescape($row->info_ligne));
	    $entry->setInfo_news(self::unescape($row->info_news));
	    $entry->setNext_mail(self::unescape($row->next_mail));
	    $entry->setLast_mail(self::unescape($row->last_mail));
	    $entry->setInfo_ligne_editeur(self::unescape($row->info_ligne_editeur));
	    $entry->setInfo_ligne_auteur(self::unescape($row->info_ligne_auteur));
	    $entry->setInfo_paru_motcle(self::unescape($row->info_paru_motcle));
	    $entry->setInfo_ligne_motcle(self::unescape($row->info_ligne_motcle));
	    $entry->setInfo_paru_editeur(self::unescape($row->info_paru_editeur));
	    $entry->setEspace_ludique(self::unescape($row->espace_ludique));
	    $entry->setNb_auteurs_visus(self::unescape($row->nb_auteurs_visus));
	    $entry->setBd_publique(self::unescape($row->bd_publique));
	    $entry->setNb_couv_visus(self::unescape($row->nb_couv_visus));
	    $entry->setType_page(self::unescape($row->type_page));
	    $entry->setTheme(self::unescape($row->theme));
            $entries[] = $entry;
        }
        return $entries;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("user_id = ?", $id);
        return $dbTable->delete($where);
    }
}