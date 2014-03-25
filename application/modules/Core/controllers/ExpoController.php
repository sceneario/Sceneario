<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

class ExpoController extends GlobalController
{
    public function init()
    {
        parent::init();
        $this->view->headTitle('Expos BD, salons BD, festivals BD - ', 'PREPEND');
        $this->view->headMeta()->setName('description', 'Retrouvez en exclusivité nos reportages autour de l\'évennementiel spécialisé BD grâce à Sceneario.com');
        $this->view->headMeta()->setName('keywords', 'Expos BD, Salons BD, Festivals BD');
        $this->view->headMeta()->setProperty('og:title', 'Expos BD, salons BD, festivals BD - Sceneario.com');
        $this->view->headMeta()->setProperty('og:description', 'Retrouvez en exclusivité nos reportages autour de l\'évennementiel spécialisé BD grâce à Sceneario.com');
    }
    
    public function Out_listAction_Out ()
    {
     
        /*
         * 	$requete = "SELECT *
				FROM tbl_Expos
				WHERE enligne = 'O'
				ORDER BY dateajout DESC";

         */
        $expoMapper = new Core_Model_Mapper_Tblexpos;
        $expoList   = $expoMapper->fetchAll(null, array('clause' => 'enligne = ?', 
                                                      'params' => IS_PUBLISHED), 
                                            'dateajout DESC');
        
        /*
         [__id:Core_Model_Tblexpos:private] => 239
            [_idexpo:Core_Model_Tblexpos:private] => harley_davidson
            [_titre:Core_Model_Tblexpos:private] => Soirée Je veux une Harley 
            [_sousTitre:Core_Model_Tblexpos:private] => 
            [_annee:Core_Model_Tblexpos:private] => 2012
            [_idAlbums:Core_Model_Tblexpos:private] => 
            [_idAuteurs:Core_Model_Tblexpos:private] => 1905, 1628
            [_idStats:Core_Model_Tblexpos:private] => 1205_harley
            [_date:Core_Model_Tblexpos:private] => Mercredi 23 mai 2012
            [_image:Core_Model_Tblexpos:private] => 1205_harley.jpg
            [_enligne:Core_Model_Tblexpos:private] => O
            [_dateajout:Core_Model_Tblexpos:private] => 2012-05-23 00:00:00
         */
        
        $resultSet = array();
        $utils     = new Core_Service_Utilities;
        $auteurMapper = new Core_Model_Mapper_Tblauteurs;
        foreach($expoList as $expo){
         
            
            $result = new stdClass();
            $result->id            = $expo->get_id();
            $result->idexpo        = $expo->getIdexpo();
            $result->titre         = str_replace('<br>', ' - ', strip_tags($expo->getTitre(), '<br>'));
            $result->soustitre     = strip_tags($expo->getSousTitre(), '<br>');
            $result->annee         = $expo->getAnnee();
            $result->enligne       = $expo->getEnligne();
            $result->date          = $expo->getDate();
            if(APPLICATION_ENV == 'development'){
                $result->imageUri      = 'http://images.sceneario.com/expos/images_index/' . $expo->getImage();
            }else{
                $result->imageUri      = '/images/expos/images_index/' . $expo->getImage();
            }
            
               
            if($expo->getIdAlbums() != ''){
                $idAlbums  = explode(',', $expo->getIdAlbums());
                foreach($idAlbums as $idAlbum){
                    $result->urlAlbum[] = $utils->getAlbumUrlFromId($idAlbum) ;
                }
            }
            
            if($expo->getIdAuteurs() != ''){
                $idAuteurs  = explode(',', $expo->getIdAuteurs());
                foreach($idAuteurs as $idAuteur){
                    $auteurInfos       = $auteurMapper->find($idAuteur, new Core_Model_Tblauteurs);
                    if($auteurInfos instanceof Core_Model_Tblauteurs){
                        $result->auteurs[$idAuteur] = $auteurInfos->getPrenomAuteur() . ' ' . $auteurInfos->getNomAuteur() ;
                    }
                }
            }

            $resultSet[]         = $result;
        }
        
        /*
         * Resultat par page
         */
        $resultPerPageDefault = 10 ;
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
        
        $this->view->exposCount  = count($expoList);
 
    }
    
