<?php

/*
 * Retourne l'url courrante
 */
class Zend_View_Helper_CurrentUrl
{
   /*
    * Retourne l'url courrante
    * 
    * @return string
    */
    public function currentUrl()
    {
        return  'http://' . $_SERVER['HTTP_HOST'] 
                . '' 
                . $_SERVER['REQUEST_URI'] ;
    }
    
}