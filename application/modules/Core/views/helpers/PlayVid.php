<?php

class Zend_View_Helper_PlayVid{
    
    public function playVid($videoUrl)
    {
        if(strpos($videoUrl, 'youtube') !== false ){ 
            return $this->ytbEmbedScript($videoUrl);
        }
        elseif (strpos($videoUrl, 'dailymotion') !== false){
            return $this->dlmScriptEmbed($videoUrl) ;
        }else{
            return false;
        }
    }
    
    /*
     * Youtube video
     */
    private function ytbEmbedScript($u)
    {
        $videoId = substr(strrchr($u, '='), 1);
        return '<iframe width="560" height="315" 
         src="http://www.youtube.com/embed/'.$videoId.'" rel="0" frameborder="0" allowfullscreen></iframe>';
    }
    
    /*
     * Dailymotion video
     */
    private function dlmScriptEmbed($u)
    {
        $videoId = substr(strrchr($u, '/'), 1);
        
        //http://www.dailymotion.com/embed/video/xr0725_bande-annonce-jack-l-eventreur-tome-1_creation
        return '<iframe frameborder="0" width="560" height="315" 
            src="http://www.dailymotion.com/embed/video/' . $videoId . '?theme=eggplant&foreground=%23CFCFCF&highlight=%23834596&background=%23000000"></iframe>';
    }
}