<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';
require_once APPLICATION_PATH . '/modules/Core/views/helpers/CustomUrl.php';

class BedethequeController extends GlobalController
{
    private $_mapperAlbum ;
    
    public function init()
    {
        parent::init();
        $this->view->headTitle('Bédétèque - ', 'PREPEND');
        $this->_mapperAlbum = new Core_Model_Mapper_Tblalbum();
        $this->view->headMeta()->setName('description', 'Parcourez et découvrez l\'intégrale de la bédéthèque Sceneario.com, ses avis, ses nouveautés, des coups de coeurs, et bien d\'autres...');
        $this->view->headMeta()->setName('keywords', 'Expos BD, Salons BD, Festivals BD');        
        $this->view->headMeta()->setProperty('og:title', 'Bedeteque - Sceneario.com');
        $this->view->headMeta()->setProperty('og:description', 'Parcourez et découvrez l\'intégrale de la bédéthèque Sceneario.com, ses avis, ses nouveautés, des coups de coeurs, et bien d\'autres...');
    }
    
    public function indexAction()
    {
   
        /*
         * Nouveautés
         */
         $this->view->newAlbums = $this->getNewAlbums();
        
       # echo '<pre>';
        #print_r($this->view->newAlbums);
     
        /*
         * Coups de coeur
         */
         $this->view->coupsDeCoeurAlbums = $this->getCoupsdecoeurAlbums();
        //empty set in dev base
       
        
        /*
         * Derniers ajouts
         */
         $this->view->recentAlbums = $this->getRecentAlbums();
         
     #   echo '<pre>';
     #   print_r($this->view->recentAlbums);
        
        /*
         * Les plus vus
         */
         $this->view->mostViewedAlbums = $this->getMostViewedAlbums();
         
         
        $this -> view -> nbAlbums     = $this->view->formatNumber($this->_mapperAlbum->getAlbumsNumber());
        $this -> view -> nbCritiques  = $this->view->formatNumber($this->_mapperAlbum->getCritiquesNumber());
        $this -> view -> nbAuteurs    = $this->view->formatNumber($this->_mapperAlbum->getAuteursNumber());
    }
    
    public function importAction() {
        $request = Zend_Controller_Front::getInstance()->getRequest();

        if ($request->isPost()) {
            $ret = array('message' => 'Nous n\'avons pas pu importé votre ancienne bédéthèque. N\'hésitez pas à nous contacter par <a href="mailto:webmaster@sceneario.com">mail</a>.', 'status' => false);
            $u = new Core_Model_Mapper_TblUserV6();
            if (!empty($_POST['user_id'])) {
                $user = $u->find($_POST['user_id'], new Core_Model_TblUserV6());
                if ($user->getUserid()) {
                    $tmp = new Core_Model_Mapper_TblUsers();
                    $old_user = $tmp->fetchAll(1, array('clause' => 'username = ?', 'params' => $_POST['old_user_id']));
                    if (!empty($_POST['old_user_id']) && isset($old_user[0]) && $old_user[0]->getUserId()) {
                        $id_v5 = $_POST['old_user_id']; // le pseudo ou mail que l'internaute aura indiqué pour son ancienne bdthèque
                        $id_v6 = $user->getUserid(); // l'id de l'internaute authentifié en v6 dans lequel importer la bdthèque.
                        $sql =  'INSERT INTO tbl_users_bdtheque_v6 (user_id, album_id, type) '.
                                '  SELECT \''.$id_v6.'\', idAlbum, elt(etat+1, \'list_my_album\', \'list_album_to_buy\') '.
                                '  FROM tbl_Member_Bdtheque '.
                                '  WHERE user_id = ( '.
                                '    SELECT user_id '.
                                '    FROM tbl_Users '.
                                '    WHERE username = \''.$id_v5.'\' '.
                                '  ) '.
                                '  AND idAlbum NOT IN ( '.
                                '    SELECT album_id '.
                                '    FROM tbl_users_bdtheque_v6 '.
                                '    WHERE user_id = \''.$id_v6.'\' '.
                                '  ); ';
                        $u->query($sql, array());
                        $ret['status'] = true;
                        $ret['message'] = 'Importation effectuée, vous pouvez <a href="/bande-dessinee/bedetheque.html">rafraîchir</a> la page.';
                    } else {
                        $ret['message'] = 'Nous n\'avons pas retrouvé votre compte.';
                    }
                } else {
                    $ret['message'] = 'Nous n\'avons pas pu vous identifier.';
                }
            } else {
                $ret['message'] = 'Veuillez vous authentifier auparavant.';
            }

            if ($request->isXmlHttpRequest()) {
                print json_encode($ret);
                exit;
            }
        }
        return $this->redirect('/bande-dessinee/bedetheque.html');
    }

