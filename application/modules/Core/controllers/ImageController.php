<?php

/*
 * Gestion des affichages d'image
 * Gestion des formats
 * à partir des images de base
 */
class ImageController extends Zend_Controller_Action 
{
	private static $_hostImagesCouv    = '/home/sceneari/v6/public/images/couvertures';
    private static $_hostImagesPlanche = '/home/sceneari/v6/public/images/planches';
    
    private $_fileName;
    private $_fileUri;
    private $_isbn;
    private $_format;
    private $_type;
    private $_cacheId;

    /*
     * Inihibition de la vue
     */
    public function init()
    {
        header('Content-Type: image/jpeg');

        $this->_helper->layout()->disableLayout();
        Zend_Controller_Front::getInstance()->setParam('noViewRenderer', true);
        $this->_cache = new Core_Service_ScenearioCache();
    }
    
    private function _get() {
        $params = $this->getRequest()->getParams();
   
        if(isset($params['format']) && $params['format'] != ''){
            $this->_isbn     = $params['isbn'];
            $this->_format   = $params['format'];
            $this->_cacheId  = $this->_isbn . '_' . $this->_format . '_' . $this->_type;

            //verifier si l'image est en cache et renvoie l'image si elle existe
            if($this->_cache->getCache($this->_cacheId) === false){
                if ($this->_type == 'couverture') {
                    $this->_fileName = $this->getFileName($params['isbn'], self::$_hostImagesCouv);
                } else if ($this->_type == 'planche') {
                    $this->_fileName = $this->getFileName($params['idAlbum'], self::$_hostImagesPlanche);
                }
                call_user_func( array( $this , $params['format'] . 'Format'));
            }
        }
    }

    /*
     * Dispatch en fonction du format vers les bonnes fonctions
     */
    public function couvertureAction()
    {
        $this->_type = 'couverture';
        $this->_get();
    }

    /*
     * Dispatch en fonction du format vers les bonnes fonctions
     */
    public function plancheAction()
    {
        $this->_type = 'planche';
        $this->_get();
    }
    
    /*
     * 
     */
    private function getFileName($id, $imgDirName)
    {
        $filename =  $imgDirName . DS . $id . '.jpg';

		if(file_exists($filename)){
            return $filename;
        }else{
            $filenameWithUnderScore = $imgDirName . DS . '_' .$id . '.jpg';
            if(file_exists($filenameWithUnderScore)){
                return $filenameWithUnderScore;
            }
        }
        return 'no_image_found_file_name';
    }

    /*
     * 
     */
    public function largeFormat() //width:113; //height:150px;
    {
        $img = $this->resize( $this->_fileName, null , 800 ); // L  x  H
    }
    
    /*
     * 
     */
    public function bedethequeFormat() //width:113; //height:150px;
    {
        $img = $this->resize( $this->_fileName, null, 150 ); // L  x  H     
    }

    /*
     * Format des albums coups de coeur de l'equipe
     */
    public function coupdecoeurequipeFormat()
    {
        //121x167
        $img = $this->resize( $this->_fileName, null, 230 ); // L  x  H

    }
    
    /*
     * 
     */
    public function alsolikeFormat() //width:123px; //height:171px;
    {
        $img = $this->resize( $this->_fileName, null, 230 ); // L  x  H
    }
    
    /*
     * Gestion des petits formats
     */
    public function smallFormat()
    {    
        //125x166
        //137x103
        $img = $this->resize( $this->_fileName, 100, null );//137 // L  x  H
    }

	/*
     * Gestion des formats interview
     * On retrouve le format sur la page interview
     */
    public function interviewFormat()
    {
        //166x230
        $img = $this->resize( $this->_fileName, 200 , null );//137 // L  x  H 103
    }
    
    /*
     * Gestion des moyens formats
     * On retrouve le format sur la page coup de coeur
     */
    public function mediumFormat()
    {
        //166x230
        $img = $this->resize( $this->_fileName, 166 , null );//137 // L  x  H 103
    }
     
    /*
     * Gestion des grands formats
     */
    public function bigFormat()
    {
        $img = $this->resize( $this->_fileName, 360, null ); //width:340px; // height:413px;
    }
    
    public function resize($filename, $newwidth, $newheight)
    {
        // Calcul des nouvelles dimensions
        list($width, $height) = getimagesize($filename);
        
        if($newwidth == null){
            $ratio = $newheight / $height;
            $newwidth  = $width * $ratio ;
        }
        
        if($newheight == null){
            $ratio = $newwidth / $width;
            $newheight = $height * $ratio ;
        }

        ob_start();

        $thumb  = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($filename);

        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagejpeg($thumb, null , 70);
        $image = ob_get_contents();
        ob_end_clean();

        echo $this->_cache->setCache( $this->_cacheId , $image ) ;

        exit(0);
      
    }
    
}