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
                    ->addFilter(new Zend_Filter_StringTrim()); //supprime les espace au début et a la fin

        foreach ($urlOptions as $key => &$urlOption){
            if ($key != 'isbn' && in_array($name, array('couverture', 'planche', 'album', 'serie'))) {
                $accents   = array('$', '@', '€', 'À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü','Ý','à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ');
                $sans      = array('S', 'A', 'E', 'A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','O','O','O','O','O', 'U','U','U','U','Y','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y');
                $urlOption = str_replace($accents, $sans, $urlOption);

                $urlOption = strtolower($urlOption);
                $urlOption = str_replace('/', ' ', $urlOption);
                $urlOption = preg_replace('!\s+!', '-', $filterChain->filter($urlOption));
            } else {
                $urlOption = str_replace(' - ', ' ', $urlOption);
                $urlOption = preg_replace('!\s+!', ' ', $filterChain->filter($urlOption));
            }
        }

        if ($name == 'couverture' || $name == 'planche') {
            if (!isset($urlOptions['seo'])) {
                $urlOptions['s']   = '';
                $urlOptions['seo'] = '';
            } else {
                $urlOptions['s']   = $urlOptions['seo'] ? '-' : '';
                $urlOptions['seo'] = $urlOptions['seo'] ?: '';
            }
        }

        return $this->url($urlOptions, $name, $reset, $encode);
    }
}