<?php

class Zend_View_Helper_DisplayImage extends Zend_View_Helper_CustomUrl
{
    public function displayImage($imgUri, $text = '', $class = '', $attr = '', $ajax = true) {
        if (empty($imgUri)) {
            return '';
        }

        $text = trim(str_replace(array('"', "`"), '', str_replace(array('<br>', '<br/>'), ' ', $text)));
        if ($ajax === true) {
            $loaderUri = BASE_URL.'img/loader.gif';
            $picture = '<img class="lazy '.$class.'" src="'.$loaderUri.'" data-original="'.$imgUri.'" alt="'.$text.'" title="'.$text.'" '.$attr.' />';
            $picture .= '<noscript><img src="'.$imgUri.'" alt="'.$text.'" title="'.$text.'" '.$attr.'></noscript>';
        } else {
            $picture = '<img class="'.$class.'" src="'.$imgUri.'" alt="'.$text.'" title="'.$text.'" '.$attr.' />';
        }
        return $picture;
    }

    public function displayAlbumCover($album, $format = 'big', $class = '', $text = '', $attr = '', $ajax = true, $seo = true) {
        return $this->displayImage(
            $this->getAlbumCoverUrl($album, $format, $seo),
            (empty($text) ?
                'Couverture de l\'album '.
                    ($album instanceof \Core_Model_Tblalbum ? $album->getCollection() : $album->collection).
                    ($album instanceof \Core_Model_Tblalbum && $album->getTome() ? ' Tome #'.$album->getTome() : '').
                    (isset($album->tome) && !empty($album->tome) ? ' Tome #'.$album->tome : '').
                    ' '.
                    ($album instanceof \Core_Model_Tblalbum ? $album->getTitre() : $album->titre)
                : $text),
            $class,
            $attr,
            $ajax
        );
    }

    public function displayAlbumPage($album, $format = 'big', $class = '', $text = '', $attr = '', $ajax = true, $seo = true) {
        return $this->displayImage(
            $this->getAlbumPageUrl($album, $format, $seo),
            (empty($text) ?
                'Extrait de l\'album '.
                    ($album instanceof \Core_Model_Tblalbum ? $album->getCollection() : $album->collection).
                    ($album instanceof \Core_Model_Tblalbum && $album->getTome() ? ' Tome #'.$album->getTome() : '').
                    (isset($album->tome) && !empty($album->tome) ? ' Tome #'.$album->tome : '').
                    ' '.
                    ($album instanceof \Core_Model_Tblalbum ? $album->getTitre() : $album->titre)
                : $text),
            $class,
            $attr,
            $ajax
        );
    }

}