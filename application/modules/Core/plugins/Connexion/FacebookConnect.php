<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Core_Plugin_Connexion_FacebookConnect extends Zend_Controller_Plugin_Abstract
{
    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
        if(Zend_registry::isRegistered('currentUserConnexionGoogle')
                && Zend_registry::get('currentUserConnexionGoogle') === true){
            
            return;
        }
        
        /*
         * La connexion se fait grâce à la class Core_Service_FacebookConnect
         */
        $facebookConnect      = Core_Service_FacebookConnect::getInstance();
        #$user                 = $facebookConnect->getUser();
        $userProfile          = $facebookConnect->getUserProfile();
      
        
       if($facebookConnect->isConnected () ){
            Zend_Registry::set('currentUserConnexionFacebook', true);
            $facebookId = $facebookConnect->getUser();
            $coreUserV6Mapper = new Core_Model_Mapper_TblUserV6();
            
            //on check si l'id facebook est présente
            $userRegisted = $coreUserV6Mapper->fetchAll(1 , 
                    array( 'clause' => 'user_actkey = ? AND user_from = "facebook"' 
                         , 'params' => $facebookId), null);
            //
            #Zend_Debug::dump($userRegisted);
            
            $facebookData = new stdClass();
            $facebookData->act_key    = $userProfile['id'];
            $facebookData->first_name = $userProfile['first_name'];
            $facebookData->last_name  = $userProfile['last_name'];
            $facebookData->website    = $userProfile['link'];
            $facebookData->username   = $userProfile['username'];
            $facebookData->lang       = $userProfile['locale'];
            $facebookData->user_from  = 'facebook';
            $facebookData->user_timezone   = $userProfile['timezone'];
           # $facebookData->
            #Zend_Debug::dump($userProfile);
            //si l'utilisateur n'est pas présent, on l'enregistre en base
            //@table tbl_User_V6
            if(count($userRegisted) == 0){
                $userFacebook = $this->providerDataToScenearioObject($facebookData);
                $userScenearioId = $coreUserV6Mapper->save($userFacebook);
                Zend_Registry::set('currentUserID', $userScenearioId );
            }else{
                Zend_Registry::set('currentUserID', $userRegisted[0]->getUserId() );
            }
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
                   ->setUseractive(1);
        
        
        return $coreUserV6 ;
    } 
 
}