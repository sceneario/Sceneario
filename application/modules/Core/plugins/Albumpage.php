<?php

class Core_Plugin_Albumpage extends Zend_Controller_Plugin_Abstract {

    private $_bootstrap;

    public function __construct($moduleName ,$bootstrap)
    {
        $this->_bootstrap = $bootstrap;
    }

    /*
     * Logique permettant la redirection des fiches albums
     */
    public function routeStartup(Zend_Controller_Request_Abstract $request)
    {
       /*
        * Qui redirige les liens d'OpaleBD
        * Si le parametre idAlbum est présent dans la QS,
        * on redirige vers la fiche
        * @todo faire un plugin sur V6
        */
        if (isset($_GET['idAlbum']) && $_GET['idAlbum']) {
            $idAlbum = (int)$_GET['idAlbum'];
            if ($idAlbum !== 0) {
                header("HTTP/1.1 301 Moved Permanently");
                header('location:http://www.sceneario.com/url/convert?id='.$idAlbum);
                exit(0);
            }
        }
    }
}