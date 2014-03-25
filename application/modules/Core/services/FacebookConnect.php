<?php

/**
 * @package Core
 * @category Service
 */

/**
 * Permet la connexion au ws Facebookconnect
 */

class Core_Service_FacebookConnect
{
    private $_user = null;
    private $_userProfile = null;
    private $_facebook = null;
    
    private static $_instance = null ;
    
    /*
     * Facebook application id
     */
    const APP_ID = '274580549328716';
    
    /*
     * Facebook secret string
     */
    const SECRET = 'e5df2fd2bd33e367f4588a009df773a4';
    
    /**
     * constructor
     * Initialise un connexion à FB
     */
    public function __construct()
    {
        require LIB_PATH . '/Facebook/src/facebook.php';
   
        $facebook = new Facebook(array(
            'appId'  => self::APP_ID,
            'secret' => self::SECRET,
        ));
        
        $this->_facebook = $facebook ;
        $this->fetchUserFBData();
    }
    
    /**
     * 
     */
    public static function getInstance()
    {
        if(self::$_instance == null){
            self::$_instance = new Core_Service_FacebookConnect() ;
        }
        return self::$_instance;
    } 
    
    /*
     * 
     */
    private function fetchUserFBData()
    {
       
        #echo '<pre>';
        
       // Get User ID
        $this->_user = $this->_facebook->getUser();
   
        // We may or may not have this data based on whether the user is logged in.
        //
        // If we have a $user id here, it means we know the user is logged into
        // Facebook, but we don't know if the access token is valid. An access
        // token is invalid if the user logged out of Facebook.

        if ($this->_user) {
            try {
            // Proceed knowing you have a logged in user who's authenticated.
                $this->_userProfile = $this->_facebook->api('/me');
            } catch (FacebookApiException $e) {
                error_log($e);
                print $e->getMessage();
                $this->_user = null;
            }
        }

        if (isset($_REQUEST['logout'])) {
            unset($_SESSION['token']);
            $this->_user = false;
            $this->_facebook->destroySession();
        }

    }
    
    /*
     * 
     */
    public function getUser()
    {
        if($this->_user){
            return $this->_user;
        }
    }
    
    /*
     * 
     */
    public function getUserProfile()
    {
        if($this->_userProfile){
            return $this->_userProfile;
        }
    }
    
    /*
     * 
     */
    public function getLogUrl($user)
    {
        // Login or logout url will be needed depending on current user state.
        if ($user) {
            #print '<a href="'.$this->_facebook->getLogoutUrl().'">LOGOUT</a>';
            return filter_var($this->_facebook->getLogoutUrl(), FILTER_VALIDATE_URL);
        } else {
            return filter_var($this->_facebook->getLoginUrl(), FILTER_VALIDATE_URL);
        }
        return null;
    }
    
    /**
     * 
     */
    public function isConnected()
    {
        if($this->getUser()){
            return true;
        }
        return false;
    }
}