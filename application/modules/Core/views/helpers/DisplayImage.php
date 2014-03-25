<?php

class Zend_View_Helper_DisplayImage 
{
    /*
     * 
     */
    public function displayImage( $imgUri, $text="", $class="")
    {
        
        $loaderUri                          = BASE_URL . "img/loader.gif" ;
        $imgUri                             = $this->checkImage($imgUri) ;
        #list($width, $height, $type, $attr)= getimagesize($imgUri);

        $attr = ''; 
        
        #var_dump(is_resource($imgUri));
        
        if( $imgUri != false ){
            return '<img class="lazy '.$class.'" src="'.$loaderUri.'" data-original="'.$imgUri.'" alt="'.$text.'" title="'.$text.'" '.$attr.' />
                <noscript><img src="'.$imgUri.'" alt="'.$text.'" title="'.$text.'" '.$attr. '></noscript>'; 
        }
        
    
    }
    
    /*
     * 
     */
    private function checkImage($imgUri)
    {
        #if(!file_exists($imgUri)){
        #    return false;
        #}
        return $imgUri ;
    }
}