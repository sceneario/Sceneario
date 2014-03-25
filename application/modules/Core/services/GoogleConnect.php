<?php

/**
 * @package Core
 * @category Service
 */

/**
 * Initialise une connexion vers le service GOOGLE OAUTH
 */

class Core_Service_GoogleConnect
{
    /*
     * Google App Client ID
     * @var string
     */
    const CLIENT_ID = '695779292332.apps.googleusercontent.com';
    
    /*
     * Google App Client Secret
     * @var string
     */
    const CLIENT_SECRET = '4Y3Eyvyn_jmNhI5_zhL5NhEI';
    
    /*
     * Google Auth REDIRECT URL
     * @var string
     */
    const REDIRECT_URL = 'http://sceneario.com/auth/google'; 
    
    /*
     * Google App Developer Key
     * @var type
     */
    const DEVELOPER_KEY = ''; 
    
    /*
     * Google Client Logic
     * @var object | mixed
     */
    private $_googleClient ;
    
    /*
     * Google Oauth2
     * @var object | mixed
     */
    private $_oauth2; 
    
    /*
     * Google user info
     * @var array
     */
    private $_googleUser;
    
    private static $_instance = null ;
    
    /**
     * Singleton
     * @return type
     */
    public static function getInstance()
    {
        if(self::$_instance == null){
            self::$_instance = new Core_Service_GoogleConnect;
        }
        return self::$_instance;
    }
    /**
     * 
     */
    public function __construct()
    {
        /*
         * Copyright 2011 Google Inc.
         *
         * Licensed under the Apache License, Version 2.0 (the "License");
         * you may not use this file except in compliance with the License.
         * You may obtain a copy of the License at
         *
         *     http://www.apache.org/licenses/LICENSE-2.0
         *
         * Unless required by applicable law or agreed to in writing, software
         * distributed under the License is distributed on an "AS IS" BASIS,
         * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
         * See the License for the specific language governing permissions and
         * limitations under the License.
         */
        require_once LIB_PATH . '/google-api-php-client/src/Google_Client.php';
        require_once LIB_PATH . '/google-api-php-client/src/contrib/Google_Oauth2Service.php';
        
        $client = new Google_Client();
        $client->setApplicationName("Google UserInfo PHP Starter Application");
        
        // Visit https://code.google.com/apis/console?api=plus to generate your
        // oauth2_client_id, oauth2_client_secret, and to register your oauth2_redirect_uri.
        $client->setClientId(self::CLIENT_ID);
        $client->setClientSecret(self::CLIENT_SECRET);
        $client->setRedirectUri(self::REDIRECT_URL);
        $client->setDeveloperKey(self::DEVELOPER_KEY);
        
        $oauth2 = new Google_Oauth2Service($client);
        
        $this->_googleClient = $client ;
        $this->_oauth2       = $oauth2 ;
        
        $this->fetchGoogleData();
    }
    
    /**
     * 
     */
    private function fetchGoogleData()
    {
        $client = $this->_googleClient;
        $oauth2 = $this->_oauth2;
        
      
        
        
        if (isset($_GET['code'])) {
        	session_start();
            $client->authenticate($_GET['code']);
            $_SESSION['token'] = $client->getAccessToken();
            $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
            header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
            return;
        }

        if (isset($_SESSION['token'])) {
            $client->setAccessToken($_SESSION['token']);
        }

        if (isset($_REQUEST['logout'])) {
            unset($_SESSION['token']);
            $client->revokeToken();
        }
        /*
        if ($client->getAccessToken()) {
            $user = $oauth2->userinfo->get();
            
            $this->view->user = $user ;

            // These fields are currently filtered through the PHP sanitize filters.
            // See http://www.php.net/manual/en/filter.filters.sanitize.php
            $email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
            $img   = filter_var($user['picture'], FILTER_VALIDATE_URL);
            $this->view->personMarkup = "$email<div><img src='$img?sz=50'></div>";

            
            $_SESSION['token'] = $client->getAccessToken();
        } else {
            $this->view->authUrl = $client->createAuthUrl();
        }*/
    }
    
    public function getUser()
    {
         if ($this->_googleClient->getAccessToken()) {
            $user = $this->_oauth2->userinfo->get();
            
            // The access token may have been updated lazily.
            $_SESSION['token'] = $this->_googleClient->getAccessToken();
            
            return $user ;
         }
    }
    
    public function createAuthUrl()
    {
        if (!$this->_googleClient->getAccessToken()) {
            return $this->_googleClient->createAuthUrl();
        }
    }
    
    /**
     * 
     */
    public function getPersonMarkup()
    {
        if($this->getUser()){
            $user  = $this->getUser() ;
            $email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
            $img   = filter_var($user['picture'], FILTER_VALIDATE_URL);
            return "$email<div><img src='$img?sz=50'></div>";
        }
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