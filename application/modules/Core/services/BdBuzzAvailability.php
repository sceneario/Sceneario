<?php

/*
 * @desc connect()   connection au site bdbuzz
 * @desc download()  recupération du xml si le cache a expiré - (a coupler avec un systeme de cache
 * @desc checkIsbn() vérifie l'existence du code ISBN de l'album soumis
 */

class Core_Service_BdbuzzAvailability 
{
    /*
     * Contient la chaine XML
     * @var string _bdbuzzXml
     */
    private $_bdbuzzXml;
    
    /*
     * Bdbuzz XML URL
     */
    private $_bdBuzzXmlUrl = 'http://api.bdbuzz.net/affiliate/albums.xml';
    
    /*
     *  Bdbuzz XML PATH TESTING
     */
    private $_bdBuzzXmlPathTesting = '/home/sceneari/_v6_testing/docs/BDBUZZ_XML/albumsAvailability.xml';
    
    /*
     *  Bdbuzz XML PATH PROD
     */
    private $_bdBuzzXmlPathProd = '/home/sceneari/v6/docs/BDBUZZ_XML/albumsAvailability.xml';
   
    /*
     * BdBuzz sceneario affiliate ID
     */
    private $_bdBuzzId = 10007  ;
    
    /*
     * Bdbuzz url
     */
    private $_bdBuzzUrl = 'http://www.bdbuzz.net';
    
    /*
     * Vous pouvez renvoyer directement vers un album disponible Ã  la vente avec l'url suivante :
     * Bdbuzz url album
     */
    private $_bdBuzzUrlAlbum = 'http://www.bdbuzz.net/?album=%s&affiliate_id=10007';
   

	/*
	 * Vous pouvez renvoyer directement vers une sÃ©rie
     * Bdbuzz url serie
     */
    private $_bdBuzzUrlSerie = 'http://www.bdbuzz.net/?serie=%s&affiliate_id=10007' ;

    /*
     * Cache Object de Sceneario
     * @desc cache de 2 heures
     * @var Core_Service_ScenearioCache
     */
    private $_scenearioCache;
    
    /*
     * L'isbn de l'album à vérifier
     * @var string $_isbn 
     */
    private $_isbn;
    
    /*
     * Constante de message d'erreur
     */
    const BDBUZZ_NOT_AVAILABLE = '__BDBUZZ_NOT_AVAILABLE__';
    /*
     * contructor
     * 
     * @return void
     */
    public function __construct() 
    {
  
    }
    
    /*
     * Methode publique a appeler
     */
     public function checkBdBuzzISBNAvailability($isbn)
     {
	    $this->_isbn           = $isbn;
        $this->_scenearioCache = new Core_Service_ScenearioCache();
        $this->getCacheId();
        
        $bdBuzzCache = $this->getBdBuzzCache() ;
         
        if($bdBuzzCache !== self::BDBUZZ_NOT_AVAILABLE){
        	return sprintf($this->_bdBuzzUrlAlbum, $bdBuzzCache );
        }else{
	        return false;
        }
     }
    
    /*
     * Créer l'id du cache
     */
    private function getCacheId()
    {
        $this->_cacheId = $this->_isbn . '_bdbuzz_availability';
        return $this->_cacheId;
    }
    
    /*
     * Test l'existence de la ref dans le cache et renvoie le cache le cas échéant
     * sinon recupère la dispo puis l'enregistre en cache
     * 
     * @return null | string
     */
    private function getBdbuzzCache()
    {
    	
        $cacheId = $this->_cacheId;
        $cache   = $this->_scenearioCache;
        
        //$cache->removeFromCache($this->_isbn);
        
     
        if($cache->testCache($cacheId)){ 
            return $cache->getCache($cacheId);
        }else{
            $content = $this->getBdbuzzAvailabilty();
            ##print($content);
            if($content === false){
                //$cache->setCache($cacheId, $content , array( $isbn, 'bdbuzz')); 
                return $content;
            }
        }
        return $content;
    }
    
