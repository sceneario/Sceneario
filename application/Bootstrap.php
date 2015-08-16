<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    /**
     * Init de l'API
     */
    protected function _initApi()
    {
        Zend_Registry::set('api', $this->getOption('api'));
    }

    public function initIsLteIE6()
    {
        echo 'isLteIE6()';
        #require('functions.php'); 
        #if (isLteIE6()) { header('Location: ie6/index.php'); } 
    }

}

