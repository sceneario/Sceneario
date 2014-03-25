<?php
/*
 * Affiche un bloc contenant le dernier interview
 * @extend Zend_View_Helper_CustomUrl
 */
class Zend_View_Helper_RandomInterviewBloc extends Zend_View_Helper_CustomUrl
{
    /*
     * @var Zend_View $view
     */
    public function randomInterviewBloc ($view, $index = 1)
    {
        /*
         * Select du dernier interview publié
         */
        
        $utils = Core_Service_Utilities::getInstance();
        
        $mapperTblinterviews    = new Core_Model_Mapper_Tblinterviews();
        $lastPublishedInterview = $mapperTblinterviews -> fetchAll(4, 
                                                                   array('clause' => 'enligne = ?', 
                                                                         'params' => IS_PUBLISHED ) , 
                                                                   'dateInterview DESC');
        #$randomIndex = mt_rand(1, 19);
        $randomIndex = $index ;
        if(!null == $lastPublishedInterview){
            $interviewDatas  = array(   'rubrique'   => 'Interviews' , 
                                        'titre'      => $lastPublishedInterview[$randomIndex]->getTitreInterview(), 
                                        'sous_titre' => $lastPublishedInterview[$randomIndex]->getSoustitreInterview(), 
                                        'text'       => $lastPublishedInterview[$randomIndex]->getTextInterview() , 
                                        'image'      => $utils->getImages ( $lastPublishedInterview[$randomIndex]->getLienImage() , true ),
                                        'id'         => $lastPublishedInterview[$randomIndex]->getIdInterview()  , 
                                        'lien'       => array(
                                                              'type' => 'lire la suite' ,
                                                              'url'  => $this->customUrl(array('id' => $lastPublishedInterview[$randomIndex]->getIdInterview(),
                                                                                               'nom'=> $lastPublishedInterview[$randomIndex]->getTitreInterview()) ,
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