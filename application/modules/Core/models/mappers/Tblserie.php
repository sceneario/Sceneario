<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblserie
 * @desc TABLE  : tbl_Serie
 * @file Tblserie.php
 * @desc PK     : idSerie
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblserie extends Core_Model_DbTable_Db
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
            $this->setDbTable("Core_Model_DbTable_Tblserie");
        }
        return $this->_dbTable;
    }

    public function find($id, Core_Model_Tblserie $tbl_Serie)
    {
        $result = $this->getDbTable()->find($id);

        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $tbl_Serie->setIdSerie(self::unescape($row->idSerie));
        $tbl_Serie->setNomSerie(self::unescape($row->nomSerie));
        $tbl_Serie->setComplete(self::unescape($row->complete));
        $tbl_Serie->setNbtomes(self::unescape($row->nbtomes));
        $tbl_Serie->setCommentaire(self::unescape($row->commentaire));
        $tbl_Serie->setInformations(self::unescape($row->informations));
        $tbl_Serie->setIdUnivers(self::unescape($row->idUnivers));
        $tbl_Serie->albums = $this->getAlbums($row->idSerie);
        $tbl_Serie->coloristes = $this->getColoristes($row->idSerie);
        $tbl_Serie->scenaristes = $this->getScenaristes($row->idSerie);
        $tbl_Serie->dessinateurs = $this->getDessinateurs($row->idSerie);
        $tbl_Serie->editeurs = $this->getEditeurs($row->idSerie);
        $tbl_Serie->collections = $this->getCollections($row->idSerie);
        $tbl_Serie->motcles = $this->getMotcles($row->idSerie);
        return $tbl_Serie;
    }

    public function fetchAll($limit = null, $offset = 0, $where = null, $order = null, $full = false)
    {
        $table     = $this->getDbTable();
        $resultSet = $table->fetchAll(
            $table->select()
                ->where($where)
                ->order($order)
                ->limit($limit, $offset)
        );

        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Core_Model_Tblserie();
            $entry->setIdSerie(self::unescape($row->idSerie));
            $entry->setNomSerie(self::unescape($row->nomSerie));
            $entry->setComplete(self::unescape($row->complete));
            $entry->setNbtomes(self::unescape($row->nbtomes));
            $entry->setCommentaire(self::unescape($row->commentaire));
            $entry->setInformations(self::unescape($row->informations));
            $entry->setIdUnivers(self::unescape($row->idUnivers));
            if ($full === true) {
                $entry->albums = $this->getAlbums($row->idSerie);
                $entry->coloristes = $this->getColoristes($row->idSerie);
                $entry->scenaristes = $this->getScenaristes($row->idSerie);
                $entry->dessinateurs = $this->getDessinateurs($row->idSerie);
                $entry->editeurs = $this->getEditeurs($row->idSerie);
                $entry->collections = $this->getCollections($row->idSerie);
                $entry->motcles = $this->getMotcles($row->idSerie);
            }
            $entries[] = $entry;
        }
        return $entries;
    }

    public function getAllSeriesForIndex()
    {
        $sql = 'SELECT idSerie, nomSerie FROM tbl_Serie;';
        $results = $this->getSqlResults($sql);
        return $results;
    }

    private static function unescape ($str){
        return stripslashes($str);
    }

    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idSerie = ?", $id);
        return $dbTable->delete($where);
    }

    public function getAlbums($id) {
        $sql = 'SELECT idAlbum FROM tbl_Album WHERE idSerie = ? ORDER BY CAST(tome as UNSIGNED INTEGER), tome ASC';
        $results = $this->getSqlResults($sql, array($id));

        $albums = array();
        foreach ($results as $result) {
            if (!empty($result->idAlbum)) {
                $mpAlb = new Core_Model_Mapper_Tblalbum();
                $album = $mpAlb->find($result->idAlbum, new Core_Model_Tblalbum);
                if ($album != null) {
                    $albums[] = $album;
                }
            }
        }
        return $albums;
    }

    protected function _getAuteurs($idSerie, $role) {
        $sql = 'SELECT a.idAuteur, a.nomAuteur, a.prenomAuteur
            FROM tbl_Auteurs a
            LEFT JOIN tbl_Auteurs_Albums aa ON a.idAuteur = aa.idAuteur
            WHERE aa.idAlbum IN (SELECT idAlbum FROM tbl_Album WHERE idSerie = ?) AND aa.cdRole = ?
            GROUP BY a.idAuteur
            ORDER BY a.nomAuteur ASC';

        $results = $this->getSqlResults($sql, array($idSerie, $role));
        return $results;
    }

    public function getColoristes($idSerie) {
        return $this->_getAuteurs($idSerie, 'C');
    }

    public function getScenaristes($idSerie) {
        return $this->_getAuteurs($idSerie, 'S');
    }

    public function getDessinateurs($idSerie) {
        return $this->_getAuteurs($idSerie, 'D');
    }

    public function getEditeurs($idSerie) {
        $sql = 'SELECT DISTINCT FKidEditeur FROM tbl_Album a WHERE a.idAlbum IN (SELECT idAlbum FROM tbl_Album WHERE idSerie = ?)';
        $results = $this->getSqlResults($sql, array($idSerie));

        $eds = array();
        $editeurMapper = new Core_Model_Mapper_Tblediteur();
        foreach ($results as $result) {
            if (!empty($result->FKidEditeur)) {
                $e = $editeurMapper->find($result->FKidEditeur, new Core_Model_Tblediteur);
                if (!empty($e)) {
                    $eds[] = $e;
                }
            }
        }
        return $eds;
    }

    public function getCollections($idSerie) {
        $sql = 'SELECT DISTINCT idCollection FROM tbl_Album a WHERE a.idAlbum IN (SELECT idAlbum FROM tbl_Album WHERE idSerie = ?)';
        $results = $this->getSqlResults($sql, array($idSerie));

        $eds = array();
        $collectionMapper = new Core_Model_Mapper_Tblcollections();
        foreach ($results as $result) {
            if (!empty($result->idCollection)) {
                $c = $collectionMapper->find($result->idCollection, new Core_Model_Tblcollections);
                if (!empty($c)) {
                    $eds = $c;
                }
            }
        }
        return $eds;
    }

    public function getMotcles($idSerie) {
        $sql = 'SELECT DISTINCT g.idGenre FROM tbl_Genres g
            LEFT JOIN tbl_Genres_Albums ga ON g.idGenre = ga.idGenre
            WHERE ga.idAlbum IN (SELECT idAlbum FROM tbl_Album WHERE idSerie = ?)
            ORDER BY g.libelle';
        $results = $this->getSqlResults($sql, array($idSerie));

        $eds = array();
        $genreMapper = new Core_Model_Mapper_Tblgenres();
        foreach ($results as $result) {
            if (!empty($result->idGenre)) {
                $g = $genreMapper->find($result->idGenre, new Core_Model_Tblgenres);
                if (!empty($g)) {
                    $eds[] = $g;
                }
            }
        }
        return $eds;
    }
}