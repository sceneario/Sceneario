<?php

class Core_Plugin_Stats extends Zend_Controller_Plugin_Abstract
{
    private $_bootstrap;
    
    public function __construct($moduleName ,$bootstrap)
    {
        $this->_bootstrap = $bootstrap;
    }
    
    public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {     
       /*
        * UPDATE DU NOMBRE DE VISTES ET VISITES SEMAINE
        * DE L'ALBUM
        */
        if($request->getControllerName() == 'album'){
            $idAlbum = (int)$request->getParam('idAlbum');
            if (!empty($idAlbum)) {
                $albumMapper = new Core_Model_Mapper_Tblalbum ;
                $albumMapper->updateVisitAlbum($idAlbum);
            }
        }
    }
}