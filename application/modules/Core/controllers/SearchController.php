<?php
// a definir dans la conf apache, pas ici !
//ini_set('memory_limit', '256M');

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

/*
 * Permet la recherche d'album sur le site
 * 
 * @version 1.0
 */
class SearchController extends GlobalController
{
    public function init()
    {
        parent::init();
        $this->view->headTitle('Recherche BD - ', 'PREPEND');
        $this->view->headMeta()->setName('description', 'Recherchez et retrouvez vos BDs, leurs auteurs et ajoutez les à votre bédétèque grâce à Sceneario.com');
        $this->view->headMeta()->setName('keywords', 'Avis BD, auteurs BD, previews BD, interviews auteurs, interviews BD, galeries BD');
        $this->view->headMeta()->setProperty('og:title', 'Recherche BD - Sceneario.com');
        $this->view->headMeta()->setProperty('og:description', 'Recherchez et retrouvez vos BDs, leurs auteurs et ajoutez les à votre bédétèque grâce à Sceneario.com');
    }

    public function indexAction()
    {
        //set_time_limit(0);
        /*
         * Settings
         */
        $limitResult          = 1500 ;
        $requestOperator      = Zend_Search_Lucene_Search_QueryParser::B_AND ;
        /*
         * Indice de recherche floue
         */
        $termsPerQueryLimit   = 256 ;
        $resultPerPageDefault = 20 ;
        /*
         * Chemin vers le dossier d'index
         */
        if(APPLICATION_ENV == 'development'){
            $indexFilePath = CORE_PATH . 'data/sceneario-index-' . APPLICATION_ENV ;
        }else{
            $indexFilePath = CORE_PATH . 'data/sceneario-index-testing' ;
        }
        
        /*
         * Requete utilisateur
         */
        $userRequest   = isset($_GET['tag']) ? stripslashes(strip_tags($_GET['tag'])) : null; //$this->getRequest()->getParam('tag')
        
        $userRequestInSearchField = $userRequest ;
       # echo $userRequestInSearchField ;
        
        /*
         * Si requete null
         * forward vers l'action error avec message générique
         */
        if(null == $userRequest){
            $this->_forward('error');
        }
        
        $userFilter    = isset($_GET['filter']) ? strip_tags($_GET['filter']) : null;
        
        /*
         * On limite le nbre de résultat
         * pour éviter les timeout
         * 150 - Baisser si mauvaise perf
         */
        #$currentResultSetLimit = Zend_Search_Lucene::getResultSetLimit();
        #print_r($currentResultSetLimit);
        Zend_Search_Lucene::setResultSetLimit($limitResult);
        
        /*
         * Besoin pour la pagination
         */
        $_GET['cleanedTag'] = $userRequest ;
        
        /*
         * Nettoyage de la requète utilisateur
         */
        $userRequest = $this->sanitize ($userRequest);
        
        /*
         * Redirection provenant de certaines routes
         * ex: /recherche/tintin
         * sera transformé en :
         * /recherche?tag=tintin
         * 
         * Cela est fait pour réduire le nombre de cas d'url menant à la recherche
         * ainsi faciliter la maintenance
         */
        if($this->getRequest()->getParam('tag')){
            $this->_redirect('/recherche?tag='.$this->getRequest()->getParam('tag'));
        }

        /*
         * On force la recherche associative
         * grace à l'operateur AND
         * Une recherche - tintin casterman - sera comprise comme tintin AND casterman
         * - resultat : seuls les items taggés tintin et casterman sortiront
         */
        #print Zend_Search_Lucene_Search_QueryParser::getDefaultOperator();
        Zend_Search_Lucene_Search_QueryParser::setDefaultOperator($requestOperator);
        
        
  
        /*
         * Si la recherche est complexe, 
         * on cherche la correspondance dans les champs 
         */
        
        
        if(!null == $userFilter){
            $mulipleUserQuery = new Zend_Search_Lucene_Search_Query_MultiTerm();

            switch($userFilter){
                case 'Les auteurs':
                    Zend_Search_Lucene_Search_QueryParser::setDefaultOperator(Zend_Search_Lucene_Search_QueryParser::B_OR);
                    $mulipleUserQuery->addTerm(new Zend_Search_Lucene_Index_Term($userRequest, 'sanitizedScenaristes'),null);
                    $mulipleUserQuery->addTerm(new Zend_Search_Lucene_Index_Term($userRequest, 'sanitizedDessinateurs'),null);
                    $mulipleUserQuery->addTerm(new Zend_Search_Lucene_Index_Term($userRequest, 'sanitizedColoristes'),null);
                    break;
                case 'Les éditeurs':
                    $mulipleUserQuery->addTerm(new Zend_Search_Lucene_Index_Term($userRequest, 'sanitizedEditeur'),true);
                    break;
                case 'ISBN':
                    $mulipleUserQuery->addTerm(new Zend_Search_Lucene_Index_Term($userRequest, 'isbn'),true);
                    break;
                case 'Titre ou série':
                     Zend_Search_Lucene_Search_QueryParser::setDefaultOperator(Zend_Search_Lucene_Search_QueryParser::B_OR);
                    $mulipleUserQuery->addTerm(new Zend_Search_Lucene_Index_Term($userRequest, 'sanitizedTitreSerie'),null);
                    $mulipleUserQuery->addTerm(new Zend_Search_Lucene_Index_Term($userRequest, 'sanitizedTitreAlbum'),null);
                    break;
                case 'Les rédacteurs':
                    $mulipleUserQuery->addTerm(new Zend_Search_Lucene_Index_Term($userRequest, 'sanitizedRedacteurs'),null);
                    break;
            }
            $userRequest = $mulipleUserQuery ;
           #$userRequest = $query->addSubquery($mulipleUserQuery, true) ;
              
        } 
    
        # echo '<pre>';
        # print_r($userRequest);
 
        /*
         * Gestion des exceptions
         */
        try {
             $userQuery = Zend_Search_Lucene_Search_QueryParser::parse($userRequest, 'utf-8');   
         } catch (Zend_Search_Lucene_Search_QueryParserException $e) {
             echo "Query syntax error: " . $e->getMessage() . "\n";
         }
    
       
          
        
        /*
         * Init de l'index
         */
        $index         = Zend_Search_Lucene::open($indexFilePath);
        
        /*
         * Gestion des exceptions
         */
        try {
	    // $hits      = $index->find($userQuery, 'idAlbum', SORT_NUMERIC, SORT_DESC) ;  
	    $hits = $index->find ($userQuery,
			'titreSerieOnly', SORT_REGULAR, SORT_ASC,
			'tome', SORT_NUMERIC, SORT_ASC,
			'titreAlbum', SORT_REGULAR, SORT_ASC
			);  
        } catch (Zend_Search_Lucene_Search_QueryParserException $e) {
            echo "Query syntax error: " . $e->getMessage() . "\n";
            exit;
        }
        
       #  echo '<pre>';
       # print_r($hits[0]);
       # exit();
        
        /*
         * Limitation des recherches floues - defaut à 1024
         */
        //print Zend_Search_Lucene::getTermsPerQueryLimit();
        Zend_Search_Lucene::setTermsPerQueryLimit($termsPerQueryLimit);
        
        #$this->view->hits = $hits;
         
        /*
         * Iteration sur les results
         */
        $resultSet = array();
        foreach($hits as $hit){
            $result = new stdClass();
            $result->idAlbum      = $hit->idAlbum;
            $result->isbn         = $hit->isbn;
            $result->genres       = $hit->genres;
            $result->titreSerie   = $hit->titreSerie;
            $result->titreAlbum   = $hit->titreAlbum;
            $result->auteurs      = $this->formatAuteurs($hit, 3);
            $result->editeur      = $hit->editeur;
            $result->redacteurs   = !empty($hit->redacteurs) ? $hit->redacteurs : '';
            $resultSet[]          = $result;
            
            #echo '<pre>';
            #print_r($hit);
            #exit();
        }
        
       
        
        /*
         * Puis injection dans la vue
         * Ainsi que la requete utilisateur nouvellement formée - intelligible pour l'index ( TEST )
         */
        $this -> view -> resultSet   = $resultSet ; 
        $this -> view -> requeteUser = $userRequestInSearchField ;
        
        /*
         * Deconstruction de la query string
         */
        $currentUrlQueryParts = explode('&' , $this->getRequest()->getRequestUri() ) ;
        
        /*
         * Suppression du dernier item 
         * si celle ci comporte plus de 2 params
         */
        if(count($currentUrlQueryParts) > 2){
            array_pop($currentUrlQueryParts);
        }
        
        /*
         * Reconstruction de la query string 
         * puis injection dans la vue
         */
        $currentUrlQuery = implode('&', $currentUrlQueryParts );
        $this -> view -> currentUrl    = $currentUrlQuery ;
        
        /*
         * Nombre de resultat
         */
        $this -> view -> countResults  = count($resultSet);
        
        /*
         * Resultat par page
         */
        $resulsPerPage = isset($_GET['results'])? $_GET['results'] : $_GET['results'] = $resultPerPageDefault ;
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

        /*USELESS
        $publishedResultSet = array();
        for ($resultId = $startId; $resultId < $endId; $resultId++) {
            $publishedResultSet[$resultId] = array(
                'id'    => $resultSet[$resultId]['id'],
                'score' => $resultSet[$resultId]['score'],
                'doc'   => $index->getDocument($resultSet[$resultId]['id']),
            );
        }
        */
        
        /*
         * Injection de tous les genres triés 
         * par ordre alphabétique dans la vue
         */
        $genresMapper           = new Core_Model_Mapper_Tblgenres;
        $genres                 = $genresMapper -> fetchAll() ;
        foreach($genres as $genre){
            $arrayGenres[] = $genre->getLibelle();
        }
        sort($arrayGenres, SORT_STRING);
        $this -> view -> genres = $arrayGenres;
   
    }
    
