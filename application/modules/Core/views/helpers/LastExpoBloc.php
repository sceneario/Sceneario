<?php
/*
 * Affiche un bloc contenant le dernier interview
 * @extend Zend_View_Helper_CustomUrl
 */
class Zend_View_Helper_LastExpoBloc extends Zend_View_Helper_CustomUrl
{
    /*
     * @var Zend_View $view
     */
    public function lastExpoBloc ($view)
    {
       
        $mapperTblexpos     = new Core_Model_Mapper_Tblexpos();
        $lastExposPublished = $mapperTblexpos->fetchAll(1,
                                                        array('clause'=>'enligne = ?',
                                                              'params'=> IS_PUBLISHED),
                                                             'dateajout DESC');
        if(!null == $lastExposPublished){
            $exposDatas = array('rubrique'   => 'Salons, expositions',
                                'titre'      => $lastExposPublished[0]->getTitre(),
                                'sous_titre' => $lastExposPublished[0]->getSousTitre(),
                                'text'       => $lastExposPublished[0]->getSousTitre(),
                                'image'      => 'http://images.sceneario.com/expos/images_index/' . $lastExposPublished[0]->getImage(),
                                'id'         => $lastExposPublished[0]->getIdexpo(),
                                'lien'       => array('type'=> 'voir tout' , 
                                                      'url' => $this->customUrl(array('title'=> $lastExposPublished[0]->getTitre(), 
                                                                                      'idexpo' => $lastExposPublished[0]->get_id()), 'expo'),
                                                      'tout_afficher' => $this->customUrl(array(), 'listexpo')),
                                'couleur'    => 'white'
             );
  
            if($view instanceof Zend_View){
                return $view->partial('partials/block300.phtml', 
                                       array('data' => $exposDatas)) ;
            }
            return '$view doit être une instance de Zend_View';
        }else{
            return null ;
        }
    }
}