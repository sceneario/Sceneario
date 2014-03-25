<?php

class Zend_View_Helper_DisplayNormalImage 
{
    public function displayNormalImage( $imgUri, $text="", $class="")
    {

        $attr = '';
        return '<img class= "'.$class.'" src="' . $imgUri . '"  alt="' 
                . $text . '" title="' . $text . '" ' . $attr . ' >';
    }
}