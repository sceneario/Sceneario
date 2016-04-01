<?php

/*
 * Gestion des affichages d'image
 * Gestion des formats
 * à partir des images de base
 */
class ImageController extends Zend_Controller_Action 
{
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
            $cache = $this->_cache->getCache($this->_cacheId);
            if (empty($cache)) {
                if ($this->_type == 'couverture') {
                    $this->_fileName = \Core_Service_Utilities::getAlbumImageFileName($params['isbn'], \Core_Service_Utilities::$hostImagesCouv);
                } else if ($this->_type == 'planche') {
                    $this->_fileName = \Core_Service_Utilities::getAlbumImageFileName($params['idAlbum'], \Core_Service_Utilities::$hostImagesPlanche);
                }
                if (!empty($this->_fileName)) {
                    $cache = call_user_func( array( $this , $params['format'] . 'Format'));
                }
            }

            if (!empty($cache)) {
                header('Content-Type: image/jpeg');
                echo $cache;
                die;
            }
        }

        header("HTTP/1.0 204 No Content");
        die;
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
    public function largeFormat() //width:113; //height:150px;
    {
        return $this->resize( $this->_fileName, null , 800 ); // L  x  H
    }
    
    /*
     * 
     */
    public function bedethequeFormat() //width:113; //height:150px;
    {
        return $this->resize( $this->_fileName, null, 150 ); // L  x  H     
    }

    /*
     * Format des albums coups de coeur de l'equipe
     */
    public function coupdecoeurequipeFormat()
    {
        //121x167
        return $this->resize( $this->_fileName, null, 230 ); // L  x  H

    }
    
    /*
     * 
     */
    public function alsolikeFormat() //width:123px; //height:171px;
    {
        return $this->resize( $this->_fileName, null, 230 ); // L  x  H
    }
    
    /*
     * Gestion des petits formats
     */
    public function smallFormat()
    {    
        //125x166
        //137x103
        return $this->resize( $this->_fileName, 100, null );//137 // L  x  H
    }

	/*
     * Gestion des formats interview
     * On retrouve le format sur la page interview
     */
    public function interviewFormat()
    {
        //166x230
        return $this->resize( $this->_fileName, 200 , null );//137 // L  x  H 103
    }
    
    /*
     * Gestion des moyens formats
     * On retrouve le format sur la page coup de coeur
     */
    public function mediumFormat()
    {
        //166x230
        return $this->resize( $this->_fileName, 166 , null );//137 // L  x  H 103
    }
     
    /*
     * Gestion des grands formats
     */
    public function bigFormat()
    {
        return $this->resize( $this->_fileName, 360, null ); //width:340px; // height:413px;
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

        return $this->_cache->setCache($this->_cacheId, $image);
    }
}