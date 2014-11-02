<?php
/*
 * Zend_View_Helper_CustomUrl
 * @desc Ssurcharge du gestionnaire Zend_View_Helper_Url
 */
class Zend_View_Helper_CustomUrl extends Zend_View_Helper_Url
{
    public function getAlbumUrl($album) {
        $urlParams = array(
            'idAlbum'    => $album instanceof \Core_Model_Tblalbum ? $album->getIdAlbum() : $album->idAlbum,
            'titleAlbum' => $album instanceof \Core_Model_Tblalbum ? $album->getTitre() : $album->titre,
            'titleSerie' => $album instanceof \Core_Model_Tblalbum ? $album->getCollection() : $album->collection
        );

        return $this->customUrl($urlParams, 'album');
    }

    public function getAlbumCoverUrl($album, $format = 'large', $seo = true) {
        $urlParams = array(
            'isbn'   => $album instanceof \Core_Model_Tblalbum ? $album->getIsbn() : $album->isbn,
            'format' => $format
        );

        if ($seo === true) {
            $urlParams['seo'] = ($album instanceof \Core_Model_Tblalbum ? $album->getCollection() : $album->collection).
                ($album instanceof \Core_Model_Tblalbum && $album->getTome() ? '-tome-'.$album->getTome() : '').
                (isset($album->tome) && !empty($album->tome) ? '-tome-'.$album->tome : '').
                '-'.
                ($album instanceof \Core_Model_Tblalbum ? $album->getTitre() : $album->titre);
        }

        return $this->customUrl($urlParams, 'couverture');
    }

    public function getAlbumPageUrl($album, $format = 'large', $seo = true) {
        $urlParams = array(
            'isbn'    => $album instanceof \Core_Model_Tblalbum ? $album->getIsbn() : $album->isbn,
            'idAlbum' => $album instanceof \Core_Model_Tblalbum ? $album->getIdAlbum() : $album->idAlbum,
            'format'  => $format
        );

        if ($seo === true) {
            $urlParams['seo'] = ($album instanceof \Core_Model_Tblalbum ? $album->getCollection() : $album->collection).
                ($album instanceof \Core_Model_Tblalbum && $album->getTome() ? '-tome-'.$album->getTome() : '').
                (isset($album->tome) && !empty($album->tome) ? '-tome-'.$album->tome : '').
                '-'.
                ($album instanceof \Core_Model_Tblalbum ? $album->getTitre() : $album->titre);
        }

        return $this->customUrl($urlParams, 'planche');
    }

    public function getSerieUrl($serie) {
        $urlParams = array(
            'slug' => $serie->getNomSerie(),
            'id'   => $serie->getIdSerie()
        );
        return $this->customUrl($urlParams, 'serie');
    }

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
            $options[$key] = preg_replace('!\s+!', ' ', $filterChain->filter($option));
        }

        if ($name == 'couverture' || $name == 'planche') {
            if (!isset($options['seo'])) {
                $options['s']   = '';
                $options['seo'] = '';
            } else {
                $options['s']   = $options['seo'] ? '-' : '';
                $options['seo'] = $options['seo'] ?: '';
            }
        }

        return $this->url($options, $name, $reset, $encode);
    }
}