    public function coupsdecoeurAction()
    {
        $classmtSemaine = $this->_mapperAlbum->getCoupsdecoeurAlbumsOfTheWeek() ;
        $classmtAnnee   = $this->_mapperAlbum->getCoupsdecoeurAlbumsOfTheYear() ;
 
        $utils = new Core_Service_Utilities;
        
        //retourne les infos sur les meilleurs coups de coeurs de la semaine passée
        $albumSemaineData =  array();
        foreach($classmtSemaine as $album){
            $albumSemaineData[] = $utils->getDataForAlbumWhoFails($album->idAlbum) ;
        }
        
        //retourne les infos sur les meilleurs coups de coeurs de l'année
        $albumAnneeData =  array();
        foreach($classmtAnnee as $album){
            $albumAnneeData[]   = $utils->getDataForAlbumWhoFails($album->idAlbum) ;
        }
        
        $this->view->albumWinnerSemaine = $albumSemaineData ;
        $this->view->albumWinnerAnnee   = $albumAnneeData ;
        
        $albumStaff = $this->_mapperAlbum->getCoupsdecoeurAlbumsByStaff();
        
        
       

		/*
         * Script de separation des membres de l'equipe
         * $cdcStaff etant un tableau multidimmensionnel exploitable dans la vue 
         */
        $cdcStaff = array();
        foreach($albumStaff as $k => $a){
            $cdcStaff[$a->pseudo][] = $a ;
        }
        
       
        $this->view->albumStaff = $cdcStaff ;
    }
    
    /*
     * Proxy
     */
    private function getNewAlbums()
    {
         /*
         * REQUETE SQL 
         * SELECT t1.*, t2.nomSerie, t3.histoire
	 * FROM tbl_Histoire t3, tbl_Album t1 
         * LEFT JOIN tbl_Serie t2 
         * ON t1.idSerie = t2.idSerie
	 * WHERE t1.nouveaute = 'O'
         *      AND t1.enligne = 'O'
         *      AND t1.idAlbum = t3.idAlbum
         * ORDER BY t1.date desc
         */
        return $this->_mapperAlbum->assoc($this->_mapperAlbum->getNewAlbums());
    }
    
    private function getCoupsdecoeurAlbums()
    {
         /*
         * Recherche des coups de coeur de l'équipe sceneario
	
         * SELECT t3.pseudo, t1.idAlbum, t1.titre, t1.isbn, 
         * IF(nomSerie is null,t1.collection,nomSerie) as collection, t1.tome, t1.couverture, t1.datecreation 
         * FROM (tbl_Album t1, tbl_Coup_de_coeur, tbl_Internaute t3) 
         * LEFT JOIN tbl_Serie t4 ON t1.idSerie = t4.idSerie 
         * WHERE t1.idAlbum = tbl_Coup_de_coeur.idAlbum AND tbl_Coup_de_coeur.idInternaute = t3.idInternaute 
         * ORDER BY t3.pseudo, collection, t1.tome";
         */
        return $this->_mapperAlbum->assoc($this->_mapperAlbum->getCoupsdecoeurAlbums());
    }
    
    private function getRecentAlbums()
    {
        return $this->_mapperAlbum->assoc($this->_mapperAlbum->getRecentAlbums());
    }
    
    private function getMostViewedAlbums()
    {
        return $this->_mapperAlbum->assoc($this->_mapperAlbum->getMostViewedAlbums());
    }  
    
