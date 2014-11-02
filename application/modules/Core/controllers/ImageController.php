<?php

/*
 * Gestion des affichages d'image
 * Gestion des formats
 * à partir des images de base
 */
class ImageController extends Zend_Controller_Action 
{
    
    #private static $_repertoireCouv      = "uploads/27f291c7d6584ba7b10f1c88097430e1";
    #private static $_repertoireCouvProd  = "/home/sceneari/www/27f291c7d6584ba7b10f1c88097430e1"; 
    
    #private static $_repertoirePlanche      = "uploads/images_extraits_45387";
    #private static $_repertoirePlancheProd  = "/home/sceneari/www/images_extraits_45387"; 
    
    #private static $_hostImagesCouv    = 'http://images.sceneario.dev/27f291c7d6584ba7b10f1c88097430e1';
    #private static $_hostImagesPlanche = 'http://images.sceneario.dev/images_extraits_45387';

	#private static $_hostImagesCouv    = '/home/sceneari/www/27f291c7d6584ba7b10f1c88097430e1';
    #private static $_hostImagesPlanche = '/home/sceneari/www/images_extraits_45387';

	private static $_hostImagesCouv    = '/home/sceneari/v6/public/images/couvertures';
    private static $_hostImagesPlanche = '/home/sceneari/v6/public/images/planches';
    
    private $_fileName ;
    private $_fileUri  ;
    private $_isbn;
    private $_format;
    private $_type ;
    private $_cacheId ;
    //private $_imgDirPath            = '';
     
    /*
     * Inihibition de la vue
     */
    public function init()
    {
        $this->_helper->layout()->disableLayout();
        Zend_Controller_Front::getInstance()->setParam('noViewRenderer', true);
        $this->_cache = new Core_Service_ScenearioCache();


		#var_dump(file_exists('/home/sceneari/www/27f291c7d6584ba7b10f1c88097430e1/9782070649211.jpg'));
		#exit;
    }
    
    /*
     * Dispatch en fonction du format vers les bonnes fonctions
     */
    public function couvertureAction()
    {  
        $params = $this->getRequest()->getParams();
   
        if(isset($params['format']) && $params['format'] != ''){
            
            $this->_isbn     = $params['isbn'];
            $this->_format   = $params['format'];
            $this->_type     = 'couverture';
            $this->_cacheId  = $this->_isbn . '_' . $this->_format . '_' . $this->_type;
            
 

            //verifier si l'image est en cache et renvoie l'image si elle existe
            if(!$this->_cache->getCache($this->_cacheId)){
                $this->_fileName = $this->getFileName($params['isbn'], self::$_hostImagesCouv);
				call_user_func( array( $this , $params['format'] . 'Format')) ; 

				
            }
        }    
    }
    
    
    /*
     * Dispatch en fonction du format vers les bonnes fonctions
     */
    public function plancheAction()
    {       
        $params = $this->getRequest()->getParams();
   
        if(isset($params['format']) && $params['format'] != ''){
            
            $this->_isbn     = $params['isbn'];
            $this->_format   = $params['format'];
            $this->_type     = 'planche';
            $this->_cacheId  = $this->_isbn . '_' . $this->_format . '_' . $this->_type;
            
            //verifier si l'image est en cache et renvoie l'image si elle existe
		
            if(!$this->_cache->getCache($this->_cacheId)){
                $this->_fileName = $this->getFileName($params['idAlbum'] , self::$_hostImagesPlanche);
                call_user_func( array( $this ,$params['format'] . 'Format')) ; 
            }
        }     
    }
    
    /*
     * USELESS
     */ 
    private function getFileUri($id)
    {
       return UPLOADS_DIR_URL . self::$_repertoireCouv 
                    . DS . $id . '.jpg'; 
    }
    
