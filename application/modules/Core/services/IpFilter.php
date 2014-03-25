<?php

/*
 * Class permettant de filtrer des IPs
 * @use $ipFilter = new Core_Service_IpFilter();
 * @use $ipFilter->isSpecialIp();
 * @author madeforweb <contact@madeforweb.fr>
 * @version 1.1
 */
class Core_Service_IpFilter 
{    
    private $_config ;
    /*
     * Constructor
     * 
     * Recupère le fichier des IPs à filtrer
     */
    public function __construct() {
        $fileName          = CONFIG_PATH . 'IPs.ini';
        $this->_config     = new Zend_Config_Ini($fileName, 
                                                 'production'); 
    }
    
    /*
     * Retourne l'ip du visiteur courant
     * @var string $type  
     * @returns string $ip | null
     */
    public function getRemoteAddr( $type = 'IP' )
    { 
        $ip = @getenv('REMOTE_ADDR'); 
        if ($type === 'IP'){
           return $ip; 
        }
       
        if ($ip != '' && $type === 'DOMAIN'){
            return gethostbyaddr($ip);
        }
          
        return $ip != '' ? $ip : null;    
  }
  /*
   * Fonction de filtrage pour exclusion de certaines IPs
   * @returns bool
   */
  public function isSpecialIp()
  {
      $config = $this->_config;
      foreach($config->filtre as $section => $IPs){
          //@todo merger les sections complete et incomplete
          switch($section){
            /*case 'complete' :
                {
                    foreach($IPs as $key => $ip){
                        if ($ip == $this->getRemoteAddr('IP')) {
                            #echo 'c : ' ;  
                            return true;
                        }                
                    }
                }
                break;*/
            case 'ip' :
                {
                    foreach($IPs as $key => $ip){
                        if (($ip == substr ($this->getRemoteAddr('IP'), 0, strlen($ip)))) {
                            #echo 'inc : ';
                            return true;
                        }                
                    }
                }
                break;
            case 'domaine' :
                {
                    //@todo A tester 
                    foreach($IPs as $key => $domain){
                        if (strpos("xx" . $this->getRemoteAddr('DOMAIN'), $domain) !== false) {
                            #echo 'domaine : ';
                            return true;
                        }                
                    }
                }
                break;
            default :
                return false;
                break;
          }
      }
      return false;
  }
}