    public function errorAction()
    {
        
    }
    
    /*
     * 
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
     * Permet l'autocompletion de la recherche
     * @route search/autoComplete
     * @todo All
     */
    public function autoCompleteAction()
    {
        //
    }
    
    private $_nbreAlbum;
    
    /*
     * Creation ou mise a jour de l'index de recherche
     * 
     * @todo CRON pour mise à jour toutes les nuits
     */
    public function createindexAction()
    {
        
        $this->checkAuth();
        
      
        $mapperAlbum = new Core_Model_Mapper_Tblalbum;
        
        #$indexFilePath = CORE_PATH . 'data/sceneario-index-' . APPLICATION_ENV ;
        #$index = Zend_Search_Lucene::create($indexFilePath);

        $this->_nbreAlbum = $mapperAlbum->getAlbumCount();
        //echo $nbreAlbum;
        //exit;
        #$i = 0 ;
        for($i =  $_GET['itemtoindex'] ; $i > $_GET['itemtoindex'] - 1000 ; $i-- ){
            $this->getAlbumsData($i);
         
        }
        
        $k = $i-1 ;
       

        if(APPLICATION_ENV == 'development'){
              echo '<a href="http://sceneario.dev/search/createIndex?t=ce76a24ff3323bbe61d7eaeb998fcf2f&itemtoindex=' . $k 
              . '&tok='.uniqId().'">NEXT : ' . $k . '</a>' ;
        }
        else{
               echo '<a href="http://v6.sceneario.com/search/createIndex?t=ce76a24ff3323bbe61d7eaeb998fcf2f&itemtoindex=' . $k
              . '&tok='.uniqId().'">NEXT : ' . $k . '</a>' ;
        }
   
    }
    
    
    private function checkAuth()
    {
          //t = ce76a24ff3323bbe61d7eaeb998fcf2f
        
        $this->_helper->layout()->disableLayout();
        Zend_Controller_Front::getInstance()->setParam('noViewRenderer', true);
        
        if(!isset($_GET['t']) OR  $_GET['t'] != md5('sceneario_102012')){
            exit('Acc&egrave;s non authoriz&eacute;');
        }
    }
    
