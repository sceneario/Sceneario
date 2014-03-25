<?php

/*
 * Contient des fonctions appelées partout ds le site
 * 
 * @copyright madeforweb SARL ©2012
 */

class Core_Service_Utilities 
{

    /*
     * Set la vue
     */
    private $_view = null;
    
    private static $_instance ;
    
    public function __construct()
    {}
    
    /*
     * Singleton
     * 
     * En cas de plusieurs appels sur une meme page,
     * privilégier cette inititialisation
     */
    public static function getInstance()
    {
        if(null === self::$_instance){
            self::$_instance = new Core_Service_Utilities  ;
        }
        return  self::$_instance ;
    }
        
    /*
     * Retourne la vue courante
     */
    public function _getView ()
    {
        if (null === $this->_view) {
            $this->_view = Zend_Layout::startMvc()->getView();
        }
        return $this->_view;
    }
    
    /*
     * Retourne le chemin d'image V6
     * 
     * @var string $imgUrl
     * @return string
     */
    /*
    public function getNewImages($imgUrl)
    {
        $urlImage = 'http://www.sceneario.com' ;
        //nouvelle url $urlImage = 'http://images.sceneario.com/interviews' ;
        #$urlImage = IMAGE_URL ;
        //
        //si aucun domain n'existe, l'image est interne : './' ou '/' ou ''
        if( !$this->linkIsExternal($imgUrl) ){
            #$fileName = ltrim(strrchr($imgUrl, '/'), '/');
            $fileName       = strstr($imgUrl, '/');
            $imageInterview = $urlImage . $fileName ;
           
        }else{
            //si le lien n'est pas un lien sceneario
            if( !$this->linkIsScenearioLink($imgUrl) ){
                return $imgUrl;
            }
            //sinon
            $imageInterview = $imgUrl ;
        }
       
    }*/
    
    /*
     * Fonction de debug permettant de voir 
     * les differents pieces de l'url
     * 
     * @param string $imgUrl
     */
    private function showUrlPieces($imgUrl)
    {
        echo '<pre>';
        print_r(parse_url($imgUrl));
        exit('</pre>');
    }
    /*
     * Retourne le chemin d'image 
     * si $new vaut TRUE, l'url V6 sera renvoyée
     * 
     * @param string $imgUrl
     * @param bool $new
     * @return string
     * 
     * RandomInterviewBloc
     * LastInterviewBloc
     * InterviewController
     */
   
    public function getImages($imgUrl, $new = false)
    { 
    	#if($imgUrl == ''){
	    #	return '';
    	#}
    	
         $urlImage = 'http://images.sceneario.com' ;
         
         
        
         if( !$this->linkIsExternal($imgUrl) ){
            if( isset($imgUrl[0]) && $imgUrl[0]!== '.'){
                $urlImage = 'http://images.sceneario.com/interviews' ;
            }
            $fileName       = strstr($imgUrl, '/');
            $imageInterview = $urlImage  . $fileName ;
           
        }else{
            //si le lien n'est pas un lien sceneario
            if( !$this->linkIsScenearioLink($imgUrl) ){
                return $imgUrl;
            }
            //sinon
            $imageInterview = $imgUrl ;
            
        }
        if($new){
           
            $imageName      = substr(strrchr($imageInterview, '/'), 1) ;
          
            
            $imageURL       = substr($imageInterview, 0, strrpos($imageInterview, '/' )) ;
          
            $v6Url          = $imageURL . '/V6/' . $imageName ;
            
            return $v6Url;
        }
        return $imageInterview  ;
    }
    
    /*
     * Verifie si le lien soumis est externe ou interne
     * 
     * @param string $link
     * @return bool
     */
    private function linkIsExternal($link)
    {
        $parsedLink = parse_url($link);
        if(isset($parsedLink['scheme']) 
                && $parsedLink['scheme'] == 'http' OR isset($parsedLink['scheme']) 
                											&& $parsedLink['scheme'] == 'https' ){
            return true;
        }
        return false;  
    }
    
    /*
     * Verifie si le lien soumis est un lien de sceneario
     * 
     * @param string $link
     * @return bool
     */
    private function linkIsScenearioLink($link)
    {
        $parsedLink = parse_url($link);
        if(isset( $parsedLink['host'] ) 
                && strpos( $parsedLink['host'], 'sceneario' ) !== false ){
            return true;
        }
        return false;  
    }
    
