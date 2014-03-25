<?php

class Core_Bootstrap extends Zend_Application_Module_Bootstrap
{
    /*
     * Init de la nav principal
     */
    protected function _initNavigation()
    {
    
        $navConfig = new Zend_Config_Xml(
                                        CONFIG_PATH . 'navigation.xml', 
                                        'production'
                                        );
        $navigation = new Zend_Navigation($navConfig);    
        Zend_Registry::set('Zend_Navigation', $navigation); 
    }
    
    /*
     * Init des routes
     */
    protected function _initRouter()
    {
        $router = Zend_Controller_Front::getInstance()->getRouter();
        $routerConfig = new Zend_Config_Ini(
                                            CONFIG_PATH . 'routes.ini', 
                                            'production'
                                           );
        $router->addConfig($routerConfig, 'routes'); 
    }
    
    /*
     * Init du plugin stats
     */
    protected function _initStats()
    {
        Zend_Controller_Front::getInstance()->registerPlugin( new Core_Plugin_Stats($this->_moduleName, $this)) ;
    }
    
    /*
     * Init du plugin Albumpage
     */
    protected function _initAlbumpage()
    {
        Zend_Controller_Front::getInstance()->registerPlugin( new Core_Plugin_Albumpage($this->_moduleName, $this));
    }
    
    /*
     * Init du plugin Detectmobile
     */
    protected function _initDetectmobile()
    {
        //Zend_Controller_Front::getInstance()->registerPlugin( new Core_Plugin_Detectmobile($this->_moduleName, $this));
    }
    
    /*
     * Init du plugin Redirv5tov6
     */
    protected function _initRedirv5tov6()
    {
        Zend_Controller_Front::getInstance()->registerPlugin( new Core_Plugin_Redirv5tov6($this->_moduleName, $this));
    }
    
   /**
     * Plugin de gestion des traductions
     */
    /*
    protected function _initPluginTranslation() 
    {  
        Zend_Controller_Front::getInstance()->registerPlugin( new Core_Plugin_Translate($this->_moduleName, $this)) ;
    }
     * 
     */
    
    /**
     * Plugin de connexion à la page Espace Pro
     */
    /*
    protected function _initAuthPlugin()
    {
        Zend_Controller_Front::getInstance()->registerPlugin(new Core_Plugin_Auth($this->_moduleName)) ;
    }
     * 
     */
    protected function _initDebugPlugin ()
    {
       //Zend_Controller_Front::getInstance()->registerPlugin(new Core_Plugin_Debug());
    }
  
    
    protected function _initFacebookConnectPlugin ()
    {
       Zend_Controller_Front::getInstance()->registerPlugin(new Core_Plugin_Connexion_FacebookConnect());
    }
    
      
    protected function _initGoogleConnectPlugin ()
    {
       Zend_Controller_Front::getInstance()->registerPlugin(new Core_Plugin_Connexion_GoogleConnect());
    }

}