    /*
     * List les albums
     */
    public function listalbumAction()
    {
        $queryAlbumAparaitre = 'prochaines-parutions' ;
        $typeRequested = $this->getRequest()->getParam('tag');
        $_GET['cleanedTag'] =  $typeRequested;
        $utils = new Core_Service_Utilities();

        switch($typeRequested){
            case 'bedetheque': {
                $this->view->bedetheque = true;
                //si l'utilisateur est connecté
                if (Zend_Registry::isRegistered('currentUserID') || isset($_GET['user'])) {

                    if(isset($_GET['user'])){
                        $currentUserId = (int)$_GET['user'] ;
                        $addUrl = 'user=' . $currentUserId . '&' ;
                        $tblUserMapperV6 = new Core_Model_Mapper_TblUserV6();
                        $userInfos = $tblUserMapperV6->find($currentUserId, new Core_Model_TblUserV6());
                        if($userInfos == null){
                            $this->_redirect($this->view->customUrl(array(), 'accueil'));
                            exit(0);
                        }
                        $this->view->bdtekTile = 'Bédéthèque de ' . $userInfos->getUsername() ;
                    }
                    else{
                        $currentUserId = Zend_Registry::get('currentUserID');
                        $addUrl = '' ;
                        $this->view->bdtekTile = 'Ma bédéthèque';
                    }

                    $addRequest = '';
                    $listBy = 'all' ;
                    if(isset($_GET['listby']) ){
                        $this->view->listBy = $_GET['listby'] ;
                        $listBy =   $_GET['listby'] ;
                        if($listBy == 'all'){
                            $addRequest = '' ;
                        }else{
                            $cleanedListBy = strip_tags($listBy);
                            $addRequest    = ' AND type = "'.$cleanedListBy.'"' ;
                        }
                    }

                    $tblUserBdtekV6 = new Core_Model_Mapper_TblUserBdthequeV6();
                    $this->view->userBedetheque = $tblUserBdtekV6->fetchAll(null,
                                                  array('clause'=> 'user_id = ? ' . $addRequest, 
                                                        'params' => $currentUserId), null);
                    #$albumsData = array();
                    $albums = array();
                    foreach($this->view->userBedetheque as $bd){
                        $albumsData = $this->_mapperAlbum->find($bd->getAlbumid(), new Core_Model_Tblalbum());
                        $album = new stdClass();
                        $album->idAlbum      = $albumsData->getIdAlbum();
                        $album->type         = $bd->getType();
                        $albums[] = $album;
                    } 
              
                }else{
                    $this->_redirect($this->view->customUrl(array(), 'accueil'));
                    exit(0);
                }
                
            }
                break;
            case 'nouveautes': {
                    
                    /*
                     * fetch album du moi a paraitre
                     */
                    $dateREQUESTED = isset($_GET['date']) ? strip_tags( $_GET['date'] ) : date('Y-m');
                    
                    #echo $dateREQUESTED;
                    $clauseEditeur = isset($_GET['editeur']) && $_GET['editeur']!='alleditor' && $_GET['editeur'] != '_DISABLED_'
                                     ? 'AND idEditeur = "' . (int)$_GET['editeur'] . '"' 
                                     : null;
                    /*
                     * SELECTEUR QUI NE BOUGE PAS
                     */
                    $datesAlbums = $this->_mapperAlbum->getDateFromAllAlbum();

                    $formattedDates   = array();
                    $nowDate          = date('Y-m') ;
                    $nowDatePieces = explode(' ' , $this->view->dateFormat( $nowDate , 'month_year'));
                    $formattedDates[date('Y')][$nowDate] = $nowDatePieces[0];

                    foreach($datesAlbums as $date){
                        $datePieces = explode(' ', $this->view->dateFormat( $date->dateParution , 'month_year'));
                        $formattedDates[substr($date->dateParution,0,-3)][$date->dateParution] = $datePieces[0] ;
                    }

                    $this->view->dateSelecteur    = $utils->generateHtmlSelector('date', $formattedDates);

                    $albums = $this->_mapperAlbum->getNewAlbumsLight($dateREQUESTED, $clauseEditeur) ;

                    $editeurSets = array();
                    foreach($albums as $album){
                        $editeurName       = $album->nomEditeur ;
                        $fistChar          = utf8_decode($editeurName[0]) ;
                        $fistChar          = $fistChar == '?' ? 'DIVERS' : $fistChar;
                        $editeurSets[$fistChar][$album->FKidEditeur] = $editeurName ;
                    }
                    ksort($editeurSets, SORT_STRING);
                    #
                    $options = array('alleditor' => 'Tous les &eacute;diteurs');
                    $this->view->editeurSelecteur = $utils->generateHtmlSelector('editeur', $editeurSets, $options);
                }
                break;
            case 'recommandes':
                $albums = $this->_mapperAlbum->getAllRecommandeAlbums() ;
                break;
            case $queryAlbumAparaitre :{
                    $mapperTblServicePress = new Core_Model_Mapper_Tblservicespress;
                    //retourne la plus lointaine date
                    //pour calculer l'interval entre maintenant et les prochaines parutions
                    $optionsReq = array("clause"=>'DATE_FORMAT(dateParution, "%Y-%m") >= DATE_FORMAT(CURRENT_DATE, "%Y-%m")'
                                      , 'params'=>'') ;
                    $tblServicePressNextItem  = $mapperTblServicePress->fetchAll(NULL, $optionsReq ,'dateParution DESC') ;

                    //retourne la premiere
                    //useless
                    //$tblServicePressFirstItem = $mapperTblServicePress->fetchAll(1, array('clause'=>'bloque = ?', 'params'=>'N'), 
                    //                                                             'dateParution ASC') ;

                 #  echo '<pre>';

                    //creation du selecteur de date
                    $nextDate = array();
                    foreach($tblServicePressNextItem as $nextItem){
                        $nextDate[] = $nextItem->getDateParution();
                    }

                    $nextDates = array_unique($nextDate);
                    sort($nextDates);

                    $formattedDates   = array();
                    $nowDate          = date('Y-m') ;

                    $nowDatePieces = explode(' ' , $this->view->dateFormat( $nowDate , 'month_year'));
                    $formattedDates[date('Y')][$nowDate] = $nowDatePieces[0];
                    foreach($nextDates as $date){
                        $datePieces = explode(' ', $this->view->dateFormat( $date , 'month_year'));
                        $formattedDates[substr($date,0,4)][substr($date,0,-3)] = $datePieces[0] ;
                    }

                    $this->view->dateSelecteur = $utils->generateHtmlSelector('date' , $formattedDates) ;

                    //creation du selecteur d'éditeur

                    $editorsIDs = array();
                    foreach($tblServicePressNextItem as $nextItem){
                        $editorsIDs[] = $nextItem->getIdEditeur();
                    }

                    $uEditorsIDs = array_unique($editorsIDs);
                    sort($uEditorsIDs);

                    $mapperEditeur = new Core_Model_Mapper_Tblediteur;
                    $editeurSets   = array();

                    foreach($uEditorsIDs as $id){
                       $editeurInfos      = $mapperEditeur->find($id, new Core_Model_Tblediteur);
                       $editeurName       = $editeurInfos->getNomEditeur() ;
                       $fistChar          = $editeurName[0] ;
                       $editeurSets[$fistChar][$id] = $editeurInfos->getNomEditeur() ;
                    }

                    /*
                     * fetch album du moi a paraitre
                     */
                    $dateREQUESTED = isset($_GET['date']) ? strip_tags( $_GET['date'] ) : date('Y-m');

                    #echo $dateREQUESTED;
                    $clauseEditeur = isset($_GET['editeur']) && $_GET['editeur']!='alleditor'  
                                     ? 'AND idEditeur = "' . (int)$_GET['editeur'] . '"' 
                                     : null;

                    $this->view->albumDuMoisAP = $mapperTblServicePress->fetchAll(NULL, 
                                                                      array('clause'=>'dateParution REGEXP ? ' . $clauseEditeur, 
                                                                            'params'=>$dateREQUESTED), 
                                                                      'dateParution DESC') ;
                    $albums = array();

                    ksort($editeurSets);

                    $options = array('alleditor' => 'Tous les &eacute;diteurs') ;
                    $this->view->editeurSelecteur = $utils->generateHtmlSelector('editeur' , $editeurSets , $options);

                    $resultSet = array();
                    foreach($this->view->albumDuMoisAP as $hit){
                        $hit = (object) $hit ;
                        $result = new stdClass();
                        $result->idAlbum      = '_ALBUM_A_PARAITRE_';
                        $result->isbn         = '';
                        $result->genres       = '';
                        $result->titreSerie   = '' ; //'<a href="'.$this->view->customUrl(array('tag'=> $hit->getListeAuteurs()),'recherche').'"></a> ;//$this->view->dateFormat( $hit->getDateParution() ,'month_year');
                        $result->titreAlbum   = $hit->getNomService();
                        $result->auteurs      = $hit->getListeAuteurs() ;
                        $result->editeur      = $mapperEditeur->find($hit->getIdEditeur(), new Core_Model_Tblediteur)->getNomEditeur() ;//$hit->getIdEditeur();
                        $resultSet[] = $result ;
                    }
                }
                break;
            default:
                $albums = null;
                break;
        }

        $this->view->countOfAlbums = count($albums);

        $albumsData = array();

        if($typeRequested != $queryAlbumAparaitre){
            foreach($albums as $album){
                $albumsData[] =  $utils->getDataForAlbumWhoFails($album->idAlbum);
            }

            $resultSet = array();
            foreach($albumsData as $hit){
                $hit = (object) $hit ;
                $result = new stdClass();
                $result->idAlbum      = $hit->idAlbum;
                $result->isbn         = $hit->isbn;
                $result->genres       = $hit->genres;
                $result->titreSerie   = $hit->titreSerie;
                $result->collection   = $hit->titreSerie;
                $result->titreAlbum   = $hit->titreAlbum;
                $result->titre        = $hit->titreAlbum;
                $result->auteurs      = $this->formatAuteurs($hit, 3);
                $result->editeur      = $hit->editeur;
                if($typeRequested == 'moncompte'){
                    $result->type = $hit->type ;
                }
                $resultSet[] = $result ;
            }
        }

        /*
         * Nombre de resultat
         */
        $this -> view -> countResults  = count($resultSet);

        /*
         * Resultat par page
         */
        $resulsPerPage = isset($_GET['results'])? $_GET['results'] : $_GET['results'] = 20 ;
        $this -> view -> resultsPerPage = $resulsPerPage ;

        /*
         * Page requetée
         */
        $pageRequested = isset($_GET['page']) ? $_GET['page'] : 1 ;
        $this -> view -> pageRequested = $pageRequested;
        /*
         * Init de la pagination puis parametrage
         */
        $paginator     = Zend_Paginator::factory($resultSet);
        $pageRequested = $paginator->setCurrentPageNumber($pageRequested);

        $paginator->setItemCountPerPage($resulsPerPage);

        $this->view->paginator   = $paginator;
        $this->view->type = $typeRequested;
    }

