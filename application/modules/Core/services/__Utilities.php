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
    private function _getView ()
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
    public function getNewImages($imgUrl)
    {
        if( strpos($imgUrl, 'dailymotion') == false  OR strpos($imgUrl, 'youtube')  == true ){
            if(strstr( $imgUrl , 'http://www.sceneario.com' ) == true ){
               $imageInterview = $imgUrl ;
            }else{
               $imageInterview = 'http://www.sceneario.com' . substr($imgUrl, 1) ;
            }

            $imageName      = substr(strrchr($imageInterview, '/'), 1) ;
            $imageURL       = substr($imageInterview, 0, strrpos($imageInterview, '/' )) ;
            return $imageURL . '/V6/' . $imageName;
        }else{
            return $imgUrl;
        }
    }
    
    /*
     * Retourne le chemin d'image www
     * 
     * @var string $imgUrl
     * @return string
     */
    public function getImages($imgUrl)
    { 
        if( strpos($imgUrl, 'dailymotion') == false  OR strpos($imgUrl, 'youtube')  == true ){
            if(strstr( $imgUrl , 'http://www.sceneario.com' ) == true ){
               $imageInterview = $imgUrl ;
            }else{
               $imageInterview = 'http://www.sceneario.com' . substr($imgUrl, 1) ;
            }
            return $imageInterview;
        }else{
            return $imgUrl;
        }
    }
    
    /*
     * Retourne une url formatée 
     * en fonction de l'ID de l'album
     * 
     * @var int $id
     * @return string 
     */
    public function getAlbumUrlFromId($id)
    {
        $albumMapper = new Core_Model_Mapper_Tblalbum();
        $albumInfos  = $albumMapper->find($id, new Core_Model_Tblalbum()) ;
        
        $tome  = $albumInfos->getTome() != '' ? ' ' . $albumInfos->getTome() : '';
        $serie = $albumInfos->getCollection() . $tome  ;
        $titre = $albumInfos->getTitre();
        $view  = $this->_getView();
        
        return $view->customUrl(array('titleSerie' => $serie, 
                                            'titleAlbum' => $titre, 
                                            'idAlbum' => $id),
                                      'album' );

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
    
        $newLinks = array();
        foreach($links[1] as $link){
            if(strstr( $link, 'jpg') == false && strstr( $link, 'bd_') == true){
                $linkParts = explode('_', $link);
                foreach($linkParts as $part){
                    if(is_numeric($part)){
                        $newLinks[] = $this->getAlbumUrlFromId($part);
                    }
                }
            }
            else{
                 $newLinks[] = 'javascript:void(0);';
            }
        }
        
        /*
         * Reecriture des liens images
         */
        $newImageUrls = array();
        foreach($images[1] as $image){
             $newImageUrls[] = $this->getImages($image);
        }
        
        /*
         * Remplacement des liens
         */
        $text = str_replace($links[1] ,$newLinks, $text);
        
        /*
         * Remplacement des images
         */
        return str_replace($images[1] , $newImageUrls, $text );
       
        /*
        $doc = new DOMDocument();
        $doc->loadHTML($text);
        $doc2 = clone $doc;

      
        $imageTags = $doc->getElementsByTagName('img');
       

        foreach($imageTags as $tag) {
            echo $tag->getAttribute('src') . '<br />';
        }
        unset($imageTags);
        
        $linkTags  = $doc2->getElementsByTagName('a');
        foreach($linkTags as $linkTag) {
            echo $linkTag->getAttribute('href') . '<br />';
        }
        */
       // echo $text;
     
   
        
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
                break;
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
}
