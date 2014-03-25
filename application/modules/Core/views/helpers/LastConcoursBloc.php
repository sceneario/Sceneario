<?php
/*
 * Affiche un bloc contenant le dernier interview
 * @extend Zend_View_Helper_CustomUrl
 */
class Zend_View_Helper_LastConcoursBloc extends Zend_View_Helper_CustomUrl
{
    /*
     * @var Zend_View $view
     */
    public function lastConcoursBloc ($view )
    {
         
        
        $modelTblalbum            = new Core_Model_Tblalbum();
        $mapperTblalbum           = new Core_Model_Mapper_Tblalbum();
          
        $mapperTblconcoursent     = new Core_Model_Mapper_Tblconcoursent();

        $lastPublishedConcoursent = $mapperTblconcoursent ->fetchAll(1, 
                                                               array('clause' => 'enligne = ? AND is_highlight = 1',
                                                                     'params'=> IS_PUBLISHED), 
                                                              'dateDebut DESC');
                                                    	
        if(!null == $lastPublishedConcoursent){
            $couvAlbumSurLaHome = $mapperTblalbum -> find($lastPublishedConcoursent[0]->getIdAlbum(), $modelTblalbum);
            $concoursDatas = array('rubrique'   => 'Concours' , 
                                    'titre'      => $lastPublishedConcoursent[0]->getEntete(), 
                                    'sous_titre' => '',//strip_tags($lastPublishedConcoursent[0]->getEntete()), 
                                    'text'       => '', //strip_tags($lastPublishedConcoursent[0]->getEntete()) , 
                                    'image'      => '/images/concours/' . $lastPublishedConcoursent[0]->getNomConcours() . '.jpg' ,
                                    'id'         => $lastPublishedConcoursent[0]->getIdAlbum()  , 
                                    'lien'       => array('type' => 'participer' ,
                                                          'url'  => $this->customUrl(
                                                                        array('nomConcours'=> $lastPublishedConcoursent[0]->getLibelleConcours(),
                                                                              'idConcours' => $lastPublishedConcoursent[0]->getNomConcours()),
                                                                              'concoursstep1'),
                                                          'tout_afficher' => $this->customUrl (array(), 'concours') ), 

                                    'couleur'    => 'pink', /* les options sont white et pink */

            );

            
            if($view instanceof Zend_View){
                return $view->partial('partials/block300.phtml', 
                                       array('data' => $concoursDatas)) ;
            }
            return '$view doit être une instance de Zend_View';
        }else{
            return null ;
        }
    }
}