    public function getMonthFr()
    {
        
    }
    /*
     * DOUBLON // FAIRE UN HELPER D ACTION
     */
    private function formatAuteurs($hit, $limit)
    {
        $auteurs = '';
    
        if($hit->scenaristes != ''){
            $auteurs .= $hit->scenaristes  ;
        } 
                    
        if($hit->dessinateurs != ''){
             $auteurs .= ' / ' . $hit->dessinateurs ;
        }

        if($hit->coloristes != ''){
            $auteurs .=  ' / ' . $hit->coloristes ; 
        } 
        
        $auteursPieces = explode(' / ', $auteurs);
        
        
        if(count($auteursPieces) > $limit){
            $formatedAuteurs  = '';
            $i                = 0 ;
            while ($i < $limit) {
                $formatedAuteurs .= $auteursPieces[$i] . ( ($i < $limit-1) ?  ' / ' : ' ' ) ;
                $i++;
            }
            $auteursRestants  = count($auteursPieces)  -  $limit ;
            $formatedAuteurs .= '( + ' . ($auteursRestants) . ' auteur'. ($auteursRestants>1?'s':'') . ' )';
            
            return $formatedAuteurs;
        }
        
        return  $auteurs;
    }
    
    /*
     * 
     */
    public function getAlbumAparaitre($dateInterval1 = null, $dateInterval2 = null ,$editeurClause = null)
    {
        #$requete_where = "AND t2.idEditeur = '$input_editeur'";
	
	#$curdate  = mktime(0 , 0 , 0 , date( "m" ) + $input_dateParution     , 1 , date("Y"));
	#$curdate1 = mktime(0 , 0 , 0 , date( "m" ) + $input_dateParution - 1 , 1 , date("Y"));
	#$curdate2 = mktime(0 , 0 , 0 , date( "m" ) + $input_dateParution + 1 , 1 , date("Y"));
	
        #echo '<pre>';
        $this->_mapperAlbum->getAlbumAparaitre($dateInterval1,$dateInterval2,$editeurClause);
        exit;
        /*
	$requete = "SELECT t1.*, t2.nomEditeur
		    FROM tbl_Services_Press t1, tbl_Editeur t2
		    WHERE t1.dateParution >= '".date("Y-m-d", $curdate)."'
		    AND t1.dateParution < '".date("Y-m-d", $curdate2)."'
		    AND t1.idEditeur = t2.idEditeur
		    $requete_where
		    ORDER BY t1.dateParution, t2.nomEditeur, t1.nomService";
         */

    }
}