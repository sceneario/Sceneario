<?php

/**
 * @package Core
 * @category Plugin
 */

/**
 * 
 */

class Core_Plugin_Connexion_GoogleConnect extends Zend_Controller_Plugin_Abstract
{
    /*
    public function routeStartup(
                Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()
             ->appendBody("<p>routeStartup() appelée</p>\n");
    }
 
    public function routeShutdown(
                Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()
             ->appendBody("<p>routeShutdown() appelée</p>\n");
    }*/
 
    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
       #unset($_SESSION);
        #$currentUserSession = new Zend_Session_Namespace('currentUserSession');
        #var_dump(Zend_registry::get('currentUserConnexionFacebook') );
        if($this->getRequest()->getControllerName() == 'image' ||
            Zend_registry::isRegistered('currentUserConnexionFacebook') && Zend_registry::get('currentUserConnexionFacebook') === true){
            return;
        }
        $googleConnect =  Core_Service_GoogleConnect::getInstance();
        $user = $googleConnect->getUser();
      
        
        if($googleConnect->isConnected()) {
            Zend_Registry::set('currentUserConnexionGoogle', true);
            $googleId = $user['id'];
            
            #exit($googleId);
            
            $coreUserV6Mapper = new Core_Model_Mapper_TblUserV6();
            
            //on check si l'id facebook est présente
            $userRegisted = $coreUserV6Mapper->fetchAll(1 , 
                    array( 'clause' => 'user_actkey = ? AND user_from = "google"' 
                         , 'params' =>  $googleId), null);
          
            $googleData = new stdClass();
            $googleData->act_key         = $user['id'];
            $googleData->first_name      = $user['given_name'];
            $googleData->last_name       = $user['family_name'];
            $googleData->website         = $user['link'];
            $googleData->username        = $user['name'];
            $googleData->lang            = $user['locale'];
            $googleData->user_from       = 'google';
            $googleData->user_timezone   = '';
            $googleData->user_email      = $user['email'];
            
            
            
            if(count($userRegisted) == 0){
                $userGoogle = $this->providerDataToScenearioObject($googleData);
                $userScenearioId = $coreUserV6Mapper->save($userGoogle);
                #Zend_Debug::dump($userScenearioId);
                #$currentUserSession->currentUserID = $userScenearioId ;
                Zend_Registry::set('currentUserID', $userScenearioId );
            }else{
                Zend_Registry::set('currentUserID', $userRegisted[0]->getUserId() );
                #$currentUserSession->currentUserID = $userRegisted[0]->getUserId();
            }
            
            #Zend_Debug::dump($currentUserSession);
           
            /*
             * redir vers la home 
             * @todo redir vers referer
             */
            
        }  
    }
    
      
     /**
     * Adapter
     * @param type $providerData
     * @return \Core_Model_TblUserV6
     */
    
    protected function providerDataToScenearioObject($providerData)
    {
        $coreUserV6 = new Core_Model_TblUserV6;
        $coreUserV6->setUserlastname($providerData->last_name)
                   ->setUserfirstname($providerData->first_name)
                   ->setUsername($providerData->username)
                   ->setUserwebsite($providerData->website)
                   ->setUserfrom($providerData->user_from)
                   ->setUseractkey($providerData->act_key)
                   ->setUserip($_SERVER['REMOTE_ADDR'])
                   ->setUserlang($providerData->lang)
                   ->setUsertimezone($providerData->user_timezone)
                   ->setUseremail($providerData->user_email)
                   ->setUseractive(1);
        
        
        return $coreUserV6 ;
    }
 
    /*
    public function preDispatch(
                Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()
             ->appendBody("<p>preDispatch() appelée</p>\n");
    }
 
    public function postDispatch(
                Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()
             ->appendBody("<p>postDispatch() appelée</p>\n");
    }
 
    public function dispatchLoopShutdown()
    {
        $this->getResponse()
             ->appendBody("<p>dispatchLoopShutdown() appelée</p>\n");
    }
     * */
      
}