    /*
     * Retourne une url formatée 
     * en fonction de l'ID de l'album
     * 
     * @param int $id
     * @return string 
     */
    public function getAlbumUrlFromId($id)
    {
        $albumMapper = new Core_Model_Mapper_Tblalbum();
        $albumInfos  = $albumMapper->find($id, new Core_Model_Tblalbum()) ;
        
        if(!null == $albumInfos){
            $tome  = $albumInfos->getTome() != '' ? ' ' . $albumInfos->getTome() : '';
            $serie = $albumInfos->getCollection() . $tome  ;
            $titre = $albumInfos->getTitre();
            $view  = $this->_getView();

            return $view->customUrl(array('titleSerie' => $serie, 
                                                'titleAlbum' => $titre, 
                                                'idAlbum' => $id),
                                          'album' );
        }else{
            return '/';
        }
    }
    

    public function getSerieUrlFromId($id)
    {
        $serieMapper = new Core_Model_Mapper_Tblserie();
        $serieInfos  = $serieMapper->find($id, new Core_Model_Tblserie()) ;
        
        if(!null == $serieInfos){
            $titre = $serieInfos->getNomSerie();
            $view  = $this->_getView();

            return '/recherche/'.$titre;
        }else{
            return '/';
        }
    }
      
     /*
      * 
      */
     public function getInterviewUrlFromId($id)
     {
          $interviewMapper = new Core_Model_Mapper_Tblinterviews ;
          $interviewInfos  = $interviewMapper->find($id, new Core_Model_Tblinterviews);  
          if(!null == $interviewInfos){
              $titre = $interviewInfos->getTitreInterview();
              $view  = $this->_getView();

              return $view->customUrl(array('nom' => $titre, 
                                            'id' => $id),
                                      'interview' );
          }else{
              return '/';
          }
     }

     /*
      * 
      */
     public function getAuteurUrlFromId($id)
     {
          $auteurMapper = new Core_Model_Mapper_Tblauteurs;
          $auteurInfos  = $auteurMapper->find($id, new Core_Model_Tblauteurs);  
          if(!null == $auteurInfos) {
              $view  = $this->_getView();
              return $view->customUrl(array(
                'nomAuteur' => $auteurInfos->getPrenomAuteur().' '.$auteurInfos->getNomAuteur(), 
                'idAuteur' => $auteurInfos->getIdAuteur()
              ),'auteur');
          }else{
              return '/';
          }
     }

     /*
      * //expo-2012-prix_vsd.html
      */
     public function getExpoUrlFromId($annee, $id, $sousPage = '')
     {
          $exposMapper = new Core_Model_Mapper_Tblexpos ;
          $exposInfos  = $exposMapper->findExpoByIdExpoAndAnnee($annee, $id);  
      
          if(!null == $exposInfos){
              $titre = $exposInfos[0]->titre ;
              $idNum = $exposInfos[0]->_id ;
              $view  = $this->_getView();
           
              return $view->customUrl(array('title'  => $titre, 
                                            'idexpo' => $idNum),
                                      'expo' ) . $sousPage;
          }else{
              return '/';
          }
     }

    public function getDossierUrlFromId($id)
    {
        $dossierMapper = new Core_Model_Mapper_Tbldossiers;
        $dossierInfos  = $dossierMapper->find($id, new Core_Model_Tbldossiers);  
        if (!null == $dossierInfos) {
            $view  = $this->_getView();
            return $view->customUrl(array(
                'nom' => $dossierInfos->getTitreDossier(),
                'id' => $dossierInfos->getIddossier()
            ),'galerie');
        } else {
            return '/';
        }
    }

    public function getConcoursUrlFromId($id, $nom)
    {
        $concoursMapper = new Core_Model_Mapper_Tblconcoursent;
        $concoursInfos  = $concoursMapper->find($id, new Core_Model_Tblconcoursent);  
        if (!null == $concoursInfos) {
            $view  = $this->_getView();
            return $view->customUrl(array(
                'nomConcours' => $concoursInfos->getLibelleConcours(),
                'idConcours' => $concoursInfos->getNomConcours()
            ),'concoursstep1');
        } else {
            return '/';
        }
    }
    
