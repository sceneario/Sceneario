<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

class GalerieController extends GlobalController 
{
    private $_mapperGalerie;
    private $_galerie;
    private $_id;

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
        
        $this->_mapperGalerie = new Core_Model_Mapper_Tbldossiers();
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
        $this->view->isPreview = true;
        $this->view->headTitle('Previews BD - ', 'PREPEND');
        $this->view->headMeta()->setName('description', 'Retrouvez toutes les previews de vos artistes BD préférés grâce à Sceneario.com');
        $this->view->headMeta()->setName('keywords', 'Previews, Previews BD, Galeries BD, Expositions, Photos planches BD');
        $this->view->headMeta()->setProperty('og:title', 'Previews BD - Sceneario.com');
        $this->view->headMeta()->setProperty('og:description', 'Retrouvez toutes les previews de vos artistes BD préférés grâce à Sceneario.com');
        
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
       $this->view->type = 'Galeries';
        $this->view->headTitle('Galeries BD - ', 'PREPEND');
        $this->view->headMeta()->setName('description', 'Retrouvez toutes les galeries de vos artistes BD préférés grâce à Sceneario.com');
        $this->view->headMeta()->setName('keywords', 'Galeries, Galeries BD, Préviews BD, Expositions, Photos planches BD');
        $this->view->headMeta()->setProperty('og:title', 'Galeries BD - Sceneario.com');
        $this->view->headMeta()->setProperty('og:description', 'Retrouvez toutes les galeries de vos artistes BD préférés grâce à Sceneario.com');
        
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

    private function _get() {
        $this->_id = $this->getRequest()->getParam('id');

        if(!empty($this->_id)) {
            $this->_galerie = $this->_mapperGalerie->find($this->_id, new Core_Model_Tbldossiers);

            if (!empty($this->_galerie)) {
                $good_url = $this->view->customUrl(array('nom' => $this->_galerie->getTitreDossier(), 'id' => $this->_galerie->getIdDossier()), 'galerie');

                if ($this->getRequest()->getRequestUri() != $good_url) {
                    $this->redirect301($good_url);
                }
                return true;
            }
        }
        throw new Zend_Controller_Action_Exception('Cette exposition n\'existe pas', 404);
    }

    /*
     * 
     */
    public function galerieAction()
    {
        $this->_get();

        $this->view->isPreview = (strtolower($this->_galerie->getTypeDossier()) == 'preview') ? true : false;

        $galDir = '/home/sceneari/images/galeries/' . $this->_id;
        $images = array();        
        if (file_exists($galDir)) {
            if (is_dir($galDir)) {
                if ($dh = opendir($galDir)) {
                    while (($file = readdir($dh)) !== false) {
                        //echo "filename: $file : filetype: " . filetype($galDir . $file) . "<br />" . PHP_EOL;
                        if(!is_dir($galDir.'/'.$file)){
                    
                            $imageFacebook = 'http://images.sceneario.com/galeries/'.$this->_id.'/miniatures/'.$file ;

                            $image = array();
                            $image['big'] = 'http://images.sceneario.com/galeries/'.$this->_id.'/'.$file ;
                            if($this->view->isPreview){
                                $image['med'] = 'http://images.sceneario.com/galeries/'.$this->_id.'/'.$file ;
                            }else{
                                $image['med'] = 'http://images.sceneario.com/galeries/'.$this->_id.'/miniatures2/'.$file ;
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

        $this->view->headTitle($this->_galerie->getTitreDossier().' - ', 'PREPEND');
        $this->view->headMeta()->setName('description', 'Découvrez la '.($this->view->isPreview ? 'preview de ' : 'galerie : '). $this->_galerie->getTitreDossier() . ' sur sceneario.com');
        $this->view->headMeta()->setName('keywords', $this->_galerie->getTitreDossier().', Préviews BD, Galeries BD, Expositions, Photos planches BD');
        $this->view->headMeta()->setProperty('og:title', $this->_galerie->getTitreDossier());
        if (isset($imageFacebook)) {
            $this->view->headMeta()->setProperty('og:image', $imageFacebook);
        }
        $this->view->headMeta()->setProperty('og:description', 'Découvrez la '.($this->view->isPreview ? 'preview de ' : 'galerie : ').$this->_galerie->getTitreDossier().' sur sceneario.com');

        $this->view->titre  = $this->_galerie->getTitreDossier();   
        $this->view->images = $images;
    }  
}