    public function createindexalbumAction()
    {
        $this->checkAuth();
        
        if(!isset($_GET['id']) || $_GET['id'] == ''){
            exit('Vous devez entrer une id');
        }
        
        $idAlbum = (int)$_GET['id'];
        try {
            $this->getAlbumsData($idAlbum);
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }
    
    /*
     * 
     */
    public function getAlbumsData($idAlbum)
    {
        set_time_limit(0);

        if(APPLICATION_ENV == 'development'){
            $indexFilePath = CORE_PATH . 'data/sceneario-index-' . APPLICATION_ENV ;
        }else{
            $indexFilePath = CORE_PATH . 'data/sceneario-index-testing' ;
        }
        
        /*
         * INDEXATION
         */
        if(file_exists($indexFilePath)){
            // Mise a jour de l'index
            $index = Zend_Search_Lucene::open($indexFilePath);
            // Optimisation de l'index.
            //$index->optimize();
        }else{
            // Creation de l'index
            $index = Zend_Search_Lucene::create($indexFilePath);
        }
        

        #DEBUG# $start = microtime(true);
        /***********************************/
        /***********************************/
        /*
         * Pour test l'existence de l'album, on choisit la deuxieme méthode
         * car la premiere ne fonctionne pas sur ts les albums
         */
        $mpAlb        = new Core_Model_Mapper_Tblalbum;
        $albumTMP = $mpAlb->find($idAlbum, new Core_Model_Tblalbum);
        if($albumTMP == null){
            echo 'La base ne contient pas d\'album avec cet ID, Suppression : ' . $idAlbum ;
        }

        /*
         * On verifie l'absence de cet ID dans l'index
         */
        $mulipleUserQuery = new Zend_Search_Lucene_Search_Query_MultiTerm();
        $mulipleUserQuery->addTerm(new Zend_Search_Lucene_Index_Term($albumTMP->getIsbn(), 'isbn'),null);

        $hits  = $index->find($mulipleUserQuery);
        if(count($hits) != 0 ){
            if (isset($_GET['force_update'])) {
                foreach ($hits as $hit) {
                    $index->delete($hit->id);
		    echo '[force_update] Suppression : ' . $idAlbum ."\n";
                }
            } else {
                exit('L\'album est deja indexé');
            }
        }

        unset($albumTMP);
        /***********************************/
        /***********************************/
        
        /*
         * METHODE PREFERÉ CAR FONCTIONNELLE PARTT
         * La requete semble planter sur certains albums
         * Méthode alternative
         */
        if($this->indexData($this->getDataForAlbumWhoFails($idAlbum), $index)){
            exit( 'L’album a bien été indexé');
        }
        
        /*
         * POUR DES RAISON DE SIMPLICATION DU CODE
         * JE MET DE COTÉ CETTE MÉTHODE PLUS OPTIMISÉE
         * MAIS MOINS SOUPLE
         */
        /*
        $albumsData   = $mpAlb->getInfosAlbumsForIndex($idAlbum);
         
        if(!null == $albumsData){

            $datasToIndex = array();      
            $dataToIndex  = array();

            $dataToIndex['dessinateurs'] = '';
            $dataToIndex['coloristes']   = '';
            $dataToIndex['scenaristes']  = '';
            $dataToIndex['genres']       = '' ;

            $idAlbum       = @$albumsData[0]->idAlbum;


            $tome = '';
            if(@$albumsData[0]->tome != ''){
                $tome = ' #' . @$albumsData[0]->tome ;
            }

            $dataToIndex['idAlbum']			=  $idAlbum;
            $dataToIndex['titreAlbum']		=  @$albumsData[0]->titre;
            $dataToIndex['titreSerie']		=  @$albumsData[0]->collection . $tome ;
            $dataToIndex['isbn']			=  @$albumsData[0]->isbn;
            $dataToIndex['titreSerieOnly']	=  @$albumsData[0]->collection;
            $dataToIndex['tome']			=  @$albumsData[0]->tome();

       

            foreach($albumsData as $data){

                if(strstr($dataToIndex['genres'], $data->libelle ) == false){
                    $dataToIndex['genres'] .= $data->libelle . ' / '  ; 
                }

                $d = $data->prenomAuteur . ' ' . $data->nomAuteur ;
                if($data->cdRole == 'D' && strstr($dataToIndex['dessinateurs'], $d ) == false){
                     $dataToIndex['dessinateurs'] .= $d . ' / '; 
                }

                $c = $data->prenomAuteur . ' ' . $data->nomAuteur ;
                if($data->cdRole == 'C' && strstr($dataToIndex['coloristes'], $c ) == false){
                     $dataToIndex['coloristes'] .= $c . ' / '; 
                }

                $s = $data->prenomAuteur . ' ' . $data->nomAuteur;
                if($data->cdRole == 'S' && strstr($dataToIndex['scenaristes'], $s ) == false){
                     $dataToIndex['scenaristes'] .= $s . ' / '; 
                }

                $nomEditeur        = $data->prenomEditeur != '' ? $data->prenomEditeur
                                                                  . ' ' . $data->nomEditeur :
                                                                  $data->nomEditeur ;

                @$dataToIndex['editeur'] = $nomEditeur; 

            }
            
            
            // On supprime les slash de droit et gauche
             
            $dataToIndex['dessinateurs'] = trim($dataToIndex['dessinateurs'], ' / ');
            $dataToIndex['coloristes']   = trim($dataToIndex['coloristes'], ' / ');
            $dataToIndex['scenaristes']  = trim($dataToIndex['scenaristes'], ' / ');
            $dataToIndex['genres']       = trim($dataToIndex['genres'], ' / ');

            if($this->indexData($dataToIndex, $index)){
                echo 'L’album a bien été indexé';
            }

        }else{
            
            
             // La requete semble planter sur certains albums
             // Méthode alternative
            
            if($this->indexData($this->getDataForAlbumWhoFails($idAlbum), $index)){
                echo 'L’album a bien été indexé';
            }
        }
        */
       
    }
    
    /*
     * Index les données issues de la base dans l'index de fichier
     * 
     * @var array $dataToIndex
     * @var object $index
     */
    public function indexData($dataToIndex, $index)
    {
        $doc = new Zend_Search_Lucene_Document();
        
        /*
         * Peuplement de l'object Zend_Search_Lucene_Document
         * avec les données provenant de la base
         */
        foreach($dataToIndex as $key => $val){
            #echo $key , ' ' , $val . '<br />-------------------<br />';
            if($key == 'idAlbum'){
                /*
                 * Les id album ne sont pas indexé 
                 * pour des raisons ergonomiques
                 */
                $doc->addField(Zend_Search_Lucene_Field::unIndexed($key, $val)) ;
            }elseif($key == 'isbn'){
                $doc->addField(Zend_Search_Lucene_Field::keyword($key, $val)) ;
            }
            else{
                $doc->addField(Zend_Search_Lucene_Field::Text($key, $val, 'UTF-8')) ;
            }
        }
        /*
         * On enregistre l'object précedemment peuplé
         */
        $index->addDocument($doc); // renvoie null :(
        return true;
    }
    
    /*
     * Methode utilisé lorsque l'album n'est pas trouvable
     * avec la requete optimisé.
     * 
     * @var $idAlbum
     * @return array
     */
    public function getDataForAlbumWhoFails ( $idAlbum )
    {
        /*
         * Init du mapper Album
         * qui contient les méthodes de transactions SQL
         */
        $mpAlb        = new Core_Model_Mapper_Tblalbum;
        
        /*
         * Retourne les infos album sous forme
         * d'object Core_Model_Tblalbum
         */
        $albumsData   = $mpAlb->find($idAlbum, new Core_Model_Tblalbum);

        /*
         * Si null, l'album n'existe vraiment pas
         * on retourne false
         */
        if($albumsData == null){
            return false ;
        }
        
        /*
         * Init du tableau qui sera retourné
         */
        $dataToIndex   = array();

        $editeurMapper = new Core_Model_Mapper_Tblediteur();
        $editeurInfos  = $editeurMapper->find($albumsData->getFKidEditeur(), new Core_Model_Tblediteur);
        $tome = '';
        if($albumsData->getTome() != ''){
            $tome = ' #' . $albumsData->getTome() ;
        }

        $dataToIndex['idAlbum']				=  $idAlbum;
        $dataToIndex['titreAlbum']			=  $albumsData->getTitre();
        $dataToIndex['titreSerie']			=  $albumsData->getCollection() . $tome;
        $dataToIndex['isbn']				=  $albumsData->getIsbn();
        $dataToIndex['titreSerieOnly']		=  $albumsData->getCollection();
        $dataToIndex['tome']				=  $albumsData->getTome();
        $dataToIndex['sanitizedTitreAlbum']	=  $this->sanitize ($albumsData->getTitre());
        $dataToIndex['sanitizedTitreSerie']	=  $this->sanitize ($albumsData->getCollection());

        // recuperation des redacteurs de l'avis
        $data = array ();
        foreach ($mpAlb->getAlbumCritic ($idAlbum) as $val){
            $data[] = $val->pseudo;
        }
		$dataToIndex['redacteurs'] = implode (' / ', $data);
		$dataToIndex['sanitizedRedacteurs'] = $this->sanitize ($dataToIndex['redacteurs']);

        //recuperation des dessinateurs
        $data = array ();
        foreach ($mpAlb->getAlbumDessinateurs($idAlbum) as $val){
            $data[] = $val->prenomAuteur . ' ' . $val->nomAuteur;
        }
		$dataToIndex['dessinateurs'] = implode (' / ', $data);
		$dataToIndex['sanitizedDessinateurs'] = $this->sanitize ($dataToIndex['dessinateurs']);

        //recuperation des coloristes
        $data = array ();
        foreach ($mpAlb->getAlbumColoristes($idAlbum) as $val){
            $data[] = $val->prenomAuteur . ' ' . $val->nomAuteur;
        }
		$dataToIndex['coloristes'] = implode (' / ', $data);
		$dataToIndex['sanitizedColoristes'] = $this->sanitize ($dataToIndex['coloristes']);

        //recuperation des scenaristes
        $data = array ();
        foreach ($mpAlb->getAlbumScenaristes($idAlbum) as $val){
            $data[] = $val->prenomAuteur . ' ' . $val->nomAuteur;
        }
		$dataToIndex['scenaristes'] = implode (' / ', $data);
		$dataToIndex['sanitizedScenaristes'] = $this->sanitize ($dataToIndex['scenaristes']);

        //recuperation des mots clés
        $data = array ();
        foreach ($mpAlb->getAlbumKeywords($idAlbum) as $val){
            $data[] = $val->libelle;
        }
		$dataToIndex['genres'] = implode (' / ', $data);
		$dataToIndex['sanitizedGenres'] = $this->sanitize ($dataToIndex['genres']);

		if ($editeurInfos->getPrenomEditeur() != ''){
			$nomEditeur =  $editeurInfos->getPrenomEditeur() . ' ' . $editeurInfos->getNomEditeur();
		}else{
			$nomEditeur = $editeurInfos->getNomEditeur();
		}

        $dataToIndex['editeur'] = $nomEditeur;
        $dataToIndex['sanitizedEditeur'] = $this->sanitize ($nomEditeur);

        return $dataToIndex;
    }

	function sanitize ($text)
	{
		$diacritics = array (
			'à', 'â', 'ä', 'á', 'ã', 'å',
			'î', 'ï', 'ì', 'í', 
			'ô', 'ö', 'ò', 'ó', 'õ', 'ø', 
			'ù', 'û', 'ü', 'ú', 
			'é', 'è', 'ê', 'ë', 
			'ÿ', 'ý', 
			'ç', 'ñ',
			'À', 'Â', 'Ä', 'Á', 'Ã', 'Å',
			'Î', 'Ï', 'Ì', 'Í', 
			'Ô', 'Ö', 'Ò', 'Ó', 'Õ', 'Ø', 
			'Ù', 'Û', 'Ü', 'Ú', 
			'É', 'È', 'Ê', 'Ë', 
			'Ÿ', 'Ý', 
			'Ç', 'Ñ', 
			);
		$undiacrited = array (
			'a', 'a', 'a', 'a', 'a', 'a', 
			'i', 'i', 'i', 'i', 
			'o', 'o', 'o', 'o', 'o', 'o', 
			'u', 'u', 'u', 'u', 
			'e', 'e', 'e', 'e', 
			'y', 'y', 
			'c', 'n', 
			'A', 'A', 'A', 'A', 'A', 'A', 
			'I', 'I', 'I', 'I', 
			'O', 'O', 'O', 'O', 'O', 'O', 
			'U', 'U', 'U', 'U', 
			'E', 'E', 'E', 'E', 
			'Y', 'Y', 
			'C', 'N', 
			);

		$stripWordSize = 1;

		$stripWords = array (
			'le', 'la', 'les',
			'de', 'des',
			'en', 'au', 'aux'
			);

		$text = str_replace ($diacritics, $undiacrited, $text);

		$text = mb_strtolower ($text, 'utf-8');

		$text = preg_replace ('/[^a-z0-9]/', ' ', $text);

		$text = preg_replace ('/[[:space:]]/', ' ', $text);

		$return = array ();
		$words = explode (' ', $text);

		foreach ($words as $word)
		{
			if	(
				(mb_strlen ($word, 'utf-8') <= $stripWordSize) or
				in_array ($word, $stripWords)
				)
			{
				continue;
			}

			$return[] = $word;
		}

		return implode (' ', $return);
	}
}