    public function adaptImgToV6( $text )
    {   
    	
        /*
         * <a href="http://www.sceneario.com/bd_10000_CLUES.html"><img src="./interviews/CLUES/clues08.jpg" alt="Clues T1 couv" /></a>
         */
        /*
         * Capture les images src=""
         */
        preg_match_all('/src="([^"]*)"/i', $text, $images);
        
        /*
         * Capture les lien href=""
         */
        preg_match_all('/href="([^"]*)"/i', $text, $links);
        
        #echo '<pre>';
        #print_r($links);
        #exit('</pre>');
     
        $newLinks = array();
        foreach($links[1] as $link){
        	if(!$this->linkIsExternal($link)){
	            if(strstr( $link, 'jpg') == false && strstr( $link, 'bd_') == true){
	                $linkParts = explode('_', $link);
	                foreach($linkParts as $part){
	                    if(is_numeric($part)){
	                        $newLinks[] = $this->getAlbumUrlFromId($part);
	                    }
	                }
	            }
	            else{
	                 $newLinks[] = 'http://images.sceneario.com/' . $link .'" rel="lightbox[interview]"';
	            }
            }else{
	            $newLinks[] = $link;
            }
        }
        
           
        /*
         * Reecriture des liens images
         */
        $newImageUrls = array();
        foreach($images[1] as $image){
             #var_dump(strpos($image, 'Couverture_bd_'));
             if(strpos($image, 'Couverture_bd_')===false OR strpos($image, 'Planche_bd_')===false ){
	             $newImageUrls[] = $this->getImages($image);
             }else{
                 $urlPieces      = explode('_', substr(strrchr($image, '/'), 1));
                 $isbnEtFormat   = $urlPieces[count($urlPieces)-2] ;
                 $strLen         = strlen($isbnEtFormat) ;
                 if($isbnEtFormat[$strLen-2] == 'F'){
                    #echo $isbnEtFormat[$strLen-2] ;
                    $isbn = substr($isbnEtFormat , 0, $strLen-2 ) ;
                 }else{
                    $isbn = $isbnEtFormat ;
                 }
                 
                 if(strpos($image, 'Couverture_bd_')!==false){
                     $type = 'couverture';
                 }else{
                     $type = 'planche';
                 }
                 
                 $newImageUrls [] = $this->_getView()->customUrl( array('isbn'   => $isbn,
                                                                       'format' => 'interview') , 
                                                                  $type );
             }     
        }
        
            
    
        
  
        #print_r($newImageUrls);
        #exit;
        /*
         * Remplacement des liens
         */
        #$text        = strip_tags($text, '<p><img><a><br><u><i><em><b><strong>');
        $text = str_replace($links[1] ,$newLinks, $text);
        
        /*
         * Remplacement des images
         */
        return str_replace($images[1] , $newImageUrls, $text );
  
    }
    
    /*
     * Permet d'afficher le filtre adulte
     * 
     * @var stdclass | object $tags
     * @return boolean
     */
    public function applyAdultFilter($tags)
    {
        $tagsSensible = array('Pornographie', 'Adulte');
        
        foreach($tags as $tag){
            if(in_array($tag->libelle, $tagsSensible)){
                return true;
            }
        }
        return false;
    }
    
    /*
     * Retourne le referer si il existe
     * 
     * @return string
     */
    public function getReferer()
    {
        if(isset($_SERVER['HTTP_REFERER']) 
                && strpos($_SERVER['HTTP_REFERER'], 'sceneario' ) != false){
            return $_SERVER['HTTP_REFERER'];
        }
        return $this->_getView()
                    ->customUrl(array(), 'accueil');
    }
    
