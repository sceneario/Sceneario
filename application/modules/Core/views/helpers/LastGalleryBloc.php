<?php
/*
 * Affiche un bloc contenant le dernier interview
 * @extend Zend_View_Helper_CustomUrl
 */
class Zend_View_Helper_LastGalleryBloc extends Zend_View_Helper_CustomUrl
{
    /*
     * @var Zend_View $view
     */
    public function lastGalleryBloc ($view, $typeDossier = 'carnet')
    {
        /*
         * Select de la derniere galerie publiée
         */
        $utils = new Core_Service_Utilities;
        $mapperTbldossiers = new Core_Model_Mapper_Tbldossiers();
        $lastPublishedGallery = $mapperTbldossiers ->fetchAll(1, 
                                                              array('clause'=>'enligne = ? AND is_highlight = 1 AND LOWER(typeDossier) = "'.$typeDossier.'"',
                                                                    'params'=> IS_PUBLISHED), 
                                                              'dateDossier DESC');
        if(!null == $lastPublishedGallery){
	  $galerieDatas = array( 'rubrique'   => (strtolower($typeDossier) == 'carnet' ? 'Galeries' : 'Previews'), 
                                                   'titre'      => $lastPublishedGallery[0]->getTitreDossier(), 
                                                   'sous_titre' => $lastPublishedGallery[0]->getTexte(), 
                                                   'text'       => $lastPublishedGallery[0]->getTexte() , 
                                                   'image'      => $utils->getImages($lastPublishedGallery[0]->getLienImage(), false), 
                                                   'id'         => $lastPublishedGallery[0]->getIdDossier()  , 
                                                   'lien'       => array('type' => 'voir tout' ,
                                                                       'url'  => $this->customUrl(array('id' => $lastPublishedGallery[0]->getIdDossier(),
                                                                                                        'nom'  => $lastPublishedGallery[0]->getTitreDossier()),
                                                                                                        'galerie'),
                                                                       'tout_afficher' =>  $this->customUrl( array(), strtolower($typeDossier) == 'carnet' ? 'listgalerie' : 'listpreview'  )), 

                                                   'couleur'    => 'white', /* les options sont white et pink */

            );

            
            if($view instanceof Zend_View){
                return $view->partial('partials/block300.phtml', 
                                       array('data' => $galerieDatas)) ;
            }
            return '$view doit être une instance de Zend_View';
        }else{
            return null ;
        }
    }
}