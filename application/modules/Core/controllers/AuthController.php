<?php
/**
 * @package Application
 * @subpackage Core
 * @category Controller
 */

/**
 * Initialise les connexions vers les differents webservice OAUTH2
 */

class AuthController extends Zend_Controller_Action
{
    /**
     * 
     */
    public function init()
    {
        $this->_helper->layout()->disableLayout();
        Zend_Controller_Front::getInstance()->setParam('noViewRenderer', true);
    }
    
    /**
     * 
     */
    public function facebookAction()
    {
       
        /*
         * La connexion se fait grâce à la class Core_Service_FacebookConnect
         */
        $facebookConnect      = Core_Service_FacebookConnect::getInstance();
        $user                 = $facebookConnect->getUser();
       
        
       if($facebookConnect->isConnected () ){
           
            
            /*
             * redir vers la home 
             * @todo redir vers referer
             */
            $this->_redirect($this->view->customUrl(array('tag' => 'bedetheque'), 'listalbum'));
        }else{
            #Zend_Registry::set('currentUserID', $userScenearioId );
            $this->_redirect($facebookConnect->getLogUrl($user));
        }
       
    }
    
   


    public function indexAction()
    {
        //
        
    }
    
    public function googleAction()
    {
        
        $googleConnect =  Core_Service_GoogleConnect::getInstance();
        
        if($googleConnect->isConnected()) {
             
            $this->_redirect($this->view->customUrl(array('tag'=>'bedetheque'), 'listalbum'));
        }else{
            #$this->_redirect($this->view->customUrl(array(), 'accueil'));
            $this->_redirect( $googleConnect->createAuthUrl());
         
        }
    }
    
    
    
   
    
    //else
}