     /*
     * Methode utilisé lorsque l'album n'est pas trouvable
     * avec la requete optimisé.
      * 
     * Retourne toutes les infos sur l'album 
     * 
     * @var $idAlbum
     * @return array
     */
    public function getDataForAlbumWhoFails ( $idAlbum )
    {
        /*
         * Init du mapper Album
         * qui contient les méthodes de transactions SQL
         */
        $mpAlb        = new Core_Model_Mapper_Tblalbum;
        
        /*
         * Retourne les infos album sous forme
         * d'object Core_Model_Tblalbum
         */
        $albumsData   = $mpAlb->find($idAlbum, new Core_Model_Tblalbum);
        
        /*
         * Si null, l'album n'existe vraiment pas
         * on retourne false
         */
        if($albumsData == null){
            return false ;
        }
        
        /*
         * Init du tableau qui sera retourné
         */
        $dataToIndex   = array();

        $editeurMapper = new Core_Model_Mapper_Tblediteur();
        $editeurInfos  = $editeurMapper->find($albumsData->getFKidEditeur(), 
                                          new Core_Model_Tblediteur);
        $tome = '';
        if($albumsData->getTome() != ''){
            $tome = ' #' . $albumsData->getTome() ;
        }

        $dataToIndex['idAlbum']    =  $idAlbum;
        $dataToIndex['titreAlbum'] =  $albumsData->getTitre();
        $dataToIndex['titreSerie'] =  $albumsData->getCollection() . $tome ;
        $dataToIndex['isbn']       =  $albumsData->getIsbn();


        $dataToIndex['dessinateurs'] = '';
        //recuperation des dessinateurs
        $albumDessinateurs = $mpAlb->getAlbumDessinateurs($idAlbum);
        foreach($albumDessinateurs as $key => $d){
            $dataToIndex['dessinateurs'] .= $d->prenomAuteur . ' ' . $d->nomAuteur ; 
            if($key >= 0 && $key < count($albumDessinateurs)-1){
                $dataToIndex['dessinateurs'] .= ' / ';
            }
        }

        $dataToIndex['coloristes'] = '';
        //recuperation des coloristes
        $albumColoristes   = $mpAlb->getAlbumColoristes($idAlbum);
        foreach($albumColoristes as $key => $c){
            $dataToIndex['coloristes'] .= $c->prenomAuteur . ' ' . $c->nomAuteur; 
            if($key >= 0 && $key < count($albumColoristes)-1){
                $dataToIndex['coloristes'] .= ' / ';
            }
        }

        $dataToIndex['scenaristes'] = '';
        //recuperation des scenaristes
        $albumScenaristes  = $mpAlb->getAlbumScenaristes($idAlbum);
        foreach($albumScenaristes as $key => $s){
            $dataToIndex['scenaristes'] .= $s->prenomAuteur . ' ' . $s->nomAuteur; 
            if($key >= 0 && $key < count($albumScenaristes)-1){
                $dataToIndex['scenaristes'] .= ' / ';
            }
        }

        $dataToIndex['genres'] = '';
        //recuperation des mots clés
        $albumKeywords     = $mpAlb->getAlbumKeywords($idAlbum);
        foreach($albumKeywords as $kkey => $k){
            #echo $k->libelle;
            $dataToIndex['genres'] .= $k->libelle ; 
            if($kkey >= 0 && $kkey < count($albumKeywords)-1){
                $dataToIndex['genres'] .= ' / ';
            }
        }

        $nomEditeur        = $editeurInfos->getPrenomEditeur() != '' ? $editeurInfos->getPrenomEditeur() 
                                                                . ' ' . $editeurInfos->getNomEditeur() :
                                                                $editeurInfos->getNomEditeur() ;

        @$dataToIndex['editeur'] = $nomEditeur; 
        return @$dataToIndex;
    } 
    
    /*
     * Renvoie un script html formaté
     * 
     * @var array $data
     */
    public function generateHtmlSelector($name, $data, $options = null )
    {
        
        $selector = '<select   name="'.$name.'">' . PHP_EOL; 
        
        if(!null == $options){
            foreach($options as $optKey => $option){
                $selector .= '<option value="'.$optKey.'">'.$option.'</option>'  . PHP_EOL;
            }
        }
        
        foreach($data as $k => $a){
            $selector     .= '<option value="_DISABLED_" DISABLED >'.$k.'</option>'  . PHP_EOL;

            foreach($a as $k2 => $a2){
                $selected = isset($_GET[$name]) && $_GET[$name] == $k2 ? 'SELECTED' : '' ;
                $selector .= '<option value="'.$k2.'" '.$selected.'>&nbsp;&nbsp;&nbsp;'.$a2.'</option>'  . PHP_EOL;
            }
        }
        $selector .= '</select>' . PHP_EOL;
        
        return $selector ;
    }
    
    /*
     * Retourne le contenu html des expo
     * 
     * @param string $id
     * @param string $annee
     */
    public function getTheExpoHtml($id, $annee)
    {
        if($id !== '' && $annee != ''){
            if(isset($_GET['e']) && $_GET['e'] != ''){
                $event = strip_tags($_GET['e']);
                $htmlName = $event . '.html' ;
            }else{
                $htmlName = $id . '.html' ;

            }
            $photoDir = '/images/expos/' . $annee . '/'. $id . '/photo';
            $thumbDir = '/images/expos/' . $annee . '/'. $id . '/thumbnail';
            $uri      = $annee . '/'. $id . '/' . $htmlName;
        }else{
            return null;
        }
        
        #$expoHtml = PUBLIC_DIR . '/images/expos/' . $uri;
        $expoHtml = '/home/sceneari/images/expos/' . $uri;
         
        if(file_exists($expoHtml)){
            ob_start();
            include_once ($expoHtml);
            $expoHtmlBuffered = ob_get_contents();
            ob_get_clean();
        }else{
            return null;
        }
 
        $htmlRepPhoto = str_replace('{photo}' , $photoDir,  $expoHtmlBuffered);
        $htmlRepThumb = str_replace('{thumbnail}' , $thumbDir,  $htmlRepPhoto);
        return utf8_encode($htmlRepThumb);
    }
}
