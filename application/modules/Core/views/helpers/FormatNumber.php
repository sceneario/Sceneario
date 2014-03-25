<?php
/*
 * Renvoie autant de zero 
 * devant le nbre à afficher que de chiffre manquant
 */
class Zend_View_Helper_FormatNumber 
{
    public function formatNumber( $nb )
    {
        $nbLen = strlen((String)$nb);
        $zero  = '';
        if($nbLen < 5){
            for($i = 0 ; $i < 5 - $nbLen ; $i++ ){
                $zero .= '0';
            }
        }
        return $zero . (string)$nb ; 
    }
}