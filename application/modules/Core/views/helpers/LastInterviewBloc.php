<?php
/*
 * Affiche un bloc contenant le dernier interview
 * @extend Zend_View_Helper_CustomUrl
 */
class Zend_View_Helper_LastInterviewBloc extends Zend_View_Helper_CustomUrl
{
    /*
     * @var Zend_View $view
     */
    public function lastInterviewBloc ($view)
    {
        /*
         * Select du dernier interview publié
         */
        
        $utils = Core_Service_Utilities::getInstance();
        
        
        $mapperTblinterviews    = new Core_Model_Mapper_Tblinterviews();
        $lastPublishedInterview = $mapperTblinterviews -> fetchAll(1, 
                                                                   array('clause' => 'enligne = ? AND is_highlight = 1',
                                                                         'params' => IS_PUBLISHED ) , 
                                                                   'dateInterview DESC');

        if(!null == $lastPublishedInterview){
            $interviewDatas  = array(   'rubrique'   => 'Interviews' , 
                                        'titre'      => $lastPublishedInterview[0]->getTitreInterview(), 
                                        'sous_titre' => $lastPublishedInterview[0]->getSoustitreInterview(), 
                                        'text'       => $lastPublishedInterview[0]->getTextInterview() , 
                                        'image'      => $utils->getImages($lastPublishedInterview[0]->getLienImage(), true),
                                        'id'         => $lastPublishedInterview[0]->getIdInterview()  , 
                                        'lien'       => array(
                                                              'type' => 'lire la suite' ,
                                                              'url'  => $this->customUrl(array('id' => $lastPublishedInterview[0]->getIdInterview(),
                                                                                               'nom'=> $lastPublishedInterview[0]->getTitreInterview()) ,
                                                                      'interview') ,

                                                              'tout_afficher' => $this->view->customUrl(array(), 'listinterview') ), 

                                        'couleur'    => 'white', /* les options sont white et pink */
                                 ) ;
            
            if($view instanceof Zend_View){
                return $view->partial('partials/block300.phtml', 
                                       array('data' => $interviewDatas)) ;
            }
            return '$view doit être une instance de Zend_View';
        }else{
            return null ;
        }
    }
}