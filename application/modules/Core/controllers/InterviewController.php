<?php

require_once APPLICATION_PATH . '/modules/Core/controllers/GlobalController.php';

class InterviewController extends GlobalController
{
    private $_mapperInterview;
    private $_interview;
    private $_id;

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

        $this->_mapperInterview = new Core_Model_Mapper_Tblinterviews();
    }


    public function indexAction()
    {
        $this->_forward('list');
    }

    private function _get() {
        $this->_id = $this->getRequest()->getParam('id');

        if(!empty($this->_id)) {
            $this->_interview = $this->_mapperInterview->find($this->_id, new Core_Model_Tblinterviews);

            if (!empty($this->_interview)) {
                $good_url = $this->view->customUrl(array('nom' => $this->_interview->getTitreInterview(), 'id' => $this->_interview->getIdInterview()), 'interview');
                if ($this->getRequest()->getRequestUri() != $good_url) {
                    $this->redirect301($good_url);
                }
                return true;
            }
        }
        throw new Zend_Controller_Action_Exception('Cette interview n\'existe pas', 404);
    }

    public function interviewAction()
    {
        $this->_get();

        $mapperTblInterviewAuteur = new Core_Model_Mapper_Tblauteursinterview();
        if (isset($this->_interview)) {
            $auteurInterviewInfos = $mapperTblInterviewAuteur->fetchAll(
                10, 
                array(
                    'clause' => 'idInterview = ?', 
                    'params' => $this->_interview ->getIdInterview()
                ),
                null
            );

            $this->view->auteurs = array();
            foreach ($auteurInterviewInfos as $auteurInterview) {
                if (isset($auteurInterview)) {
                    $idAuteur              = $auteurInterview->getIdAuteur();
                    $mapperTblAuteur       = new Core_Model_Mapper_Tblauteurs();
                    $auteurInfos           = $mapperTblAuteur->fetchAll(1, 0, 'idAuteur = '.$idAuteur);
                    $this->view->auteurs[] = $auteurInfos[0];
                }
            }

            $this->view->titreInterview     = $this->_interview->getTitreInterview();
            $this->view->soustitreInterview = $this->_interview->getSoustitreInterview();

            if ($this->_interview->getTextInterview() !== '') {
               $this->view->textInterview = $this->_utils->adaptImgToV6($this->_interview->getTextInterview());
            } else {
               $this->view->textInterview = ''; 
            }
            
            $this->view->intervieweur   = $this->_interview->getIntervieweur();
            $this->view->dateInterview  = $this->_interview->getDateInterview();
            $this->view->imageInterview = $this->_utils->getImages($this->_interview->getLienImage(), true);

            $this->view->headTitle($this->view->titreInterview.' - ', 'PREPEND');
            $this->view->headMeta()->setName('description', 'Découvrez la galerie : ' . $this->view->titreInterview . ' sur sceneario.com');
            $this->view->headMeta()->setName('keywords', $this->view->titreInterview .', Préviews BD, Galeries BD, Expositions, Photos planches BD');
            $this->view->headMeta()->setProperty('og:title', $this->view->titreInterview );
            $this->view->headMeta()->setProperty('og:image', $this->view->imageInterview);
            $this->view->headMeta()->setProperty('og:description', 'Découvrez l\'interview : ' . $this->view->titreInterview . ' sur sceneario.com');
        }
    }

    public function listAction()
    {
        $mapperTblInterview = new Core_Model_Mapper_Tblinterviews();
        $auteurInterview = $mapperTblInterview->fetchAll(
            null,
            array(
                'clause' => 'enligne = ?', 
                'params' => IS_PUBLISHED
            ),
            'dateInterview DESC'
        );
        
        $this->view->countInterview =  $this->view->formatNumber($mapperTblInterview->getCountInterview()); 
        
        $blocDatas = array();
        foreach ($auteurInterview as $interview) {
             $interviewData = array(
                'rubrique'   => 'Interviews',
                'titre'      => $interview->getTitreInterview(),
                'sous_titre' => strip_tags($interview->getSoustitreInterview()),
                'image'      => $this->_utils->getImages($interview->getLienImage(), true),
                'lien'       => array(
                    'type' => 'voir tout',
                    'url'  => $this->view->customUrl(array('nom' => $interview->getTitreInterview(), 'id' => $interview->getIdInterview()), 'interview'),
                ),
            );
             
            $bloc = $this->view->partial('partials/block300-interview.phtml', array('data' => $interviewData));
            $blocDatas[] = $bloc;
        }
        $this->view->blocInterview = $blocDatas;

        $paginator             = Zend_Paginator::factory($blocDatas);
        $paginator->setItemCountPerPage(14);
        $pageRequested         = $paginator->setCurrentPageNumber(isset($_GET['page']) ? $_GET['page'] : 1);
        $this->view->paginator = $paginator;
    }
}