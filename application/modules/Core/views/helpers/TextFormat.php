<?php
/*
 * Clean les textes entrés en argument
 */
class Zend_View_Helper_TextFormat{
    
    /*
     * Dispatch en fonction de l'option choisie $option
     * L'option doit etre de la forme MOT_MOT
     * 
     * @var string $text
     * @var string $option
     */
    public function textFormat($text, $option)
    {        
        //PSEUDO_AUTEUR
        $functionName = str_replace('_', ' ', $option);
        $functionName = ucwords(strtolower($functionName));
        $functionName = 'format' . str_replace(' ', '', $functionName);
        
        return call_user_func('self::'.$functionName, $text) ;
    }
        
    /*
     * Formate les pseudo auteur et retourne quelque chose comme
     * Titus au lieu de TITUS ou titus
     * 
     * @var string $pseudo
     */
    public static function formatPseudoAuteur($pseudo)
    {
        return ucwords(strtolower($pseudo));
    }
    
    /*
     * Formate les resume de texte sur la page album
     * 
     * @var string $text
     */
    public static function formatResumeText($text)
    {
        $searchTags  = array('<p>', '<h3>', '<h3 align="justify">' , '<br /><br />'); //
        $replacTags  = array('<p class="justify">', '<p class="justify">', '<p class="justify">' , '<br />'); //
        $string = str_replace($searchTags, $replacTags ,$text);
        return strip_tags($string, '<p><a><br><i><strong><b><em><u>');
    }
    
    /*
     * Formate les resume d'interview
     * 
     * @var string $text 
     */
    public static function formatResumeInterview($text)
    {
        #$searchTags  = array('<p>', '<h3>', '<h3 align="justify">'); //
        #$string = str_replace($searchTags, '<p class="justify">',$text);
        #$string = strip_tags($string, '<p><a><br>');
        //$text        = nl2br($text);
        $text        = trim(strip_tags($text, '<br><strong>')); /*<strong>*/
        $searchPonct = array(' ?', ' !', '<br>');
        $replacPonct = array( '&nbsp;?', '&nbsp;!', '<br />');
        $text        = str_replace($searchPonct, $replacPonct, $text);

        $limit = 1030 ;
        if(strlen($text) > $limit){
            while( $text[$limit] !== '.') {
                $limit++;
                continue;
            }

            $text = substr($text, 0 , $limit) ;
        }

        return '<p class="justify">' . preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $text). ' [...]</p>';
    }
}