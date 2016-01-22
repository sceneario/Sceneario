<?php

/*
 * SCENEARIO.COM
 * Description en cours
 * @desc CLASSE : Core_Model_Mapper_Tblalbum
 * @desc TABLE  : tbl_Album
 * @file Tblalbum.php
 * @desc PK     : idAlbum
 * @author madeforweb <contact@madeforweb.fr>
 * @copyright 2001-2012 sceneario.com 
 * @version 1.0
 */

class Core_Model_Mapper_Tblalbum extends Core_Model_DbTable_Db
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
            $this->setDbTable("Core_Model_DbTable_Tblalbum");
        }
        return $this->_dbTable;
    }

    public function find($id, Core_Model_Tblalbum $tbl_Album)
    {
        $result = $this->getDbTable()->find($id);

        if (0 == count($result)) {
            return;
        }

        return $this->_assoc($result->current());
    }

    private function _assoc($data)
    {
        $this->albums   = array();
        $rows           = !is_array($data) ? array($data) : $data;

        $idsEditeurs    = array();
        foreach ($rows as $row) {
            $tbl_Album = new Core_Model_Tblalbum();
            $tbl_Album->setIdAlbum(self::unescape($row->idAlbum));
            $tbl_Album->setTitre(self::unescape($row->titre));
            $tbl_Album->setCollection(self::unescape($row->collection));
            $tbl_Album->setSousTitre(self::unescape($row->sousTitre));
            $tbl_Album->setTome(self::unescape($row->tome));
            $tbl_Album->setCouverture(self::unescape($row->couverture));
            $tbl_Album->setDroits(self::unescape($row->droits));
            $tbl_Album->setEnligne(self::unescape($row->enligne));
            $tbl_Album->setNouveaute(self::unescape($row->nouveaute));
            $tbl_Album->setFKidEditeur(self::unescape($row->FKidEditeur));
            $tbl_Album->setDatecreation(self::unescape($row->datecreation));
            $tbl_Album->setIdCollection(self::unescape($row->idCollection));
            $tbl_Album->setLienBDNet(self::unescape($row->lienBDNet));
            $tbl_Album->setLienAmazon(self::unescape($row->lienAmazon));
            $tbl_Album->setIdCouv(self::unescape($row->idCouv));
            $tbl_Album->setIsbn(self::unescape($row->isbn));
            $tbl_Album->setExtrait(self::unescape($row->extrait));
            $tbl_Album->setIdSerie(self::unescape($row->idSerie));
            $tbl_Album->setDate(self::unescape($row->date));
            $tbl_Album->setIdUnivers(self::unescape($row->idUnivers));
            $tbl_Album->setPresse(self::unescape($row->presse));
            $tbl_Album->setTopic_id(self::unescape($row->topic_id));
            $tbl_Album->setNbpages(self::unescape($row->nbpages));
            $tbl_Album->setVisites(self::unescape($row->visites));
            $tbl_Album->setVisitesSemaine(self::unescape($row->visitesSemaine));
            $tbl_Album->setRecommande(self::unescape($row->recommande));
            $tbl_Album->setBandeAnnonce(self::unescape($row->bandeAnnonce));

            $tbl_Album->auteurs          = array();
            $tbl_Album->motcles          = array();

            $idsEditeurs[]               = $row->FKidEditeur;
            $this->albums[$row->idAlbum] = $tbl_Album;
        }

        $auteurs     = $this->_getAuteurs();
        $editeurs    = $this->_getEditeurs($idsEditeurs);
        $genres      = $this->_getMotcles();

        foreach ($this->albums as $idAlbum => $album) {
            foreach ($auteurs as $idAuteur => $auteur) {
                if (in_array($idAuteur, $album->idsAuteurs)) {
                    $this->albums[$idAlbum]->auteurs[] = $auteur;
                }
            }
            foreach ($editeurs as $editeur) {
                if ($editeur->getIdEditeur() == $album->getFKidEditeur()) {
                    $this->albums[$idAlbum]->editeur = $editeur;
                }
            }
            foreach ($genres as $idGenre => $genre) {
                if (!empty($album->idsGenres) && in_array($idGenre, $album->idsGenres)) {
                    $this->albums[$idAlbum]->motcles[] = $genre;
                }
            }
        }

        if (!is_array($data)) {
            return $this->albums[$row->idAlbum];
        }

        return $this->albums;
    }

    public function fetchAll($limit = null, $offset = 0, $where = null, $order = null, $full = false, $count_only = false)
    {
        $table     = $this->getDbTable();

        if ($count_only === true) {
            $rows  = $table->fetchAll(
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

    private function _getAuteurs()
    {
        $sql = 'SELECT a.idAuteur, aa.idAlbum
            FROM tbl_Auteurs a
            LEFT JOIN tbl_Auteurs_Albums aa ON a.idAuteur = aa.idAuteur
            WHERE aa.idAlbum IN ('.implode(',', array_keys($this->albums)).')
            ORDER BY a.nomAuteur ASC';

        $results = $this->getSqlResults($sql);

        $auteurs = array();
        if (!empty($results)) {
            $idsAuteurs = array();
            foreach ($results as $result) {
                $idsAuteurs[]                          = $result->idAuteur;
                $this->albums[$result->idAlbum]->idsAuteurs[] = $result->idAuteur;
            }

            $mpAut   = new Core_Model_Mapper_Tblauteurs();
            $rows    = $mpAut->fetchAll(null, 0, 'idAuteur IN ('.implode(',', $idsAuteurs).')');
            foreach ($rows as $row) {
                $auteurs[$row->getIdAuteur()] = $row;
            }
        }
        return $auteurs;
    }

    private function _getEditeurs($idsEditeurs) {
        $mpEditeur = new Core_Model_Mapper_Tblediteur();
        return $mpEditeur->fetchAll(null, array('clause' => 'idEditeur IN (?)', 'params' => $idsEditeurs));
    }

    private function _getMotcles() {
        $sql = 'SELECT DISTINCT g.idGenre, ga.idAlbum
            FROM tbl_Genres g
            LEFT JOIN tbl_Genres_Albums ga ON g.idGenre = ga.idGenre
            WHERE ga.idAlbum IN ('.implode(',', array_keys($this->albums)).')
            ORDER BY g.libelle';
        $results = $this->getSqlResults($sql);

        $genres = array();
        if (!empty($results)) {
            $idsGenres = array();
            foreach ($results as $result) {
                $idsGenres[]                                 = $result->idGenre;
                $this->albums[$result->idAlbum]->idsGenres[] = $result->idGenre;
            }

            $genres = array();
            $mpGenres = new Core_Model_Mapper_Tblgenres();
            $rows = $mpGenres->fetchAll(null, array('clause' => 'idGenre IN (?)', 'params' => $idsGenres));
            foreach ($rows as $row) {
                $genres[$row->getIdGenre()] = $row;
            }
        }

        return $genres;
    }

    /*
     * Retourne le nbre d'album
     */
    public function getAlbumsNumber()
    {
        $sql = "SELECT count(*) AS somme FROM tbl_Album";
        
        $results = $this->getSqlResults($sql, array());
        return $results[0]->somme;
    }
    
    /*
     * Retourne le nbre de critiques
     */
    public function getCritiquesNumber()
    {
        $sql = "SELECT count(*) AS somme FROM tbl_Critique";
        
        $results = $this->getSqlResults($sql, array());
        return $results[0]->somme;
    }
    
    /*
     * Retourne le nbre d'auteurs
     */
    public function getAuteursNumber()
    {
        $sql = "SELECT count(*) AS somme FROM tbl_Auteurs";
        
        $results = $this->getSqlResults($sql, array());
        return $results[0]->somme;
    }
    
      /*
     * Retourne le nbre de series
     */
    public function getSeriesNumber()
    {
        $sql = "SELECT count(*) AS somme FROM tbl_Auteurs";
        
        $results = $this->getSqlResults($sql, array());
        return $results[0]->somme;
    }
    
    
    /*
     * Retourne les infos sur les nouveaux albums
     */
    public function getNewAlbums( $limit = 'LIMIT 0, 20')
    {
        $sql = "SELECT t1.*, t2.nomSerie, t3.histoire 
                FROM tbl_Histoire t3, tbl_Album t1   
                LEFT JOIN tbl_Serie t2 ON t1.idSerie = t2.idSerie
                WHERE t1.nouveaute = ?
                        AND t1.enligne = ?
                        AND t1.idAlbum = t3.idAlbum
                ORDER BY t1.date desc " . $limit;
         
        return $this->_assoc($this->getSqlResults($sql, array(IS_PUBLISHED, IS_PUBLISHED)));
    }
    
    /*
     * Retourne les albums sur une periode donnée
     * 
     * @var string $period date au format Y-m
     */
    public function getNewAlbumsLight($period = null , $clauseEditeur = null)
    {
 
        $sql = "SELECT t1.idAlbum, t2.nomEditeur, t1.FKidEditeur
                FROM tbl_Album t1, tbl_Editeur t2
                WHERE t1.FKidEditeur = t2.idEditeur
                AND DATE_FORMAT(datecreation, '%Y-%m') = '$period'
                $clauseEditeur
                AND t1.enligne = 'O' " ;
        
        $results = $this->getSqlResults($sql, array());
        return $results;
    }
    
    /*
     * Retourne les dates et les editeurs des albums 
     * sauf ceux dont l'année est 1900.
     */
    public function getDateFromAllAlbum()
    {
        $sql = "SELECT DATE_FORMAT(datecreation, '%Y-%m') as dateParution FROM tbl_Album 
                WHERE DATE_FORMAT(datecreation, '%Y') <> '1900' 
                ORDER BY datecreation DESC";
        
        $results = $this->getSqlResults($sql, array());
        return $results;
    }


    /*
     * Retourne tous les albums
     */
    public function getAllAlbums()
    {
        $sql = 'SELECT * FROM tbl_Album WHERE enligne = ? '; //LIMIT 0, 100 
        
        $results = $this->getSqlResults($sql, array(IS_PUBLISHED));
        return $results;
    }
    
    /*
     * Verifie si l'album est recommande
     * @params int $id
     */
     public function checkAlbumRecommande($id)
     {
     	$sql     = 'SELECT * FROM tbl_Decouverte WHERE idAlbum = ? AND enligne = ?  AND typeDecouverte = 3';
     	$results = $this->getSqlResults($sql, array($id, IS_PUBLISHED));
     	if(!null == $results){
     		return true;
     	}
     	return false;
     }
    
    /*
     * Retourne tous les albums recommandés
     */
    public function getAllRecommandeAlbums()
    {
       // $sql = 'SELECT * FROM tbl_Album WHERE enligne = ? AND recommande = 1 ORDER BY date DESC '; //LIMIT 0, 100 
        
        $sql =  "SELECT t1.*
				FROM tbl_Decouverte t1, tbl_Album t2
				WHERE t1.enligne = 'O'
				AND   t1.typeDecouverte = 3
				AND   t1.idAlbum = t2.idAlbum
				AND   t2.enligne = 'O'
				ORDER BY t1.dateDecouverte desc";
        
        $results = $this->getSqlResults($sql, array(IS_PUBLISHED));
        return $results;
    }
    
    /*
     * Retourne tous les albums 
     * VERSION OPTIMISÉE
     */
    public function getAllAlbumsForIndex()
    {
        $sql = 'SELECT idAlbum, collection, titre, tome, isbn , FKidEditeur
                FROM tbl_Album 
                WHERE enligne = ? ; '; //LIMIT 0, 100 
        
        $results = $this->getSqlResults($sql, array(IS_PUBLISHED));
        return $results;
    }
    
    /*
     * Retourne tous le nbre d albums publié
     */
    public function getAlbumCount()
    {
        $sql = 'SELECT count(*) as total FROM tbl_Album WHERE enligne = ? '; //LIMIT 0, 100 
        
        $results = $this->getSqlResults($sql, array(IS_PUBLISHED));
        return $results[0]->total;
    }
    
    /*
     * Retourne les albums coups de coeurs de Sceneario
     */
    public function getCoupsdecoeurAlbums()
    {
        $sql = "SELECT t3.pseudo, t1.*, IF(nomSerie is null,t1.collection,nomSerie) as collection
                FROM (tbl_Album t1, tbl_Coup_de_coeur, tbl_Internaute t3) 
                LEFT JOIN tbl_Serie t4 ON t1.idSerie = t4.idSerie 
                WHERE t1.idAlbum = tbl_Coup_de_coeur.idAlbum AND tbl_Coup_de_coeur.idInternaute = t3.idInternaute 
                ORDER BY t3.pseudo, collection, t1.tome, t1.date desc LIMIT 0, 20";
         
        return $this->_assoc($this->getSqlResults($sql, array(IS_PUBLISHED, IS_PUBLISHED)));
    }
    
    
    /*
     * Retourne les albums coups de coeurs de Sceneario
     * HEBDO
     */
    public function getCoupsdecoeurAlbumsOfTheWeek()
    {
        $week = (int)date('YW') - 1  ; // semaine passéé
       
        $sql = "SELECT COUNT( * ) AS TOTAL, idAlbum
                FROM  `tbl_Coup_de_coeur_Internaute` 
                WHERE semVote =  '".$week."'
                GROUP BY idAlbum
                ORDER BY TOTAL DESC
                LIMIT 0 , 3";
        #echo $sql ;
        $results = $this->getSqlResults($sql, array());
        return $results;
    }
    
    /*
     * Retourne les albums coups de coeurs de Sceneario
     * ANNUEL
     */
    public function getCoupsdecoeurAlbumsOfTheYear()
    {
        #$year = (int)date('Y') ;

        $sql = "SELECT COUNT( * ) AS TOTAL, idAlbum
                FROM  `tbl_Coup_de_coeur_Internaute` 
                WHERE dateVote >= DATE_SUB( CURDATE( ) , INTERVAL 1 YEAR ) 
                GROUP BY idAlbum
                ORDER BY TOTAL DESC 
                LIMIT 0 , 3" ;
        #echo $sql ;
        $results = $this->getSqlResults($sql, array());
        return $results;
    }
    
    /*
     * Retourne les albums coups de coeurs de Sceneario
     */
    public function getCoupsdecoeurAlbumsByStaff()
    {
        $sql = "SELECT t3.pseudo, t1.idAlbum, t1.titre, t1.isbn, IF(nomSerie is null,t1.collection,nomSerie) 
                as collection, t1.tome, t1.couverture, t1.datecreation 
                FROM (tbl_Album t1, tbl_Coup_de_coeur, tbl_Internaute t3) LEFT JOIN tbl_Serie t4 ON t1.idSerie = t4.idSerie 
                WHERE t1.idAlbum = tbl_Coup_de_coeur.idAlbum 
                AND tbl_Coup_de_coeur.idInternaute = t3.idInternaute order by t3.pseudo, collection, t1.tome";
         
        $results = $this->getSqlResults($sql, array(IS_PUBLISHED, IS_PUBLISHED));
        return $results;
    }
    
    /*
     * Retourne les infos sur les derniers ajouts
     */
    public function getRecentAlbums()
    {
        $sql = "SELECT t1.*
                FROM  tbl_Album t1 
                WHERE t1.enligne = ? AND t1.nouveaute = 'N'
                ORDER BY t1.date desc LIMIT 0, 20";
        return $this->_assoc($this->getSqlResults($sql, array(IS_PUBLISHED)));
    }
    
    /*
     * REQUETE TROP GOURMANDE :/
     * elle faillit sur les albums dont le genre n'est pas spécifié
     * Elle est requise par le moteur d'indexation
     */
    public function getInfosAlbums()
    {
        $sql = 'SELECT t2.cdRole, t1.idAlbum , t1.collection, t1.titre, t1.tome, t1.isbn , 
                t1.FKidEditeur , t2.idAuteur,  t3.nomAuteur, t3.prenomAuteur, t4.libelle, t6.*, t7.pseudo
                FROM tbl_Album t1  
                INNER JOIN tbl_Auteurs_Albums t2 
                INNER JOIN tbl_Auteurs t3 
                INNER JOIN tbl_Genres t4   
                INNER JOIN tbl_Genres_Albums t5
                INNER JOIN tbl_Histoire t6
                INNER JOIN tbl_Internaute t7 
                 ON       t2.idAlbum = t1.idAlbum  AND t2.idAuteur = t3.idAuteur 
                AND       t5.idAlbum = t1.idAlbum  AND t4.idGenre = t5.idGenre
                AND       t6.idAlbum = t1.idAlbum  AND t6.idInternaute = t7.idInternaute
                WHERE     t1.enligne = ?         AND t1.idAlbum = 4767 
                GROUP BY  t4.libelle, t2.cdRole, t2.idAuteur, t6.histoire 
                LIMIT 0, 5000  ;' ;
        
        
        $results = $this->getSqlResults($sql, array(IS_PUBLISHED));
        return $results;
    }
    
    /*
     * REQUETE TROP GOURMANDE :/
     * elle faillit sur les albums dont le genre n'est pas spécifié
     * Elle est requise par le moteur d'indexation
     */
    public function getInfosAlbumsForIndex($idAlbum)
    {
        $sql = 'SELECT t2.cdRole, t1.idAlbum , t1.collection, t1.titre, t1.tome, t1.isbn , 
                t1.FKidEditeur , t2.idAuteur,  t3.nomAuteur, t3.prenomAuteur, t4.libelle , 
                t6.prenomEditeur, t6.nomEditeur, t6.adrWebEditeur
                FROM tbl_Album t1  
                INNER JOIN tbl_Auteurs_Albums t2 
                INNER JOIN tbl_Auteurs t3 
                INNER JOIN tbl_Genres t4   
                INNER JOIN tbl_Genres_Albums t5
                INNER JOIN tbl_Editeur t6
                 ON       t2.idAlbum = t1.idAlbum  AND t2.idAuteur = t3.idAuteur 
                AND       t5.idAlbum = t1.idAlbum  AND t4.idGenre = t5.idGenre
                AND       t6.idEditeur = t1.FKidEditeur  
                WHERE     t1.enligne = ?  AND t1.idAlbum = ?       
                GROUP BY  t4.libelle, t2.cdRole, t2.idAuteur 
                ORDER BY t1.date DESC
               ;' ;
                //AND t1.idAlbum = 4767 
                //LIMIT 0, 100;
         
        
        
        $results = $this->getSqlResults($sql, array(IS_PUBLISHED, $idAlbum));
        return $results;
    }
    
    /*
     * Retourne les albums les plus vus
     */
    public function getMostViewedAlbums()
    {
        /*
         $sql = "SELECT t1.idAlbum,
                 FROM tbl_Album t1 
                 WHERE t1.enligne = ?
                 ORDER BY t1.visites desc LIMIT 0, 20";
         
       
         $sql = 'SELECT t1.* FROM tbl_Album t1 
                 INNER JOIN tbl_Genres_Albums t3
                 ON t3.idAlbum = t1.idAlbum 
                 AND t3.idGenre NOT IN (2 , 12 , 86)
                 WHERE t1.enligne = "O" 
                 ORDER BY t1.visites desc LIMIT 0, 20';
         
         $sql = 'SELECT t1.idAlbum, t3.idGenre FROM tbl_Album t1 
                 INNER JOIN tbl_Genres_Albums t3
                 ON t3.idAlbum = t1.idAlbum 
                 AND t1.idAlbum NOT IN ( SELECT t3.idAlbum FROM tbl_Genres_Albums  t3 WHERE t3.idGenre IN (2 , 12 , 86) GROUP BY t3.idAlbum )
                 WHERE t1.enligne = "O" 
                 ORDER BY t1.visites desc LIMIT 0, 20';
         */
         // Requete qui filtre les contenu taggé 
         // Adulte
         // Pornographie
         // Erotique
         $sql = 'SELECT t1.* FROM tbl_Album t1 
                 WHERE t1.enligne = "O" AND t1.idAlbum 
                 NOT IN ( SELECT t3.idAlbum FROM tbl_Genres_Albums  t3 WHERE t3.idGenre IN (2 , 12 , 86) )
                 ORDER BY t1.visites desc LIMIT 0, 20' ;
         /*
         $sql = "SELECT t1.*, t2.nomSerie, t3.histoire
                 FROM tbl_Histoire t3, tbl_Album t1 
                 LEFT JOIN tbl_Serie t2 ON t1.idSerie = t2.idSerie
                 ORDER BY t1.visites desc LIMIT 0, 100";
       /* 
        SELECT t1.idAlbum, t1.visites , t3.idGenre FROM tbl_Album t1 
        INNER JOIN tbl_Genres_Albums t3
        ON t3.idAlbum = t1.idAlbum AND t3.idGenre NOT IN (2, 86)
        WHERE t1.enligne = "O" 
        ORDER BY t1.visites desc LIMIT 0, 20
        */
         
        $results = $this->_assoc($this->getSqlResults($sql, array(IS_PUBLISHED)));
        return $results;
    }
    
    /*
     * Retourne les coloristes de l'album
     */
     public function getAlbumColoristes($idAlbum)
    {
        //@todo implementer requete
         $sql = "SELECT t1.*, t2.nomAuteur, t2.prenomAuteur
                FROM tbl_Auteurs_Albums t1, tbl_Auteurs t2 
                WHERE t1.idAlbum = ? and t1.cdRole = 'C'  
                AND t1.idAuteur = t2.idAuteur";
         
        $results = $this->getSqlResults($sql, array($idAlbum));
        return $results;
    }
    
    /*
     * Retourne les scenaristes de l'album
     */
     public function getAlbumScenaristes($idAlbum)
    {
        //@todo implementer requete
         $sql = "SELECT t1.*, t2.nomAuteur, t2.prenomAuteur 
                FROM tbl_Auteurs_Albums t1, tbl_Auteurs t2 
                WHERE t1.idAlbum = ? and t1.cdRole = 'S' 
                AND t1.idAuteur=t2.idAuteur";
         
        $results = $this->getSqlResults($sql, array($idAlbum));
        return $results;
    }
    
    /*
     * Retourne les dessinateurs de l'album
     */
     public function getAlbumDessinateurs($idAlbum)
    {
        //@todo implementer requete
         $sql = "SELECT t1.*, t2.nomAuteur, t2.prenomAuteur 
                FROM tbl_Auteurs_Albums t1, tbl_Auteurs t2 
                WHERE t1.idAlbum =  ?
                AND t1.cdRole = 'D' AND t1.idAuteur=t2.idAuteur";
         
        $results = $this->getSqlResults($sql, array($idAlbum));
        return $results;
    }

    /*
     * Retourne l'editeur de l'album
     */
     public function getAlbumEditeur($idEditeur)
    {
         $sql = "
            SELECT *
            FROM tbl_Editeur
            WHERE idEditeur = ?
        ";

        $results = $this->getSqlResults($sql, array($idEditeur));
        return $results;
    }

    /*
     * Retourne les mots clés
     */
    public function getAlbumKeywords($idAlbum)
    {
        $sql = "SELECT t1.* FROM tbl_Genres t1, tbl_Genres_Albums t2 
               WHERE t1.idGenre = t2.idGenre 
               AND t2.idAlbum = ? 
               ORDER BY t1.libelle";
        
        $results = $this->getSqlResults($sql, array($idAlbum));
        return $results;
    }
    
    /*
     * retourne le resumé de l'album 
     */
    public function getAlbumExcerpt($idAlbum)
    {
        $sql = "SELECT t1.*, t2.pseudo 
                FROM tbl_Histoire t1, tbl_Internaute t2 
                WHERE t1.idAlbum = ? 
                AND t1.idInternaute = t2.idInternaute";
        
        $results = $this->getSqlResults($sql, array($idAlbum));
        return $results;
    }
    
     /*
     * retourne la critque de l'album 
     */
    public function getAlbumCritic($idAlbum)
    {
        $sql = "SELECT t1.*, t2.pseudo 
                FROM tbl_Critique t1, tbl_Internaute t2 
                WHERE (t1.idAlbum = ?) 
                AND (t1.active = 1) 
                AND t1.idInternaute = t2.idInternaute 
                order by t1.datecreation asc";
        
        $results = $this->getSqlResults($sql, array($idAlbum));
        return $results;
    }
    
    /*
     * Retourne les interview en relation avec l'album/dessinateur/scenariste/coloriste
     */
    public function getAlbumInterview($clauseInterview)
    {
        $sql = "SELECT DISTINCT t1.* 
                FROM tbl_Interviews t1, tbl_Auteurs_Interview t2 
                WHERE t2.idInterview = t1.idInterview AND t1.enligne = 'O' 
                AND  $clauseInterview
                    ORDER BY t1.dateInterview DESC";
        
        $results = $this->getSqlResults($sql, array());
        return $results;
    }
    
    /*
     * Met a jour le nbre de visite de l'album
     */
    public function updateVisitAlbum( $idAlbum )
    {
        $sql = "UPDATE tbl_Album 
                SET visites = visites + 1, visitesSemaine = visitesSemaine + 1 
                WHERE idAlbum =   " . $idAlbum;

        $results = $this->query($sql);
        return $results;
    }
    
    /*
     * Retourne les albums connexes
     */
    public function getAlbumConnexes($idAlbum)
    {
        $albumInfos       = $this->find($idAlbum, new Core_Model_Tblalbum);
        $idSerie          = $albumInfos->getIdSerie();
        $genres           = count($this->getAlbumKeywords($idAlbum) > 0) ? $this->getAlbumKeywords($idAlbum)  : null;
        
        if($genres == null) {
            return null;
        }
        
        $countGenres      = count($genres);
        $clauseConditions = '';
        
       # print_r($genres);
        
        foreach ($genres as $key => $genre) {
            $genreLibelle      = $genre->idGenre ;
            $clauseConditions .= "'$genreLibelle'";
            if ($key < $countGenres-1) {
                $clauseConditions .= ', ';
            }
        }
        
        $sql = "SELECT t2.titre, t2.idAlbum, t2.tome, t2.isbn, t2.collection , t3.libelle ,
                COUNT(t2.idAlbum) as nb 
                FROM tbl_Genres_Albums t1, tbl_Album t2, tbl_Genres t3
		WHERE t1.idAlbum = t2.idAlbum 
		AND t1.idGenre IN ($clauseConditions)
                AND t3.idGenre = t1.idGenre
		AND t2.enligne = 'O' ";
        
        //pas la série
        if ('' !== $idSerie) {
            $sql .= " AND t2.idAlbum 
                      NOT IN ( SELECT idAlbum FROM tbl_Album 
                      WHERE idSerie = ".$idSerie." ) ";
        }
        $sql .= " AND t2.idAlbum != ".$idAlbum." 
                  GROUP BY t2.idAlbum 
                  ORDER by nb DESC LIMIT 0, 4"; //
        
        
        #echo $sql;
        $results = $this->getSqlResults($sql, array());
        return $results;
    }
    
    /*
     * Retourne les albums de la série
     */
    public function getAlbumFullSerie($idSerie)
    {
        $sql = "SELECT * FROM tbl_Album
                WHERE idSerie = ?" ;
        
        $results = $this->getSqlResults($sql, array($idSerie));
        return $results;
    }
    
    
    /*
     * Retourne les albums de la série
     */
    public function getCountAlbumFullSerie($idSerie)
    {   
        if($idSerie !== ''){
            $sql = "SELECT   count(*) as TOTAL FROM tbl_Album
                    WHERE idSerie = ?" ;

            $results = $this->getSqlResults($sql, array($idSerie));
            $results[0]->idSerie = $idSerie ;
            return $results[0];
        }
    }
    
    /*
     * Retourne les infos de la série
     */
    public function getAlbumSerie($idSerie)
    {
        $sql = "SELECT * FROM tbl_Serie
                WHERE idSerie = ?" ;
        
        $results = $this->getSqlResults($sql, array($idSerie));
        return $results;
    }
    
     /*
     * Retourne les infos de la collection
     */
    public function getAlbumCollection($idCollection)
    {
        $sql = "SELECT * FROM tbl_Collections
                WHERE idCollection = ?" ;
        
        $results = $this->getSqlResults($sql, array($idCollection));
        return $results;
    }
    
    public function checkIfAlbumIsCoupDeCoeur($idAlbum)
    {
        $sql = "SELECT count(*) as total FROM tbl_Coup_de_coeur
                WHERE idAlbum = ?" ;
        
        $results = $this->getSqlResults($sql, array($idAlbum));
        return $results;
    }
    
    /*
     * Retourne les albums a paraitre compris dans l'interval de date
     * 
     * @var $dateInterval1
     * @var $dateInterval2
     * @var string $editeur
     */
    public function getAlbumAparaitre($dateInterval1 = null, $dateInterval2 = null, $editeurClause = null)
    {
        if($dateInterval1 == null){
            //$dateInterval1 = NOW(); //CURDATE()
        }
        
        if($dateInterval2 == null){
            //$dateInterval2 = NOW() - 1 mois ;
        }
        
        $sql = "SELECT t1.*, t2.nomEditeur
		FROM tbl_Services_Press t1, tbl_Editeur t2
		WHERE t1.dateParution >= '". $dateInterval1 ."'
		AND   t1.dateParution < '". $dateInterval2 ."'
		AND   t1.idEditeur    = t2.idEditeur
		$editeurClause
		ORDER BY t1.dateParution, t2.nomEditeur, t1.nomService";
        
        $results = $this->getSqlResults($sql, array());
        return $results;
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