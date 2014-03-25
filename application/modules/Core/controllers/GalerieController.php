<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

class GalerieController extends GlobalController 
{
    /*
     * @var object Core_Service_Utilities
     */
    private $_utils ;
    private $_galeries ;
    
    public function init()
    {
        parent::init();
        $this->_utils = new Core_Service_Utilities;
        $params = $this->getRequest()->getParams();
        $this->view->headTitle('Galeries et préviews BD - ', 'PREPEND');
        $this->view->headMeta()->setName('description', 'Retrouvez toutes les galeries et previews de vos artistes BD préférés grâce à Sceneario.com');
        $this->view->headMeta()->setName('keywords', 'Préviews BD, Galeries BD, Expositions, Photos planches BD');
        $this->view->headMeta()->setProperty('og:title', 'Galeries et préviews BD - Sceneario.com');
        $this->view->headMeta()->setProperty('og:description', 'Retrouvez toutes les galeries et previews de vos artistes BD préférés grâce à Sceneario.com');
    }
    
    /**
     * 
     */   
    public function previewlistAction()
    {
        //$this->_helper->layout()->disableLayout();
        //Zend_Controller_Front::getInstance()->setParam('noViewRenderer', true);
        
        $mapperTblDossiers = new Core_Model_Mapper_Tbldossiers();
        $this->setGaleries($mapperTblDossiers->fetchAll(null, array( 'clause' => 'enligne = ?  AND LOWER(typeDossier) = "preview"', 
                                                                       'params' => IS_PUBLISHED), 'dateDossier DESC'));
        
        if($this->_galeries !== null){
             $this->listGaleries();
             $this->render('list');
        } 
    }
    
    
    public function galerielistAction()
    {
       // $this->_helper->layout()->disableLayout();
       // Zend_Controller_Front::getInstance()->setParam('list', true);
        
        $mapperTblDossiers = new Core_Model_Mapper_Tbldossiers();
        $this->setGaleries($mapperTblDossiers->fetchAll(null, array( 'clause' => 'enligne = ? AND LOWER(typeDossier) = "carnet"', 
                                                                       'params' => IS_PUBLISHED), 'dateDossier DESC'));
        
        if($this->_galeries !== null){
             $this->listGaleries();
             $this->render('list');
        }     
       
    }
    
    public function getGaleries()
    {
        return $this->_galeries ;
    }
    
    public function setGaleries($galeries)
    {
        $this->_galeries = $galeries ;
    }
    
    public function listGaleries()
    {
        //$mapperTblDossiers = new Core_Model_Mapper_Tbldossiers();
        $galeries = $this->getGaleries() ;
        
        //print_r($galeries);
        
        $this->view->countGaleries =  $this->view->formatNumber( count($galeries)); 
        
        $blocDatas = array();
        foreach($galeries as $galerie){
  
             $galerieData = array('rubrique' => 'Galeries',
                                'titre'      => $galerie->getTitreDossier(),
                                'sous_titre' => strip_tags($galerie->getTitreSommaire()),
                                #'text'       => $interview->getSoustitreInterview(),
                                'image'      => $this->_utils->getImages($galerie->getLienImage(), false),
                                #'id'         => $interview->getIdInterview(),
                                'lien'       => array('type'=> 'voir tout' , 
                                                      'url' => $this->view->customUrl(array('nom' => $galerie->getTitreDossier(), 
                                                                                            'id'  => $galerie->getIdDossier()), 'galerie'),
                                                      #'tout_afficher' => ''
                                                      ),
                               # 'couleur'    => 'white'
             );
             
             $bloc = $this->view->partial('partials/block300-interview.phtml', 
                                           array('data' => $galerieData));
             
             $blocDatas[] = $bloc;
         }
         $this -> view -> blocInterview = $blocDatas;
         
        /*
         * Init de la pagination puis parametrage
         */
        $paginator     = Zend_Paginator::factory($blocDatas);
            
        $paginator->setItemCountPerPage(14);
        $pageRequested = $paginator->setCurrentPageNumber(isset($_GET['page']) ? $_GET['page'] : 1);
        
   
        $this->view->paginator   = $paginator;
    }
    
    /*
     * 
     */
    public function galerieAction()
    {
        //
        $this->view->galerieSlideShow = true ;
        $idGalerie         = $this->getRequest()->getParam('id');
        $mapperTblDossiers = new Core_Model_Mapper_Tbldossiers();
        $galerieInfos      = $mapperTblDossiers->find($idGalerie, new Core_Model_Tbldossiers) ;
        
        $this->view->previewClass  = '';   
        $this->view->norotateClass = 'class=""'; 
        
        $isPreview = false;
        
        if(strtolower($galerieInfos->getTypeDossier()) == 'preview'){ // preview
            $this->view->previewClass  = 'preview';   
            $this->view->norotateClass = 'class="norotate"';
            $isPreview = true;
        }
 
        $galDir = '/home/sceneari/images/galeries/' . $idGalerie;
        
        $images = array();
        
        if(file_exists($galDir)){
            if (is_dir($galDir)) {
                if ($dh = opendir($galDir)) {
                    while (($file = readdir($dh)) !== false) {
                        //echo "filename: $file : filetype: " . filetype($galDir . $file) . "<br />" . PHP_EOL;
                        if(!is_dir($galDir.'/'.$file)){
                    
                            $imageFacebook = 'http://images.sceneario.com/galeries/'.$idGalerie.'/miniatures/'.$file ;

                            $image = array();
                            $image['big'] = 'http://images.sceneario.com/galeries/'.$idGalerie.'/'.$file ;
                            if($isPreview){
                                $image['med'] = 'http://images.sceneario.com/galeries/'.$idGalerie.'/'.$file ;
                            }else{
                                $image['med'] = 'http://images.sceneario.com/galeries/'.$idGalerie.'/miniatures2/'.$file ;
                            }
                            $images[] = $image ;
                            
                            
                        }
                    }
                    closedir($dh);
                }
            }
        }
        //tri des images par ordre croissant
        sort($images);
        
        
        $this->view->headTitle($galerieInfos->getTitreDossier().' - ', 'PREPEND');
        $this->view->headMeta()->setName('description', 'Découvrez la galerie : ' . $galerieInfos->getTitreDossier() . ' sur sceneario.com');
        $this->view->headMeta()->setName('keywords', $galerieInfos->getTitreDossier().', Préviews BD, Galeries BD, Expositions, Photos planches BD');
        $this->view->headMeta()->setProperty('og:title', $galerieInfos->getTitreDossier());
        if (isset($imageFacebook)) {
            $this->view->headMeta()->setProperty('og:image', $imageFacebook);
        }
        $this->view->headMeta()->setProperty('og:description', 'Découvrez la '.($isPreview ? 'preview de ' : 'galerie : ').$galerieInfos->getTitreDossier().' sur sceneario.com');

        $this->view->titre  = $galerieInfos->getTitreDossier();   
        $this->view->images = $images;
    }  
}