    /*
     * 
     */
    private function getFileName($id, $imgDirName)
    {
      
        #if(APPLICATION_ENV !== 'development'){
        #    $filename = self::$_repertoireCouvProd . DS . $id . '.jpg';
        #}else{
 
            $filename =  $imgDirName 
                         . DS . $id . '.jpg';
        #}

     	/*
        if($this->checkStatusOK($filename)){
            return $filename;
        }else{
            $filenameWithUnderScore = $imgDirName 
                                     . DS . '_' .$id . '.jpg';
            if($this->checkStatusOK($filenameWithUnderScore)){
                return $filenameWithUnderScore;
            }
        }*/
		

		if(file_exists($filename)){
            return $filename;
        }else{
            $filenameWithUnderScore = $imgDirName 
                                     . DS . '_' .$id . '.jpg';
            if(file_exists($filenameWithUnderScore)){
                return $filenameWithUnderScore;
            }
        }
        return 'no_image_found_file_name';
    }
    
    /*
     * VERIFIE L'EXISTENCE D'UNE RESOURCE HTTP
     */
    private function checkStatusOK($filename)
    {
        //HTTP/1.1 404 Not Found
        //HTTP/1.1 200 OK

        $imgHeaders = @get_headers($filename); // extra paramater 1 to set clé assoc
        if('HTTP/1.1 200 OK' == $imgHeaders[0]){
            return true;
        }
        return false;
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
        $img = $this->resize( $this->_fileName, 121, null ); // L  x  H

    }
    
    /*
     * 
     */
    public function alsolikeFormat() //width:123px; //height:171px;
    {
        $img = $this->resize( $this->_fileName, null, 171 ); // L  x  H
    }
    
    /*
     * Gestion des petits formats
     */
    public function smallFormat()
    {    
        //125x166
        //137x103
        $img = $this->resize( $this->_fileName, 103, null );//137 // L  x  H
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
        $img = $this->resize( $this->_fileName, 300, null ); //width:340px; // height:413px;     
    }
    
    /*
     *  USELESS 
     */
    public static function LoadJpeg($imgname)
    {
        /* Tente d'ouvrir l'image */
        $im = imagecreatefromjpeg($imgname);

        /* Traitement en cas d'échec */
        if(!$im)
        {
            /* Création d'une image vide */
            $im  = imagecreatetruecolor(150, 30);
            $bgc = imagecolorallocate($im, 255, 255, 255);
            $tc  = imagecolorallocate($im, 0, 0, 0);

            imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

            /* On y affiche un message d'erreur */
            imagestring($im, 1, 5, 5, 'Erreur de chargement ' . $imgname, $tc);
        }
        return $im;
        #return imagecreatetruecolor($imgname, 100,100) or die('Impossible de crée un flux d\'image GD');
    }
    
    
    public function resize($filename, $newwidth, $newheight)
    {
      
  

        // Calcul des nouvelles dimensions
        list($width, $height) = getimagesize($filename);
        #$newwidth = $width * $percent;
        #$newheight = $height * $percent;
        
        if($newwidth == null){
            $ratio = $newheight / $height;
            $newwidth  = $width * $ratio ;
        }
        
        if($newheight == null){
            $ratio = $newwidth / $width;
            $newheight = $height * $ratio ;
        }

        // Chargement
     
        // Redimensionnement
      

        // Affichage
        ob_start();
        header('Content-Type: image/jpeg');
        header("Expires: ".gmdate("D, d M Y H:i:s", time() + 3600*48)." GMT");
        header("Cache-Control: max-age=".(3600*48).", proxy-revalidate");
        header("Pragma: public");

        $thumb  = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($filename);

        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagejpeg($thumb, null , 70);
        $image = ob_get_contents();
        ob_end_clean();
        
        //echo '<pre>';
        #echo $this->_isbn;
        echo $this->_cache->setCache( $this->_cacheId , $image ) ;
        #echo '<pre>';
        #print_r($cache);
        #var_dump($cache);
        #var_dump($cache);
        #exit;
        #echo $image;
        exit(0);
      
    }
    
}