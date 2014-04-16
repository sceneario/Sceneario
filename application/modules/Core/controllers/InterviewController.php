<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

class InterviewController extends GlobalController
{
    /*
     * @var object Core_Service_Utilities
     */
    private $_utils ;
    
    public function init()
    {
        parent::init();
        $this->_utils = new Core_Service_Utilities;
        $params = $this->getRequest()->getParams();
        $this->view->headTitle('Interviews auteurs BD - ', 'PREPEND');
        $this->view->headMeta()->setName('description', 'Retrouvez toutes les interviews de vos auteurs BD préférés grâce à Sceneario.com');
        $this->view->headMeta()->setName('keywords', 'Interviews auteurs BD, auteurs BD, interviews auteurs, interviews BD');
        $this->view->headMeta()->setProperty('og:title', 'Interviews auteurs BD - Sceneario.com');
        $this->view->headMeta()->setProperty('og:description', 'Retrouvez toutes les interviews de vos auteurs BD préférés grâce à Sceneario.com');
    }


    public function indexAction()
    {
        $this->_forward('list');
    }
    
    public function interviewAction()
    {
        /*
         *  Select du l'interview ciblé grace au parametre id
         */
        $interviewId = $this -> getRequest() ->getParam('id');
        
        $mapperTblinterviews    = new Core_Model_Mapper_Tblinterviews();
        
        $lastPublishedInterview = $mapperTblinterviews -> fetchAll(1, 
                                                                    array(
                                                                         'clause' => 'idInterview = ?', 
                                                                         'params' => $interviewId
                                                                           ) , null );

        if($lastPublishedInterview == null){
            $this->_redirect($this->view->customUrl(array(), 'listinterview'));
            exit(0);
        }
     
        $mapperTblInterviewAuteur = new Core_Model_Mapper_Tblauteursinterview();
        
        
        
     
        
        if(isset($lastPublishedInterview[0])  ){
        
        
	        $auteurInterviewInfos = $mapperTblInterviewAuteur -> fetchAll(10, 
	                                                                 array(
	                                                                      'clause' => 'idInterview = ?', 
	                                                                      'params' => $lastPublishedInterview[0] ->getIdInterview()
	                                                                      ) , null );
	
	 
	        
	        $this->view->auteurs = array();
	        
	        foreach($auteurInterviewInfos as $auteurInterview){
		        if(isset($auteurInterview)){
		            
		         	
		            $idAuteur    = $auteurInterview->getIdAuteur();
		
		            $mapperTblAuteur = new Core_Model_Mapper_Tblauteurs();
		            $auteurInfos = $mapperTblAuteur -> fetchAll(1, 
		                                                        array(
		                                                             'clause' => 'idAuteur = ?', 
		                                                             'params' => $idAuteur
		                                                             ) , null );
		                                                             
		       
		            #foreach()
		            $this->view->auteurs[] = $auteurInfos[0];
		        }
	        }
	        
	
	        
	        $this -> view -> titreInterview     = $lastPublishedInterview[0] -> getTitreInterview();
	        $this -> view -> soustitreInterview = $lastPublishedInterview[0] -> getSoustitreInterview();
	        
	        
	        #var_dump($lastPublishedInterview[0] -> getTextInterview() ); exit;
	        
	        if( $lastPublishedInterview[0] -> getTextInterview() !== '' ){
		       $this -> view -> textInterview      = $this->_utils->adaptImgToV6($lastPublishedInterview[0] -> getTextInterview());
	        }else{
		       $this -> view -> textInterview      = ''; 
	        }
	        
	        $this -> view -> intervieweur       = $lastPublishedInterview[0] -> getIntervieweur();
	        $this -> view -> dateInterview      = $lastPublishedInterview[0] -> getDateInterview();
	        $this -> view -> imageInterview     = $this->_utils->getImages($lastPublishedInterview[0] -> getLienImage(), true);


            $this->view->headTitle($this->view->titreInterview.' - ', 'PREPEND');
            $this->view->headMeta()->setName('description', 'Découvrez la galerie : ' . $this->view->titreInterview . ' sur sceneario.com');
            $this->view->headMeta()->setName('keywords', $this->view->titreInterview .', Préviews BD, Galeries BD, Expositions, Photos planches BD');
            $this->view->headMeta()->setProperty('og:title', $this->view->titreInterview );
            $this->view->headMeta()->setProperty('og:image', $this->view->imageInterview);
            $this->view->headMeta()->setProperty('og:description', 'Découvrez l\'interview : ' . $this->view->titreInterview . ' sur sceneario.com');

	        /*
	        [_dateInterview:Core_Model_Tblinterviews:private] => 2012-07-18
	        [_lienInterview:Core_Model_Tblinterviews:private] => 
	        [_lienJava:Core_Model_Tblinterviews:private] => 0
	        [_titreSommaire:Core_Model_Tblinterviews:private] => Interview de Gani Jakupi pour La dernière image
	        [_lienImage:Core_Model_Tblinterviews:private] => ./interviews/images/itwganijakupi.jpg
	        [_Intervieweur:Core_Model_Tblinterviews:private] => Par sbuoro en juillet 2012
	        */
	        
	        #echo '<pre>';
	        #print_r($auteurInfos[0]);
        }
    }
    

    
   
  
    public function listAction()
    {
     
        $mapperTblInterview = new Core_Model_Mapper_Tblinterviews();
        $auteurInterview = $mapperTblInterview->fetchAll(null, array( 'clause' => 'enligne = ?', 
                                                                    'params' => IS_PUBLISHED), 'dateInterview DESC');
        
        $this->view->countInterview =  $this->view->formatNumber($mapperTblInterview->getCountInterview()); 
        
        $blocDatas = array();
        foreach($auteurInterview as $interview){
            
       
            
             $interviewData = array('rubrique' => 'Interviews',
                                'titre'      => $interview->getTitreInterview(),
                                'sous_titre' => strip_tags($interview->getSoustitreInterview()),
                                #'text'       => $interview->getSoustitreInterview(),
                                'image'      => $this->_utils->getImages($interview->getLienImage(), true),
                                #'id'         => $interview->getIdInterview(),
                                'lien'       => array('type'=> 'voir tout' , 
                                                      'url' =>$this->view->customUrl(array('nom' => $interview->getTitreInterview(), 
                                                                                           'id' => $interview->getIdInterview()), 'interview'),
                                                      #'tout_afficher' => ''
                                                      ),
                               # 'couleur'    => 'white'
             );
             
             $bloc = $this->view->partial('partials/block300-interview.phtml', 
                                           array('data' => $interviewData));
             
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
}