     public function listAction()
    {
        $expoMapper = new Core_Model_Mapper_Tblexpos;
        $expoList   = $expoMapper->fetchAll(null, array('clause' => 'enligne = ?', 
                                                      'params' => IS_PUBLISHED), 
                                            'dateajout DESC');
          
        $this->view->countInterview =  $this->view->formatNumber(count($expoList)); 
        
        $blocDatas = array();
        foreach($expoList as $expo){
            
             if(APPLICATION_ENV == 'development'){
                $imageUri      = 'http://images.sceneario.com/expos/images_index/' . $expo->getImage();
             }else{
                $imageUri      = '/images/expos/images_index/' . $expo->getImage();
             }
            
             $expoData = array('rubrique' => 'Interviews',
                                'titre'      => $expo->getTitre(),
                                'sous_titre' => $expo->getDate(),//strip_tags($interview->getSoustitreInterview()),
                                #'text'       => $interview->getSoustitreInterview(),
                                'image'       => $imageUri,
                                #'id'         => $interview->getIdInterview(),
                                'lien'       => array('type'=> 'voir tout' , 
                                                      'url' =>$this->view->customUrl(array('title'  => $expo->getTitre(), 
                                                                                           'idexpo' => $expo->get_id()), 'expo'),
                                                   
                                                      ),
                                
             );
             
             $bloc = $this->view->partial('partials/block300-interview.phtml', 
                                           array('data' => $expoData));
             
             $blocDatas[] = $bloc;
         }
         
       
         $this -> view -> blocInterview = $blocDatas ;
         
        /*
         * Init de la pagination puis parametrage
         */
        $paginator     = Zend_Paginator::factory($blocDatas);
 
        $paginator->setItemCountPerPage(14);
        $pageRequested = $paginator->setCurrentPageNumber(isset($_GET['page']) ? $_GET['page'] : 1);
        
   
        $this->view->paginator   = $paginator;

    }
    
    public function expoAction()
    {
     
        $idExpo     = $this->getRequest()->getParam('idexpo') ;
        
        $expoMapper = new Core_Model_Mapper_Tblexpos;
        $expoInfos  = $expoMapper->find($idExpo, new Core_Model_Tblexpos) ;
        $utils      = new Core_Service_Utilities ;
        if( (int) $idExpo !== 0 ){
            if($expoInfos->getEnligne() == IS_NOT_PUBLISHED){
                echo 'L\'exposition que vous demandez n\'est pas publié.' ;
            }else{

                if(APPLICATION_ENV == 'development'){
                    $this->view->imageUri      = 'http://images.sceneario.com/expos/images_index/' . $expoInfos->getImage();
                }else{
                    $this->view->imageUri      = '/images/expos/images_index/' . $expoInfos->getImage();
                }

                $this->view->titre         = str_replace('<br>', ' - ', strip_tags($expoInfos->getTitre(), '<br>'));
                $this->view->soustitre     = strip_tags($expoInfos->getSousTitre(), '<br>');
                $this->view->expo          = $expoInfos ;
                
                $this->view->expoHtml      = $utils->getTheExpoHtml($expoInfos->getIdExpo(), $expoInfos->getAnnee()) ;

                $this->view->headTitle($this->view->titre.' - ', 'PREPEND');
                $this->view->headMeta()->setName('description', $this->view->titre.'. Retrouvez en exclusivité nos reportages autour de l\'évennementiel spécialisé BD grâce à Sceneario.com');
                $this->view->headMeta()->setName('keywords', $this->view->titre.', Expos BD, Salons BD, Festivals BD');
                $this->view->headMeta()->setProperty('og:title', $this->view->titre);
                $this->view->headMeta()->setProperty('og:image', $this->view->imageUri);
                $this->view->headMeta()->setProperty('og:description', $this->view->titre.'. Retrouvez en exclusivité nos reportages autour de l\'évennementiel spécialisé BD grâce à Sceneario.com');

                 #echo '<pre>';
                #print_r($expoInfos);
                #echo '</pre>';
            }
        }else{
            echo 'L\exposition n\'existe pas.' ;
        }
    }
    
    
}