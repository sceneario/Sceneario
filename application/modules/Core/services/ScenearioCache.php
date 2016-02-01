<?php

class Core_Service_ScenearioCache
{
    private static $_frontendOptions = array('lifetime' => 31536000,  // temps de vie du cache d'un an
                                             'automatic_serialization' => true
                                       );
     
    #private static $_backendOptions = array ('cache_dir' =>); // Répertoire où stocker les fichiers de cache

    private $_zendCache;
    
    /*
     * Constructeur 
     * 
     * Initialise l'objet Zend_Cache avec les options necessaires
     */
    public function __construct ()
    {       
        $this->_zendCache = Zend_Cache::factory(
                                              'Core', 
                                              'File', 
                                               self::$_frontendOptions, 
                                               array('cache_dir' =>  APPLICATION_PATH . "/../var/cache" )
                                               );
        
        return $this;
    }
    
    
    /*
     * Supprime les fichiers en cache dont le tag vaut l'isbn
     */
    public function removeFromCache($tag)
    {
        #var_dump($this->_zendCache->remove($id));
        
        return $this->_zendCache->clean(Zend_Cache::CLEANING_MODE_MATCHING_TAG, array($tag)) ;
    }
    
    /*
     * Test l'existence d'un cache pour l'id soumise
     * 
     * @param string $id
     * @return bool true | false
     */
    public function testCache($id)
    {
        return $this->_zendCache->test($id) == false ? false : true;
    }
    
    /*
     * Place le contenu $content en cache
     * 
     * @var string | int $id
     * @var mixed $content
     */
    public function setCache ($id, $content)
    {
        $zendCache = $this->_zendCache;   
        if (! $result = $zendCache->load($id)) {
            //no cache
            $zendCache->save($content, $id);  
        }
        return $content;
    }
    
    /*
     * Verifie si le fichier est présent en cache
     * 
     * @var string | int $cacheId
     * @return boolean | mixed
     */
    public function getCache($cacheId)
    {
        $zendCache = $this->_zendCache;
        if ( !$result = $zendCache->load($cacheId)) {
            //no cache
            return false;
        }
        return $zendCache->load($cacheId);
    }
}