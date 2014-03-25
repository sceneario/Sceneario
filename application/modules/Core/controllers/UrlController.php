<?php

/*
 * Logique 
 */
class UrlController extends Zend_Controller_Action
{
    /*
     * 
     */
    private $_utils ;
    
    /*
     * 
     */
    public function init()
    {
        $this->_helper->layout()->disableLayout();
        Zend_Controller_Front::getInstance()->setParam('noViewRenderer', true);
        $this->_utils = new Core_Service_Utilities ; 
   
    }
    
    /*
     * Créer l'url de la fiche et redirige vers celle ci
     */
    public function convertAction()
    {
        $id    = $this->getRequest()->getParam('id');
        $urlAlbum = $this->_utils->getAlbumUrlFromId($id);
        
        $this->_redirect($urlAlbum);
        exit('Redirection en cours...');
    }
}
