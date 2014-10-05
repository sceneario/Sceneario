<?php
/*
 * Redirige les requetes entrantes obsoletes (v5)
 * vers les nouvelles (v6)
 * 
 */
class Core_Plugin_Redirv5tov6 extends Zend_Controller_Plugin_Abstract {
    
    private $_bootstrap;
    
    /*
     * @var string $_requestUri
     */
    private $_requestUri;
    
    public function __construct($moduleName ,$bootstrap)
    {
        $this->_bootstrap = $bootstrap;
        if(isset($_SERVER['REQUEST_URI'])){
            $this->_requestUri = $_SERVER['REQUEST_URI'] ;
        }else{
            return false;
        }
    }
    
    /*
     * Logique permettant la redirection des fiches albums
     */
    public function routeStartup(Zend_Controller_Request_Abstract $request)
    {
        $utils = new Core_Service_Utilities;

        if ($this->_requestUri == '/accueil.html') {
            $this->redirect301('/');
        }

        if (strstr($this->_requestUri, 'index.php/')) {
            $this->redirect301(str_replace('index.php/', '', $this->_requestUri));
        }
        else if ($this->_requestUri == '/index.php') {
            $this->redirect301('/');
        }

        //BD REDIR 301
        if($this->_requestUri !== false){
            if(strpos( $this->_requestUri , 'bd_') !== false || strpos( $this->_requestUri , 'album_') !== false) {
                $queryParts = explode('_' , $this->_requestUri ) ;
                if(isset($queryParts[1])){
                    $id         = (int)$queryParts[1]; 
                    //si $id vaut 0, le script continue sans actions
                    if($id !== 0){
                        $this->redirect301($utils->getAlbumUrlFromId($id)) ; 
                    }
                }
            }
        }

        if($this->_requestUri !== false){
            if(strpos( $this->_requestUri , 'serie_') !== false) {
                $queryParts = explode('_' , $this->_requestUri ) ;
                if(isset($queryParts[1])){
                    $id         = (int)$queryParts[1]; 
                    //si $id vaut 0, le script continue sans actions
                    if($id !== 0){
                        $this->redirect301($utils->getSerieUrlFromId($id)) ; 
                    }
                }
            }
        }

        if($this->_requestUri !== false){
            if(strpos( $this->_requestUri , 'galerie.php') !== false) {
                $queryParts = explode('=' , $this->_requestUri);
                if(!empty($queryParts[1])){
                    $this->redirect301($utils->getDossierUrlFromId($queryParts[1]));
                }
            }
        }

        if($this->_requestUri !== false){
            if(strpos( $this->_requestUri , 'Auteur.php') !== false) {
                $queryParts = explode('=' , $this->_requestUri ) ;
                if(isset($queryParts[1])){
                    $id  = (int)$queryParts[1]; 
                    //si $id vaut 0, le script continue sans actions
                    if($id !== 0){
                        $this->redirect301($utils->getAuteurUrlFromId($id));
                    }
                }
            }
        }
        if($this->_requestUri !== false){
            if(strpos( $this->_requestUri , 'auteur_') !== false) {
                $queryParts = explode('_' , $this->_requestUri ) ;
                if(isset($queryParts[1])){
                    $id  = (int)$queryParts[1]; 
                    //si $id vaut 0, le script continue sans actions
                    if($id !== 0){
                        $this->redirect301($utils->getAuteurUrlFromId($id));
                    }
                }
            }
        }

        // Mobile BD REDIR 301
        if($this->_requestUri !== false){
            if(strpos( $this->_requestUri , 'mobile-bd-') !== false) {
                $queryParts = explode('-' , $this->_requestUri ) ;
                if(isset($queryParts[1])){
                    $id         = (int)$queryParts[2]; 
                    //si $id vaut 0, le script continue sans actions
                    if($id !== 0){
                        $this->redirect301($utils->getAlbumUrlFromId($id)) ; 
                    }
                }
            }
        }
 
        // recherche BD REDIR 301
        if($this->_requestUri !== false){
            if(strpos( $this->_requestUri , 'recherche_serie_') !== false) {
                $queryParts = explode('_' , $this->_requestUri ) ;
                if(isset($queryParts[2])){
                    $id         = (int)$queryParts[2]; 
                    //si $id vaut 0, le script continue sans actions
                    if($id !== 0){
                        $this->redirect301($utils->getSerieUrlFromId($id)) ; 
                    }
                }
            }
        }
        if($this->_requestUri !== false){
            if(strpos( $this->_requestUri , 'recherche_editeur_') !== false) {
                $queryParts = explode('_' , $this->_requestUri ) ;
                if(isset($queryParts[2])){
                    $s  = str_replace('.html', '', $queryParts[2]); 
                    //si $id vaut 0, le script continue sans actions
                    if(!empty($s)){
                        $this->redirect301('/recherche/?tag='.$s.'&filter=Les+éditeurs') ; 
                    }
                }
            }
        }
        if($this->_requestUri !== false){
            if(strpos( $this->_requestUri , 'recherche_genre_') !== false) {
                $queryParts = explode('_' , $this->_requestUri ) ;
                if(isset($queryParts[3])){
		    $s  = str_replace('.html', '', $queryParts[3]); 
                    //si $id vaut 0, le script continue sans actions
                    if(!empty($s)){
                        $this->redirect301('/recherche/?tag='.$s) ; 
                    }
                }
            }
        }
        if($this->_requestUri !== false){
            if(strpos( $this->_requestUri , 'recherche_titre_') !== false) {
                $queryParts = explode('_' , $this->_requestUri ) ;
                if(isset($queryParts[2])){
		    $s  = str_replace('.html', '', $queryParts[2]); 
                    //si $id vaut 0, le script continue sans actions
                    if(!empty($s)){
                        $this->redirect301('/recherche/?tag='.$s) ; 
                    }
                }
            }
        }
        if($this->_requestUri !== false){
            if(strpos( $this->_requestUri , 'recherche_auteurid_') !== false) {
                $queryParts = explode('_' , $this->_requestUri ) ;
                if(isset($queryParts[2])){
		    $id  = (int)$queryParts[2]; 
                    //si $id vaut 0, le script continue sans actions
                    if($id !== 0){
		      $auteurMapper = new Core_Model_Mapper_Tblauteurs;
		      $auteurInfos  = $auteurMapper->find($id, new Core_Model_Tblauteurs);
		      if (!null == $auteurInfos) {
                        $this->redirect301('/recherche/?tag='.$auteurInfos->getPrenomAuteur().' '.$auteurInfos->getNomAuteur().'&filter=Les+auteurs');
		      }
                    }
                }
            }
        }
        if($this->_requestUri !== false){
	    if(strpos( $this->_requestUri , 'recherche_internaute_') !== false) {
                $queryParts = explode('_' , $this->_requestUri );
                if(isset($queryParts[3])){
		    $s  = str_replace('.html', '', $queryParts[3]); 
		    $this->redirect301('/recherche/?tag='.$s);
                }
            }
        }
        if($this->_requestUri !== false){
            if(strpos( $this->_requestUri , 'recherche_collection_') !== false) {
                $queryParts = explode('_' , $this->_requestUri ) ;
                if(isset($queryParts[2])){
		    $id  = (int)$queryParts[2]; 
                    //si $id vaut 0, le script continue sans actions
                    if($id !== 0){
		      $collectionMapper = new Core_Model_Mapper_Tblcollections;
		      $collectionInfos  = $collectionMapper->find($id, new Core_Model_Tblcollections);
		      if (!null == $collectionInfos) {
                        $this->redirect301('/recherche/?tag='.$collectionInfos->getNomCollection());
		      }
                    }
                }
            }
        }
        if($this->_requestUri !== false){
            if(strpos( $this->_requestUri , 'recherche_lettre_') !== false) {
                $queryParts = explode('_' , $this->_requestUri ) ;
                if(isset($queryParts[2])){
		    $s = $queryParts[2]; 
                    //si $id vaut 0, le script continue sans actions
                    if(!empty($s)){
                        $this->redirect301('/recherche/?tag='.$s);
                    }
                }
            }
        }
       
        //INTERVIEW REDIR 301
        //http://www.sceneario.com/sceneario_interview.php?idInterview=TAMIA
        if(strpos( $this->_requestUri , 'sceneario_interview') !== false){
           
            $queryParts = explode('_' , $this->_requestUri ) ;
            
            if(isset($queryParts[2])){
                $id         =  strstr($queryParts[2], '.', true); 
                //si $id vaut 0, le script continue sans actions
                if($id !== ''){
                    $this->redirect301($utils->getInterviewUrlFromId($id)) ;     
                }
            }else{
                if(isset($_GET['idInterview']) && $_GET['idInterview'] != ''){
                    $id = $_GET['idInterview'] ;
                    $this->redirect301($utils->getInterviewUrlFromId($id)) ;  
                }
            }
        }
        
        //EXPO REDIR 301
        //http://www.sceneario.com/expo-2012-japan_expo-0705.html
        if(strpos( $this->_requestUri , 'expo-') !== false){
          
            $queryParts = explode('-' , $this->_requestUri ) ;
             
            if(isset($queryParts[1])){
                $annee = $queryParts[1];
           
                if(isset($queryParts[2])){
                    if(strpos($queryParts[2], '.') !== false){
                        $id         =  strstr($queryParts[2], '.', true); 
                    }else{
                        $id         =  $queryParts[2] ; 
                        if(isset($queryParts[3])){
                            $sousPage = '?e=' .strstr($queryParts[3], '.', true); 
                        }
                    }

                    #echo $sousPage ; exit;
                    //si $id vaut 0, le script continue sans actions
                    if($annee !== '' && $id !== ''){
                        if(isset($sousPage)){
                            $this->redirect301($utils->getExpoUrlFromId($annee, $id, $sousPage)) ;   
                        }else{
                            $this->redirect301($utils->getExpoUrlFromId($annee, $id)) ;   
                        }
                    }
                } 
            }
        }
     }
   
     
     /*
      * Redirection 301 permanente
      * 
      * @param string $url
      */
     private function redirect301($url)
     {  
         header("HTTP/1.1 301 Moved Permanently");
         header('location:' . $url);
         exit(0);
     }
}
