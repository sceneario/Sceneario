<?php
/*
 * Zend_View_Helper_CustomUrl
 * @desc Ssurcharge du gestionnaire Zend_View_Helper_Url
 */
class Zend_View_Helper_CustomUrl extends Zend_View_Helper_Url 
{
    /*
     * @todo implementer generecité
     * @var array $urlOptions
     * @var string $name
     * @var bool $reset
     * @var bool $encode
     */
    public function customUrl(array $urlOptions = array(), $name = null, $reset = false, $encode = true)
    {
        $filterChain = new Zend_Filter();
        $filterChain->addFilter(new Zend_Filter_StripTags()) //supprime les tags
                    ->addFilter(new Zend_Filter_StripNewlines()) //supprimer les caractere de retour a la ligne
                    ->addFilter(new Zend_Filter_AlnumWithSpaces(true))// supprime tout les caractères non-alphabetique et non-num
                    ->addFilter(new Zend_Filter_StringTrim()) //supprime les espace au début et a la fin
                    ;
        
        
        $search  = array(' - ');
        $replace = array(' ');
     
        $options = array();
        foreach ($urlOptions as $key => $urlOption){
            #$option        = strtolower($urlOption);
            $option        = str_replace( $search , $replace , $urlOption);
            $options[$key] = $filterChain->filter($option);

        }
          
        return $this->url($options, $name, $reset, $encode);
    }
}