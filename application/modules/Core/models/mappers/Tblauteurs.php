<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblauteurs
 * @desc TABLE  : tbl_Auteurs
 * @file Tblauteurs.php
 * @desc PK     : idAuteur
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblauteurs extends Core_Model_DbTable_Db
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
            $this->setDbTable("Core_Model_DbTable_Tblauteurs");
        }
        return $this->_dbTable;
    }

    public function find($id, Core_Model_Tblauteurs $tbl_Auteurs)
    {
        $result = $this->getDbTable()->find($id);

        if (0 == count($result)) {
            return;
        }

        return $this->assoc($result->current());
    }

    public function assoc($data) {
        $items = array();
        $rows  = !is_array($data) ? array($data) : $data;

        foreach ($rows as $row) {
            $tbl_Auteurs = new Core_Model_Tblauteurs();
            $tbl_Auteurs->setIdAuteur(self::unescape($row->idAuteur));
            $tbl_Auteurs->setNomAuteur(self::unescape($row->nomAuteur));
            $tbl_Auteurs->setPrenomAuteur(self::unescape($row->prenomAuteur));
            $tbl_Auteurs->setAdrWebAuteur(self::unescape($row->adrWebAuteur));
            $tbl_Auteurs->setAdrMailAuteur(self::unescape($row->adrMailAuteur));
            $tbl_Auteurs->setBiographie(self::unescape($row->biographie));
            $tbl_Auteurs->setBibliographie(self::unescape($row->bibliographie));
            $tbl_Auteurs->setScenariste(self::unescape($row->scenariste));
            $tbl_Auteurs->setColoriste(self::unescape($row->coloriste));
            $tbl_Auteurs->setDessinateur(self::unescape($row->dessinateur));
            $tbl_Auteurs->setDateNaissance(self::unescape($row->dateNaissance));
            $tbl_Auteurs->setCoordonnees(self::unescape($row->coordonnees));

            if (!is_array($data)) {
                return $tbl_Auteurs;
            } else {
                $items[] = $tbl_Serie;
            }
        }
        return $items;
    }

    public function fetchAll($limit = null, $offset = 0, $where = null, $order = null, $full = false, $count_only = false)
    {
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll(
            $table->select()
                ->where($where)
                ->order($order)
                ->limit($limit, $offset)
        );

        if ($count_only === true) {
            return count($resultSet);
        }

        $entries   = array();
        foreach ($resultSet as $row) {
            $entries[] = $this->assoc($row);
        }
        return $entries;
    }

    /*
     * Retourne tous les auteurs
     * VERSION OPTIMISÉE
     */
    public function getAllAuteursForIndex()
    {
        $sql = 'SELECT idAuteur FROM tbl_Auteurs';
        $results = $this->getSqlResults($sql, array(true));
        return $results;
    }    

    public function getAuteurAlbums($idAuteur){
        $sql = "SELECT t1.collection, t1.tome, t1.idSerie, t1.titre , t1.idAlbum, t1.isbn, COUNT(DISTINCT t1.idAlbum) as tomes
                FROM tbl_Album t1, tbl_Auteurs_Albums t3, tbl_Auteurs t2
                WHERE t1.idAlbum = t3.idAlbum AND t2.idAuteur = t3.idAuteur AND t2.idAuteur = ?
                        AND t1.enligne = 'O'
                GROUP BY t1.collection
                ORDER BY t1.idAlbum
                LIMIT 0, 8";
        
        $results = $this->getSqlResults($sql, array($idAuteur));
        return $results;
    }
    
    public function getAuteurAlbumPrices($idAuteur)
    {
        $sql ="SELECT DISTINCT t5.idAlbum, t5.collection, t1.annee, t2.nomPrix, t3.nomFestival, t3.lienOpale
              FROM tbl_Albums_Prix t1, tbl_Festival_Prix t2, tbl_Festival t3, tbl_Auteurs_Albums t4, tbl_Album t5
              WHERE t1.idAlbum = t4.idAlbum
                    AND t1.idPrix = t2.idPrix
                    AND t1.idAlbum = t5.idAlbum
                    AND t2.idFestival = t3.idFestival
                    AND t4.idAuteur = ?
              ORDER BY t1.annee";
        
        $results = $this->getSqlResults($sql, array($idAuteur));
        return $results;
    }
    
    public function getAuteurExpos($idAuteur)
    {
        $sql ="SELECT t1.*
	       FROM tbl_Expos t1
	       WHERE t1.enligne = 'O'
               AND  t1.idAuteurs IN ( ? )
	       ORDER BY dateajout DESC";
        
        $results = $this->getSqlResults($sql, array($idAuteur));
        return $results;
    }
    
    public function getAuteurGallery($idAuteur)
    {
        $sql ="SELECT * FROM tbl_Dossiers t1, tbl_Auteurs_Dossier t2
               WHERE t2.idAuteur = ?
                    AND t1.idDossier = t2.idDossier
		    AND t1.enligne = 'O'
                  
               ORDER BY dateDossier DESC";
        
        $results = $this->getSqlResults($sql, array($idAuteur));
        return $results;
    }
    
     
    
    public function getAuteurInterview($idAuteur)
    {
        $sql ="SELECT DISTINCT t1.* FROM tbl_Interviews t1, tbl_Auteurs_Interview t2 
               WHERE t2.idAuteur = ? AND t2.idInterview = t1.idInterview 
                    AND t1.enligne = 'O' ORDER BY t1.dateInterview DESC";
        
        $results = $this->getSqlResults($sql, array($idAuteur));
        return $results;
    }
    
    private static function unescape ($str){
    	return stripslashes($str);
    }
    
    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idAuteur = ?", $id);
        return $dbTable->delete($where);
    }
}