    /*
     * 
     */
    private function getBdbuzzAvailabilty()
    {
        $this->_bdbuzzXml = $this->getBdBuzzXml();
        if($this->_bdbuzzXml !== '' && $this->_bdbuzzXml !== null){       	 
            foreach( $this->_bdbuzzXml->album  as $key => $album ){  
                if($album->isbn == $this->_isbn) {
                    /*
                    print $album->isbn . ' : ' 
                            . $album->serie 
                            . ' / ' . $album->titre 
                            . ' ID : ' . $album->idaAlbum 
                            . ' TOME : ' . $album->tome . '<br /><hr />'; 
                     
                     */
                    return $album->idalbum;
                }
            }
	        return self::BDBUZZ_NOT_AVAILABLE;
        }
        return self::BDBUZZ_NOT_AVAILABLE;
    }
    
    /*
     * wget  http://api.bdbuzz.net/affiliate/albums.xml -O /home/sceneari/_v6_testing/docs/BDBUZZ_XML/albumsAvailability.xml
     */
    private function getBdbuzzXml()
    {
        if(APPLICATION_ENV == 'testing'){
	       	$bdBuzzXmlPath = $this->_bdBuzzXmlPathTesting ;
       	}else{
	       	$bdBuzzXmlPath = $this->_bdBuzzXmlPathProd ;
       	}
        $cmd =  'wget ' . $this->_bdBuzzXmlUrl . ' -O ' . $bdBuzzXmlPath;
        
        
        //si le fichier n'existe pas
        //on le crée
        if(!file_exists($bdBuzzXmlPath)){
	    	exec($cmd);
        }else{
	        return  simplexml_load_file($bdBuzzXmlPath) ;
        }
    }
    
    /*
     * 
     */
    private function connect()
    {
        
    }
    
    /*
     * 
     */
    private function download()
    {
        //si le xml existe en cache est qu'il a expiré
        //je download le new xml à partir du serveur de bdbuzz
        //et l'enregistre sur le serveur de sceneario
        
        //sinon si il existe et que le cache est valide 
        //je renvoie le xml mis en cache
         $xmlFile          = dirname(APPLICATION_PATH) . '/docs/bdbuzz/albums.xml' ;
         $this->_bdbuzzXml = simplexml_load_file($xmlFile);

    }
    
    
    
    /*
     * 
     */
    private function __backup__()
    {
        $xmlFile = dirname(dirname(__FILE__)) . '/docs/bdbuzz/albums.xml' ;
        $xmlBdBuzzAlbumDispo = simplexml_load_file($xmlFile);
     
        /*
         * $xmlBdBuzzAlbumDispo->count();
         * 3201 references
         * 
         */
        //9782800148397

        foreach($xmlBdBuzzAlbumDispo->album as $album){
            if($album->isbn == @$_GET['isbn']) {
                print $album->isbn . ' : ' 
                        . $album->serie 
                        . ' / ' . $album->titre 
                        . ' ID : ' . $album->idaAlbum 
                        . ' TOME : ' . $album->tome . '<br /><hr />'; 
            }
        }
    }
}

/*
Guide technique de mise en place de l'affiliation bdBuzz.net

1- principe technique

Lors de votre affiliation Ã  bdBuzz.net un identifiant d'affiliÃ© vous est communiquÃ©.
Lorsque vous renvoyez vers le site www.bdbuzz.net, cette identifiant doit Ãªtre passÃ© dans l'url en paramÃ¨tre GET par la variable "affiliate_id":

exemple http://www.bdbuzz.net?affiliate_id=1234

un cookie est alors positionnÃ© avec votre identifiant affiliÃ© pour une durÃ©e de 15 jours.


2- renvoi vers le site www.bdbuzz.net

Un fichier xml contenant les albums disponibles Ã  la vente est disponible Ã  l'url suivante, il est mis Ã  jour chaque nuit.
url : http://api.bdbuzz.net/affiliate/albums.xml

exemple : 

<albums>
	<album>
		<isbn>9782800148793</isbn>
		<titre><![CDATA[Jonas]]></titre>
		<serie><![CDATA[Alter ego]]></serie>
		<tome/>
		<idalbum>138830</idalbum>
		<idserie>26770</idserie>
		<prix>4.99</prix>
	</album>
	<album>
	...
</albums>

Vous pouvez renvoyer directement vers un album disponible Ã  la vente avec l'url suivante :
http://www.bdbuzz.net/?album="idAlbum"&affiliate_id=1234

Vous pouvez renvoyer directement vers une sÃ©rie
http://www.bdbuzz.net/?serie="idSerie"&affiliate_id=1234

Vous pouvez rÃ©aliser une recherche (titre, serie, auteur) directement sur le site
http://www.bdbuzz.net/?search=xiii&affiliate_id=1234
*/