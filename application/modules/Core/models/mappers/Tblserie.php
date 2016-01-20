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

        return $this->_assoc($result->current());
    }


    private function _assoc($data)
    {
        $this->series = array();
        $rows         = !is_array($data) ? array($data) : $data;

        foreach ($rows as $row) {
            $tbl_Serie = new Core_Model_Tblserie();
            $tbl_Serie->setIdSerie(self::unescape($row->idSerie));
            $tbl_Serie->setNomSerie(self::unescape($row->nomSerie));
            $tbl_Serie->setComplete(self::unescape($row->complete));
            $tbl_Serie->setNbtomes(self::unescape($row->nbtomes));
            $tbl_Serie->setCommentaire(self::unescape($row->commentaire));
            $tbl_Serie->setInformations(self::unescape($row->informations));
            $tbl_Serie->setIdUnivers(self::unescape($row->idUnivers));

            $this->series[$row->idSerie] = $tbl_Serie;
        }

        $this->_getAlbums();

        if (!is_array($data)) {
            return $this->series[$row->idSerie];
        }
        return $this->series;
    }

    public function fetchAll($limit = null, $offset = 0, $where = null, $order = null, $full = false, $count_only = false)
    {
        $table = $this->getDbTable();

        if ($count_only === true) {
            $rows = $table->fetchAll(
                $table
                    ->select()
                    ->from($table, array('count(*) as c'))
                    ->where($where)
                    ->order($order)
                    ->limit($limit, $offset)
            );
            return (int)$rows[0]->c;
        }

        $resultSet = $table->fetchAll(
            $table->select()
                ->where($where)
                ->order($order)
                ->limit($limit, $offset)
        );

        $tmp = array();
        foreach ($resultSet as $r) {
            $tmp[] = $r;
        }

        return $this->_assoc($tmp);
    }

    public function getAllSeriesForIndex()
    {
        $sql = 'SELECT idSerie, nomSerie FROM tbl_Serie;';
        $results = $this->getSqlResults($sql);
        return $results;
    }

    private static function unescape($str)
    {
        return stripslashes($str);
    }

    public function delete($id){
        $dbTable = $this->getDbTable();
        $where   = $dbTable->getAdapter()->quoteInto("idSerie = ?", $id);
        return $dbTable->delete($where);
    }

    private function _getAlbums()
    {
        $mpAlb  = new Core_Model_Mapper_Tblalbum();
        $albums = $mpAlb->fetchAll(null, 0, 'idSerie IN ('.implode(',', array_keys($this->series)).')', 'CAST(tome as UNSIGNED INTEGER), tome ASC');

        $tmpAuteurs  = array();
        $tmpEditeurs = array();
        $tmpMotCles  = array();
        foreach ($albums as $album) {

            $this->series[$album->getIdSerie()]->albums[] = $album;

            foreach ($album->auteurs as $auteur) {
                if (empty($tmpAuteurs[$album->getIdSerie()]) || !in_array($auteur->getIdAuteur(), $tmpAuteurs[$album->getIdSerie()])) {
                    $tmpAuteurs[$album->getIdSerie()][] = $auteur->getIdAuteur();
                    $this->series[$album->getIdSerie()]->auteurs[] = $auteur;
                    if ($auteur->getDessinateur() == 'O') {
                        $this->series[$album->getIdSerie()]->dessinateurs[] = $auteur;
                    }
                    if ($auteur->getColoriste() == 'O') {
                        $this->series[$album->getIdSerie()]->coloristes[] = $auteur;
                    }
                    if ($auteur->getScenariste() == 'O') {
                        $this->series[$album->getIdSerie()]->scenaristes[] = $auteur;
                    }
                }
            }

            if (empty($tmpEditeurs[$album->getIdSerie()]) || !in_array($album->editeur->getIdEditeur(), $tmpEditeurs[$album->getIdSerie()])) {
                $tmpEditeurs[$album->getIdSerie()][] = $album->editeur->getIdEditeur();
                $this->series[$album->getIdSerie()]->editeurs[] = $album->editeur;
            }

            foreach ($album->motcles as $motcle) {
                if (empty($tmpMotCles[$album->getIdSerie()]) || !in_array($motcle->getIdGenre(), $tmpMotCles[$album->getIdSerie()])) {
                    $tmpMotCles[$album->getIdSerie()][] = $motcle->getIdGenre();
                    $this->series[$album->getIdSerie()]->motcles[] = $motcle;
                }
            }
        }
    }
}