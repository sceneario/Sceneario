<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php' ;

class IndexController extends GlobalController
{
    private $_mapperAlbum ;
    
    /*
     * 
     */
    public function init()
    {
        parent::init();
        $this->view->headTitle('Toute la bande dessinée sur Sceneario.com', 'PREPEND');
        $this->view->headMeta('http://www.sceneario.com/', 'identifier-url');

        /* Initialize action controller here */
        $this->_mapperAlbums = new Core_Model_Mapper_Tblalbum();
        
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
               && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { 

           $this->_helper->layout()->disableLayout();
           Zend_Controller_Front::getInstance()->setParam('noViewRenderer', true);
        }
    }

    public function indexAction()
    {
        //voir le helper LastInterviewBloc();
        /*
         * Gestion du script JS
         */
        $this->view->indexSlideShow = true ;
        $this->view->habillageHome  = true ;
        
        /*
         * EVENEMENTS
         */
        
         $eventsMapper = new Core_Model_Mapper_Tblevenement();
         $this->view->events = $eventsMapper->fetchAll();
       
        /*
         * Derniers albums
         */ 
        $this->view->newAlbums = $this->_mapperAlbums->getNewAlbums();
        
        //$currentUserSession = new Zend_Session_Namespace ('currentUserSession');
        
        #exit;
    }
    
    
    public function newalbumAction()
    {
        //voir le helper LastInterviewBloc();

        /*
         * Derniers albums
         */
        
        echo $this->view->partial('partials/listingAlbum.phtml',  
                                   array('albums' => $this->_mapperAlbums->getNewAlbums() ) )  ;
    }
    
    /*
     * 
     */
    public function coupdecoeurAction()
    {
        /*
         * Coup de coeur
         */
        echo $this->view->partial('partials/listingAlbum.phtml',  
                                  array('albums' => $this->_mapperAlbums->getCoupsdecoeurAlbums() ) )  ;
    }
    
    /*
     * 
     */
    public function recentalbumAction()
    {
        /*
         * Derniers ajouts
         */
        echo $this->view->partial('partials/listingAlbum.phtml',  
                                   array('albums' => $this->_mapperAlbums->getRecentAlbums() ) )  ;
    }
    
    /*
     * 
     */
    public function mostviewedAction()
    {  
        /*
         * Les plus vus
         */
        echo $this->view->partial('partials/listingAlbum.phtml',  
                                   array('albums' => $this->_mapperAlbums->getMostViewedAlbums() ) )  ;
    }
    
    /*
     * Si présent, le repertoire courant contenu 
     * dans l'uri de l'image est supprimé
     * 
     * @var string $imageUrl
     */
    private function cleanImageUrl($imageUrl)
    {
        if(strpos($imageUrl, './') !== false){
            return substr($imageUrl, 2) ;
        }
        return $imageUrl;
    }
    
    /*
     * Fonction qui sanitize une entrée text
     * 
     * @var string $string
     */
    private function sanitize($string, $type = null){
        #$filter = new Zend_Filter_Transliteration();
        #return $filter->filter($string); 
        
        $filterChain = new Zend_Filter();
        $filterChain->addFilter(new Zend_Filter_StripTags()) //supprime les tags
                    ->addFilter(new Zend_Filter_StripNewlines()) //supprimer les caractere de retour a la ligne
                    ->addFilter(new Zend_Filter_StringTrim()) //supprime les espace au début et a la fin
                    //->addFilter(new Zend_Filter_Alpha()) // supprime tout les caractères non-alphabetique
                    ;

        if( !null == $type && $type == 'url'){
            $filterChain->addFilter(new Zend_Filter_StringToLower());
        }
        
        return  $filterChain->filter($string);
    }
    
    /*
     * Page de lancement
     */
    public function lancementAction()
    {
        //
    }
}